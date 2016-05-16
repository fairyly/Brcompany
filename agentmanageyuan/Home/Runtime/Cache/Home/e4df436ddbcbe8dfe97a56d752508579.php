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

	<div class="header">
    <a href="javascript:history.back()"></a>
	T-star代理商管理平台
 </div>
 <div class="x_main">
      <div class="x_main_content">
	     <div class="x_main_content_t">
		    修改密码
		 </div>
		 <form action="<?php echo U('User/editPassword',array('id'=>$_GET['id']));?>" method="post" onsubmit="return checkPass()">
		   <table>
		      <tr>
			     <td class="x_table"><span>输入密码 :</span></td>
				 <td class="y_table"><input type="password" name="pass" id="pass"/></td>
			  </tr>
			  
			  <tr>
			     <td class="x_table"><span>再输一次 :</span></td>
				 <td class="y_table"><input type="password" name="rpass" id="rpass"/></td>
			  </tr>
		   </table>
		   <input type="submit" value="确认修改" />
		 </form>
	  </div>
	  <div class="x_main_box" style="display:none;">
	     <p>
		     <span>修改成功!</span>
		 </p>
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