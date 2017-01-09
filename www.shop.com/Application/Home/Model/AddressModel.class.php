<?php

namespace Home\Model;

use Think\Model;

class AddressModel extends  Model{
    public  function get_location($id=0){
        return D('locations')->where(['parent_id'=>$id])->select();
    }
    public  function  is_default($member_id,$id){
        if(
            D('Address')->where(['member'=>$member_id])->setField(['is_default'=>0]) and
        D('Address')->where(['id'=>$id])->setField(['is_default'=>1])){
            return true;
        }else{
            return false;
        };
    }
    public  function  getAddress($id){
             $row=$this->where(['id'=>$id])->select();
              return  $row[0];
    }
}