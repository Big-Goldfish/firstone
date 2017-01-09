<?php
return array(
	//'配置项'=>'配置值'

     'TMPL_PARSE_STRING' => [
    '__JS__'=>'/Public/js',
    '__CSS__'=>'/Public/css',
    '__IMG__'=>'/Public/img',
    '__FONTS__'=>'/Public/fonts',
    '__UPLOADIFY__'=>'/Public/ext/uploadify',
    '__LAYER__'=>'/Public/ext/layer',
],
    'DB_TYPE'   => 'mysql', //
    'DB_HOST'   => '127.0.0.1',
    'DB_NAME'   => 'php_emall', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集

    'URL_MODEL'         => 2,
    'UPLOAD_SETTING'    => [
    'URL_PREFIX' => 'http://admin.shop.com/',
    'SETTING'    => array(
        'mimes'        => array('image/jpeg', 'image/png', 'image/gif'), //允许上传的文件MiMe类型
        'maxSize'      => 0, //上传的文件大小限制 (0-不做限制)
        'exts'         => array('jpg', 'png', 'gif', 'jpeg', 'jpe'), //允许上传的文件后缀
        'autoSub'      => true, //自动子目录保存文件
        'subName'      => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath'     => './', //保存根路径
        'savePath'     => 'Uploads/', //保存路径
        'saveName'     => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'      => '', //文件保存后缀，空则使用原后缀
        'replace'      => false, //存在同名是否覆盖
        'hash'         => true, //是否生成hash编码
        'callback'     => false, //检测文件是否存在回调，如果存在返回文件信息数组
        'driver'       => 'Qiniu', // 文件上传驱动
        'driverConfig' => array(
            'secretKey' => 'FG8GyFyDW1M-0OskX-SGBsEzOBwYJDNvMFVdW4MR', //七牛密码
            'accessKey' => 'DN1Yj8B2783xxYPPYVZpNOKZ3uJS7-5BPqfwJ0Rt', //七牛用户
            'domain'    => 'oie0g68sd.bkt.clouddn.com', //七牛服务器
            'bucket'    => 'php-emall', //空间名称
            'timeout'   => 300, //超时时间
        ), // 上传驱动配置
    ),
],

    'SMS_SENDER'=>[
        'AK'=>'23587090',
        'SK'=>'994d8ce4aa7e1ac7a4e1a620447585b5',
        'SIGN'=>'验证码测试',
        'TEMPLATE'=>'SMS_36235364'
    ],
     'MAILER'=>[
    'HOST'=>'smtp.126.com',
    'USERNAME'=>'big_goldfish@126.com',
    'PASSWORD'=>'zjy940519',
    'SECURE'=>'ssl',
    'PORT'=>465
],
    'SESSION_AUTO_START'	=>  true,	// 是否自动开启Session
    'SESSION_TYPE'			=>  'Redis',	//session类型
    'SESSION_PERSISTENT'    =>  1,		//是否长连接(对于php来说0和1都一样)
    'SESSION_CACHE_TIME'	=>  1,		//连接超时时间(秒)
    'SESSION_EXPIRE'		=>  0,		//session有效期(单位:秒) 0表示永久缓存
    'SESSION_PREFIX'		=>  'sess_',		//session前缀
    'SESSION_REDIS_HOST'	=>  '127.0.0.1', //分布式Redis,默认第一个为主服务器
    'SESSION_REDIS_PORT'	=>  '6379',	       //端口,如果相同只填一个,用英文逗号分隔
    'SESSION_REDIS_AUTH'    =>  '',    //Redis auth认证(密钥中不能有逗号),如果相同只填一个,用英文逗号分隔
    'DATA_CACHE_TYPE'       =>'Redis',
    'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(
         'Index:index'    =>     array('Index/{:action}_{id}', 20),
         'Product:index'    =>     array('Product/{:action}_{id}', 20),
        )
);