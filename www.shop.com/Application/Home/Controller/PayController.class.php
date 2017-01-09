<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6
 * Time: 17:23
 */

namespace Home\Controller;


use Think\Controller;


class PayController extends  Controller
{
        public  function  index(){
            vendor('wechat.include');
            $options = array(
                'token'             =>  '', // 填写你设定的key
                'appid'             =>  'wx85adc8c943b8a477', // 填写高级调用功能的app id, 请在微信开发模式后台查询
                'appsecret'         =>  '', // 填写高级调用功能的密钥
                'encodingaeskey'    =>  '', // 填写加密用的EncodingAESKey（可选，接口传输选择加密时必需）
                'mch_id'            =>  '1228531002', // 微信支付，商户ID（可选）
                'partnerkey'        =>  'a687728a72a825812d34f307b630097b', // 微信支付，密钥（可选）
                'ssl_cer'           =>  '', // 微信支付，证书cert的路径（可选，操作退款或打款时必需）
                'ssl_key'           =>  '', // 微信支付，证书key的路径（可选，操作退款或打款时必需）
                'cachepath'         =>  '', // 设置SDK缓存目录（可选，默认位置在./src/Cache下，请保证写权限）
            );
            \Wechat\Loader::config($options); // 在项目合适的地方向SDK注入配置参数（字段见上面）
            $pay= new \Wechat\WechatPay();
            $res=$pay->getPrepayId(null,'小金鱼游泳馆',33,12,U('Order/PayOver','',true,true),'NATIVE');




        }
}