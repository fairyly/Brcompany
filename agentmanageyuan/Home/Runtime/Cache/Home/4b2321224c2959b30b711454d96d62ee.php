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

	<style type="text/css">
body{background:#F0E9E9;}
</style>
	<div class="header">
		<a href="javascript:history.back()"></a>T-star代理商管理平台
	</div>
	<div class="dl_main">
		<div class="dl_main_select">
			<a href="#">已发货</a>
			<a href="#">待发货</a>
		</div>
			<div class="select_list">
		<?php if(is_array($sents)): $k = 0; $__LIST__ = $sents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sent): $mod = ($k % 2 );++$k;?><div class="dl_main_list">
					<div class="dl_main_list_top"  onclick="javascript:openDIV(<?php echo ($k); ?>,'<?php echo ($sent["ShipperCode"]); ?>','<?php echo ($sent["sentNumber"]); ?>')">
						<div class="dl_main_list_top_left">
							<p><?php echo ($sent["day"]); ?></p>
							<span><?php echo ($sent["moth"]); ?>月</span>
						</div>
						<div class="dl_main_list_top_center">
							<p><?php echo ($sent["recman"]); ?>:<?php echo ($sent["recadd"]); ?></p>
							<p>4/4s:<?php echo ($sent["four"]); ?> 5/5s:<?php echo ($sent["five"]); ?> 6/6s:<?php echo ($sent["six"]); ?> 6p/6sp:<?php echo ($sent["sixp"]); ?></p>
							<p>快递 :<span><?php echo ($sent["sentCompany"]); ?></span>运单号 :<span><?php echo ($sent["sentNumber"]); ?></span></p>
						</div>
						<div class="dl_main_list_more">
							<p class="ak">&nbsp;</p>
						</div>
					</div>

					<div id="chaxun_sent<?php echo ($k); ?>" style="display:none;">
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="select_list">
		<?php if(is_array($nosents)): $i = 0; $__LIST__ = $nosents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nosent): $mod = ($i % 2 );++$i;?><div class="dl_main_list">
					<div class="dl_main_list_top">
						<div class="dl_main_list_top_left">
							<p><?php echo ($nosent["day"]); ?></p>
							<span><?php echo ($nosent["moth"]); ?>月</span>
						</div>
						<div class="dl_main_list_top_center">
							<p><?php echo ($nosent["recman"]); ?>:<?php echo ($nosent["recadd"]); ?></p>
							<p>4/4s:<?php echo ($nosent["four"]); ?> 5/5s:<?php echo ($nosent["five"]); ?> 6/6s:<?php echo ($nosent["six"]); ?> 6p/6sp:<?php echo ($nosent["sixp"]); ?></p>
							<p>暂无快递/物流信息！</span></p>
						</div>
						<div class="dl_main_list_more">
							<p class="ak">&nbsp;</p>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
	</div>
<script type="text/javascript">
function openDIV(index,sentCompany,sentNumber){
	var vvv=document.getElementById('chaxun_sent'+index);
	if($("#chaxun_sent"+index)[0].style.display =='none'){
		getSentInfo(sentCompany,sentNumber,index);
		$("#chaxun_sent"+index).show();
	}else{
		$("#chaxun_sent"+index).hide();
	}
}
 
function getSentInfo(sentCompany,sentNumber,index){
	$.ajax({
		type: 'POST',
		url: "<?php echo U('User/getSentInfo');?>" ,
		data: {sentCompany:sentCompany, sentNumber:sentNumber},
		dataType:'json',
		success:function(data) {  
			data=eval('(' + data + ')');
			// alert(data["state"]);
			$("#chaxun_sent"+index).html("");
			$.each(data.Traces, function(i,val){    
			// $("#chaxun_sent"+index).append(val.AcceptTime+" "+val.AcceptStation+"<br>");
			$("#chaxun_sent"+index).append("<p>"+val.AcceptTime+" "+val.AcceptStation+"</p>");
			// alert(val);
			});
			$("#chaxun_sent"+index).append("<font color='red'><p>以上是最新物流信息！</p></font>");
		},  
		error : function() {
			alert("异常！");  
		}	  
	});
}
</script>
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