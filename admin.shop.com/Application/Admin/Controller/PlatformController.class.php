<?php


namespace Admin\Controller;


use Think\Controller;

class PlatformController extends Controller
{
    public  function  __construct(){
        parent::__construct();
        $menus=D('Menu')->getUserMenuList();
       // dump($menus);die;
        $this->assign('nav_menus',$menus);
    }

}