<?php if (!defined('THINK_PATH')) exit();?>
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
  <form action="<?php echo U('index/seccheck');?>" method="post">
     <table>
	 <tr>
		 <td><p>查询码</p></td>
		 <td><input type="text" name="code" placeholder="请输入查询码" /></td>
	 </tr>
	 </table>
	 <div class="cmx_b" style="width:70%;margin-left:30%;">
	     <a href="javascript:void(0);" class="check">查询</a>
	     <a href="javascript:;" style="float:right;">重置</a>
	 </div>
	 <input type="submit" value="查询"/>
  </form>
</div>

<div class="cxm_t">
      <div class="cxm_t_b">
	       <p>您输入的查询码不正确!</p>
	       <p>该商品已经被查询过，本次是第*次查询，谨防假冒!</p>
	       <p>您输入的查询码不存在，谨防假冒!</p>
	       <a href="javascript:;">确&nbsp;&nbsp;定</a>
	  </div>
</div>
<script>
  $(document).ready(function(){
// $("#check").bind("click", function () {
  	$.ajax({
		type: 'POST',
		url: "<?php echo U('Index/seccheck');?>" ,
        data: { num: $("#txtnum").val() },
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
  });
// $(".check").ready(function(){
// 	var $code = $(".cxm input").val();
// 	alert($code);
// 	$.ajax({
// 		type: "post",
// 		dataType : "json",
// 		global : false,
// 		url : "<?php echo U('Base/getTree');?>",
// 		data : {
// 		user1 : $user1
// 		},
// 		success : function(data, textStatus) {
// 			if (data.status == 0){
// 				zNodes1 = data.data;
// 				$.fn.zTree.init($("#treeDemo"), setting, zNodes1);
// 			} else {
// 				alert("您還沒有");
// 			}
// 			return ;
// 		}
// 	});
// });
</script>
</body>
</html>