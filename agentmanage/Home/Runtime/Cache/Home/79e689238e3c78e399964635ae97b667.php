<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>

<style type="text/css">
*{ margin:0; padding:0;}
p{ margin:0;}
a{ list-style:none;}
body{ font-family:'Microsoft YaHei'; font-size:12px; background:url(/agentmanage/Public/images/home/chaxunbj.jpg) no-repeat; background-size:100%; color:#fff;}
.header{ width:100%; margin:0 auto; overflow:hidden;}
.header p{ width:70%; margin:20% auto 10%;}
.header p img{ width:100%; margin:0 auto;}
.wenzi{width:70%; margin:20% auto 0; overflow:hidden;}
#duibu1{ width:100%; line-height:25px; font-size:14px;}
#duibu2{ width:100%; line-height:25px; font-size:14px;}
#dier{width:60%;margin:20% 0 0 22%; background:#ff3366; border-radius:20px; border:none; height:50px; color:#fff; font-size:22px;}

</style>

</head>
<body>
<div class="header">
<p>
<img src="/agentmanage/Public/images/home/chaoxunlogo_03.png">
</p>

<div class="wenzi">
<span id="duibu1">对不起，您查询的微信号:  未授权,请谨慎，防止上当受骗！</span>
<!-- <span id="duibu2">恭喜您！您查询的信息:  yww900 是Tstar授权的经销商。请放心购买！</span> -->
</div>
<input type="button" value="查询" id="dier"/>

</div>
</body>
</html>
<script type="text/javascript">
 var kk=document.getElementsByTagName('body')[0];
   kk.style.backgroundColor="#303030";
  
  var aa=document.getElementById('dier');
  aa.addEventListener('click',function(){
	  window.location.href="<?php echo U('Index/index');?>";
	  })

	  	
</script>