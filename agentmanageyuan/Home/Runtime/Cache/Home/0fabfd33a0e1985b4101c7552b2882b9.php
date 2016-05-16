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

	<div class="in_main">
  <div class="in_main_top">
     <img src="/agentmanage/Public/images/home/in_main_top.jpg" />
  </div>
  <div class="in_main_bottom">
     <img src="/agentmanage/Public/images/home/in_main_bottom.png" />
      <div class="in_main_bottom_content">
	      <form action="<?php echo U('Login/index');?>" method="post" onsubmit="javascript:return validatemobile()"> 
		     <table>
			    <tr>
				   	<td class="c_left"><span>&nbsp;</span></td><td class="c_right"><input type="text" name="username" id="username" placeholder="1**********"/></td>
				</tr>
			    <tr>
				   	<td class="c_left c_leftb"><span>&nbsp;</span></td><td class="c_right"><input type="password" name="password" id="password"placeholder="●●●●●●●●" /></td>
				</tr>
			    <tr>
				   <td align="center"><span style="text-align:center;margin-bottom:-25px;">验证码</span></td>
				   <td class="c_right"><input type="text" name="vcode" /></td><td class="c_right"><img src="<?php echo U('verifyCode');?>"  title="看不清？单击此处刷新" onclick="this.src+='?rand='+Math.random();"  style="cursor: pointer; vertical-align: middle;"/></td>
				</tr>
			 </table>
			 <input type="submit" value="登  录" />
			 <p>忘记密码请联系您的上级!</p>
		 </form>
	  </div>
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