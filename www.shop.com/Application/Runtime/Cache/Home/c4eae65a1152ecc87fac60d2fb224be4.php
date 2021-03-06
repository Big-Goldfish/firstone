<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="http://www.itsource.cn/upload/operationableFile/logo_small.jpg " />
		<title>用户中心</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="/Public/css/basic.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/ucenter.css" rel="stylesheet" type="text/css">
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
					<button class="cart" type="button" onclick="javascript:window.location.href='ucart.html'"><img src="/Public/img/sygw.png">　购物车</button>
				</div>
				<p class="not_login">
					<a href="login.html">登录</a><span class="spliter">|</span>
					<a href="register.html">注册</a><span class="spliter">|</span>
					<a href="ucenter.html">用户中心</a>
				</p>
				<p class="is_login"><span class="uname" name="uname">源码时代</span><span class="greetings">下午好~</span>
					<a href="">退出</a>
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
		<div class="container center">
			<div class="panel">
			
				<!-- banner START -->
				<div class="banner">
					<img class="logo" src="/Public/img/ucenter/ulogo.png" />
					<p><span class="uname">源码时代</span><span class="greetings">下午好~~</span><br />
					上次于2016年10月07日 10:22 在成都登录成功</p>
				</div>
				<!-- banner END -->
				<!-- "新品上市" START -->
				<div class="tabs_nav">
					<p class="title">个人中心</p>
					<ul>
						<li class="order_list">订单列表</li>

					</ul>
				</div>
				<div class="tabs">
					<ul>
						<li class="order_list">
							<p class="title2">订单列表设置</p>
							<ul class="caption_nav">
								<li class="all">所有订单</li>
								<li class="wait4pay">待付款</li>
								<li class="wait4deliever">待发货</li>
								<li class="wait4receive">待收货</li>
								<li class="wait4comment">待评价</li>
							</ul>
							<table class="all">
								<tr>
									<th>商品信息</th>
									<th>单价</th>
									<th>数量</th>
									<th>实付款</th>
									<th>订单状态</th>
								</tr>
								<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><tr>
									<td>
										<p><input type="checkbox" /><span class="date"><?php echo date('Y-m-d H:m:i',$re['create_time']);?></span><span class="sequence">&nbsp;<?php echo ($re["id"]); ?></span></p>
										<img src="<?php echo ($re["logo"]); ?>">
										<ul>

											<li><?php echo ($re["goods_name"]); ?></li>
										</ul>
									</td>
									<td>￥：<?php echo ($re["goods_price"]); ?></td>
									<td><?php echo ($re["amount"]); ?></td>
									<td>￥：<?php echo ($re["sub_total"]); ?></td>
									<td><?php switch($re["status"]): case "待支付": ?><a href="<?php echo U('Order/pay',['order_id'=>$re['id']]);?>"><?php echo ($re["status"]); ?></a><?php break;?>
										<?php case "确认收货": ?><a href="<?php echo U('Order/filish',['id'=>$re['id']]);?>"><?php echo ($re["status"]); ?></a><?php break;?>
										<?php default: echo ($re["status"]); endswitch;?></td>

								</tr><?php endforeach; endif; else: echo "" ;endif; ?>

							</table>
							<table class="wait4pay">
								<thead>
									<tr>
										<th>选择</th>
										<th>商品信息</th>
										<th>单价</th>
										<th>数量</th>
										<th>实付款</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<p><input type="checkbox" />　大红袍茶叶旗舰店</p>
											<img src="/Public/img/index/sftu1.jpg">
										</td>
										<td>
											<ul>
												<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
												<li>茶叶500g 散装大红袍</li>
												<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
											</ul>
										</td>
										<td>￥：99.00</td>
										<td>1</td>
										<td>￥：99.00</td>
										<td><span class="delete">×</span></td>
									</tr>
									<tr>
										<td>
											<p><input type="checkbox" />　大红袍茶叶旗舰店</p>
											<img src="/Public/img/index/sftu1.jpg">
										</td>
										<td>
											<ul>
												<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
												<li>茶叶500g 散装大红袍</li>
												<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
											</ul>
										</td>
										<td>￥：99.00</td>
										<td>1</td>
										<td>￥：99.00</td>
										<td><span class="delete">×</span></td>
									</tr>
									<tr>
										<td>
											<p><input type="checkbox" />　大红袍茶叶旗舰店</p>
											<img src="/Public/img/index/sftu1.jpg">
										</td>
										<td>
											<ul>
												<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
												<li>茶叶500g 散装大红袍</li>
												<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
											</ul>
										</td>
										<td>￥：99.00</td>
										<td>1</td>
										<td>￥：99.00</td>
										<td><span class="delete">×</span></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="3">
											<input type="checkbox">　全选　</input>
											<a href="">清空购物车</a>
										</td>
										<td>
											已选 <span class="count">0</span> 件商品
										</td>
										<td colspan="2">
											合计(不含运费)：￥0.00　<button>结　算</button>
										</td>
									</tr>
								</tfoot>
							</table>
							<table class="wait4deliever">
								<tr>
									<th>商品信息</th>
									<th>单价</th>
									<th>数量</th>
									<th>实付款</th>
									<th>订单状态</th>
									<th>商品操作</th>
									<th>交易操作</th>
								</tr>
								<tr>
									<td>
										<p><span class="date">2016-10-06</span><span class="sequence">订单号：2183848195633220</span></p>
										<img src="/Public/img/index/sftu1.jpg">
										<ul>
											<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
											<li>茶叶500g 散装大红袍</li>
											<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
										</ul>
									</td>
									<td>￥：99.00</td>
									<td>1</td>
									<td>￥：99.00</td>
									<td>待发货</td>
									<td>
										<a href="javascript:void(0)">退款</a>/
										<a href="javascript:void(0)">退货</a>
									</td>
									<td><button>提醒发货</button></td>
								</tr>
								<tr>
									<td>
										<p><span class="date">2016-10-06</span><span class="sequence">订单号：2183848195633220</span></p>
										<img src="/Public/img/index/sftu1.jpg">
										<ul>
											<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
											<li>茶叶500g 散装大红袍</li>
											<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
										</ul>
										<td>￥：99.00</td>
										<td>1</td>
										<td>￥：99.00</td>
										<td>待发货</td>
										<td>
											<a href="javascript:void(0)">退款</a>/
											<a href="javascript:void(0)">退货</a>
										</td>
										<td><button>提醒发货</button></td>
									</td>
								</tr>
							</table>
							<table class="wait4receive">
								<tr>
									<th>商品信息</th>
									<th>单价</th>
									<th>数量</th>
									<th>实付款</th>
									<th>订单状态</th>
									<th>商品操作</th>
									<th>交易操作</th>
								</tr>
								<tr>
									<td>
										<p><input type="checkbox" /><span class="date">2016-10-06</span><span class="sequence">订单号：2183848195633220</span></p>
										<img src="/Public/img/index/sftu1.jpg">
										<ul>
											<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
											<li>茶叶500g 散装大红袍</li>
											<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
										</ul>
									</td>
									<td>￥：99.00</td>
									<td>1</td>
									<td>￥：99.00</td>
									<td>待发货</td>
									<td>
										<a href="javascript:void(0)">退款</a>/
										<a href="javascript:void(0)">退货</a>
									</td>
									<td>
										<p>还有3天5小时</p>
										<button>确认收货</button>
									</td>
								</tr>
								<tr>
									<td>
										<p><input type="checkbox" /><span class="date">2016-10-06</span><span class="sequence">订单号：2183848195633220</span></p>
										<img src="/Public/img/index/sftu1.jpg">
										<ul>
											<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
											<li>茶叶500g 散装大红袍</li>
											<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
										</ul>
										<td>￥：99.00</td>
										<td>1</td>
										<td>￥：99.00</td>
										<td>待发货</td>
										<td>
											<a href="javascript:void(0)">退款</a>/
											<a href="javascript:void(0)">退货</a>
										</td>
										<td>
											<p>还有3天5小时</p>
											<button>确认收货</button>
										</td>
									</td>
								</tr>
							</table>
							<table class="wait4comment">
								<tr>
									<th>商品信息</th>
									<th>单价</th>
									<th>数量</th>
									<th>实付款</th>
									<th>订单状态</th>
									<th>商品操作</th>
									<th>交易操作</th>
								</tr>
								<tr>
									<td>
										<p><input type="checkbox" /><span class="date">2016-10-06</span><span class="sequence">订单号：2183848195633220</span></p>
										<img src="/Public/img/index/sftu1.jpg">
										<ul>
											<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
											<li>茶叶500g 散装大红袍</li>
											<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
										</ul>
									</td>
									<td>￥：99.00</td>
									<td>1</td>
									<td>￥：99.00</td>
									<td>待发货</td>
									<td>
										<a href="javascript:void(0)">申请售后</a>
									</td>
									<td>
										<button>评价</button>
									</td>
								</tr>
								<tr>
									<td>
										<p><input type="checkbox" /><span class="date">2016-10-06</span><span class="sequence">订单号：2183848195633220</span></p>
										<img src="/Public/img/index/sftu1.jpg">
										<ul>
											<li>特级大红袍 武夷岩茶 森舟茶叶礼盒 武夷山</li>
											<li>茶叶500g 散装大红袍</li>
											<li>惊喜大桶装 超值500g 武夷正宗 口感醇厚</li>
										</ul>
										<td>￥：99.00</td>
										<td>1</td>
										<td>￥：99.00</td>
										<td>待发货</td>
										<td>
											<a href="javascript:void(0)">申请售后</a>
										</td>
										<td>
											<button>评价</button>
										</td>
									</td>
								</tr>
							</table>
						</li>
						<li class="user_info">
							<p class="title2">个人资料设置</p>
							<dl>
								<dt>昵称：</dt>
								<dd><input type="text" class="uname" placeholder="你的爱称不要有特殊符号哦"/></dd>
								<dt>出生年月日：</dt>
								<dd><select class="uage_year"><option></option></select>年<select class="uage_month"><option></option></select>月<select class="uage_day"><option></option></select>日</dd>
								<dt>邮箱：</dt>
								<dd><input type="text" class="uemail" placeholder="请输入正确的格式"/></dd>
								<dt>手机号码：</dt>
								<dd><input type="text" class="uphone" placeholder="不能少于11位"/><button class="verification_code">获取验证码</button></dd>
								<dt>验证码：</dt>
								<dd><input type="text" class="verification" placeholder="请输入验证码"/></dd>
							</dl>
							<button type="submit">提交</button>
						</li>
						<li class="changing_pwd">
							<p class="title2">设置密码</p>
							<dl>
								<dt>旧密码：</dt>
								<dd><input type="text" class="old_pwd" /></dd>
								<dt>新密码：</dt>
								<dd><input type="text" class="new_pwd" /></dd>
								<dt>确认密码：</dt>
								<dd><input type="text" class="new_pwd_confirm" /></dd>
							</dl>
							<button type="submit">提交</button>
						</li>
						<li class="changing_icon">
							<p class="title2">设置头像</p>
							<div class="preview">
								<p class="title2">预览</p>
								<div>
									<div><img src="/Public/img/ucenter/yl1.png" /><p>上传图片120px*120px</p></div>
									<div><img src="/Public/img/ucenter/yl2.png" /><p>上传图片90px*90px</p></div>
									<div><img src="/Public/img/ucenter/yl3.png" /><p>上传图片60px*60px</p></div>
								</div>
							</div>
							<div class="pic">
								<p><button><span class="plus">+</span>本地上传</button></p>
								<p>只支持JPG、GIF、PNG，大小不超过5M</p>
							</div>
							<p><button>确认</button><button>取消</button></p>
						</li>
						<li class="security_question">
							<p class="title2">设置密保问题和答案</p>
							<dl>
								<dt>问题一：</dt>
								<dd><select><option>请选择密保问题</option></select></dd>
								<dt>密码：</dt>
								<dd><input type="text" class="new_pwd" /></dd>
								<dt>问题二：</dt>
								<dd><select><option>请选择密保问题</option></select></dd>
								<dt>密码：</dt>
								<dd><input type="text" class="new_pwd" /></dd>
								<dt>问题三：</dt>
								<dd><select><option>请选择密保问题</option></select></dd>
								<dt>密码：</dt>
								<dd><input type="text" class="new_pwd" /></dd>
							</dl>
							<p><a href="">忘记密码</a><br /><button type="submit">提交</button></p>
						</li>
						<li class="delivery_addresses">
							<p class="title2">我的收货地址</p>
							<ul class="addresses">
								<li>
									<p class="uname">源码时代</p>
									<p class="pre_address"><select class="province" data-value="四川省"></select><select class="city" data-value="成都市"></select><select class="area" data-value="高新区"></select></p>
									<p class="address" title="双击编辑" old="">府城大道西段399号 天府新谷1号楼601（610041）</p>
									<p class="uphone" title="双击编辑">15135869006</p>
									<button class="delete">删除</button>
									<p class="default"><input type="radio" name="is_default" checked="checked">作为默认地址</p>
								</li>
								<li>
									<p class="uname">源码时代</p>
									<p class="pre_address"><select class="province" data-value="四川省"></select><select class="city" data-value="成都市"></select><select class="area" data-value="高新区"></select></p>
									<p class="address" title="双击编辑" old="">府城大道西段400号 天府新谷1号楼601（610041）</p>
									<p class="uphone" title="双击编辑">15135869006</p>
									<button class="delete">删除</button>
									<p class="default"><input type="radio" name="is_default" >作为默认地址</p>
								</li>
								<li class="add_address">
									<p class="plus">+</p>
									添加新地址
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
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
	
		$(".center .tabs li [type='text'], .center .tabs .user_info select").addClass("borderRadius_scheme_small");
		$(".center .tabs li button").addClass("button_color_scheme_dark borderRadius_scheme_middle");
	
		$(function(){
			
			/* Tabs navigator module START */
			
			// First level tabs

			var $tabs_nav = $(".center .tabs_nav >ul");
			var $tabs_nav_trigger = $tabs_nav.children("li");
			var $tabs = $(".center .tabs >ul");
			var $tabs_item = $tabs.children("li");
			
			var current_tab_class;
			$tabs_nav_trigger.on("click", function(){
				current_tab_class = $(this).attr('class');
				
				$tabs_nav_trigger.css({'color': '#000000'});
				$tabs_nav.children("." + current_tab_class).css({'color': '#a0603d'});
				
				$tabs_item.css({'display':'none'});
				$tabs.children("." + current_tab_class).css({'display':'initial'});
				$tabs.height($tabs.children("." + current_tab_class).height());
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			}).eq(0).trigger("click");
			
			// Order list tabs
			
			var $order_list = $(".center .tabs .order_list");
			var $order_list_nav = $order_list.children(".caption_nav");
			var $order_list_nav_trigger = $order_list_nav.children("li");
			var $order_list_item = $order_list.children("table");
			
			$order_list_nav_trigger.on("click", function(){
				
				$order_list_nav_trigger.css({'color': '#000000'});
				$order_list_nav.children("." + $(this).attr('class')).css({'color': '#a0603d'});
				
				$order_list_item.css({'display':'none'});
				$order_list.children("." + $(this).attr('class')).css({'display':'inline-table'});
				$tabs_nav.children("." + current_tab_class).trigger("click");
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			}).eq(0).trigger("click");
			
			/* Tabs navigator module END */
			
			/* Wait4pay module START */
			$order_list.children(".wait4pay").find(".delete").click(function(){
				$(this).parent().parent().remove();
				// Update UI.
				$order_list_nav.children(".wait4pay").trigger("click");
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			});
			/* Wait4pay module END */
			
			/* Address module START */
			
			var editable_params = {
				    lineBreaks : true,
				    toggleFontSize : false,
				    closeOnEnter : true
				}
			
			var $address_list = $(".center .addresses");

			// Click to set as default.
			$address_list.find(".default").live({
				click: function(){
					$(this).find("[name='is_default']").attr({"checked":"checked"});
				},
				hover: function(){
					$(this).css({"cursor":"pointer"});
				}
			});

			var $add_address = $address_list.find(".add_address");

			// Add blank address and hide add trigger.
			$add_address.click(function(){
				// Create object.
				$newAddress = $('<li>'+
					'<p class="uname">源码时代</p>'+
					'<p class="pre_address"><select class="province" data-value="四川省"></select><select class="city" data-value="成都市"></select><select class="area" data-value="高新区"></select></p>'+
					'<p class="address" title="双击编辑" old="">地址</p>'+
					'<p class="uphone" title="双击编辑">电话</p>'+
					'<p><button class="save  button_color_scheme_dark">保存该地址</button> <button class="cancel  button_color_scheme_dark">取消</button></p>'+
				'</li>');
				
				// Select pre-address.
				$newAddress.find('.pre_address').cxSelect({
	  				url: 'json/cityData.min.json',
	  				selects: ['province', 'city', 'area'],
	  				emptyStyle: 'none'
				});
				
				// Enable directly editing.
				$newAddress.find('.address').editable(editable_params);
				$newAddress.find('.uphone').editable(editable_params);
				
				// Add to list.
				$newAddress.insertBefore($(this));
				
				// Hide trigger.
				$(this).css({"display":"none"});
			}).hover(function(){
				$(this).css({"cursor":"pointer"});
			});
			

			// Save new address.
			$address_list.find(".save").live("click", function(){
				$(this).parent().parent().append(
					'<button class="delete button_color_scheme_dark borderRadius_scheme_middle">删除</button><p class="default"><input type="radio" name="is_default" >作为默认地址</p>'
				);
				// Show add trigger.
				$add_address.css({"display":"initial"});
				// Update UI.
				$tabs_nav.children(".delivery_addresses").trigger("click");
				// Clear.
				$(this).parent().remove();
			});
			
			// Cancel using new address.
			$address_list.find(".cancel").live("click", function(){
				$(this).parent().parent().remove();
				$add_address.css({"display":"initial"});
			});
			
			// Delete address.
			$address_list.find(".delete").live("click", function(){
				$(this).parent().remove();
			});

			// Select pre-address.
			$pre_address = $address_list.find(".pre_address");
			$pre_address.cxSelect({
  				url: 'json/cityData.min.json',
  				selects: ['province', 'city', 'area'],
  				emptyStyle: 'none'
			});

			// Directly edit address.
			var $address = $address_list.find(".address");
			var $uphone = $address_list.find(".uphone");
			var currentEditingAddress;
			$address.editable(editable_params);
			$uphone.editable(editable_params);
			
			// Listen on when elements getting edited
			
			var editing_func = function() {
				currentEditingAddress = $(this);
				currentEditingAddress.attr({"old":$(this).find("textarea").val()});
				currentEditingAddress.find('textarea').css({"background-color":"white"});
			}
			
			$address.live('edit', editing_func);
			$uphone.live('edit', editing_func);
			
			$address.live('edit', function() {
				currentEditingAddress.find('textarea').attr({"maxlength":"44"});
			});
			$uphone.live('edit', function() {
				currentEditingAddress.find('textarea').attr({"maxlength":"11"});
			});
			
			// Listen on when elements cancel edited
			$(document).keydown(function(event){
				if(event.keyCode == 27){
					currentEditingAddress.editable('close');
					currentEditingAddress.text(currentEditingAddress.attr("old"));
				}
			});

			/* Adress module END */

		});
	</script>
</html>