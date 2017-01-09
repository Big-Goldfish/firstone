<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 17:33
 */

namespace Admin\Model;

use Admin\Common\layout\MysqlDb;
use Admin\Common\layout\NestedSets;
use Think\Model;

class MenuModel extends  Model
{
        public  function  get_list(){
            return $this->order('lft')->select();
        }
    public  function  delpermission($id){
        D('menu_permission')->where(['menu_id'=>$id])->delete();
        if($this->where(['id'=>$id])->delete()){
            return true;
        }
    }
    public  function  editsave($data){
        $now_parent_id=$data['parent_id'];
        $befor_parent_id=$this->where(['id'=>$data['id']])->getField('parent_id');

        if($now_parent_id!=$befor_parent_id){
            $mysqldb=new MysqlDb();
            $nestedsets=new NestedSets($mysqldb,$this->getTableName()
                ,'lft','rght','parent_id','id','level');
            if(($nestedsets->moveUnder($data['id'],$now_parent_id,'buttom'))===false){
                $this->error=('父级分类不合法');
                return false;
            };
        }


        $this->save();
        D('menu_permission')->where(['menu_id'=>$data['id']])->delete();
        $permission_id=I('post.permission_id');

        if(empty($permission_id)){
            return;
        }
        foreach($permission_id as $k=>$v){
            $att[$k]=['menu_id'=>$data['id'],'permission_id'=>$v];
        }

        return D('menu_permission')->addAll($att);
    }
    public  function  add_menu(){
        $mysqldb=new MysqlDb();
        $nestedsets=new NestedSets($mysqldb,$this->getTableName()
            ,'lft','rght','parent_id','id','level');
        return $nestedsets->insert($this->data['parent_id'],$this->data,'buttom');
    }
    public  function  getUserMenuList(){
        $path=session('permission');

        $name=session('data');
      //  dump($name);die;
        if($name['username']=='admin'){
          //  echo "gl";die;
                $meuns=$this->select();

        }else{
           // echo 'putong';die;
                foreach($path as $k){
                    $att[]=$k['id'];
                };
            if(empty($att)){
                return [];
            }else{
                $meuns = $this->distinct(true)
                    ->field('id,parent_id,name,path,level')
                    ->join('menu_permission mp on mp.menu_id=menu.id')
                    ->where(['permission_id'=>['in',$att]])
                    ->order('lft')
                 /*   ->fetchsql()*/
                    ->select();
               /* dump($att);
                dump($meuns);die;*/
            }

        }

        return $meuns;

    }

}