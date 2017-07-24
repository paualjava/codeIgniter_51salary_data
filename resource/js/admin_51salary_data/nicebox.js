//判断浏览器
var ua = navigator.userAgent.toLowerCase(), check = function(r){return r.test(ua);}, 
isMoz = check(/firefox/) && !check(/(compatible|webkit)/),
isChrome = check(/chrome/),
isOpera = check(/opera/),
isSafari = !isChrome && check(/safari/),
isIE = !isOpera && check(/msie/),
isIE6= !isOpera && check(/msie 6/);

function $G(id){return typeof(id)=="string"?document.getElementById(id):id;}
function $N(name, obj){
	obj=obj||document;
	return typeof(name)=="string"?obj.getElementsByName(name):name;
}
function $T(tagname, obj){
	obj=obj||document;
	return typeof(tagname)=="string"?obj.getElementsByTagName(tagname):name;
}

//中间消息提示效果(可回调)
function showTip(str,callback){
	if(!str)return;
	$("#messinfo").html('<img src="/images/site_ico_01.gif" align="absmiddle"> '+str);
	$("#messinfo").stop().fadeIn('slow').delay(3000).hide('normal',function(){if(typeof(callback)=='function')callback();});
}
//底部状态条
function showmsg(str){$("#winzardinfotext").html(str);}

//显示隐藏元素
function showHide(o){$G(o).style.display=$G(o).style.display==''?'none':'';}

//显示隐藏左边栏
function switchLeft(id1,id2) {
	$G(id1).className=$G(id1).className=='tol'? 'tor':'tol';
	$G(id2).style.display= $G(id2).style.display==''? 'none':'';
}

//添加事件
function addEventHandler(oTarget, sEventType, fnHandler){
	if (oTarget.addEventListener){
		oTarget.addEventListener(sEventType, fnHandler, false);
	}else if(oTarget.attachEvent){
		oTarget.attachEvent("on" + sEventType, fnHandler);
	}else{
		oTarget["on" + sEventType] = fnHandler;
	}
}

//移除事件
function removeEventHandler(oTarget, sEventType, fnHandler){
	if (oTarget.removeEventListener){
		oTarget.removeEventListener(sEventType, fnHandler, false);
	}else if(oTarget.detachEvent){
		oTarget.detachEvent("on" + sEventType, fnHandler);
	}else{
		oTarget["on" + sEventType] = null;
	}
}

function setCookie (name, value) {
    var the_date = new Date("December 31, 2023");
    var the_cookie_date =the_date.toGMTString();
    document.cookie = "expires=" + Date;
    document.cookie = name + "=" + escape(value);
}

/* 选择图片 @Jin
** callback可用于前三个参数 eg: selectImg(callback);or selectImg(target, callback); or selectImg(target,previewId,callback);
* target: id || obj  目标
* call:   id || obj || callback	 预览<img>的id/obj 或者选择图片后回调	
* type:	  null || 2 || callback 哪一个图片选择器
* imgPath：是否选中
* handleImg: 是否显示图片加工
*/
function selectImg(target, call, type, handleImg) {
	var topFix=$G('infoSub1')?'0':'100';
	var to = "";
	if(type==2){
		var suffix = $G(target).value?"?imgPath="+$G(target).value+(handleImg?"":"&handleImg=false"):(handleImg?"":"?handleImg=false");
		to = "iframe:/editor/picbrowse/browse2.htm" + suffix;
	}else{
		to = "iframe:/editor/picbrowse/browse.htm" + ($G(target).value?"?imgPath="+$G(target).value:"");
	}
	dialog(to, {title:'选择图片',width:'755',top:topFix},function(){
		if(!dialogVal) return;
		if(typeof(target)=='function'){
			call=target; //选择完后直接callback
		}else{
			if($G(target)) $G(target).value = dialogVal;
		}
		switch(typeof call){
			case 'undefined': break;
			case 'string':
			case 'object': 
				if(call!='' ||call!=null){
					if($G(call).tagName=='IMG') {
						$G(call).src=dialogVal;
					} else {
						$G(call).style.backgroundImage='url('+dialogVal+')';
					}
				}
				break;
			case 'function': call(); break;
		}
		if(typeof(type)=='function') type();
	});
}
function selectFlash(target,call) {
	var topFix=$G('infoSub1')?'0':'100';
	dialog("iframe:/chooseFlash.php",{title:'选择Flash',width:'500',top:topFix},function(){
		if(!dialogVal) return;
		$G(target).value = dialogVal;
		if(typeof(call)=="function"){
			call();
		}
	});
}
//选择内部页面 @Jin
function selectPage(target,widthint,heightint){
	var topFix=$G('mod')?'0':'100';
	if(widthint==undefined) widthint = 280;
	if(heightint==undefined) heightint = 440;
	
	dialog('iframe:/editor/dialog/hyperlink_get3.php',{title:'选择内部页面',width:widthint,height:heightint,top:topFix},function(){
		if(!dialogVal) return;
		$G(target).value=dialogVal;
	});
}
/*把input转换成combox(页面选择器) @JIn
* 示例：$('#d_url').combox();
*/
$.fn.combox= function(callback){
	var input=$(this);
	if(input.length==0) return;
	if(!$('body').data('select')){
		$.get('/selectPage.php',{},function(data){$('body').data('select',data); createCombox();});
	}else{
		createCombox();
	}
	function createCombox(){
		var width=input.width()||parseInt(input.css('width'))||300;
		var select=$('body').data('select');
		var ifr=$.browser.msie&&$.browser.version=='6.0'? "<iframe frameborder='0' scrolling='no' style='width:"+(width-13)+"px;height:18px;position:absolute;left:1px;top:1px;z-index:1;filter:alpha(opacity=0)'></iframe>":"";
		input.css({width:(width-11)+'px',height:'18px',lineHeight:'18px',position:'absolute',zIndex:'2',top:'2px',marginTop:'-1px',left:'1px',padding:'0px',border:'0px'}).wrap("<div style='display:inline-block;*display:inline;zoom:1;position:relative'></div>").before(select).after(ifr);
		input.prev('select').css({width:(width+8)+'px',fontFamily:'arial'});
		if(typeof callback=='function') callback();
	}
}

/*
弹出层 @Jin
content  => "url:get?test.php?id=1&act=add" / "text:string" / "id:testID" / "iframe:test.php"	[四选一]
params	 => {title:'string',width:'500px',height:'400px',top:'0',scrolling:'no'}	可选（参数对象/空）
callback => function(){...}		可选(关闭dialog时执行)
返回值：dialogVal
*/
var dialogVal; //用于dialog内部向外传值
function dialog(content,params,callback){
	dialogVal='';params=params||{};
	if($('#dialog').length==0){
		var ifr=isIE6? "<iframe frameborder='0' width='100%' height='100%' style='filter:alpha(opacity=0);'></iframe>":""; //fix IE6
		var _temp="<div id='dialogBg' style='height:"+$(document).height()+"px;filter:alpha(opacity=0);opacity:0;'>"+ifr+"</div><div id='dialog' class='dialog'><div class='title'><h4></h4><span class='close' title='关闭'>×</span></div><div class='content'></div></div>";
		$("body").append(_temp);
	}
	var B=$("#dialogBg"),D=$("#dialog"),C=$("div.content", D);
	var defaults={title:'', width:'600', height:'auto', top:'100', scrolling:'', padding:'10'}; //定义默认参数
	var opt= $.extend(defaults,params);
	var match=/([\w]{2,6})(?::)(.*)/.exec(content);
	function init(){
		$("div.title>h4", D).html(opt.title);
		if(!parseInt(opt.padding)) C.css('padding','0'); //内容区域padding值
		switch(match[1]){
		  case "url":
			  var contentArr=match[2].split("?");
			  C.ajaxStart(function(){$(this).html("Loading...");});
			  $.ajax({type:contentArr[0],url:contentArr[1],data:contentArr[2],error:function(){C.html("Error!");},success:function(html){C.html(html);}});break;
		  case "text":C.html(match[2]);break;
		  case "id":C.html($("#"+match[2]).html()==""?$("#"+match[2]).attr("value"):$("#"+match[2]).html());break;
		  case "id2": C.html($("#"+match[2]).contents().detach()); break; //剪切内容
		  case "iframe":C.html("<iframe src='"+match[2]+"' width='100%' height='"+(parseInt(opt.height)-45)+"'"+" scrolling='"+(opt.scrolling?opt.scrolling:(opt.height=='auto'?'no':opt.scrolling))+"' style='overflow-x:hidden' frameborder='0' marginheight='0' marginwidth='0'></iframe>");break;
		}
		if(opt.height=='auto'&&match[1]=='iframe')C.find('iframe').load(function(){$(this).css({height:$(this).contents().find("body").attr('scrollHeight')+'px'});}); //iframe自适应
		show();
		$("span.close", D).one('click',close);
	}
	function show(){
		B.show().animate({opacity:"0.5"},300);
		C.css({height: opt.height=='auto'? 'auto' : (parseInt(opt.height)-45)+'px'});
		D.css({left:'50%',marginLeft:-(parseInt(opt.width)/2)-8+"px",top:$(document).scrollTop()+parseInt(opt.top)+"px",width:parseInt(opt.width)+'px',height:opt.height=='auto'?'auto': parseInt(opt.height)+'px'}).show();
	}
	function close(){
		if(match[1]=='id2') $("#"+match[2]).html(C.contents()); //还原内容
		if(typeof(callback)=='function')callback();
		D.hide();
		B.animate({opacity:"0"},300,function(){$(this).hide();});
	}
	init();
}
dialog.close=function(){$('#dialog').find('span.close').click();};
dialog.refresh=function(min){
	var iframe=$("#dialog").find("div.content").find('iframe');
	if(iframe.length>0){
		iframe.height(1).height(iframe.contents().find('body').attr('scrollHeight'));
		if(min) if(iframe.height()<min) iframe.height(min); //如果设置了最小高度
	}
};