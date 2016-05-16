<?php if (!defined('THINK_PATH')) exit();?>﻿
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<link href="/agentmanage/Public/stylesheets/home/security.css" rel="stylesheet" />
<script src="/agentmanage/Public/javascripts/home/jquery.js"></script>
</head>
<body>
	
<img src="/agentmanage/Public/images/home/banner2.png" />
<div class="zp">
 <div class="zp_z">
    &nbsp;&nbsp;查询结果 :&nbsp;&nbsp;正品
 </div>
 <div class="zp_content">
    <span>尊敬的顾客 :</span>
	<span>欢迎您购买T-STAR系列产品 !</span>
	<span>天地星是一家集研发、生产、销售手机配件产品于一体的多元化经营企业 ，其生产销售的产品均获得省市及国家级本门质检证书及研发专利证书 , 拥有20年手机通讯领域从业经验 , 产品质量及产品品质有保障 。</span>
 </div>
 <img src="/agentmanage/Public/images/home/zp.png" />
 <img src="/agentmanage/Public/images/home/title.png" />
</div>
<div class="cxm_t">
      <div class="cxm_t_b">
	       <p></p>
	       <a style="cursor:pointer">确&nbsp;&nbsp;定</a>
	  </div>
   </div>
<script>
	$(document).ready(function(){ 
        var urlinfo=window.location.href; //获取当前页面的url 
		var len=urlinfo.length;//获取url的长度 
		var offset=urlinfo.indexOf("?");//设置参数字符串开始的位置 
		var newsidinfo=urlinfo.substr(offset,len)//取出参数字符串 这里会获得类似“id=1”这样的字符串 
		var newsids=newsidinfo.split("=");//对获得的参数字符串按照“=”进行分割 
		var newsid=newsids[1];//得到参数值 
		var decodedUrl = decodeURIComponent(newsid);
        console.log(decodedUrl);
		
		// alert("您要传递的参数值是"+decodedUrl); 
		// var url = location.search; //获取url中"?"符后的字串
		// var info=${url.val()};
		 $("p").text(decodedUrl);
	    $(".cxm_t").show();
	    $("a").click(function(){
	    	$(".cxm_t").hide();
	    })
	    // window.setTimeout($(".cxm_t").hide(),2000); 
	});
</script>
</body>
</html>