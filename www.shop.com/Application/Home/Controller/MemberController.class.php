<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1
 * Time: 13:23
 */

namespace Home\Controller;


use Think\Controller;
use Think\Verify;

class MemberController extends  Controller
{
    private  $_model;
    protected  function  _initialize(){
        $this->_model=D('Member');
    }

        public  function  index(){
            $this->display('reg');
        }
        public  function  reg(){
            if(!$this->_model->create()){
            
                $this->error(get_errors($this->_model));
            }else{
                $this->_model->reg();
            }
            $this->redirect('U:Index/index','注册成功');


        }
   /* public  function  message($tel,$code){
         $verify=new Verify();
         if(!$verify->check($code)){
          $data=[
              'msg'=>'验证码错误',
              'status'=>0
          ];
         }else{
             $data=[
                 'msg'=>'源码茶楼',
                 'code'=>\Org\Util\String::randNumber(1000,9990),
             ];
             session('TELCODE',$data['code']);
             $data=$this->sendSms($tel,$data);
         };

       $this->ajaxReturn($data);

    }*/
    public function sms() {
        //验证验证码值
       // dump($tel);die;
        $verifyObj = new \Think\Verify();
        if ($verifyObj->check($verify)) {
            $data = [
                'status' => 0,
                'msg'    => '验证码错误',
            ];
          //  echo "11";die;
        } else {
            $data  = [
                'product' => '源码茶堂',
                'code'    => \Org\Util\String::randNumber(1000, 9999),
            ];
         //   echo "12";die;
            session('TELCODE', $data['code']);
            /*$data = */sendSms();
        }

        $this->ajaxReturn($data);
    }
    public  function sendSms($tel,$data){
        vendor('alidayu.TopSdk');
        $c            = new \TopClient;
        $c ->appkey = '23587090' ;
        $c ->secretKey = '994d8ce4aa7e1ac7a4e1a620447585b5' ;
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req ->setExtend( "" );
        $req ->setSmsType( "normal" );
        $req ->setSmsFreeSignName( "验证码测试" );
        $json         = json_encode($data);
        $req ->setSmsParam($json );
        $req ->setRecNum($tel);
        $req ->setSmsTemplateCode( "SMS_36235364" );
        $resp = $c ->execute( $req );
        if (isset($resp->result) && isset($resp->result->success)) {
            $data = [
                'status' => 1,
                'msg'    => '发送成功',
            ];
        } else {
            $data = [
                'status' => 0,
                'msg'    => $resp->error_response->sub_msg,
            ];
        }
        return $data;
    }
    //激活邮箱
    public  function  avtive($email,$token){
            $data=[
                'email'=>$email,
                'token'=>$token,
                'ststus'=>0
            ];
        if($this->_model->where($data)->setField(['status'=>1])){
            $this->success('激活成功',U('Index/index'));
        }else{
            $this->error('激活失败',U('Index/index'));
        };
    }
}