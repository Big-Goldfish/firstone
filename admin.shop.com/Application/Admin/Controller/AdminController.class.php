<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/24
 * Time: 13:51
 */

namespace Admin\Controller;


use Think\Controller;

class AdminController extends  PlatformController
{
    private  $_model;
    protected  function  _initialize(){
        $this->_model=D('Admin');
    }
    public  function  index(){
        $rows=D('Login')->select();
        $this->assign('rows',$rows);
        $this->display();
    }
    public  function  up_password($id=0){
        if(IS_POST){
                dump($_POST);
            die;
        }else{
            $rows=D('Login')->find($id);
            $this->assign('rows',$rows);
            $this->display('up_password');
        }

    }
    public  function  add(){
        if(IS_POST){
           if(I('post.password')!=I('post.repassword')){
               $this->error("两次输入密码不一致");
           }
               //生产随机字符串
             $_POST['salt']=$this->getRandChar(6);
                //给密码加密
             $password=md5(md5(I('post.password')).$_POST['salt']);
             $_POST['password']=$password;
                //验证保存
            D('Login')->create();
            $id=D('Login')->add();
            if(D('Admin')->addRoleAdmin($id)){
                $this->success('添加成功',U('index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $permissoins=D('role')->getRolelist();
            $this->assign('permissions',json_encode($permissoins));
            $this->display();
        }
    }
    private function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;
        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }
    public  function  affirm(){
        if(IS_AJAX){
            $id=I('post.id');
            $row=D('admin')->field('username,password,salt')
                ->where(['id'=>$id])
                ->select();
            $password=md5(md5(I('post.$data')).$row[0]['salt']);
            if($password!=$row[0]['password']){
               $result=0;
            }else{
                $result=1;
            }
            $this->ajaxReturn($result);
        }
    }
    public  function  del($id){
        if(D('AdminRole')->where(['admin_id'=>$id])->delete() or D('Admin')->delete($id)){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        }
    }
    public  function  edit($id=0){
        if(IS_POST){
            if($row=$this->_model->create()){
                $this->_model->save($row);
            }else{
                $this->error(get_error($this->_model));
            };
            $id=I('post.id');
            D('AdminRole')->where(['admin_id'=>$id])->delete();
            $this->_model->addRoleAdmin($id);

            $this->success("编辑成功",U('index'));
        }else{
            $lists=D('Admin')->find($id);
            $permission_ids = M('AdminRole')->where(['admin_id'=>$id])->getField('role_id',true);
            $lists['permission_ids'] = json_encode($permission_ids);
            $this->assign('lists',$lists);

            $permissoins=D('role')->getRolelist();
            $this->assign('permissions',json_encode($permissoins));

            $this->display('add');
        }
    }
}