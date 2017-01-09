<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/2
 * Time: 13:10
 */

namespace Home\Controller;


use Think\Controller;

class ProductController extends  Controller
{
        public  function  index($id){
            //商品分类数据
            $brands         =D('goods_category')->where(['status'=>1])->select();

            $this->assign('brands',$brands);
            //商品信息数据
            $goods_info     =D('Index')->goods_listsbyid($id);
            foreach($goods_info[0] as $key=>$value){
                $goods[$key]=$value;
            }
            $this->assign('goods',$goods);

            //商品相册数据
            $goods_gallery  =D('goods_gallery')->where(['goods_id'=>$id])->select();
            $this->assign('goods_gallery',$goods_gallery);

            $session=session('MEMBER');
            $this->assign('session',$session);

            $this->display('product');
        }
}