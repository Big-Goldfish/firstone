<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6
 * Time: 18:09
 */

namespace Home\Controller;


use Think\Controller;

class QrController extends  Controller
{
            public  function  index($text){
                vendor('qrcode.phpqrcode');
                \QRcode::png(base64_decode($text));
            }
}