<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/1
 * Time: 18:50
 */

namespace Home\Model;


use Think\Model;

class LoginModel extends  Model
{
    protected $trueTableName='member';
    protected $_auto=array(
        ['last_login_time','time',3,'function'],

    );
}