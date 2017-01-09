<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18
 * Time: 23:31
 */

namespace Admin\Controller;

use Think\Controller;
use Think\Think;

class UploadController extends  Controller{
    public  function  upload(){
        $option=C('UPLOAD_SETTING.SETTING');
        $upload=new \Think\Upload($option);
        $fileinfo=$upload->upload();

        $fileinfo=array_pop($fileinfo);
       // dump($fileinfo);die;
        if($fileinfo){
            if(strnatcasecmp($upload->driver,'qiniu')==0){
                $url=$fileinfo['url'];
            }else{
                $url=C('UPLOAD_SETTING.URL_PREFIX').$fileinfo['savepath'].$fileinfo['savename'];

            }
            $data=[
                'status'=>1,
                'msg'=>'上传成功',
                'url'=>$url,
            ];
        }else{
            $data=[
                'status'=>0,
                'msg'=>$upload->getError(),
                'url'=>'',
            ];
        }
        $this->ajaxReturn($data);
    }
}
