// JavaScript Document
$(document).ready(function(){
	var timerId = null;
	function itemShow(){
		if (timerId) return;
		timerId = setInterval(function(){
			$("#feature li.current h3 b").animate({top: "-60px" }, "fast");
			$("#feature li.current h3 span").animate({top: "-60px" }, "fast");
		}, 200);
	}
	function itemHide(){
		if (!timerId) return;
		$("#feature li.current h3 b").animate({top: "0px" }, "fast");
		$("#feature li.current h3 span").animate({top: "0px" }, "fast");
		$("#feature li.current").removeClass("current");
		clearInterval(timerId);
		timerId = null;
	}
	$("#feature li").hover(function(){
		$(this).addClass("current");
		itemShow();
	}, itemHide);
});