<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<title>T-star代理商平台</title>
<link href="/agentmanage/Public/stylesheets/home/style.css" rel="stylesheet" />
<script src="/agentmanage/Public/javascripts/home/jquery.js"></script>
<script src="/agentmanage/Public/javascripts/home/main.js"></script>
</head>
<body>

	 <div class="in_main y_main">
      <div class="y_main_content">
	      <a href="<?php echo U('authapply');?>">授权申请</a>
		  <a href="<?php echo U('auth');?>">授权查询</a>
		  <a href="<?php echo U('security');?>" style="margin-top:25px;">防伪查询</a>
		  <a href="<?php echo U('seccode');?>" style="margin-top:25px;">防伪查询</a>
		  <a href="<?php echo U('login');?>" style="margin-top:25px;">升级/查询 登录</a>
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