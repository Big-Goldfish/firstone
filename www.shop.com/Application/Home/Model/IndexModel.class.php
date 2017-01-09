<?php
namespace Home\Model;


class IndexModel extends  \Think\Model{

    protected  $trueTableName='goods';

     public  function  new_goods(){
       return  D('goods')->join('goods_detail gd on gd.goods_id=goods.id')->order('id desc')->limit(4)->select();
     }
    public  function  goods_lists(){
        return  D('goods')->join('goods_detail gd on gd.goods_id=goods.id')->select();
    }
    public  function  goods_listsbyid($id){
        return  D('goods')->join('goods_detail gd on gd.goods_id=goods.id')->where(['id'=>$id])->select();
    }
}
