<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<link href="/agentmanage/Public/stylesheets/home/style1.css" rel="stylesheet" />
<script src="/agentmanage/Public/javascripts/home/jquery.js"></script>
<style type="text/css">


</style>
</head>
<body>
<div class="header">
    <a href="javascript:history.back()"></a>
	 T-star代理商管理平台
 </div>
<div class="main_dj">
  <div class="main_dj_title">
		<p>授权证书办理(登记)</p>
		<span>授权授权，规范管理，统一培训...(先登记信息，即将上线 "授权查询" "快递查询" "学习平台" 等系统)</span>
		<span>注 : 每人只可以提交一次，重复提交将不审核，需要升级，请提交时候加上备注说明!</span>
  </div>
  <div class="main_dj_content">
      <form action="<?php echo U('Index/authdeal');?>" method="post" enctype="multipart/form-data">
	      <div class="main_content_top">
				 <p>姓名<i>*</i></p>
				 <input type="text" name="name" placeholder="请输入您的姓名"/>
				 <span class="yanzheng"><i>&nbsp;</i>请填写姓名</span>
				 <p>手机号<i>*</i></p>
				 <input type="text" name="phonenum" placeholder="请输入您的手机号" />
				 <span class="yanzheng"><i></i>请填写手机号</span>
				 <p>微信号<i>*</i></p>
				 <input type="text" name="wechatnum" placeholder="请输入您的微信号" />
				 <span class="yanzheng"><i></i>请填写微信号</span>
				 <p>身份证号<i>*</i></p>
				 <input type="text" name="idnum" placeholder="请输入您身份证号" />
				 <span class="yanzheng"><i></i>请填写身份证号</span>
				 <p>收货地址<i>*</i></p>
				 <input type="text" name="applyadd" placeholder="请输入您的收货地址" />
				 <span class="yanzheng"><i></i>请填写收货地址</span>
		    </div>
		 
		 <div class="main_content_bottom">
		    <p>授权级别<i>*</i></p>
			<span>乱选择代理级别，与打款截图不符合者拉黑，不再审核!</span>
      <select name="level" class="select_agent" style="margin-top:5px;">
        <option value="0" selected="selected" >请选择</option>
        <option value="1"><span>全国总代</span></option>
        <option value="2"><span>一级代理商</span</option>
        <option value="3"><span>二级代理商</span></option>
        <option value="4"><span>特约代理商</span></option>
      </select>
			<!-- <div class="main_sel main_se1_1">
			    <p><input type="radio" name="level" value="1"/><span>全国总代</span></p>
				<p><input type="radio" name="level" value="2"/><span>一级代理商</span></p>
				<p><input type="radio" name="level" value="3"/><span>二级代理商</span></p>
				<p><input type="radio" name="level" value="4"/><span>特约代理商</span></p>
			</div> -->
			<p>上家姓名<i>*</i></p>
			<span>请填写上家真实姓名，关系到授权真假</span>
			<input type="text" name="fname" />
			<span class="yanzheng"><i></i>请填写上家姓名</span>
			
			<p>上家手机号<i>*</i></p>
			<span>请确认上家已办理授权，否则无法办理</span>
			<input type="text" name="fwechatnum" />
			<span class="yanzheng"><i></i>请填写上家微信号</span>
      <p>选择对接助理<i>*</i></p>
      <span>请联系上家确认对接助理!</span>
      <select name="people" class="select_agent">
        <option value="0" selected="selected">请选择</option>
        <option value="4">泡沫</option>
        <option value="5">耀支</option>
        <option value="7">小雪</option>
        <option value="8">玲玲</option>
        <option value="9">芦兰</option>     
      </select>
			<p>打款截图<i>*</i></p>
			<span>微信 "钱包" 点击右上角有 "交易记录" ;支付宝左上角 "帐单" 可查询交易记录</span>
            <div class="up_img">
						<div class="tu">
						   <div class="din">
								<div id="preview">
									<img id="imghead" width=50 height=50  >
								</div>
									 
									 <div class="file"> 
									   <input type="file" name="payment1" onchange="previewImage(this)" /> 
									</div> 
									<span id="chong" style="display:none">重新选择</span>  
									<div id="tupian"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.7em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
							</div> 

							<div id="din1" style="display:none">
								<div id="preview1">
									<img id="imghead1" width=50 height=50  >
								</div>
							 
								 <div class="file"> 
								<input type="file" name="payment2" onchange="previewImage1(this)" /> 
								</div> 
								<span id="chong1" style="display:none">重新选择</span> 
								<span id="shan1" style="display:none">删除</span>
								<div id="tupian1"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.7em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
							</div>     

							
							<div id="din2" style="display:none">
								<div id="preview2">
									<img id="imghead2" width=50 height=50  >
								</div>
							 
								 <div class="file"> 
								<input type="file" name="payment3" onchange="previewImage2(this)" /> 
								</div> 
								<span id="chong2" style="display:none">重新选择</span>
								<span id="shan2" style="display:none">删除</span>  
								<div id="tupian2"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.7em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
							</div>
							
							<div id="din3" style="display:none">
								<div id="preview3">
									<img id="imghead3" width=50 height=50  >
								</div>
								 
								 <div class="file"> 
								<input type="file" name="payment4" onchange="previewImage3(this)" /> 
								</div> 
								<span id="chong3" style="display:none">重新选择</span> 
								<span id="shan3" style="display:none">删除</span> 
								<div id="tupian3"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.7em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
							</div>
							
							<div id="din4" style="display:none; ">
								<div id="preview4">
									<img id="imghead4" width=50 height=50  >
								</div>
								<div class="file"> 
									<input type="file" name="payment5" onchange="previewImage4(this)" /> 
								</div> 
								   <span id="chong4" style="display:none">重新选择</span> 
								   <span id="shan4" style="display:none">删除</span> 
								<div id="tupian4"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.7em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
							</div>
						</div>				
				<span class="yanzheng"><i></i>请选择打款截图</span>
            </div>	
            <p>备注</p><input type="text" name="content"/>
            <input type="submit" class="submit"  value="提 交" />			
		</div>
	  </form>
  </div>
</div>
<div class="ps_img">
      <img src="#" />
</div>
<script>
    $(document).ready(function(){
	  $(".main_se1_1 input").click(function(){
	    if($(this).attr("checked")=="checked"){
		   $(".main_se1_1 p").css({"background":"url(/agentmanage/Public/images/home/iconfont-danxuanweixuanzhong.png) left center no-repeat","backgroundSize":"20px auto"});
		   $(this).parent("p").css({"background":"url(/agentmanage/Public/images/home/iconfont-radiochecked.png) left center no-repeat","backgroundSize":"20px auto"});
		}
	  })
	  
	  $(".main_sel_2 input").click(function(){
	    if($(this).attr("checked")=="checked"){
		   $(".main_sel_2 p").css({"background":"url(/agentmanage/Public/images/home/iconfont-danxuanweixuanzhong.png) left center no-repeat","backgroundSize":"20px auto"});
		   $(this).parent("p").css({"background":"url(/agentmanage/Public/images/home/iconfont-radiochecked.png) left center no-repeat","backgroundSize":"20px auto"});
		}
	  })
	  $(".up_img_box img").click(function(){
	    var up_img=$(this).attr("src");
		$(".ps_img").css("display","block");
		$(".ps_img img").attr("src",up_img);
		$("body").css({"height":"100%","overflow":"hidden"})
	    var up_imgheight=$(".ps_img img").height();
		var bodyh=window.innerHeight;
		$(".ps_img img").css("marginTop",(bodyh-up_imgheight)/2)
	  })
	  $(".ps_img").click(function(){
	   $(this).css("display","none")
	   $("body").css({"height":"auto","overflow":"auto"})
	  })
	  $("[type=text]").blur(function(){
	    if($(this).val()==""){
		  $(this).next(".yanzheng").css("display","block")
		  $(this).css("border","1px solid #FF2851")
		}
		else{
		  $(this).next(".yanzheng").css("display","none")
		  $(this).css("border","1px solid #C3C9D0")
		}
	  })
	})

</script>
<script type="text/javascript">
var   flag1=0;   
  var   flag2=0;   
    
  function   NumberInc()   
  {   
      if(flag1==1   &&   flag2==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag1==1)   
              {   
                  document.all.TextBox1.value++;   
                  setTimeout("NumberInc()",100);   
              }   
              if(flag2==1)   
              {   
                  document.all.TextBox1.value--;   
                  setTimeout("NumberInc()",100);   
              }   
      }   
  }   
    
  function   md(obj)   
  {   
    if(obj.id=="Button1")   flag1=1;   
    if(obj.id=="Button2")   flag2=1;   
    NumberInc();   
  }   
    
  function   mo(obj)   
  {   
    if(obj.id=="Button1")   flag1=0;   
    if(obj.id=="Button2")   flag2=0;   
  }   
 var   flag3=0;   
  var   flag4=0;           
  function   NumberInc1()   
  {   
      if(flag3==1   &&   flag4==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag3==1)   
              {   
                  document.all.TextBox2.value++;   
                  setTimeout("NumberInc1()",100);   
              }   
              if(flag4==1)   
              {   
                  document.all.TextBox2.value--;   
                  setTimeout("NumberInc1()",100);   
              }   
      }   
  }   
    
  function   md1(obj)   
  {   
    if(obj.id=="Button3")   flag3=1;   
    if(obj.id=="Button4")   flag4=1;   
    NumberInc1();   
  }   
    
  function   mo1(obj)   
  {   
    if(obj.id=="Button3")   flag3=0;   
    if(obj.id=="Button4")   flag4=0;   
  } 
  
   var   flag5=0;   
  var   flag6=0;           
  function   NumberInc2()   
  {   
      if(flag5==1   &&   flag6==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag5==1)   
              {   
                  document.all.TextBox3.value++;   
                  setTimeout("NumberInc2()",100);   
              }   
              if(flag6==1)   
              {   
                  document.all.TextBox3.value--;   
                  setTimeout("NumberInc2()",100);   
              }   
      }   
  }   
    
  function   md2(obj)   
  {   
    if(obj.id=="Button5")   flag5=1;   
    if(obj.id=="Button6")   flag6=1;   
    NumberInc2();   
  }   
    
  function   mo2(obj)   
  {   
    if(obj.id=="Button5")   flag5=0;   
    if(obj.id=="Button6")   flag6=0;   
  } 
  
   var   flag7=0;   
  var   flag8=0;           
  function   NumberInc3()   
  {   
      if(flag7==1   &&   flag8==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag7==1)   
              {   
                  document.all.TextBox4.value++;   
                  setTimeout("NumberInc3()",100);   
              }   
              if(flag8==1)   
              {   
                  document.all.TextBox4.value--;   
                  setTimeout("NumberInc3()",100);   
              }   
      }   
  }   
    
  function   md3(obj)   
  {   
    if(obj.id=="Button7")   flag7=1;   
    if(obj.id=="Button8")   flag8=1;   
    NumberInc3();   
  }   
    
  function   mo3(obj)   
  {   
    if(obj.id=="Button7")   flag7=0;   
    if(obj.id=="Button8")   flag8=0;   
  } 
      
	 
	   shan1.addEventListener('click',function(){
		var shan1=document.getElementById('shan1');
		var din1=document.getElementById('din1'); 
		   din1.style.display='none';
		   })
	   shan2.addEventListener('click',function(){
		  var shan2=document.getElementById('shan2');
		  var din2=document.getElementById('din2');
		  din2.style.display='none'; 
		   })
	   shan3.addEventListener('click',function(){
		   var shan3=document.getElementById('shan3');
		   var din3=document.getElementById('din3');
		   din3.style.display='none';
		   })
		shan4.addEventListener('click',function(){
			var shan4=document.getElementById('shan4');
			var din4=document.getElementById('din4');
			din4.style.display='none';
			})
	           
        function previewImage(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview');
		  var chong=document.getElementById('chong');
		  var tupian=document.getElementById('tupian');
		   var din1=document.getElementById('din1');
		   tupian.style.display='none';
		  chong.style.display='block';
		  din1.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
		
		                  //图片上传预览    IE是用了滤镜。
        function previewImage1(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview1');
		  var chong=document.getElementById('chong1');
		  var tupian=document.getElementById('tupian1');
		   var din2=document.getElementById('din2');
		    var shan1=document.getElementById('shan1');
		   tupian.style.display='none';
		  chong.style.display='block';
		  din2.style.display='block';
		  shan1.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead1>';
              var img = document.getElementById('imghead1');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead1>';
            var img = document.getElementById('imghead1');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }


	 		                  //图片上传预览    IE是用了滤镜。
        function previewImage2(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview2');
		  var chong=document.getElementById('chong2');
		  var tupian=document.getElementById('tupian2');
		   var din3=document.getElementById('din3');
		   var shan2=document.getElementById('shan2');
		   tupian.style.display='none';
		   shan2.style.display='block';
		  chong.style.display='block';
		  din3.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead2>';
              var img = document.getElementById('imghead2');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead2>';
            var img = document.getElementById('imghead2');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
		
				                  //图片上传预览    IE是用了滤镜。
        function previewImage3(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview3');
		  var chong=document.getElementById('chong3');
		  var tupian=document.getElementById('tupian3');
		   var din4=document.getElementById('din4');
		   var shan3=document.getElementById('shan3');
		   tupian.style.display='none';
		  chong.style.display='block';
		  shan3.style.display='block';
		  din4.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead3>';
              var img = document.getElementById('imghead3');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead3>';
            var img = document.getElementById('imghead3');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
		
		
				                  //图片上传预览    IE是用了滤镜。
        function previewImage4(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview4');
		  var chong=document.getElementById('chong4');
		  var tupian=document.getElementById('tupian4');
		  var shan4=document.getElementById('shan4');
		   tupian.style.display='none';
		  chong.style.display='block';
		  shan4.style.display='block';
		  
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead4>';
              var img = document.getElementById('imghead4');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead4>';
            var img = document.getElementById('imghead4');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
      

      //count
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