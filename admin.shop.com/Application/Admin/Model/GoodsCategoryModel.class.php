<?php
namespace Admin\Model;


use Think\Model;
class GoodsCategoryModel extends Model{
    public  function addcategory(){
        $orm=new \Admin\Common\layout\MysqlDb;
        $nestedsets=new \Admin\Common\layout\NestedSets($orm,$this->getTableName(),'lft','rght',
            'parent_id','id','level');
        $flag=$nestedsets->insert($this->data['parent_id'],$this->data,'buttom');

    }
    public  function  getlist(){
        return $this->order('lft')->select();
    }
    public  function  saveCategory(){
                $nowparentid=$this->data['parent_id'];
                $sqlid=$this->where(['id'=>$this->data['id']])->getField('parent_id');
        if($nowparentid!=$sqlid){
            $orm=new \Admin\Common\layout\MysqlDb;
            $nestedsets=new \Admin\Common\layout\NestedSets($orm,$this->getTableName(),'lft','rght',
                'parent_id','id','level');
            if(!$nestedsets->moveUnder($this->data['id'],$nowparentid,'bottom')){
                $this->error=("父级分类不合法");
                return false;
            }
        }
        $this->save();

    }
    public  function delNested($id){
        $orm=new \Admin\Common\layout\MysqlDb;
        $nestedsets=new \Admin\Common\layout\NestedSets($orm,$this->getTableName(),'lft','rght',
            'parent_id','id','level');
        $rows=$nestedsets->getDescendants($id);
        $ids=[];

       foreach($rows as $row){
           $ids[]=$row;
       }
        if(empty($ids)){
            return   true;
        }
        $ids=array_column($ids,'id');
        $count=D('goods')->where([
            'goods_category_id'=>['in',$ids]
        ])->count();
        if($count){
            $this->error=('该分类下面有商品,不能被删除');
            return false;
        }
        $this->delete($id);
        return true;

    }

}
