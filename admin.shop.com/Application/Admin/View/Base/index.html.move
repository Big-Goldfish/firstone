<!DOCTYPE html>
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
    <link href="__CSS__/style.css" rel="stylesheet">
    <link href="__CSS__/style-responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]> <![endif]-->
    <!--<script src="__JS__/html5shiv.js"></script>-->
    <!--<script src="__JS__/respond.min.js"></script>-->
    <!--<script src="__JS__/jquery-1.10.2.min.js"></script>-->
    <!--<script src="__JS__/jquery-2.0.3.js" type="text/javascript"></script>-->
    <!--<script src="__UPLOADIFY__/jquery.uploadify.min.js"></script>-->
    <!--<script src="__LAYER__/layer.js"></script>-->

</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="__IMG__/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="__IMG__/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
               <!-- <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>管理首页</span></a></li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>商品管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="lists.html"> 供应商管理</a></li>
                        <li><a href="{:U('Brand/index')}"> 品牌管理</a></li>
                        <li><a href="{:U('GoodsCategory/index')}"> 商品分类管理</a></li>
                        <li><a href="{:U('Goods/index')}"> 商品列表</a></li>
                        <li><a href="{:U('GoodsActive/index')}"> 商品活动</a></li>

                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="general.html"> 订单列表</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span>管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{:U('Admin/index')}"> 管理员管理</a></li>
                        <li><a href="{:U('Permission/index')}"> 权限管理</a></li>
                        <li><a href="{:U('Role/index')}"> 角色管理</a></li>
                        <li><a href="{:U('Menu/index')}"> 菜单管理</a></li>
                        <li><a href="grids.html"> 会员列表</a></li>


                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-envelope"></i> <span>文章管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{:U('Article/article')}"> 文章分类管理</a></li>
                        <li><a href="{:U('Article/index')}"> 文章列表</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>系统设置</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="form_layouts.html"> 网站基本设置</a></li>
                        <li><a href="form_advanced_components.html"> 支付管理</a></li>
                        <li><a href="form_wizard.html"> 活动管理</a></li>
                    </ul>
                </li>-->
                <foreach name='nav_menus' item='top_nav'>
                    <eq name='top_nav.level' value='1'>
                        <li class="menu-list"><a href=""> <span>{$top_nav.name}</span></a>
                            <ul class="sub-menu-list">
                                <foreach name='nav_menus' item='sub_nav'>
                                    <eq name='sub_nav.parent_id' value='$top_nav["id"]'>
                                        <li><a href="{:U($sub_nav['path'])}"> {$sub_nav.name}</a></li>
                                    </eq>
                                </foreach>
                            </ul>
                        </li>
                    </eq>
                </foreach>

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
                            <img src="__IMG__/photos/user-avatar.png" alt="" />
                            {:session('data')['username']}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>  个人资料</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>  修改密码</a></li>
                            <li><a href="{:U('Login/login_out')}"><i class="fa fa-sign-out"></i> 退出</a></li>
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
        <script src="__JS__/jquery-1.10.2.min.js"></script>
        <!-- page heading end-->
            <block name="content"></block>
            <block name="extra"></block>


        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
c
<script src="__JS__/jquery-ui-1.9.2.custom.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/jquery.nicescroll.js"></script>


</body>
</html>
