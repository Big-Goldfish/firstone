<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4
 * Time: 12:22
 */

namespace Home\Controller;


use Think\Controller;

class AddressController extends  Controller
{
    private $_model;
    protected  function  _initialize(){
        $this->_model=D('Address');
    }
        public  function  index(){
            $rows=D('Address')->get_location();
            $infos=$this->_model->select();
            $this->assign('rows',$rows);
            $this->assign('infos',$infos);
            $this->display();
        }
        public  function  location($id){
            $rows=D('Address')->get_location($id);
            $this->ajaxReturn($rows);
        }
        public  function  add(){
            $_POST['member_id']=session('MEMBER.id');
            if(!$this->_model->create()){
                $this->error(get_errors($this->_model));
            };
            if($this->_model->add()){
                $this->success("添加成功",U('Address/index'));
            }else{
                $this->error("添加失败");
            }
        }
        public  function  set_bobby($id){

                  $member_id= session('MEMBER.id');
              if($this->_model->is_default($member_id,$id)){
                  $this->success("修改成功",U('Address/index'));
              }else{
                  $this->error("修改失败");
              }

        }
}