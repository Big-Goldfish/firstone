<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="http://www.itsource.cn/upload/operationableFile/logo_small.jpg " />
	<title>源码时代</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/Public/css/basic.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/index.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/unslider.css" rel="stylesheet" type="text/css">
	<link href="/Public/css/unslider-dots.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/Public/js/unslider-min.js"></script>
</head>

<body>
<!-- header -->
<div class="panel header">
	<a href="index.html"><img class="logo" src="/Public/img/logo_2.png"></a>
	<div class="top_menu">
		<p class="at_login">
			<a href="index.html">首页</a><span class="spliter">|</span>
			<a onclick="history.go(-1)">返回</a>
		</p>
		<div class="search_bar">
			<input class="search_bar-input" type="text" placeholder="查找你需要的茶叶" />
			<div style="position: relative; display: inline;">
				<ul class="auto_wrapper">
					<li>数据一</li>
					<li>数据二</li>
					<li>数据三</li>
					<li>数据四</li>
					<li>数据五</li>
				</ul>
			</div>
			<button class="search_bar-submit" type="search"><img src="/Public/img/syss.png">搜索</button>
			<button class="cart" type="button" onclick="javascript:window.location.href='<?php echo U('Cart/cartList');?>'"><img src="/Public/img/sygw.png">　购物车</button>
		</div>
		<p class="not_login">



				<span id="username"></span><a href="<?php echo U('Login/login_out');?>" id="logout">退出</a>

			<a href="<?php echo U('Login/index');?>" id="login">登录</a><span class="spliter">|</span>


			<a href="<?php echo U('Member/index');?>">注册</a><span class="spliter">|</span>
			<a href="<?php echo U('Ucenter/index');?>">用户中心</a>
		</p>
		<p class="is_login"><span class="uname" name="uname">源码时代</span><span class="greetings">下午好~</span>

	</p>
	</div>
	<p class="menu">
		<a href="<?php echo U('Index/index');?>">首页</a><span class="spliter">|</span>
		<?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/brand',['id'=>$brand['id']]);?>"><?php echo ($brand["name"]); ?></a><span class="spliter">|</span><?php endforeach; endif; else: echo "" ;endif; ?>
	</p>
</div>

<!-- center -->
<div class="container center">

	
		<div class="panel">
			<div class="banner">
				<ul>
					<li><a href="product.html"><img src="/Public/img/index/banner1.png" /></a></li>
					<li><a href="product.html"><img src="/Public/img/index/banner2.png" /></a></li>
					<li><a href="product.html"><img src="/Public/img/index/banner3.png" /></a></li>
					<li><a href="product.html"><img src="/Public/img/index/banner4.png" /></a></li>
				</ul>
			</div>
			<!-- "新品上市" START -->
			<div class="new_product">
				<p class="title"><img src="/Public/img/index/sfbt1.png"></p>
				<div class="flex-list-box">
					<dl class="products-list">
						<?php if(is_array($new_goods)): foreach($new_goods as $key=>$new_good): ?><a href="<?php echo U('Product/index',['id'=>$new_good['id']]);?>">
								<dd>
									<p><img src="<?php echo ($new_good["logo"]); ?>"></p>
									<p class="paid"><?php echo ($new_good["market_price"]); ?>付款</p>
									<p class="price">¥：<?php echo ($new_good["shop_price"]); ?>.00</p>
									<p><?php echo ($new_good["content"]); ?>>
								</dd>
							</a><?php endforeach; endif; ?>
					</dl>
				</div>
			</div>
			<!-- "所有商品" START -->
			<div class="all_product">
				<p class="title"><img src="/Public/img/index/sfbt2.png"></p>
				<div class="flex-list-box">
					<dl class="products-list">

						<?php if(is_array($goods_lists)): $i = 0; $__LIST__ = $goods_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_list): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Product/index',['id'=>$goods_list['id']]);?>">
								<dd>
									<p><img src="<?php echo ($goods_list["logo"]); ?>"></p>
									<p class="paid"><?php echo ($goods_list["market_price"]); ?>付款</p>
									<p class="price">¥：<?php echo ($goods_list["shop_price"]); ?>.00</p>
									<p><?php echo ($goods_list["content"]); ?>>
								</dd>
							</a><?php endforeach; endif; else: echo "" ;endif; ?>

					</dl>
				</div>
			</div>
			<!-- "所有商品" END -->
			<!-- "get小技能" START -->
			<div class="tcommon">
				<p class="title"><img src="/Public/img/index/sybt3.png"></p>
				<div class="flex-list-box">
					<dl class="products-list">
						<?php if(is_array($article_categorys)): $i = 0; $__LIST__ = $article_categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_category): $mod = ($i % 2 );++$i;?><dd><p class="title2"><?php echo ($article_category["name"]); ?></p>
							<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i; if($article_category['id'] == $article['article_category_id']): ?><ul>
											<a href="<?php echo U('Index/tcommon',['id'=>$article['id']]);?>">
												<li><?php echo ($article['name']); ?></li>
											</a>
										</ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</dd><?php endforeach; endif; else: echo "" ;endif; ?>

					</dl>
				</div>
			</div>
			<!-- "get小技能" END -->
			<!-- "多快好省" START -->
			<div class="VFGC">
				<p class="title"></p>
				<div class="flex-list-box">
					<dl>
						<dd>
							<img src="/Public/img/index/syfw1.png">
						</dd>
						<dd>
							<img src="/Public/img/index/syfw2.png">
						</dd>
						<dd>
							<img src="/Public/img/index/syfw3.png">
						</dd>
						<dd>
							<img src="/Public/img/index/syfw4.png">
						</dd>
					</dl>
				</div>
			</div>
			<!-- "多快好省" END -->
		</div>

	
	<!-- banner START -->

	<!-- banner END -->

	<!-- "新品上市" END -->



</div>

<!-- footer -->

	<div class="container footer">
	<div class="panel cfooter">
		<div class="f_top">
			<div class="t_left">
				<p>源码时代商城-出售源码时代周边产品，学习资料</p>
				<p>地&emsp;&emsp;址：&emsp;成都市高新区府城大道西段399号天府新谷1号楼6F</p>
				<p>电&emsp;&emsp;话：&emsp;028-86261949</p>
				<p>邮&emsp;&emsp;箱：&emsp;yuandaima@itsource.cn</p>
				<p>2006-2016成都源代码教育咨询有限公司 版权所有</p>
				<p>
					<a href="http://www.miitbeian.gov.cn" target="_blank">蜀ICP备14030149号-1</a>
				</p>
			</div>
			<div class="t_right">
				<div class="footer_right_wx">
					<img alt="源码时代" src="http://www.itsource.cn//Public/img/new3/weixin.png">
				</div>
			</div>
		</div>
	</div>
	<!--描述：百度分享  -->
	<script>
		window._bd_share_config = {
			"common": {
				"bdSnsKey": {},
				"bdText": "源码时代，专业的Java、PHP、UI、Web前端培训！",
				"bdMini": "1",
				"bdMiniList": false,
				"bdPic": "http://www.itsource.cn/images/new/wx.png",
				"bdStyle": "0",
				"bdSize": "24"
			},
			"slide": {
				"type": "slide",
				"bdImg": "0",
				"bdPos": "left",
				"bdTop": "100"
			}
		};
		with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
	</script>
</div>


</body>

	<script type="text/javascript" src="js/basic.js"></script>
	<script type="text/javascript">
		$(function(){
			$(".center .banner").unslider({
				animation: 'fade',
				autoplay: true,
				arrows: false
			});
			$.getJSON('<?php echo U("Index/username");?>',function(res){
				console.log(res);
				if(res){
					$('#username').text(res);
					$('#login').remove();
				}else{
					$('#logout').remove();
				}
			})
		});
	</script>


</html>