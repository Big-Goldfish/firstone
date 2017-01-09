<?php
return array(
	//'配置项'=>'配置值'

    'TMPL_PARSE_STRING' => [
        '__JS__'=>'/Public/js',
        '__CSS__'=>'/Public/css',
        '__IMG__'=>'/Public/images',
        '__FONTS__'=>'/Public/fonts',
        '__UPLOADIFY__'=>'/Public/ext/uploadify',
        '__LAYER__' => '/Public/ext/layer',
        '__UEDITOR__' => '/Public/ueditor',
        '__ZTREE__' => '/Public/ext/ztree',
    ],
    'URL_MODEL'         => 2,
    'DB_TYPE'   => 'mysql', //
    'DB_HOST'   => '127.0.0.1',
   'DB_NAME'   => 'php_emall', // 数据库名
   'DB_USER'   => 'root', // 用户名
   'DB_PWD'    => 'root', // 密码
   'DB_PORT'   => 3306, // 端口
   'DB_PREFIX' => '', // 数据库表前缀
   'DB_CHARSET'=> 'utf8', // 字符集
    'PAGE_SIZE'=>4,
    'COOKIE_EXPIRE'=>7*24*3360,
    'COOKIE_PREFIX'=>'A',
    'ALLOWURL' =>[
        'ANY'=>['admin/login/login',
                'admin/login/verify',
                'admin/login/index',
        ],
        'USER'=>[
            'admin/index/index',
            'admin/login/login_out',
            'admin/Menu/getUserMenuList',
        ],
    ]
);