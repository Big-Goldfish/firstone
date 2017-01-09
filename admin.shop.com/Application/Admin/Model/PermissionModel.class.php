<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 11:43
 */

namespace Admin\Model;


use Admin\Common\layout\MysqlDb;
use Admin\Common\layout\NestedSets;
use Think\Model;

class PermissionModel extends  Model
{
        public  function  get_list(){
            return $this->order('lft')->select();
        }
        public  function  Addpermission(){
            $mysqldb=new MysqlDb();
            $nestedsets=new NestedSets($mysqldb,$this->getTableName()
            ,'lft','rght','parent_id','id','level');
            $flag=$nestedsets->insert($this->data['parent_id'],$this->data,'buttom');
        }
        public  function  editPermission($data){

            $now_parent_id=$data['parent_id'];
            $befor_parent_id=$this->where(['id'=>$data['id']])->getField('parent_id');

            if($now_parent_id!=$befor_parent_id){
                $mysqldb=new MysqlDb();
                $nestedsets=new NestedSets($mysqldb,$this->getTableName()
                    ,'lft','rght','parent_id','id','level');
                if(!($nestedsets->moveUnder($data['id'],$now_parent_id,'buttom'))===false){
                    $this->error=('父级分类不合法');
                    return false;
                };
            }
           $this->save($data);
        }
        public  function  del($id){
            $mysqldb=new MysqlDb();
            $nestedsets=new NestedSets($mysqldb,$this->getTableName()
                ,'lft','rght','parent_id','id','level');
            $ids=$nestedsets->getDescendants($id);
            foreach($ids as $k){
                $arr[]=$k['id'];
                D('RolePermission')->where(['permission_id'=>['in',$arr]])->delete();
                D('MenuPermission')->where(['permission_id'=>['in',$arr]])->delete();
            }
            foreach($arr as $k){
                D('Permission')->delete($k);

            }
            return true;
        }
}