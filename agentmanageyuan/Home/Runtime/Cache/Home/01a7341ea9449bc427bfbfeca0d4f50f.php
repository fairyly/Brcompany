<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<title>T-star代理商平台</title>
<link href="/agentmanage/Public/stylesheets/home/style.css" rel="stylesheet" />
<!-- <link href="/agentmanage/Public/stylesheets/home/style1.css" rel="stylesheet" />
<link href="/agentmanage/Public/stylesheets/home/style2.css" rel="stylesheet" /> -->
<script src="/agentmanage/Public/javascripts/home/jquery.js"></script>
<script src="/agentmanage/Public/javascripts/home/main.js"></script>
</head>
<body>

	<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>在线下单</title>
<link href="/agentmanage/Public/stylesheets/home/font-awesome.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
*{ margin:0; padding:0;}
a{ text-decoration:none;}
body{ font-family:'Microsoft YaHei'; font-size:12px; background:#f1eff5;}
.ding{ width:100%; margin:0 auto;}
.ding h2{ width:100%;  background:#4bc1d2; text-align:center; height:50px; line-height:50px; color:#fff;}
.ding1{ width:10px; margin-left:10px; float:left; color:#fff;}
.ding2{ width:90%; margin:3% auto 0; background:#fff; overflow:hidden; padding:3%;}
.ding2 h2{color:#4bc1d2; margin-top:3%;}
.form { margin-top:5%; border-top:1px solid #4bc1d2;}
.form input,.jibie{width:70%; margin-top:3%; margin-left:2%; height:26px; border:1px solid #cdcdcd; border-radius:4px; }
.top{ width:90%; margin:0 auto;}
.form p{ margin-top:10%; color:#2f2e2e; }
.span,.span1,.span2,.span3{ width:95%; margin-left:2%; color:#6b6b6b; font-size:12px; }
#form7 input,#form8 input{ width:50%}
#form1,#form2,#form3,#form4,#form5,#form6,#form8,#form9{ width:100%; background:url(/agentmanage/Public/images/home/01_03.png) left center no-repeat; text-indent:12px; color:#000; font-size:14px; }
#form7{ width:100%;  color:#000; font-size:14px; }
.dan{ width:95%; margin:3% auto 0; font-size:18px; }
.dan input{ width:15px; height:15px;  }
.xuan{ margin:5% auto 0; color:#4bc1d2; font-size:16px; width:70%;}
.dakuab{ width:85%; margin:1% auto 0; font-size:12px; color:#a5a8aa; overflow:hidden}
.din{ position:relative;width:100%;height:50px; float:left; border:1px dashed #333;}
#din1,#din2,#din3,#din4{position:relative;width:100%;height:50px; float:left;  border:1px dashed #333; overflow:hidden}
#preview,#preview1,#preview2,#preview3,#preview4{width:100px;height:50px;overflow:hidden;}
#imghead,#imghead1,#imghead2,#imghead3,#imghead4 {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
.file{ width:100%; height:50px; opacity:0; position:absolute; top:0; left:0; z-index:3}
.file input{width:100%; height:50px; cursor:pointer}
#chong,#chong1,#chong2,#chong3,#chong4{ position:absolute; top:14px; right:60px; color:#4bc1d2; width:50px; font-size:12px;}
#shan1,#shan2,#shan3,#shan4{ position:absolute; top:14px; right:10px; width:40px; font-size:12px; color:#F00; z-index:10; cursor:pointer; }
#tupian,#tupian1,#tupian2,#tupian3,#tupian4{ position:absolute; z-index:1; top:0px; left:0px;}
#tupian i,#tupian1 i,#tupian2 i,#tupian3 i,#tupian4 i{ font-size:24px; margin:12px 0 0 12px; color:#999 }
.tu{ width:90%; margin:5% auto 0;}
#form12{ margin-top:5%; width:100%; font-size:16px; color:#2f2e2e; }
#form12 textarea{ width:80%; font-size:12px; margin:3% 0 0 5% }
#form10{width:100%; background:url(/agentmanage/Public/images/home/01_03.png) left center no-repeat; text-indent:12px; overflow:hidden ; margin:30% auto 0;}
.image{ width:100%; margin:5% auto 0; overflow:hidden;}
.image dl{ width:45%; border:1px solid #dad9d9; float:left; padding:3px; background:#f0f0f0;}
.image dl dt{ width:100%; background:#fff;}
.image dl dt p{ width:100%; text-align:center; padding-bottom:8px;}
.image dl dt img { width:100%;}
.image dl dd{ width:100% ; margin:2% auto 0; text-align:center; padding-bottom:10px;}
.jia input,.jia2 input{ width:15%;}
.jia1 input{ width:40%}
#form13{ width:100% ; margin:5% auto 0; border-top:1px solid #4bc1d2; padding-top:20px; text-align:center}
#form13 input{ width:40%; border:none;  background:#4bc1d2; height:50px; font-size:24px; color:#FFF; border-radius:8px; }
@media screen and ( max-width:350px){
	.image dl{ width:95%; border:1px solid #dad9d9; margin:5% auto 0;padding:3px; background:#f0f0f0; }
	}
</style>

</head>
<body>
<div class="ding">
<h2><a href="<?php echo U('User/index', array('id'=>$_GET['id']));?>" class="ding1"> <i class="fa fa-arrow-left"></i></a>代理商管理系统</h2>
</div>
<div class="ding2">
<h2>iPhone防护衣订单</h2>

<div class="form">
<form action="<?php echo U('User/onlineadd', array('id'=>$_GET['id']));?>" method="post" enctype="multipart/form-data">
<div class="top">
<p id="form1">收件人姓名</p>
<input type="text" id="kuang" name="pickname" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
<p id="form2">收件人手机号</p>
<input type="text" id="kuang" name="picktel" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">
<p id="form3">收件地址</p>
<input type="text" id="kuang" name="pickadd" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')">

 
<!-- <p id="form7">同意建议配货比例？</p> 
<span class="span1">是否同意建议配货比例，选“是”就无需点击下方选择</span> 
<div class="dan">
<input type="radio" name="cargoscale" id="shi" value="1"/>
<label for="shi">是</label><br>
<input type="radio" name="cargoscale" id="fu" value="0"/>
<label for="fu">否</label>

</div> -->


<p id="form9">上传支付截图 </p>
<span class="span2">上传支付截图或者聊天记录</span>
<div class="tu">
<div class="din">
<div id="preview">
    <img id="imghead" width=50 height=50  >
</div>
     
     <div class="file"> 
    <input type="file" name="payment1" onchange="previewImage(this)" /> 
    </div> 
    <span id="chong" style="display:none">重新选择</span>  
    <div id="tupian"><i class="fa fa-arrows"></i></div>
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
    <div id="tupian1"><i class="fa fa-arrows"></i></div>
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
    <div id="tupian2"><i class="fa fa-arrows"></i></div>
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
    <div id="tupian3"><i class="fa fa-arrows"></i></div>
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
    <div id="tupian4"><i class="fa fa-arrows"></i></div>
    </div>
</div>
<div id="form10">配货比例</div> 
<span class="span3">建议配货比例：总代200/200/160/40；一级40/40/30/10；二级7/7/4/2；特约/1/1/1/1</span> 
<div  class="image">
<dl>
<dt><img src="/agentmanage/Public/images/home/6splus.jpg"><p>iPhone6 plus/6s plus</p></dt>
<dd>
<span class="jia">        
 <span class="jia1"><input id="TextBox1"   name="sixp" runat="server"   Width="50"   CssClass="mybutton"   Text=0> </span>
  <input type="button"   ID="Button1"     value="＋"   onMouseDown="md(this)"   onMouseOut="mo(this)"  onMouseUp="mo(this)"    >     
  <input type="button"   ID="Button2"     value="－"   onMouseDown="md(this)"   onMouseOut="mo(this)"   onMouseUp="mo(this)"   >   
</span>
</dd>
</dl>

<dl>
<dt><img src="/agentmanage/Public/images/home/6s.jpg"><p>iPhone6/6s</p></dt>
<dd>
<span class="jia">        
<span class="jia1"> <input id="TextBox2"   name="six" runat="server"   Width="50"   CssClass="mybutton"   Text=0> </span>
  <input type="button"   ID="Button3"     value="＋"   onMouseDown="md1(this)"   onMouseOut="mo1(this)"  onMouseUp="mo1(this)"      >     
  <input type="button"   ID="Button4"     value="－"   onMouseDown="md1(this)"   onMouseOut="mo1(this)"  onMouseUp="mo1(this)"    >   
</span>
</dd>
</dl>

<dl>
<dt><img src="/agentmanage/Public/images/home/5s.jpg"><p>iPhone5/5s</p></dt>
<dd>
<span class="jia">        
<span class="jia1"> <input id="TextBox3"   name="five" runat="server"   Width="50"   CssClass="mybutton"   Text=0> </span>
  <input type="button"   ID="Button5"     value="＋"   onMouseDown="md2(this)"   onMouseOut="mo2(this)"  onMouseUp="mo2(this)"      >     
  <input type="button"   ID="Button6"     value="－"   onMouseDown="md2(this)"   onMouseOut="mo2(this)"  onMouseUp="mo2(this)"    >   
</span>
</dd>
</dl>

<dl>
<dt><img src="/agentmanage/Public/images/home/4s.jpg"><p>iPhone4/4s</p></dt>
<dd>
<span class="jia">        
<span class="jia1"> <input id="TextBox4"   name="four" runat="server"   Width="50"   CssClass="mybutton"   Text=0> </span>
  <input type="button"   ID="Button7"     value="＋"   onMouseDown="md3(this)"   onMouseOut="mo3(this)"  onMouseUp="mo3(this)"      >     
  <input type="button"   ID="Button8"     value="－"   onMouseDown="md3(this)"   onMouseOut="mo3(this)"  onMouseUp="mo3(this)"    >   
</span>
</dd>
</dl>

</div>


<div id="form12">备注<br>
<span class="span1">特殊情况请在此处填写，例如：快递</span><br>
<textarea name="content" cols="60" rows="5" onKeyUp="if(this.value.length > 30) this.value=this.value.substr(0,40)"></textarea>
</div>

</div>
<p id="form13"><input type="submit" value="提交"></p>

</form>
</div>
</div>
</body>
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
    

</script>
</html>


</body>
</html>