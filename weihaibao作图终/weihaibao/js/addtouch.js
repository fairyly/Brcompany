	// <!-- 对添加文字图层绑定touch事件自由拖动 -->

	// 获取节点
	var block = document.getElementById("target");
	var oW,oH;
	// 绑定touchstart事件
	block.addEventListener("touchstart", function(e) {
	console.log(e);
	var touches = e.touches[0];
	oW = touches.clientX - block.offsetLeft;
	oH = touches.clientY - block.offsetTop;
	//阻止页面的滑动默认事件
	document.addEventListener("touchmove",defaultEvent,false);
	},false)

	block.addEventListener("touchmove", function(e) {
	var touches = e.touches[0];
	var oLeft = touches.clientX - oW;
	var oTop = touches.clientY - oH;
	if(oLeft < 0) {
	oLeft = 0;
	}else if(oLeft > document.documentElement.clientWidth - block.offsetWidth) {
	oLeft = (document.documentElement.clientWidth - block.offsetWidth);
	}
	block.style.left = oLeft + "px";
	block.style.top = oTop + "px";
	},false);

	block.addEventListener("touchend",function() {
	document.removeEventListener("touchmove",defaultEvent,false);
	},false);
	function defaultEvent(e) {
	e.preventDefault();
	}


	// 获取节点
	var block2 = document.getElementById("target2");
	var oW2,oH2;
	// 绑定touchstart事件
	block2.addEventListener("touchstart", function(e) {
	console.log(e);
	var touches = e.touches[0];
	oW2 = touches.clientX - block2.offsetLeft;
	oH2 = touches.clientY - block2.offsetTop;
	//阻止页面的滑动默认事件
	document.addEventListener("touchmove",defaultEvent,false);
	},false)

	block2.addEventListener("touchmove", function(e) {
	var touches = e.touches[0];
	var oLeft = touches.clientX - oW2;
	var oTop = touches.clientY - oH2;
	if(oLeft < 0) {
	oLeft = 0;
	}else if(oLeft > document.documentElement.clientWidth - block.offsetWidth) {
	oLeft = (document.documentElement.clientWidth - block.offsetWidth);
	}
	block2.style.left = oLeft + "px";
	block2.style.top = oTop + "px";
	},false);

	block2.addEventListener("touchend",function() {
	document.removeEventListener("touchmove",defaultEvent,false);
	},false);
	function defaultEvent(e) {
	e.preventDefault();
	}
