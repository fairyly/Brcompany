$(document).ready(function(){
	$(".a11").hide();
	$(".a1").click(function(){
		if($("#p1").hasClass("p1")){
			$(".a11").slideToggle();
			$(".a11").css("background-color","#F0F0F1");
			$("#p1").addClass("p2").removeClass("p1");
		}else{
			$(".a11").slideToggle();
			$("#p1").addClass("p1").removeClass("p2");
		}
	});
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
	 
	 // $(".gr_main_list a").click(function(){
	 //   $(this).css("background","white").siblings("a").css("background","white")
	 // })
  })
  	   