<?php

namespace Admin\Controller;

use Think\Controller;

class BrandController extends  PlatformController{
    private  $_model;
    protected  function  _initialize(){
            $titles=[
                'title'=>'品牌管理',
                'add'=>'添加品牌',
            ];
            $title=isset($titles[ACTION_NAME])?$titles[ACTION_NAME]:"品牌管理";
            $this->assign('title',$title);
            $this->_model=D('Brand');
    }
    public  function  index(){
        $rows=$this->_model->getPageresult();
        $this->assign('rows',$rows);
        $this->display('lists');
    }

    public function  add(){
          if(IS_POST){
            if(!$this->_model->create()){
                $this->error();

            }
              if($this->_model->add()){
                  $this->success('添加成功',U('index'));
              }else{
                  $this->error();
              }
          }else{
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
            if(!$this->_model->create()){
                $this->error(get_errors($this->_model));
            }
            if($this->_model->save()===false){
                $this->error(get_errors($this->_model));
            }
            $this->success('修改成功',U('index'));
        }else{
            $row=$this->_model->find($id);

            $this->assign('row',$row);
            $this->display('add');
        }
    }
}
