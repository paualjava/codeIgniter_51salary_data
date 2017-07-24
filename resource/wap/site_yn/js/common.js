//右侧导航
function moreFloat(_speed){
	var _box = $("#mainout");
	var _float = $("#floatmain");
	var _dis = _float.css("display");
	var _arr = _float.find("a");
	
	if(_box.is(":animated")){_box.stop(true,true);}
	if(_float.is(":animated")){_float.stop(true,true);}
	
	if(_dis == "block"){
		_box.animate({left:"0"},_speed);
	    _float.animate({right:"-50%"},_speed,function(){
	    _float.css("display","none");
		_arr.css("right","-100%");
			 });
		}else{
			_box.animate({left:"-50%"},_speed);
	        _float.css("display","block");
	        _float.animate({right:"0"},_speed);
			
			//进入动画
			var _show = _speed;
			for(var i=0;i<_arr.length;i++){
				_show += 100;
				_arr.eq(i).animate({right:"0"},_show);
				}
			
			}//if判断结束	
}

//首页banner效果
function indexBanner(boxid,sumid,_go,_speed,numid){
	var startX,startY,endX,endY;//定义判断变量
	var _box = document.getElementById(boxid);
	var _sum = $("#"+sumid);
	var _arr = $("#"+sumid+" li");
	var _length = _arr.length;
	var _index = 0;
	var _nexti = 0;
	
	_sum.append(_sum.html());
	_arr = $("#"+sumid+" li");
	
	var _str = "<div id='"+numid+"'><a href='javascript:void(0);' class='sel'></a>";
	for(var i=1;i<_length;i++){
		_str += "<a href='javascript:void(0);'></a>";
		}
	_str += "</div>";
	$("#"+boxid).append(_str);
	var _num = $("#"+numid+" a");
	
	var _width = $(window).width();
	var _resize = function(){
		_width = $(window).width();
		_arr.width(_width);
		var _move = -_width * _index;
		_sum.css("left",_move+"px");
		};
	_resize();
	$(window).resize(function(){_resize();});
	
	var nextImg = function(){
		_index++;
		_nexti++;
		
		if(_index >= _length){
			_index = 0;
			}
		if(_nexti > _length){
			_nexti = _index;
			_sum.css("left","0px");
			}
		if(_sum.is(":animated")){
			_sum.stop(true,true);
			}
		var _move = -_width * _nexti;
		_sum.animate({left:_move+"px"},_go);
		_num.eq(_index).addClass("sel").siblings().removeClass("sel");
	};
	
	var lastImg = function(){
		_index--;
		_nexti--;
		
		if(_index < 0){
			_index = _length-1;
			}
		if(_nexti < 0){
			var _m = -_width * _length;
			_sum.css("left",_m+"px");
			_nexti = _index;
			}
		if(_sum.is(":animated")){
			_sum.stop(true,true);
			}
		var _move = -_width * _nexti;
		_sum.animate({left:_move+"px"},_go);
		_num.eq(_index).addClass("sel").siblings().removeClass("sel");
	};
	
	var cartoon = setInterval(nextImg,_speed);
	
	var touchStart = function(event){
		clearInterval(cartoon);
		var touch = event.touches[0];
        startX = touch.pageX;
		};
	var touchMove = function(event){
		event.preventDefault();//这里很重要！！！
		var touch = event.touches[0];
        endX = (startX-touch.pageX);
		};
	var touchEnd = function(event){
		if(endX > 30){
			nextImg();
			}
		if(endX < -30){
			lastImg();
			}
		cartoon = setInterval(nextImg,_speed);
		};
	
	_box.addEventListener("touchstart", touchStart, false);
    _box.addEventListener("touchmove", touchMove, false);
    _box.addEventListener("touchend", touchEnd, false);
	
}//该方法结束

//页面载入动画
function newEnter(boxid,_name,_class){
	var _box = $("#"+boxid);
	var _arr = _box.find(_name);
	_arr.addClass(_class);
}//END

//展开搜索框
function showSearch(boxid,showid){
	var _dis = $(boxid).css("display");
	if(_dis == "none"){
		$(boxid).slideDown(300);
		$(showid).show(100);
		}else{
			$(boxid).slideUp(300);
			$(showid).hide(300);
			}
	
}

//搜索框部分
function searchTextClear(_name,_text){
	var _obj = $("."+_name);
	_obj.val(_text);
	_obj.click(function(){
		var _now = _obj.val();
		if(_now == _text){
			_obj.val("");
			_obj.css("color","#555");
		}
	});
	_obj.blur(function(){
		var _now = _obj.val();
		if(_now == ""){
			_obj.val(_text);
			_obj.css("color","#999");
		}
	});
}

//网站建设部分
function buildNavShow(boxid){
	var _box = $("#"+boxid);
	var _arr = _box.find("a");
	var _go;
	var _i = 0;
	var _cartoon = function(){
		if(_i >= _arr.length){
			clearTimeout(_go);
			}
		_arr.eq(_i).animate({top:"20px"},300,function(){
			$(this).animate({top:"-10px"},150,function(){
				$(this).animate({top:"0px"},75);
				});
			});
		_go = setTimeout(_cartoon,200);
		_i++;
		};
	_cartoon();
		
}//方法结束
function buildContent(boxid,_name){
	var _box = $("#"+boxid);
	var _arr = _box.find(_name);
	var _go;
	var _i = 0;
	for(var i=0;i<_arr.length;i++){
		_arr.eq(i).css("left","200%");
		_arr.eq(i+1).css("left","-200%");
		i++;
		}
	var _cartoon = function(){
		if(_i >= _arr.length){
			clearTimeout(_go);
			}
		_arr.eq(_i).animate({left:"0px"},500);	
		_go = setTimeout(_cartoon,300);
		_i++;
		};
	_cartoon();
}
