<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18
 * Time: 23:02
 */
namespace Admin\Model;
class BrandModel extends \Think\Model{
    protected  $patchValidate=true;
    protected  $_validate=[
        ['name','require','Ʒ�Ʋ���Ϊ��'],
    ];
    public  function  getPageResult(){
        return $this->where(['status'=>1])->select();
    }
}
