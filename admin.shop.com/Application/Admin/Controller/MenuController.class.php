<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 17:33
 */

namespace Admin\Controller;


use Think\Controller;

class MenuController extends  PlatformController
{
    private $_model;
    protected function  _initialize(){
        $this->_model=D('menu');
    }
    public  function  index(){
        //进入菜单列表页面
        $rows=$this->_model->get_list();
        $this->assign('rows',$rows);
        $this->display();
    }
    public function  add(){
        if(IS_POST){

            if(!$a=$this->_model->create()){
                $this->error("数据不合法");
            }

            if($id=$this->_model->add_menu()){
                //根据选择的菜单,遍历出子权限并关联添加
                $permission_id=I('post.permission_id');
                foreach($permission_id as $k=>$v){
                    $att[$k]=['menu_id'=>$id,'permission_id'=>$v];
                }
                D('menu_permission')->addAll($att);

                $this->success('添加成功',U('index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            //走到添加页面,分配选择菜单数据
            $rows=$this->_model->get_list();
            array_unshift($rows,['id'=>0,'name'=>'顶级菜单','parent_id'=>0,'level'=>0]);
            $this->assign('rows',$rows);
            $permissoins=D('permission')->get_list();
            $this->assign('permissions',json_encode($permissoins));
            $this->display();
        }
    }
    public  function  edit($id){
        if(IS_POST){
            //编辑页面过滤字段
            if(!$data=$this->_model->create()){
                $this->error(get_errors($this->_model));
            }

            if($this->_model->editsave(I('post.'))===false){
                $this->error("保存失败");
            }
            $this->success('修改成功',U('index'));
        }else{
            $lists=$this->_model->find($id);
            $permission_ids = M('MenuPermission')->where(['menu_id'=>$id])->getField('permission_id',true);
            $lists['permission_ids'] = json_encode($permission_ids);
            $this->assign('lists',$lists);

            $rows=$this->_model->get_list();

            array_unshift($rows,['id'=>0,'name'=>'顶级菜单','parent_id'=>0,'level'=>0]);
            $this->assign('rows',$rows);

            $permissoins=D('permission')->get_list();
            $this->assign('permissions',json_encode($permissoins));

            $this->display('add');
        }
    }
    public  function  del($id){

        if($this->_model->delpermission($id)){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        };

    }
}