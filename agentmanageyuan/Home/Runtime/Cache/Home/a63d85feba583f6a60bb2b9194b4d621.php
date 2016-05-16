<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<title>T-star代理商平台</title>
<link href="/agentmanageyuan/Public/stylesheets/home/style.css" rel="stylesheet" />
<script src="/agentmanageyuan/Public/javascripts/home/jquery.js"></script>
<script src="/agentmanageyuan/Public/javascripts/home/main.js"></script>
</head>
<body>

	 <div class="header">
    <a href="javascript:history.back()"></a>
	T-star代理商管理平台
 </div>
 <div class="gr_main">
    <div class="gr_main_top">
	    <div class="gr_main_top_left">
		   <p>
		      <img src="/agentmanageyuan/Public/images/home/head.png" />
		   </p>
		</div>
		<div class="gr_main_top_right">
		    <p width="80%"><?php echo ($info["name"]); ?></p>
			<span>级别 :<i><?php echo ($info["agent_level"]); ?></i></span>
		</div>
	</div>
    <div class="gr_main_bottom">
	  <p>
		 <span><?php echo ($info["fid"]); ?></span>
		 <i>上级</i>
	  </p>
	  <p>
		 <span><?php echo ($info["cost"]); ?></span>
		 <i>总消费</i>
	  </p>
	</div>
	<div class="gr_main_list">
	   	<a href="tel://<?php echo ($info["tel"]); ?>"><i class="grl_1"></i><span><?php echo ($info["tel"]); ?></span></a>
	   	<a><i class="grl_2"></i><span><?php echo ($info["wechat"]); ?></span></a>
	   	<?php if($info["level"] != 1): ?><a href="<?php echo U('User/upgrade', array('id'=>$info['id']));?>"><i class="grl_5"></i><span>升级申请</span><p></p></a>
	   	<?php else: endif; ?>
	   	<?php if($info["level"] == 1): ?><a href="<?php echo U('User/orderOnline', array('id'=>$info['id']));?>"><i class="grl_6"></i><span>在线下单</span><p></p></a>
		   	<a href="<?php echo U('User/order', array('id'=>$info['id']));?>"><i class="grl_7"></i><span>我的订单</span><p></p></a>
		<?php else: endif; ?>
	   <a href="<?php echo U('User/editPassword', array('id'=>$info['id']));?>"><i class="grl_4"></i><span>修改密码</span><p></p></a>
	</div>
 </div>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?bf055ca7d3ab1e1971f2b9727b573d8f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>