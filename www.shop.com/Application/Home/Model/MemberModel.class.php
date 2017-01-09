<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1
 * Time: 13:44
 */
namespace Home\Model;
use Think\Model;

class MemberModel extends Model

{       protected  $patchValidate=true;
        protected  $_auto=[
            ['create_time','time',1,'function'],
            ['salt','Org\Util\String::randString',1,'function'],

        ];
        protected $_validate=[
            ['username','require','用户名不能为空'],
            ['username','','用户名已存在',2,'unique'],
            ['password','6,10','密码不合法','2','length'],
            ['password','require','密码不能为空'],
            ['repassword','password','两次密码不一致',1,'confirm'],
        //    ['email','email','邮箱不合法'],
            ['email','','邮箱已存在',2,'unique'],
            ['tel','require','电话不能为空'],
            ['tel','','电话已存在',2,'unique'],
        //    ['telcode','confirmcode','手机验证码不正确',1,'callback'],
        ];
        public  function  confirmcode($code){

        }
        public  function  reg(){
            $this->data['password']=salt_mcrypt($this->data['password'],$this->data['salt']);
            $email=$this->data['email'];
            $title="欢迎注册源码茶楼";
            $token=\Org\Util\String::randString(32);
            $url=U('Member/avtive',['email'=>$email,'token'=>$token],true,true);
            $content='<a href="' . $url . '">点击激活</a>';
            $this->data['email_token']=$token;
            $a=sendEmail($email,$title,$content);
            return $this->add();
        }
}