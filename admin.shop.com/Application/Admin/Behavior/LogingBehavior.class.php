<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/25
 * Time: 10:23
 */
namespace Admin\Behavior;
use Think\Behavior;

class LogingBehavior extends  Behavior
{

    protected $allowUrl = [
        'login_index', 'login_verify','login_login','Menu_getUserMenuList','Admin_getMenulist'
    ];
    public function run(&$param){
        $controller = strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME);
        $mudel = strtolower(MODULE_NAME);
        $now_action=$controller . '/' . $action;

        $con_action =$mudel.'/'. $controller . '/' . $action;
      //  dump($con_action);die;
        if(in_array($con_action, C('ALLOWURL.ANY'))){
            return true;
        }
        //判断是否有自动登录
        if($cookie=cookie(md5('admin'))){
            $user=D('Login')->where(['token'=>$cookie])->select();
            if($user){
                session('data',$user);
                return  true;
            }
        }
        //判断是否在登录状态
        if(!session('data')){
            redirect(U('Login/index'), 2, '你没有登陆');
        }

        if(in_array($con_action, C('ALLOWURL.USER'))){
            return;
        }

        //获取到所有的权限列表
        $permissions = session('permission');
        $permissions=array_column($permissions,'path');
//       dump($now_action);
//        dump($permissions);die;
//        if(!in_array($now_action, $permissions)){
//            echo '<script type="text/javascript">alert("无权访问");history.back();</script>';
//            exit;
//        }
    }

}