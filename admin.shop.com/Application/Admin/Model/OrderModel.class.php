<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 19:00
 */

namespace Admin\Model;


use Think\Model;

class OrderModel extends  Model
{



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
                   case 3:$value['status']="已发货";break;
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