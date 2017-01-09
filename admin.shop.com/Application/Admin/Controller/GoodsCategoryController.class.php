<?php
namespace Admin\Controller;


use Think\Controller;

class GoodsCategoryController extends PlatformController{
    private $_model;

    /**
     * 初始化操作
     * 1.给所有的视图传递标题变量.
     * 2.创建一个所有方法都会使用到的模型对象.
     */
    protected function _initialize() {
        $titles       = [
            'index' => '商品分类管理',
            'add'   => '添加分类',
            'edit'  => '编辑分类',
        ];
        $title        = isset($titles[ACTION_NAME]) ? $titles[ACTION_NAME] : '商品分类管理';
        $this->assign('title', $title);
        $this->_model = D('goods_category');
    }

        public  function  index(){
              $rows=D('GoodsCategory')->getlist();
              $this->assign('rows',$rows);
              $this->display();
        }
        public function   add (){
                        if(IS_POST){

                            if ($this->_model->create() === false) {
                                $this->error(get_errors($this->_model));
                            }
                            //执行添加
                            if ($this->_model->addcategory() === false) {
                                $this->error(get_errors($this->_model));
                            }
                            $this->success("添加成功",U('index'));
                }else{

                   $this->_getAll();
                    $this->display();
                }
        }
        public  function  edit($id=0){
            if(IS_POST){
                 if(($this->_model->create()===false)){
                     $this->error(get_errors($this->_model));
                 }
                if(($this->_model->saveCategory()===false)){
                    $this->error(get_errors($this->_model));
                }
                $this->success("添加成功",U('index'));
            }else{
                  $this->_getAll();

                $this->assign('rows',$this->_model->find($id));
                $this->display('add');
            }
        }
    public  function  del($id){
        if(($this->_model->delNested($id))===false){

            $this->error(get_errors($this->_model));
        }
        $this->success('删除成功',U('index'));
    }
    private function  _getAll(){
        $row=$this->_model->getlist();
        array_unshift($row,['id'=>0,'name'=>'顶级分类','parent_id'=>0,'level'=>0]);
        $this->assign('row',$row);

    }


}
