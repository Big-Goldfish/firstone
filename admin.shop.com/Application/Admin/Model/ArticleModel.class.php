<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/19
 * Time: 12:03
 */

namespace Admin\Model;


use Think\Model;

class ArticleModel extends  Model
{
        protected  $_validate=[
            ['name','require','�û�������Ϊ��',1],
        ];
    protected  $_auto=[
        ['inputtime','time',1,'function']
    ];
}