<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3
 * Time: 12:01
 */

namespace Home\Controller;


use Think\Controller;

class CartController extends  Controller
{
        public  function  index(){

            $this->display('settlement');
        }


        public  function  ucart($id,$amount){
            if(session('MEMBER')){
                //如果登陆了,先判断该用户购物车是否有这个商品,有则累加,没有则新增传过来的数据
                $cartmodel=D('cart');
                $count=$cartmodel->where(['goods_id'=>$id],['member_id'=>session('MEMBER.id')])->count();
                echo 1;
                if($count){
                    echo 2;
                    $cartmodel->where(['goods_id'=>$id],['member_id'=>session('MEMBER.id')])->setInc('amount',$amount);
                }else{
                    echo 3;
                    $data=[
                        'goods_id'=>$id,
                        'member_id'=>session('MEMBER.id'),
                        'amount'=>$amount
                    ];
                    $cartmodel->add($data);
                }
            }else{
                echo 4;
                $cart=cookie('cart');
                if($cart[$id]){
                    $cart[$id]+=$amount;
                }else{
                    $cart[$id]=$amount;
                }
                cookie('cart',$cart,7*24*60*60);
            }
            $this->success('添加成功',U('cartList'));
        }
    public  function  cartList()
    {

        $data=D('Cart')->cart_list();
        $this->assign('goodslist',$data['goodslist']);
        $this->assign('sum_price',$data['sum_price']);
        $this->assign('sum_total',$data['sum_total']);
        $this->display('ucart');

    }
}