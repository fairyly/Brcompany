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
<img src="/agentmanage/Public/images/home/title.png"  style="margin-top:15px;"/>
<img src="/agentmanage/Public/images/home/xt.png" style="margin-top:-5px;"/>
<img src="/agentmanage/Public/images/home/banner1.png" />
<div class="cxm">
    <form  id="form1" name="form1">
     <table>
	 <tr>
		 <td><p>查询码</p></td>
		 <td><input id="txtnum" type="text" name="code" placeholder="请输入查询码" /></td>
	 </tr>
	 </table>
	 <div class="cmx_b" style="width:70%;margin-left:30%;">
	     <a class="check" style="cursor:pointer">查询</a>
	     <a href="javascript:freset(document.form1);" style="float:right;">重置</a>
	     <script language="javascript">
			function freset(obj){
			obj.reset();
			}
		</script>
	 </div>
	<!--  <input class="check" type="submit" value="查询"/> -->
    </form>
</div>

<div class="cxm_t">
      <div class="cxm_t_b">
	       <p><span></span></p>
	       <a href="">确&nbsp;&nbsp;定</a>
	  </div>
</div>
<script>
  $(document).ready(function(){ 
   $("a.check").bind("click", function () {
  	$.ajax({
		type: "post",
		url: "<?php echo U('Index/seccheck');?>",
        data: { num: $("#txtnum").val() },
		dataType:"json",
		success:function(data) {  
			 
			 // var mess=JSON.parse(data); 
			  console.log(data.status);
			if(data.status==1){
				
                                var url = data.info;

                                 var encodedUrl = encodeURIComponent(url);
                                 console.log(encodedUrl);
				window.location.href="2.html?info="+encodedUrl;
                 } else if(data.status==2){
                 	$("span").text(data.info);
                 	 $(".cxm_t").show();
                }else{$("span").text(data.info);
                 	 $(".cxm_t").show();
                 	}
		},  
		error : function() {
			console.log("获取data错误");
			alert("异常");  
		}	  
	  });
   });
});
</script>
</body>
</html>