<?php

namespace Admin\Controller;

class GoodsActiveController extends PlatformController{
      private $_model;
    protected  function  _initialize(){
        $this->_model=D('promotion');
    }
        public  function index(){
            $rows=$this->_model->select();
            $this->assign('rows',$rows);
            $this->display();
        }
        public  function  add(){
            if(IS_POST){
                if(($row=$this->_model->create()===false)){
                    $this->error("添加失败");
                }

                $this->_model->add();
                $this->redirect('U:index');
            }else{
                $this->display();
            }
        }
}
