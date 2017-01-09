<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="http://www.itsource.cn/upload/operationableFile/logo_small.jpg " />
		<title>结算</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="/Public/css/basic.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/settlement.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.auto-complete.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.cxselect.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.editable.min.js"></script>
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
					<div style="position: relative; z-index: 999; display: inline;">
						<ul class="auto_wrapper">
							<li>数据一</li>
							<li>数据二</li>
							<li>数据三</li>
							<li>数据四</li>
							<li>数据五</li>
						</ul>
					</div>
					<button class="search_bar-submit" type="search"><img src="/Public/img/syss.png">搜索</button>
					<button class="cart" type="button" onclick="javascript:window.location.href='ucart.html'"><img src="/Public/img/sygw.png">　购物车</button>
				</div>
				<p class="not_login">
					<a href="login.html">登录</a><span class="spliter">|</span>
					<a href="register.html">注册</a><span class="spliter">|</span>
					<a href="ucenter.html">用户中心</a>
				</p>
				<p class="is_login"><span class="uname" name="uname">源码时代</span><span class="greetings">下午好~</span>
					<a href="<?php echo U('Login/login_out');?>">退出</a>
				</p>
			</div>
			<p class="menu">
				<a href="index.html">首页</a><span class="spliter">|</span>
				<a href="product_list.html">朴茶区</a><span class="spliter">|</span>
				<a href="product_list.html">有机区</a><span class="spliter">|</span>
				<a href="product_list.html">老茶区</a><span class="spliter">|</span>
				<a href="product_list.html">自饮区</a><span class="spliter">|</span>
				<a href="product_list.html">老牌区</a><span class="spliter">|</span>
			</p>
		</div>

		<!-- center -->
		<form action="<?php echo U('Order/create');?>" method="post">
		<div class="container center">
			<div class="panel">

				<p class="title">收货地址</p>
				<ul class="addresses">
					<?php if(is_array($infos)): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><li>
						<span class="is_default">默认地址</span>
						<p class="uname">源码时代</p>
						<p class="address" title="双击编辑" old=""><?php echo ($info["province_name"]); echo ($info["city_name"]); echo ($info["town_name"]); echo ($info["detail_address"]); ?></p>
						<p class="uphone" title="双击编辑"><?php echo ($info["tel"]); ?></p>
						<p class="actived"><input type="radio" name="Address" value="<?php echo ($info["id"]); ?>" checked="checked">使用该地址</p>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<li class="add_address">
						<a href="<?php echo U('Address/index');?>"><p class="plus">+</p></a>
						添加新地址
					</li>

				</ul>

				<table class="summation">
					<thead>
						<tr>
							<td>商品信息</td>
							<td>单价</td>
							<td>数量</td>
							<td>小计</td>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodlist): $mod = ($i % 2 );++$i;?><tr>
							<td>
								<img src="<?php echo ($goodlist["logo"]); ?>" />
								<ul><li><?php echo ($goodlist["content"]); ?></li></ul>
							</td>
							<td>￥:<?php echo ($goodlist["shop_price"]); ?></td>
							<td><?php echo ($goodlist["amount"]); ?></td>
							<td>￥:<?php echo ($goodlist["sub_total"]); ?></td>
						</tr>
						<input type="text" name="order_id" value="<?php echo ($goodlist["shop_price"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3"></td>
							<td>合计：<span class="sum">￥<?php echo ($sum_price); ?></span></td>
						</tr>
					</tfoot>
				</table>

				<div class="bill">
					<div class="payment">
						<ul>
							<li><input type="radio" name="delivery_id" value="4">货到付款</input></li>
							<li><input type="radio"name="delivery_id" value="2">支付宝支付</input></li>
						</ul>
						<ul>
								<li><input type="radio" name="delivery_id" value="1"checked="checked">微信支付</input></li>
							<li><input type="radio"name="delivery_id" value="4">银联支付</input></li>
						</ul>
					</div>
					<ul class="summary">
						<li>实付款：<span class="sum">￥99.00</span></li>
						<li>寄送至：<span class="address">四川省  成都市  高新区  府城大道西段399号天府新谷1号楼601</span></li>
						<li>收货人：<span class="uname">源码时代</span> <span class="uphone">15135869006</span></li>
					</ul>
					<p><button class="button_color_scheme_dark borderRadius_scheme_small" onclick="history.go(-1)">返回购物车</button>
						<button type="submit"  class="button_color_scheme_dark borderRadius_scheme_small">提交订单</button></p>
				</div>
			</div>
		</div>
		</form>
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

	<script type="text/javascript" src="/Public/js/basic.js"></script>
	<script type="text/javascript">

		$(".invoice .content .normal .details button, .invoice .content .digital .details button, .invoice .navigator button").addClass("button_color_scheme_light borderRadius_scheme_small");
		$(".invoice .content .normal .confirmation button, .invoice .content .digital .confirmation button").addClass("button_color_scheme_mixed");
		$(".invoice .content [type='text']").addClass("borderRadius_scheme_small");
		$(".invoice .content .VAT .confirmation button").addClass("button_color_scheme_dark");
		$(".invoice .content .confirmation button").addClass("borderRadius_scheme_small");

		$(function(){

			/* Address module START */
			
			var $address_list = $(".center .addresses");
			
			// Click to active.
			var $actived_address = $address_list.find(".actived");
			$actived_address.live({
				click: function(){
					$(this).find("[name='in_using']").attr({"checked":"checked"});
					$is_checked = $address_list.find(".is_checked").clone();
					$address_list.find(".is_checked").remove();
					$(this).before($is_checked);
				},
				hover: function(){
					$(this).css({"cursor":"pointer"});
				}
			});
			
			// Add blank address and hide add trigger.
			var $add_address = $address_list.find(".add_address");
			$add_address.click(function(){
				$newAddress = $('<li>'+
					'<p class="uname">源码时代</p>'+
					'<p class="pre_address"><select class="province" data-value="四川省"></select><select class="city" data-value="成都市"></select><select class="area" data-value="高新区"></select></p>'+
					'<p class="address" title="双击编辑" old="">地址</p>'+
					'<p class="uphone" title="双击编辑">电话</p>'+
					'<p><button class="save button_color_scheme_dark">保存并使用该地址</button> <button class="cancel button_color_scheme_dark">取消</button></p>'+
				'</li>');
				
				// Select pre-address.
				$newAddress.find('.pre_address').cxSelect({
	  				url: 'json/cityData.min.json',
	  				selects: ['province', 'city', 'area'],
	  				emptyStyle: 'none'
				});
				
				// Enable directly editing.
				$newAddress.find('.address').editable({
				    lineBreaks : true,
				    toggleFontSize : false,
				    closeOnEnter : true
				});
				$newAddress.find('.uphone').editable({
				    lineBreaks : true,
				    toggleFontSize : false,
				    closeOnEnter : true
				});
				
				// Add to list.
				$newAddress.insertBefore($(this));
				
				// Hide trigger.
				$(this).css({"display":"none"});
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			});

			// Save and using new address.
			$save_address = $address_list.find(".save");
			$save_address.live("click", function(){
				$(this).parent().parent().append(
					'<p class="actived"><input type="radio" name="in_using" >使用该地址</p>'
				);
				// Show add trigger.
				$add_address.css({"display":"initial"});
				// Using address.
				$(this).parent().parent().find(".actived").trigger("click");
				// Clear.
				$(this).parent().remove();
			});

			// Cancel using new address.
			$cancel_address = $address_list.find(".cancel");
			$cancel_address.live("click", function(){
				$(this).parent().parent().remove();
				$add_address.css({"display":"initial"});
			});


			// Select pre-address.
			$pre_address = $address_list.find(".pre_address");
			$pre_address.cxSelect({
  				url: 'json/cityData.min.json',
  				selects: ['province', 'city', 'area'],
  				emptyStyle: 'none'
			});

			// Directly edit address.
			var editable_params = {
				lineBreaks : true,
			    toggleFontSize : false,
			    closeOnEnter : true
			}
			$address = $address_list.find(".address");
			$uphone = $address_list.find(".uphone");
			
			var $editing;
			$address.editable(editable_params);
			$uphone.editable(editable_params);
			
			// Listen on when elements getting edited
			var editing_func = function() {
				$editing = $(this);
				$editing.attr({"old":$(this).find("textarea").val()});
				$editing.find('textarea').css({"background-color":"white"});
			}
			$address.live('edit', editing_func);
			$uphone.live('edit', editing_func);
			$address.live('edit', function() {
				$editing.find('textarea').attr({"maxlength":"44"});
			});
			$uphone.live('edit', function() {
				$editing.find('textarea').attr({"maxlength":"11"});
			});
			// Listen on when elements cancel edited
			$(document).keydown(function(event){
				if(event.keyCode == 27){
					$editing.editable('close');
					$editing.text($editing.attr("old"));
				}
			});
			
			/* Adress module END */

			/* Invoice module START */

			$(".invoice .content .title [type='radio']").click(function(){
				if($(this).val() == "institution") {
					$(this).parent().parent().find(".institution_address").removeAttr("disabled");
				} else {
					$(this).parent().parent().find(".institution_address").attr("disabled", "disabled");
				}
				
			});
			$(".center .invoice_info .not_issuing_invoicing").click(function() {
   				if($(this).is(':checked')) {
   					$(this).siblings().css({"display":"none"});
   				} else {
   					$(this).siblings().css({"display":"initial"});
   				}
			});

			$(".center .invoice_info .subtitle2 .alter").click(function(){
				$(".invoice").fadeIn(100);
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			});

			$(".invoice .close_window").click(function(){
				$(".invoice").fadeOut(100);
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			});

			/* Invoice navigator START */

			$(".invoice .navigator >*").click(function(){
				$(".invoice .navigator >.actived").removeClass("actived");
				$(this).addClass("actived");
				$(".invoice .content >.actived").removeClass("actived");
				$(".invoice .content >*").eq($(this).index()).addClass("actived");
			});
			
			/* Invoice navigator END */

			$(".invoice .content .normal button, .invoice .content .digital button").click(function(){
				$(this).siblings("*").removeClass("actived");
				$(this).addClass("actived");
			})

			var step = 1;
			$(".invoice .content .VAT .prev").click(function(){
				step--;
				updateVATStepsUI();
			});
			$(".invoice .content .VAT .next").click(function(){
				step++;
				updateVATStepsUI();
			});
			
			var $vat = $(".invoice .content .VAT");
			function updateVATStepsUI(){
				if (step > 1){
					$vat.find(".option-innerHTML").text($vat.find("[type='radio'][name='option']:checked").attr("text"));
					$vat.find(".option").addClass("actived");
				} else {
					$vat.find(".option").removeClass("actived");
				}
				$vat.find(".diagram >*, .invoice .content .VAT .steps >*").removeClass("actived");
				$vat.find(".diagram >:lt(" + step + ")").addClass("actived");
				$vat.find(".diagram >:lt(" + step + ") hr").addClass("actived");
				$vat.find(".steps >:nth-child(" + step + ")").addClass("actived");
			}
			
			$(".invoice .content .submit").click(function(){
				$(".invoice").fadeOut(100);
			});
			
			// Initial invoice
			$(".invoice .navigator :first-child").trigger("click");
			/* Invoice module END */

		});
	</script>
</html>