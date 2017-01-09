<?php

namespace Admin\Controller;

use Think\Controller;

class OrderController extends  PlatformController{
    private  $_model;
    protected  function  _initialize(){
        $titles=[
            'title'=>'品牌管理',
            'add'=>'添加品牌',
        ];
        $title=isset($titles[ACTION_NAME])?$titles[ACTION_NAME]:"品牌管理";
        $this->assign('title',$title);
        $this->_model=D('Order');
    }
    public  function  index(){
        $rows=D('Order')->orderlist();
        $this->assign('rows',$rows);
        $this->display('lists');
    }


    public  function  remove($id){
        if($this->_model->where(['id'=>$id])->setField(['status'=>-1])===false){
            $this->error();
        }else{
            $this->success('删除成功',U('index'));
        }
    }
    public  function  edit($id=0){

           D('Order')->where(['id'=>$id])->setField('status',3);
            $this->success('修改成功',U('index'));

    }
}
