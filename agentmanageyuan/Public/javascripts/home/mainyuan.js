$(document).ready(function(){
    var h=window.innerHeight;
	var w=window.innerWeight;
	$(".in_main").css({"height":h,"width":w})
	$(".dl_main_list_top").click(function(){
	  $(this).siblings(".dl_main_list_bottom").slideToggle(400);
	  var blockh=$(this).siblings(".dl_main_list_bottom").height()
	  if(blockh<19){
	    $(this).find(".dl_main_list_more p").removeClass("ak as").addClass("an").addClass("ad")
		
	  }
	  else{
	    $(this).find(".dl_main_list_more p").removeClass("ad an").addClass("as").addClass("ak")
	  }
	})
	 $(".select_list").eq(0).css("display","block")
	 $(".dl_main_select a").eq(0).css({"background":"#4fb9ff","color":"white"})
	 $(".dl_main_select a").eq(0).click(function(){
	    $(this).css({"background":"#4fb9ff","color":"white"}).siblings("a").css({"background":"white","color":"#4fb9ff"})
	    $(".select_list").eq(0).css("display","block").siblings(".select_list").css("display","none")
	 })
	 $(".dl_main_select a").eq(1).click(function(){
	    $(this).css({"background":"#4fb9ff","color":"white"}).siblings("a").css({"background":"white","color":"#4fb9ff"})
	    $(".select_list").eq(1).css("display","block").siblings(".select_list").css("display","none")
	 })
	 
	 $(".gr_main_list a").click(function(){
	   $(this).css("background","white").siblings("a").css("background","white")
	 })
  })
  	   
<!---商品加减-->
		$(document).ready(function(){
			var yigong=0;
		
		  $(".box1 .j").click(function(){
			     var ti=$(this).parents(".chanping_box").find(".b_title").text();
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			  	 var left_num=$(this).siblings(".s");
			     left_num.val(parseInt(left_num.val())-20);
				 var lefs=parseInt(left_num.val());
				 if(left_num.val()<=0){
					 left_num.val(0); 
					 $(".box1 .j").unbind("click")
				  $(".boxb1").css("display","none")

				 }
				 else{
					 $(".boxb1").css("display","block")
					 $(".heji").css("display","block")
					 $(".boxb1>span").text(ti);
					 $(".boxb1 .shu").text(lefs);
					 $(".boxb1 .jiage").text(jiage)
					 $(".boxb1 .he_1").text(jiage*lefs)

				} 
				      yigong=yigong-parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				 });
				
	      $(".box1 .jia").click(function(){
			   var left_num=$(this).siblings(".s");
			    var ti=$(this).parents(".chanping_box").find(".b_title").text();
				
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			     left_num.val(parseInt(left_num.val())+20);
			
				 var s=left_num.val();
				 var lefs=parseInt(left_num.val());
				  zongjia=0+jiage*lefs;
		         if(left_num.val()<=0){
					 left_num.val(0); 
				 $(".boxb1").css("display","none")

				 }
				 else{
					 $(".boxb1").css("display","block")
					 $(".heji").css("display","block")
					 $(".boxb1>span").text(ti);
					 $(".boxb1 .shu").text(lefs);
					 $(".boxb1 .jiage").text(jiage)
					 $(".boxb1 .he_1").text(jiage*lefs)
					
				} 
				 yigong=yigong+parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
		  })	 
		  $(".box2 .j").click(function(){
			     
			     var ti=$(this).parents(".chanping_box").find(".b_title").text();
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			  	 var left_num=$(this).siblings(".s");
			     left_num.val(parseInt(left_num.val())-20);
				 var lefs=parseInt(left_num.val());
		
				 if(left_num.val()<=0){
					 left_num.val(0); 
					  $(".box2 .j").unbind("click")
				 $(".boxb2").css("display","none")
				 }
				 else{
					 $(".boxb2").css("display","block")
					 $(".heji").css("display","block")
					 $(".boxb2>span").text(ti);
					 $(".boxb2 .shu").text(lefs);
					 $(".boxb2 .jiage").text(jiage)
					 $(".boxb2 .he_1").text(jiage*lefs)
					
				} 
				  yigong=yigong-parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				 });
				
	      $(".box2 .jia").click(function(){
			   var left_num=$(this).siblings(".s");
			    var ti=$(this).parents(".chanping_box").find(".b_title").text();
				
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			     left_num.val(parseInt(left_num.val())+20);
			
				 var s=left_num.val();
				 var lefs=parseInt(left_num.val());
				  zongjia=0+jiage*lefs;
		          if(left_num.val()<=0){
					 left_num.val(0); 
				 $("..boxb2").css("display","none")
				 }
				 else{
					 $(".boxb2").css("display","block")
					 
					 $(".heji").css("display","block")
					 $(".boxb2>span").text(ti);
					 $(".boxb2 .shu").text(lefs);
					 $(".boxb2 .jiage").text(jiage)
					 $(".boxb2 .he_1").text(jiage*lefs)
					
				} 
				  yigong=yigong+parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				
		  })	 
	 
		 	$(".box3 .j").click(function(){
			     
			     var ti=$(this).parents(".chanping_box").find(".b_title").text();
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			  	 var left_num=$(this).siblings(".s");
			     left_num.val(parseInt(left_num.val())-20);
				 var lefs=parseInt(left_num.val());
		
				 if(left_num.val()<=0){
					 left_num.val(0); 
					  $(".box3 .j").unbind("click")
				 $(".boxb3").css("display","none")
				 }
				 else{
					 $(".boxb3").css("display","block")
					 $(".heji").css("display","block")
					 $(".boxb3>span").text(ti);
					 $(".boxb3 .shu").text(lefs);
					 $(".boxb3 .jiage").text(jiage)
					 $(".boxb3 .he_1").text(jiage*lefs)
					
				} 
				  yigong=yigong-parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				 });
				
	      $(".box3 .jia").click(function(){
			   var left_num=$(this).siblings(".s");
			    var ti=$(this).parents(".chanping_box").find(".b_title").text();
				
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			     left_num.val(parseInt(left_num.val())+20);
			
				 var s=left_num.val();
				 var lefs=parseInt(left_num.val());
				  zongjia=0+jiage*lefs;
		          if(left_num.val()<=0){
					 left_num.val(0); 
				 $("..boxb3").css("display","none")
				 }
				 else{
					 $(".boxb3").css("display","block")
					 
					 $(".heji").css("display","block")
					 $(".boxb3>span").text(ti);
					 $(".boxb3 .shu").text(lefs);
					 $(".boxb3 .jiage").text(jiage)
					 $(".boxb3 .he_1").text(jiage*lefs)
					
				} 
				  yigong=yigong+parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				
		  })	


	$(".box4 .j").click(function(){
			     
			     var ti=$(this).parents(".chanping_box").find(".b_title").text();
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			  	 var left_num=$(this).siblings(".s");
			     left_num.val(parseInt(left_num.val())-20);
				 var lefs=parseInt(left_num.val());
		
				 if(left_num.val()<=0){
					 left_num.val(0); 
					  $(".box4 .j").unbind("click")
				 $(".boxb4").css("display","none")
				 }
				 else{
					 $(".boxb4").css("display","block")
					 $(".heji").css("display","block")
					 $(".boxb4>span").text(ti);
					 $(".boxb4 .shu").text(lefs);
					 $(".boxb4 .jiage").text(jiage)
					 $(".boxb4 .he_1").text(jiage*lefs)
					
				} 
				  yigong=yigong-parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				 });
				
	      $(".box4 .jia").click(function(){
			   var left_num=$(this).siblings(".s");
			    var ti=$(this).parents(".chanping_box").find(".b_title").text();
				
				 var jiage=$(this).parents(".chanping_box").find("i").text();
				
				 var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
			     left_num.val(parseInt(left_num.val())+20);
			
				 var s=left_num.val();
				 var lefs=parseInt(left_num.val());
				  zongjia=0+jiage*lefs;
		          if(left_num.val()<=0){
					 left_num.val(0); 
				 $("..boxb3").css("display","none")
				 }
				 else{
					 $(".boxb4").css("display","block")
					 
					 $(".heji").css("display","block")
					 $(".boxb4>span").text(ti);
					 $(".boxb4 .shu").text(lefs);
					 $(".boxb4 .jiage").text(jiage)
					 $(".boxb4 .he_1").text(jiage*lefs)
					
				} 
				  yigong=yigong+parseInt(jiage*20);
					  $(".heji_bottom i").eq(1).text(yigong)
				
		  })		  
			
		})
function validatemobile() {
  var myreg = /^1[358]{1}[0-9]{1}[0-9]{8}$|17[0678]{1}[0-9]{8}$|147[0-9]{8}$/; 
  if(!myreg.test($("#username").val())){ 
    alert('请输入有效的手机号码！'); 
    return false; 
  }
  if($("#password").val()==""){
    alert('请输入密码！'); 
    return false;
  }   
} 

function checkPass(){
    if($("#pass").val()==""){
	   alert("新密码不能为空");
	  return false;
	}
	if($("#rpass").val()==""){
	  alert("确认新密码不能为空");
	  return false;
	}
   if($("#pass").val()!=$("#rpass").val()){
      alert("两次密码不一致，请重新输入");
	  $("#pass").val("");
	  $("#rpass").val("");
      return false;
   }
}

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
		url: "{:U('User/getSentInfo')}" ,
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
  	   