<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1
 * Time: 18:29
 */

namespace Home\Controller;


use Think\Controller;

class LoginController extends  Controller
{
    private $_model;
    protected  function  _initialize(){
        $this->_model=D('Member');
    }
        public  function  index(){
            $this->display('login');
        }
    public function  login(){



        //判断用户名和密码
        $row=$this->_model->field('id,username,password,salt')
            ->where(['username'=>I('post.username')],[])
            ->select();
        $userinfo=D('member')->where(['username'=>I('post.username')])->select();

        $password=md5(md5(I('post.password')).$row[0]['salt']);
        // dump(md5(I('post.password')).$row[0]['salt']);die;
        if(!$row){
            $this->error("用户名错误");
        }
        if($password!=$row[0]['password']){
            $this->error("密码错误");
        }
        //获取登陆时间
        $time['last_login_time']=time();
        //获取最后登录ip并插入数据
        $ip=get_client_ip();

        //如果点击记住密码保存cookie
        if(I('post.rememberMe')==1){
            $token = md5(microtime() .'@!#$%^&*('. rand(0, 1000000));
            cookie(md5('admin'),$token,7*24*3600);

            $this->_model->where(['username'=>I('post.username')])
                ->save(['last_login_ip'=>$ip,
                    'last_login_time'=>$time['last_login_time'],
                    'token'=>$token,
                ]);

        }else{

            $this->_model->where(['username'=>I('post.username')])
                ->save(['last_login_ip'=>$ip,'last_login_time'=>$time['last_login_time']]);
        }
        if($url=cookie('his_url')){

            cookie('his_url',null);
        }else{
            $url=U('Index/index');
        }
        $url=explode('.',$url);

        session('MEMBER',$userinfo[0]);
        D('Cart')->cookie2db();
        $this->redirect($url[0]);

    }
    public  function  login_out(){
        session(null);
        $this->redirect('U:Index/index');
    }
}