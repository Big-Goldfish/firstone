<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 16:58
 */

namespace Admin\Model;


use Think\Model;

class RoleModel extends Model
{
        public  function  getlist(){
    return  D('permission')->order('lft')->select();
}
    public  function  getRolelist(){
        return  D('Role')->order('sort')->select();
    }

    public  function getRoleinfo($id){
        $row=$this->find($id);
        $permission_ids= D('permission')->where(['role_id'=>$id])->select();
        $row['permission_ids']=json_encode($permission_ids);
        return $row ;
    }
    public  function  editsave($id){
        $this->save();

         D('role_permission')->where(['role_id'=>$id])->delete();
        $permission_id=I('post.permission_id');

        if(empty($permission_id)){
            return;
        }
        foreach($permission_id as $k=>$v){
            $att[$k]=['role_id'=>$id,'permission_id'=>$v];
        }
        return D('role_permission')->addAll($att);
    }
    public  function  delpermission($id){
        D('role_permission')->where(['role_id'=>$id])->delete();
        $this->where(['id'=>$id])->delete();
    }
}