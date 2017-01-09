<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>AdminX</title>

    <!--common-->
    <link href="/Public/css/style.css" rel="stylesheet">
    <link href="/Public/css/style-responsive.css" rel="stylesheet">
    <link href="/Public/css/common.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]> <![endif]-->
    <!--<script src="/Public/js/html5shiv.js"></script>-->
    <!--<script src="/Public/js/respond.min.js"></script>-->
    <script src="/Public/js/jquery-1.10.2.min.js"></script>
    <!--<script src="/Public/js/jquery-2.0.3.js" type="text/javascript"></script>-->
    <!--<script src="/Public/ext/uploadify/jquery.uploadify.min.js"></script>-->
    <!--<script src="/Public/ext/layer/layer.js"></script>-->

</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="/Public/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/Public/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
               <!-- <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>管理首页</span></a></li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>商品管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="lists.html"> 供应商管理</a></li>
                        <li><a href="<?php echo U('Brand/index');?>"> 品牌管理</a></li>
                        <li><a href="<?php echo U('GoodsCategory/index');?>"> 商品分类管理</a></li>
                        <li><a href="<?php echo U('Goods/index');?>"> 商品列表</a></li>
                        <li><a href="<?php echo U('GoodsActive/index');?>"> 商品活动</a></li>

                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="general.html"> 订单列表</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span>管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo U('Admin/index');?>"> 管理员管理</a></li>
                        <li><a href="<?php echo U('Permission/index');?>"> 权限管理</a></li>
                        <li><a href="<?php echo U('Role/index');?>"> 角色管理</a></li>
                        <li><a href="<?php echo U('Menu/index');?>"> 菜单管理</a></li>
                        <li><a href="grids.html"> 会员列表</a></li>


                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-envelope"></i> <span>文章管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo U('Article/article');?>"> 文章分类管理</a></li>
                        <li><a href="<?php echo U('Article/index');?>"> 文章列表</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>系统设置</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="form_layouts.html"> 网站基本设置</a></li>
                        <li><a href="form_advanced_components.html"> 支付管理</a></li>
                        <li><a href="form_wizard.html"> 活动管理</a></li>
                    </ul>
                </li>-->
                <?php if(is_array($nav_menus)): foreach($nav_menus as $key=>$top_nav): if(($top_nav["level"]) == "1"): ?><li class="menu-list"><a href=""> <span><?php echo ($top_nav["name"]); ?></span></a>
                            <ul class="sub-menu-list">
                                <?php if(is_array($nav_menus)): foreach($nav_menus as $key=>$sub_nav): if(($sub_nav["parent_id"]) == $top_nav["id"]): ?><li><a href="<?php echo U($sub_nav['path']);?>"> <?php echo ($sub_nav["name"]); ?></a></li><?php endif; endforeach; endif; ?>
                            </ul>
                        </li><?php endif; endforeach; endif; ?>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
            <form class="searchform" action="index.html" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="搜索" />
            </form>
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="/Public/images/photos/user-avatar.png" alt="" />
                            <?php echo session('data')['username'];?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>  个人资料</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>  修改密码</a></li>
                            <li><a href="<?php echo U('Login/login_out');?>"><i class="fa fa-sign-out"></i> 退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                管理首页
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">管理后台</a>
                </li>
                <li class="active"> 管理首页 </li>
            </ul>
        </div>
        <!-- page heading end-->
            

    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <form role="form" action="<?php echo U('');?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName">角色名</label>
                                <input type="text" name="name" class="form-control" placeholder="请输入角色名称" value='<?php echo ($row["name"]); ?>'/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">角色排名</label>
                                <input type="text" name="sort" class="form-control"   placeholder="请输入角色排名" value='<?php echo ($row["sort"]); ?>'/>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputIntro">角色描述</label>
                                <textarea class="form-control " name="intro" placeholder="请输入角色简介"><?php echo ($row["intro"]); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputIntro">关联权限</label>
                                <div id="permission-ids">
                                </div>
                                <ul id="treeDemo" class="ztree"></ul>
                            </div>


                            <?php if(isset($row)): ?><input type="hidden" name="id" value="<?php echo ($row["id"]); ?>">
                                <button type="submit" class="btn btn-primary">保存</button>
                                <?php else: ?>
                                <button type="submit" class="btn btn-primary">创建 </button><?php endif; ?>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </section>

            
    <link rel="stylesheet" href="/Public/ext/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <style type="text/css" rel="stylesheet">
        ul.ztree{
            margin-top: 10px;
            border: 1px solid #617775;
            background: #f0f6e4;
            width: 220px;
            overflow-y: scroll;
            overflow-x: auto;
        }
    </style>
    <script src="/Public/ext/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/ext/ztree/js/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="/Public/ext/ztree/js/jquery.ztree.excheck.js"></script>
    <script type="text/javascript">
        var setting = {
            check: {
                enable: true
            },
            data: {
                simpleData: {
                    enable: true,
                    pIdKey: "parent_id",
                }
            },
            callback: {
                    onCheck:function(){
                        var nodes=ztreeObj.getCheckedNodes(true);
                        var permission_node=$('#permission-ids');
                        $('#permission-ids').empty();
                        $(nodes).each(function(i,v){
                            console.log(1);
                            var id= v.id;
                            var html='<input type="hidden" name="permission_id[]" value="'+id+'"/>';
                            $(html).appendTo(permission_node);

                        })
                    }
            }
        };
       /* var zNodes = <?php echo ($permissions); ?>
        var ztreeObj = $.fn.zTree.init($("#treeDomo"),setting,zNodes);*/
        var zNodes = <?php echo ($permissions); ?>;
        var ztreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        ztreeObj.expandAll(true);
        <?php if(isset($row)): ?>//获取所有被关联的权限
        var permission_ids = <?php echo ($row["permission_ids"]); ?>;

        //找到每一个节点对象,然后再选中
        $(permission_ids).each(function (i, v) {
            var node = ztreeObj.getNodeByParam('id', v);
            console.log(v);
            ztreeObj.checkNode(node,true,false,true);
        });<?php endif; ?>

    </script>




        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>


<script src="/Public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/jquery.nicescroll.js"></script>


<!--common scripts for all pages-->
<script src="/Public/js/scripts.js"></script>
<script type="text/javascript">
  /*  $(document).ready(function() {
        $(window).scroll(function() {
            //$(document).scrollTop() 获取垂直滚动的距离
            //$(document).scrollLeft() 这是获取水平滚动条的距离
            if ($(document).scrollTop() <= 0) {
                alert("滚动条已经到达顶部为0");
            }

            if ($(document).scrollTop() >= $(document).height() - $(window).height()) {
                alert("滚动条已经到达底部为" + $(document).scrollTop());
            }
        });
    });*/


</script>

</body>
</html>