<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/24
 * Time: 12:19
 */

namespace Admin\Model;


use Think\Model;

class LoginModel extends  Model
{
    protected $trueTableName='admin';
    protected $_auto=array(
        ['last_login_time','time',3,'function'],
        ['add_time','time',1,'function']
    );
}