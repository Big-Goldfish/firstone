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
            
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <form role="form" action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName">商品名称</label>
                            <input type="text" name="goods_name" class="form-control" id="exampleInputName" placeholder="请输入品牌名称" value='<?php echo ($row["goods_name"]); ?>'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">超市价格</label>
                            <input type="number" name="market_price" class="form-control"  placeholder="请输入超市价格" value='<?php echo ($row["market_price"]); ?>'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">平台价格</label>
                            <input type="number" name="shop_price" class="form-control"  placeholder="请输入平台价格" value='<?php echo ($row["shop_price"]); ?>'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSort">排序</label>
                            <input class=" form-control" id="exampleInputSort" name="sort" type="text"  placeholder="请输入排序数字,数字越小越靠前"  value='<?php echo ($row["sort"]); ?>'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSort">库存</label>
                            <input class=" form-control"  name="stock" type="text"  placeholder="请输入商品的数量"  value='<?php echo ($row["sort"]); ?>'/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputIntro">商品分类</label>
                            <select name="goods_category_id">
                                <?php if(is_array($categorys)): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><option value="<?php echo ($category["id"]); ?>"><?php echo str_repeat('&nbsp;&nbsp;',$category['level']); echo ($category["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label >品牌分类</label>
                            <select name="brand_id">
                                <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><option value="<?php echo ($brand["id"]); ?>"><?php echo ($brand["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>

                        <label >活动类型</label>
                        <?php if(is_array($proms)): $i = 0; $__LIST__ = $proms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$promo): $mod = ($i % 2 );++$i;?><input type=checkbox name=prom_id value="<?php echo ($promo["id"]); ?>"/><?php echo ($promo["prom_type"]); endforeach; endif; else: echo "" ;endif; ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                              <span class="input-group-addon">
                                                <input type="checkbox" aria-label="...">
                                              </span>
                                    <input type="text" class="form-control" aria-label="...">
                                </div>
                            </div>

                        </div>



                        <div class="form-group">
                            <label for="logo-upload">商品LOGO</label>
                            <input type="file" id="logo-upload">
                            <input type="hidden" name="logo" id="logo"/>
                            <img src="" id="logo-preview" style="max-width: 100px;max-height: 100px"/>
                        </div>







                        <div class="form-group">
                            <label for="logo-upload">商品相册</label>
                            <input type="file" id="logo2-upload">
                            <div id="2"></div>
                        </div>
                        <div class="checkbox">
                            <label>
                                是否上架:是<input type="checkbox" name="is_on_sale" value="1" >
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">商品详细内容</label>
                            <textarea id="container" ><?php echo ($row["content"]); ?></textarea>
                        </div>
                        <input type="hidden" id="content" name="content">

                        <button type="submit" class="btn btn-primary"> 创建 </button>
                    </form>

                <!--</div>-->
            <!--</section>-->
        <!--</div>-->
    <!--</div>-->

            
    <script src="/Public/ueditor/ueditor.config.js"></script>
    <script src="/Public/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        $(document).ready(function () {
            var value = $("#container").val();
            UE.getEditor('container').setContent(value, false);
        });
        var SetValue = function () {
            var value = UE.getEditor('container').getContent();
            $("#content").val(value);
        };


    </script>
    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/Public/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/jquery.nicescroll.js"></script>
    <script src="/Public/ext/uploadify/jquery.uploadify.min.js"></script>

    <script src="/Public/ext/layer/layer.js"></script>


    <!--common scripts for all pages-->
    <!--<script src="/Public/js/scripts.js"></script>-->
    <script src="http://admin.shop.com/Public/ext/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
        $(function(){

            $('#logo-upload').uploadify({
                height:30,
                swf:'/Public/ext/uploadify/uploadify.swf',
                uploader:'<?php echo U("Upload/upload");?>',
                width:120,
                buttonText:'商品logo',
                fileTypeExts:'*.jpg;*.jpeg;*.jpe;*.png;*.gif',
                onUploadSuccess:function(file,data){
                    data= $.parseJSON(data);
                    if(data.status){
                        $('#logo').val(data.url);
                        $('#logo-preview').attr('src',data.url);
                        $('#logo-upload').attr('logo',data.url);
                    }else{
                        layer.alert(data.msg,{icon:5});
                    }
                },
            });
            $('#logo2-upload').uploadify({
                height:30,
                swf:'/Public/ext/uploadify/uploadify.swf',
                uploader:'<?php echo U("Upload/upload");?>',
                width:120,
                buttonText:'商品相册',
                fileTypeExts:'*.jpg;*.jpeg;*.jpe;*.png;*.gif',
                onUploadSuccess:function(file,data){
                    data= $.parseJSON(data);
                    if(data.status){
                        $('#logo').val(data.url);
                        $('#2').append('<img src="'+data.url+'" width="100px" height="100px">');
                        $('#2').append('<input type="hidden" name="path[]" value="'+data.url+'"/>')
                    }else{
                        layer.alert(data.msg,{icon:5});
                    }
                }
            })
        })

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