<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1
 * Time: 14:46
 */

namespace Home\Controller;


use Think\Controller;
use Think\Verify;

class CaptchaController extends Controller
{
        public  function  captcha(){
            $option=[
                'length'=>2,
            ];
            $verify= new Verify($option);
            $verify->entry();
        }
}