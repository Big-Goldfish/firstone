<?php

namespace Admin\Controller;

use Think\Controller;

class RoleController extends  PlatformController{
    private  $_model;
    protected  function  _initialize(){
        $titles=[
            'title'=>'角色管理',
            'add'=>'添加角色',
        ];
        $title=isset($titles[ACTION_NAME])?$titles[ACTION_NAME]:"角色管理";
        $this->assign('title',$title);
        $this->_model=D('Role');
    }
    public  function  index(){
        $rows=$this->_model->select();
        $this->assign('rows',$rows);
        $this->display('');
    }

    public function  add(){
        if(IS_POST){

            if(!$a=$this->_model->create()){
                $this->error("数据不合法");
            }

            if($id=$this->_model->add()){
                $permission_id=I('post.permission_id');
                foreach($permission_id as $k=>$v){
                    $att[$k]=['role_id'=>$id,'permission_id'=>$v];
                }
                D('role_permission')->addAll($att);

                $this->success('添加成功',U('index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $permissoins=$this->_model->getlist();
            $this->assign('permissions',json_encode($permissoins));
            $this->display();
        }
    }
    public  function  remove($id){
        if($this->_model->where(['id'=>$id])->setField(['status'=>-1])===false){
            $this->error();
        }else{
            $this->success('删除成功',U('index'));
        }
    }
    public  function  edit($id=0){
        if(IS_POST){
          // dump(I('post.'));die;
            if(!$data=$this->_model->create()){
                $this->error(get_errors($this->_model));
            }
            if($this->_model->editsave(I('post.id'))===false){
                $this->error("保存失败");
            }
            $this->success('修改成功',U('index'));
        }else{
            $permissoins=$this->_model->getlist();
            $this->assign('permissions',json_encode($permissoins));

            $row=$this->_model->getRoleinfo($id);
            $permission_ids = M('RolePermission')->where(['role_id'=>$id])->getField('permission_id',true);
            $row['permission_ids'] = json_encode($permission_ids);

            $this->assign('row',$row);
            $this->display('add');
        }
    }

    public  function  del($id){
        $this->_model->delpermission($id);
        $this->success('删除成功',U('index'));
    }

}
