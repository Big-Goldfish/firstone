<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' => [
        '__JS__'=>'/Public/js',
        '__CSS__'=>'/Public/css',
        '__IMG__'=>'/Public/images',
        '__FONTS__'=>'/Public/fonts',
        '__UPLOADIFY__'=>'/Public/ext/uploadify',
    ],

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
);