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
            
    <div class="wrapper">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    XXX列表
                    <div class="row">
                       <div >
                        <form class="form-inline" action="<?php echo U('search');?>" method="post">
                            <div class="form-group  ">
                                <label for="exampleInputName2">商品名字</label>
                                <input type="text" class="form-control" id="exampleInputName2" name="name" value="<?php echo I('get.name');?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">商品分类</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">请选择</option>
                                    <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><option value="<?php echo ($category["id"]); ?>"><?php echo ($category["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">品牌</label>
                                <select name="brand_id" class="form-control">
                                    <option value="0">请选择</option>
                                    <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><option value="<?php echo ($brand["id"]); ?>"><?php echo ($brand["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">价格区间</label>
                                <input type="text" name="min" style="width: 50px;" class="form-control" value="<?php echo I('get.min');?>" /> -
                                <input type="text" name="max"  style="width: 50px;" class="form-control" value="<?php echo I('get.max');?>" />
                            </div>
                           <!-- <div class="form-group">
                                <label for="exampleInputName2">是否上架</label>
                                <input type="checkbox" name="goods_status[]" <?php if(in_array(1, I('get.goods_status'))): ?>checked<?php endif; ?> value="1" >是
                                <input type="checkbox" name="goods_status[]" <?php if(in_array(0, I('get.goods_status'))): ?>checked<?php endif; ?> value="0" >否
                            </div>-->
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                       </div>
                        <div class="col-lg-6">
                        <!--    <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">

                            </div>-->
                        </div>
                    </div><!-- /.row -->
                            <span class="tools pull-right">
                                <a href="<?php echo U(add);?>" class="btn btn-success btn-link">新增</a>
                            </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                            <tr>
                                <th>品牌名称</th>
                                <th>logo</th>
                                <th>品牌描述</th>
                                <th>所属分类</th>
                                <th>超市价格</th>
                                <th>平台价格</th>
                                <th>库存</th>
                                <th>是否上架</th>
                                <th class="hidden-phone">操作</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                    <td><?php echo ($row["goods_name"]); ?></td>
                                    <td><img src="<?php echo ($row["logo"]); ?>" width="30px" height="20px" alt=""></td>
                                    <td><?php echo ($row["content"]); ?></td>
                                    <td><?php echo ($row["name"]); ?></td>
                                    <td><?php echo ($row["market_price"]); ?></td>
                                    <td><?php echo ($row["shop_price"]); ?></td>
                                    <td><?php echo ($row["stock"]); ?></td>
                                    <td><?php echo ($row["is_on_sale"]); ?></td>
                                    <td class="center hidden-phone">
                                        <a href="<?php echo U('edit',[id=>$row['id']]);?>">查看</a>
                                        |
                                        <a href="<?php echo U('pics',[id=>$row['id']]);?>">查看相册</a>
                                        |
                                        <a href="<?php echo U('edit',[id=>$row['id']]);?>">编辑</a>
                                        |
                                        <a href="<?php echo U('remove',[id=>$row['id']]);?>">删除</a>
                                    </td>

                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
                <?php echo ($page); ?>
            </section>
        </div>
    </div>
</div>

            
    <link rel="stylesheet" href="/Public/css/page.css">



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