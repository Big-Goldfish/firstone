<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/2
 * Time: 22:27
 */

namespace Home\Controller;


use Think\Controller;

class UcenterController  extends  Controller
{
    public  function  index(){
        $res=D('Order')->orderlist();
        $this->assign('res',$res);
        $this->display('ucenter');
    }
    public  function  PayOver(){

    }

}