// <div class="s">0</div>

$(document).ready(function(){
    var h=window.innerHeight;
	var w=window.innerWeight;
	$(".in_main").css({"height":h,"width":w})
	$(".dl_main_list_top").click(function(){
	  	$(this).siblings(".dl_main_list_bottom").slideToggle(400);
	  	var blockh=$(this).siblings(".dl_main_list_bottom").height()
	  	if(blockh<19){
	    	$(this).find(".dl_main_list_more p").removeClass("ak as").addClass("an").addClass("ad")
	  	}else{
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

	//商品加减
	var yigong=0;
	$(".box1 .j").click(function(){
     	var ti=$(this).parents(".chanping_box").find(".b_title").text();
	 	var jiage=$(this).parents(".chanping_box").find("i").text();
	 	var kucong=$(this).parents(".chanping_box").find(".kc").text(); 
  	 	var left_num=$(this).siblings(".s");
     	left_num.text(parseInt(left_num.text())-20);
	 	var lefs=parseInt(left_num.text());
	 	if(left_num.text()<=0){
		 	left_num.text(0); 
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
	     	left_num.text(parseInt(left_num.text())+20);
		 	var s=left_num.text();
		 	var lefs=parseInt(left_num.text());
		  	zongjia=0+jiage*lefs;
         	if(left_num.text()<=0){
			 	left_num.text(0); 
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
     	left_num.text(parseInt(left_num.text())-20);
	 	var lefs=parseInt(left_num.text());

	 	if(left_num.text()<=0){
		 	left_num.text(0); 
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
     	left_num.text(parseInt(left_num.text())+20);
	 	var s=left_num.text();
	 	var lefs=parseInt(left_num.text());
	  	zongjia=0+jiage*lefs;
      	if(left_num.text()<=0){
		 	left_num.text(0); 
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
     	left_num.text(parseInt(left_num.text())-20);
	 	var lefs=parseInt(left_num.text());
	 	if(left_num.text()<=0){
		 	left_num.text(0); 
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
     	left_num.text(parseInt(left_num.text())+20);
	 	var s=left_num.text();
	 	var lefs=parseInt(left_num.text());
	  	zongjia=0+jiage*lefs;
      	if(left_num.text()<=0){
		 	left_num.text(0); 
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
     	left_num.text(parseInt(left_num.text())-20);
	 	var lefs=parseInt(left_num.text());
	 	if(left_num.text()<=0){
		 	left_num.text(0); 
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
     	left_num.text(parseInt(left_num.text())+20);
	 	var s=left_num.text();
	 	var lefs=parseInt(left_num.text());
	  	zongjia=0+jiage*lefs;
      	if(left_num.text()<=0){
		 	left_num.text(0); 
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
