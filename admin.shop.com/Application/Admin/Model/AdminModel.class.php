<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 12:05
 */

namespace Admin\Model;


use Think\Model;

class AdminModel extends Model
{
        public  function  addRoleAdmin($id){
            $Roles=I('post.role_id');
            if(empty($Roles)){
                return true;
            }else{
                foreach($Roles as $k){
                    $arr[]=['admin_id'=>$id,'role_id'=>$k];
                }
            }
            return D('AdminRole')->addAll($arr);
        }
        public  function  editPermission(){

        }/**/
    public  function  getMenulist(){
        $userinfo=session('data');

        $id=$userinfo['id'];
        $menus=D('Admin')
            ->distinct(true)->field('p.id,p.path')
            ->join('admin_role ar on ar.admin_id=id')
            ->join('role_permission as rp on ar.role_id=rp.role_id')
            ->join('permission p on p.id=permission_id')
         //   ->fetchsql()
            ->where(['admin.id'=>$id])
            ->select();
      //   dump($menus);die;
        session('permission',$menus);

    }
}