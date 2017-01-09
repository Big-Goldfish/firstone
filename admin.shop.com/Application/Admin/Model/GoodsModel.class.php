<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 13:08
 */

namespace Admin\Model;


use Common\Helper\Page;
use Think\Model;

class GoodsModel extends  Model
{

    protected  $_auto=[
        ['inputtime','time',1,'function'],
        ['goods_status','array_sum',1,'function']
    ];
    //每一天添加商品的记录
    public  function addcount(){
        $day=date('Ymd',time());

        $count=D('goods_day_count')->field('count')->where(['day'=>$day])->select();

        if(!$count){

            D('goods_day_count')->add(array('day'=>$day,'count'=>1));
        }else{

            D('goods_day_count')->where(['day'=>$day])->setInc('count',1);
            $count=D('goods_day_count')->where(['day'=>$day])->field('count')->select();
        }
       return $count[0]['count'];
    }

    //批量添加商品相册
    public  function  addgallery($data){
        foreach($data as $v){
            $att['goods_id']=$v['goods_id'];
            $att['path']=$v['path'];
            D('goods_gallery')->add($att);
        }
    }
    public function addPics($data){
        $goods_gallery = M('GoodsGallery');
        foreach($data['path'] as $img){
            $info = [
                'goods_id'=>$data['goods_id'],
                'path'=>$img,
            ];
            if($goods_gallery->add($info) === false){
                $this->error = "图片保存失败";
                return false;
            }
        }
        return true;
    }


}