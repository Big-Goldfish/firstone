<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4
 * Time: 11:33
 */

namespace Home\Model;


use Think\Model;

class CartModel extends  Model
{
        public  function cart_list(){
            if(session('MEMBER')){
                $data=['member_id'=>session('MEMBER.id')];
                $cart=D('cart')->where($data)->getField('goods_id,amount');
            }elseif( $cart=cookie('cart')){

            }elseif(!$cart=cookie('cart')){
                return;
            }
           if(empty($cart)){
               return;
           }
            $goods_id=array_keys($cart);

            $goodslist=D('goods')->join('goods_detail gd on gd.goods_id=goods.id')->where(['id'=>['in',$goods_id]])->select();

            foreach($goodslist  as  $key=>$value){
                /**
                 * 查询出的是二维数组, 取出$value一维数组,在value新加一个字段amount,字段值为:
                 * 当前value的id值(对应的商品id),该值为cookie中对应id 的商品数量
                 *
                 */
                $value['amount']     =$cart[$value['id']];
                $value['sub_total']  =number_format($value['amount']*$value['shop_price'],2,'.','');
                //为什么要用下面这句话
                $goodslist[$key]     =$value;
                $sum_price           +=$value['sub_total'];
            }

            $sum_price=number_format($sum_price,2,'.','');
            $sum_total=array_sum($cart);
            return $data=[
                'sum_price'=>$sum_price,
                'sum_total'=>$sum_total,
                'goodslist'=>$goodslist,
            ];


        }
        public  function  cookie2db(){
                if(empty($cart=cookie('cart'))){
                    return;
                }else{
                    $goods_ids=array_keys($cart);
                    $cond=[
                        'member_id'=>getUserid(),
                        'goods_id'=>['in',$goods_ids]
                    ];
                    D('Cart')->where($cond)->delete();
                    foreach($cart as $key=>$value){
                        $data[]=['goods_id'=>$key,'amount'=>$value,'member_id'=>getUserid()];
                    }
                    if(D('Cart')->addAll($data)===false){
                        return false;
                    };
                    /**
                     *  记得删除cookie
                     ***/
                    cookie('cart',null);
                    return true;
                }
        }
    public  function  clearCookie(){
        $this->where(['member_id'=>getUserid()])->delete();
    }


}