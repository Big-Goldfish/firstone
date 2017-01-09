<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 11:33
 */

namespace Admin\Controller;


use Think\Controller;

class PermissionController extends PlatformController
{
    private $_model;
    protected function  _initialize(){
        $this->_model=D('Permission');
    }
    public  function  index(){
        $rows=D('Permission')->get_list();

        $this->assign('rows',$rows);
        $this->display();
    }
    public function add(){
        if(IS_POST){

            if ($this->_model->create() === false) {
                $this->error(get_errors($this->_model));
            }
            //执行添加
            if ($this->_model->Addpermission() === false) {
                $this->error(get_errors($this->_model));
            }
            $this->success("添加成功",U('index'));
        }else{
            $rows=$this->_model->field('level,id,name')->select();
            array_unshift($rows, ['id' => 0, 'name' => '顶级权限', 'level' => 0]);
            $this->assign('rows',$rows);
            $this->display();
        }
    }
    public  function  edit($id){
            if(IS_POST){
                $this->_model->editPermission(I('post.'));
                $this->success("编辑成功",U('index'));
            }else{
                $lists=$this->_model->find($id);
                $this->assign('lists',$lists);
                $rows=D('Permission')->get_list();
                array_unshift($rows, ['id' => 0, 'name' => '顶级权限', 'level' => 0]);
                $this->assign('rows',$rows);
                $this->display('add');
            }
    }
    public  function  del($id){
        if($this->_model->del($id)){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        };

    }
}