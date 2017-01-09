<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3
 * Time: 21:35
 */

namespace Home\Controller;


use Think\Controller;
use Wechat\Lib\Tools;

class OrderController extends  Controller
{
        public  function  create(){
            if(!session('MEMBER')){
                cookie('his_url',__SELF__);
                $this->redirect('U:Login/index','',1,'请登录');
            }
            if(IS_POST){
                    D('Order')->create();
                    $order_id=D('Order')->create_order();

                    $this->pay($order_id);
            }
            else{
                $data=D('Cart')->cart_list();
                $infos=D('Address')->select();
                $this->assign('infos',$infos);
                $this->assign('goodslist',$data['goodslist']);
                $this->assign('sum_price',$data['sum_price']);
                $this->assign('sum_total',$data['sum_total']);
                $this->display('settlement');
            }

        }

    public  function  pay($order_id){
        if(!$id=I('post.delivery_id')){
            $id=1;
        };
        switch($id){
            case 1:$this->WechatPay($order_id);
            case 2:$this->TAOBAOPay();
            case 3:$this->BankPay();
            case 4:$this->GetPay();
        }

        D('Order')->where(['id'=>$order_id])->setField('status',2);
    }
     public  function WechatPay($order_id){

         $order=D('Order')->getOrder($order_id);
         $order['price']=number_format($order[0]['price']*100,0,'','');
         vendor('wechat.include');
         $options = array(
             'token'             =>  '', // 填写你设定的key
             'appid'             =>  'wx85adc8c943b8a477', // 填写高级调用功能的app id, 请在微信开发模式后台查询
             'appsecret'         =>  '', // 填写高级调用功能的密钥
             'encodingaeskey'    =>  '', // 填写加密用的EncodingAESKey（可选，接口传输选择加密时必需）
             'mch_id'            =>  '1228531002', // 微信支付，商户ID（可选）
             'partnerkey'        =>  'a687728a72a825812d34f307b630097b', // 微信支付，密钥（可选）
             'ssl_cer'           =>  '', // 微信支付，证书cert的路径（可选，操作退款或打款时必需）
             'ssl_key'           =>  '', // 微信支付，证书key的路径（可选，操作退款或打款时必需）
             'cachepath'         =>  '', // 设置SDK缓存目录（可选，默认位置在./src/Cache下，请保证写权限）
         );
         \Wechat\Loader::config($options); // 在项目合适的地方向SDK注入配置参数（字段见上面）
         $pay= new \Wechat\WechatPay();
         $pay_infos=$pay->getPrepayId(null,'小金鱼游泳馆',"123".$order[0]['id'],1,U('Order/PayMessage','',true,true),'NATIVE');
         if($pay_infos===false){
             $this->error($pay->errMsg);
         }else{
             $this->assign('pay_infos',base64_encode($pay_infos));
             $this->assign('res',$order);
             $this->display('Pay');
         }

    }
        public  function  PayMessage(){
                header('Content-Type:text/xml; charset=utf-8');
                $postStr = file_get_contents("php://input");
                $notifyInfo = (array) simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($notifyInfo['result_code'] == 'SUCCESS' && $notifyInfo['return_code'] == 'SUCCESS') {
                    # 记录支付通知信息
                    # 所有操作成功，返回正常状态
                    echo  Tools::arr2xml(['return_code' => 'SUCCESS', 'return_msg' => 'SAVE DATA SUCCESS']);
                }

        }
     public  function TAOBAOPay(){

    }
    public  function BankPay(){

    }
    public  function GetPay(){

    }
    public  function  filish($id){
            M('Order')->where(['id'=>$id])->setField('status',4);
            $this->success("收货成功",U('Ucenter/index'));
    }
    public  function  clearorder(){
        while(true){
        $data=[
            ['create_time'=>['lt',time()-9]],
            ['status'=>1]
        ];
        $ids= M('Order')->where([$data])->getField('id',true);
        if(!$ids){
            //如果没有超时订单继续循环.
            continue;
        }else{
            $goods_detail=M('Order_detail')->where(['order_id'=>['in',$ids]])->select();
            //清除清单回滚库存
            foreach($goods_detail as $key=>$value){
                M('goods')->where(['id'=>$value['goods_id']])->setInc('stock',$value['amount']);
            }
            //设置订单状态为0
            $count=M('Order')->where($data)->setField('status',0);
            echo iconv('utf-8','gbk', "关闭了".$count."个订单");
        }
        sleep(10);
        }
    }
    public  function  phpinfo(){
        phpinfo();
    }
}