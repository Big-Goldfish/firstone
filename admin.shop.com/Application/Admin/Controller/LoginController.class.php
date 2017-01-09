<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

class LoginController extends  PlatformController{
    private $_model;
    protected function _initialize() {
        $this->_model = D('Login');
    }
    public  function  index(){

        $this->display();
    }
    public  function login_out(){
        //清楚session和cookie
        session('data',null);
        cookie(md5('admin'),null);
        $this->redirect('U:Login/index');
    }
    public function  login(){
        //判断验证码是否正确
      /*  $verify=new Verify();
        if(!$verify->check(I('post.verify'))){
            $this->error("验证码错误");
        };*/

        //判断用户名和密码
        $row=$this->_model->field('id,username,password,salt')
            ->where(['username'=>I('post.username')],[])
            ->select();
        $userinfo=D('admin')->getbyusername(I('post.username'));

        $password=md5(md5(I('post.password')).$row[0]['salt']);
       // dump(md5(I('post.password')).$row[0]['salt']);die;
          if(!$row){
              $this->error("用户名或者密码错误");
          }
        if($password!=$row[0]['password']){
            $this->error("用户名或者密码错误");
        }
        //获取登陆时间
        $time=$this->_model->create();

        //获取最后登录ip并插入数据
        $ip=preg_replace('/\./','',get_client_ip());

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
      //  dump($userinfo);die;
        //账号密码验证成功创建session
        session('data',$userinfo);
        D('Admin')->getMenulist();

        $this->redirect('U:Index/index');

    }


    //生产验证码的类.
    public  function  verify(){
        $config=[
            'length'=>1,
            'codeSet'=>'1'
        ];
        $verify=new Verify($config);
        $verify->entry();
    }



}
