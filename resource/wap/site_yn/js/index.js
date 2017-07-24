$(document).ready(function(){
   indexNavShow();
   indexCaseShow();
   indexNewsShow();
   indexTeamShow();
   indexAdvShow();
});

//导航栏部分
function indexNavShow(){
	var _box = $("#indexnav");
	var _arr = _box.find("a");
	var _go;
	var _i = 0;
	/*var _cartoon = function(){
		if(_i >= _arr.length){
			clearTimeout(_go);
			}
		_arr.eq(_i).addClass("show");
		_go = setTimeout(_cartoon,200);
		_i++;
		};*/
	var _cartoon = function(){
		if(_i >= _arr.length){
			clearTimeout(_go);
			}
		_arr.eq(_i).animate({right:"40px"},300,function(){
			$(this).animate({right:"-20px"},150,function(){
				$(this).animate({right:"0px"},75);
				});
			});
		_go = setTimeout(_cartoon,200);
		_i++;
		};
	_cartoon();
		
}//方法结束

function indexCaseShow(){
	var _box = $("#indexcase");
	var _trarr = _box.find("tr");
	var _length = _trarr.length;
	var _maxtop = 50;
	var _i = 1;
	
	for(var i=1;i<_trarr.length;i++){
		var _arr = _trarr.eq(i).find("a");
		if(i%2 == 0){
			_arr.css("left","500%");
			}else{
				_arr.css("left","-500%");
				}
		}// for END
	
	$(window).scroll(function(){
		var _now = $(window).scrollTop();
		if(_now >= _maxtop && _i == 1){
			var _go;
			var _cartoon =function(){
				if(_i >= _length){
			       clearTimeout(_go);
			       }
				_trarr.eq(_i).find("a").animate({left:"0px"},400);
				_go = setTimeout(_cartoon,200);
				_i++;
				};//_cartoon END
			_cartoon();
			
		}
	});//scroll END
	
	
}//END

function indexNewsShow(){
	var _box = $("#indexnews");
	var _trarr = _box.find("tr");
	var _length = _trarr.length;
	var _maxtop = 400;
	var _i = 1;
	
	$(window).scroll(function(){
		var _now = $(window).scrollTop();
		if(_now >= _maxtop && _i == 1){
			var _go;
			var _cartoon = function(){
				if(_i >= _length){
			       clearTimeout(_go);
			       }
				_trarr.eq(_i).find("a").animate({left:"0px"},400);
				_go = setTimeout(_cartoon,200);
				_i++;
				};
			_cartoon();
			}//if END
		});//scroll END
		
}

function indexTeamShow(){
	var _box = $("#indexteam");
	var _trarr = _box.find("a");
	var _length = _trarr.length;
	var _maxtop = 800;
	var _i = 1;
	
	$(window).scroll(function(){
		var _now = $(window).scrollTop();
		if(_now >= _maxtop && _i == 1){
			var _go;
			var _cartoon = function(){
				if(_i >= _length){
			       clearTimeout(_go);
			       }
				_trarr.eq(_i).animate({left:"0px",top:"0px"},400);
				_go = setTimeout(_cartoon,200);
				_i++;
				};
			_cartoon();
			}//if END
		});//scroll END
		
}

function indexAdvShow(){
	var _box = $("#indexadv");
	var _trarr = _box.find("a");
	var _length = _trarr.length;
	var _maxtop = 1050;
	var _i = 1;
	
	$(window).scroll(function(){
		var _now = $(window).scrollTop();
		if(_now >= _maxtop && _i == 1){
			var _go;
			var _cartoon = function(){
				if(_i >= _length){
			       clearTimeout(_go);
			       }
				_trarr.eq(_i).animate({left:"-30px"},400,function(){
					$(this).animate({left:"0px"},150);
					});//animate END
				_go = setTimeout(_cartoon,200);
				_i++;
				};
			_cartoon();
			}//if END
		});//scroll END
		
}