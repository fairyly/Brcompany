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

	<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<link href="./css/style.css" rel="stylesheet" />
<script src="./css/jquery.js"></script>

</head>
<body>
<img src="./images/title.png"  style="margin-top:15px;"/>
<img src="./images/xt.png" style="margin-top:-5px;"/>
<img src="./images/banner1.png" />
<div class="cxm">
  <form >
     <table>
	 <tr>
		 <td><p>查询码</p></td>
		 <td><input id="txtnum" type="text" placeholder="请输入查询码" /></td>
	 </tr>
	 </table>
	 <div class="cmx_b" style="width:70%;margin-left:30%;">
	     <a href="javascript:void(0);" id="check" >查询</a>
	     <a href="javascript:;" style="float:right;">重置</a>
	 </div>
  </form>
</div>

<div class="cxm_t">
      <div class="cxm_t_b">
	       <p>您输入的查询码不正确!</p>
	       <a href="javascript:;">确&nbsp;&nbsp;定</a>
	  </div>
</div>
<script>
  // $(document).ready(function(){
  //    $(".cmx_b a").eq(1).click(function(){
	 //    $(".cxm input").val("")
	 // })
	 // $(".cxm_t_b a").click(function(){
	 //     $(".cxm_t").css("display","none")
	 // })
	 // $(".cmx_b a").eq(0).click(function(){
	 //     if($(".cxm input").val()==""){
	 //         $(".cxm_t").css("display","block")
	 //     }
		//  else{
		//      window.location.href="2.html";
		//  }
	 // })
  // })
  $(function () {
                $("#check").bind("click", function () {
                	// alert(11111);
                    $.ajax({
                       type:"POST",
                        url:"<?php echo U('index/seccheck');?>",
                       data: { num: $("#txtnum").val() },
                    success: function (data) {
                    	alert(data);
                       if(data){
                         window.location.href="2.html";  
                         } else{
                         	 $(".cxm_t").show();
                         }
                        }
                    });
                })
            });
</script>
</body>
</html>
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