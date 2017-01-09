<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 19:00
 */

namespace Home\Model;


use Think\Model;

class OrderModel extends  Model
{
        protected  $_auto=[
            ['create_time','time',1,'function'],
            ['status','1',1],
            ['member_id','getUserid()',1,'function'],
        ];
        public  function  create_order(){
            /***
             * 1.添加事务
             *2.收集数据   地址:根据id拼接  支付方式:根据值switch拼接
             * 订单数据:大订单数据和订单详情数据    自动完成 创建时间 memberid  status
             * 判断库存
             * 扣除库存
             * 添加订单
             * 保存详情
             * 删除购物车
             */
            $this->startTrans();
            //准备地址数据
            $Address_detail=D('Address')->getAddress(I('post.Address'));
            $this->data['province_name'] =$Address_detail['province_name'];
            $this->data['city_name']     =$Address_detail['city_name'];
            $this->data['town_name']     =$Address_detail['town_name'];
            $this->data['detail_address']=$Address_detail['detail_address'];
            $this->data['tel']           =$Address_detail['tel'];
            $this->data['name']          =$Address_detail['name'];
            $this->data['member_id']     =getUserid();

            //准备配送数据
            $this->data['delivery_id']     =1;
            $this->data['delivery_name']     ='普通运输';
            $this->data['delivery_price']     =0;
            //准备付款数据
            $payment_id=I('post.delivery_id');
            switch($payment_id){
                case 1: $this->data['payment_name']="微信支付";break;
                case 2: $this->data['payment_name']="支付宝支付";break;
                case 3: $this->data['payment_name']="银联支付";break;
                case 4: $this->data['payment_name']="货到付款";break;

            }
            $this->data['payment_id']     =$payment_id;

            //得到购物车详细数据
            $cart=D('Cart')->cart_list();

            $this->data['price']=$cart['sum_price'];
            if(!$cart['sum_price']){
                return;
            }
            $id=$this->add();
            //得到购物车数据并判断库存是否足够
            $goodlist=$cart['goodslist'];
            $data=['_logic'=>'or'];
            foreach($goodlist as $key=>$value){
                    $data[]=[
                        'id'=>$value['id'],
                        'stock'=>['lt',$value['amount']]
                    ];
            }
           $res=D('goods')->where($data)->getField('id,goods_name');
            if(!empty($res)){
                $this->error=implode('、',$res).'库存不足';
                return false;
            }
            //库存足够减库存
            foreach($goodlist as $value){
                $cond[]=[
                    'order_id'=>$id,
                    'goods_id'=>$value['id'],
                    'goods_name'=>$value['goods_name'],
                    'goods_price'=>$value['shop_price'],
                    'amount'=>$value['amount'],
                    'logo'=>$value['logo'],
                    'sub_total'=>$value['sub_total'],
                ];
               D('goods')->where(['id'=>$value['id']])->setDec('stock',$value['amount']);
            }
            //增加订单详细信息
            D('OrderDetail')->addAll($cond);
            //清除cookie
            D('Cart')->clearCookie();
            //提交事务
            $this->commit();
            return($id);
        }

        //用户个人中心获取信息
        public  function  orderlist(){
//            $re= D('Order')->
//            join('order_detail od on od.order_id=order.id')->
//            where(['member_id'=>getUserid()])->
//           select();
//            $result = M("Order")->join('left join ``')
            $sql = 'SELECT o.id AS id, od.id AS od_id, member_id,`name`,status,logo,sub_total,goods_name,order_id,goods_price,amount
,create_time,price,tel
 FROM `order` AS o LEFT JOIN `order_detail` AS od ON o.id = od.order_id';

            $model = new Model();
            $re = $model->query($sql);

             return  $this->dealdata($re);
        }
        public  function dealdata($a){
           foreach($a as $key=>$value){
               switch($value['status']){
                   case 0:$value['status']="已取消"; break;
                   case 1:$value['status']="待支付";break;
                   case 2:$value['status']="待发货";break;
                   case 3:$value['status']="确认收货";break;
                   case 4:$value['status']="已完成";break;
               }

                $a[$key]=$value;
           }
              return $a;
        }
        public  function  getOrder($id){
            $sql = "SELECT o.id AS id, od.id AS od_id, member_id,`name`,status,logo,sub_total,goods_name,order_id,goods_price,amount
,create_time,price,tel
 FROM `order` AS o LEFT JOIN `order_detail` AS od ON o.id = od.order_id WHERE o.id=$id";

            $model = new Model();
            $re = $model->query($sql);

            return  $this->dealdata($re);
            }
}