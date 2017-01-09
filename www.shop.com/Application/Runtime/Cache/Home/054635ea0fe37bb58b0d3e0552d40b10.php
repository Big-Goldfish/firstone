<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
            欢迎来到微信支付   您需要支付 <?php echo ($re[0]["price"]); ?>
            <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><tr>
                    <td>
                        <img src="<?php echo ($re["logo"]); ?>">
                        <ul>

                            <li><?php echo ($re["goods_name"]); ?></li>
                        </ul>
                    </td>
                    <td>￥：<?php echo ($re["goods_price"]); ?></td>
                    <td><?php echo ($re["amount"]); ?></td>

                    <td><?php echo ($re["status"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <img src="<?php echo U('Qr/index',['text'=>$pay_infos]);?>">
</body>
</html>