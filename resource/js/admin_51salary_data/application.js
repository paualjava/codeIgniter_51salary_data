//获得选中文件的文件名
function getCheckboxItem()
{
	var allSel="";
	if(document.form2.arcID.value) return document.form2.arcID.value;
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(document.form2.arcID[i].checked)
		{
			if(allSel=="")
				allSel=document.form2.arcID[i].value;
			else
				allSel=allSel+"%60"+document.form2.arcID[i].value;
		}
	}
	return allSel;
}

//获得选中其中一个的id
function getOneItem()
{
	var allSel="";
	if(document.form2.arcID.value) return document.form2.arcID.value;
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(document.form2.arcID[i].checked)
		{
				allSel = document.form2.arcID[i].value;
				break;
		}
	}
	return allSel;
}

function selAll()
{
	for(i=0;i<document.form2.arcID.length;i++)
	{
		if(!document.form2.arcID[i].checked)
		{
			document.form2.arcID[i].checked=true;
		}
		else
		document.form2.arcID[i].checked=false;
	}
}
function delArc(aid,url){
	var qstr=getCheckboxItem();
	if(!qstr)
	{
	alert("请选择要删除的项目");return;
	}
	if(aid==0) aid = getOneItem();
	{

		location=url+"/"+qstr;	
	//location=url+"/"+qstr;	
	
	}
}
function del_item(url, deal_container_id){
    if(confirm("确认删除该记录吗?")){
        $.post(url,{},function(data){							 
            if(data == "ok"){				
                var deal_container = $(deal_container_id);
                deal_container.remove();
            }
        })
    }
}
function this_submit()
{
}

function updateTime(){
        var currentTime = (new Date()).getTime();
        $('span.time_div').each(function(){
            var remainTime = Math.floor((parseInt($(this).attr('alt')) - currentTime)/1E3);
			
            if( remainTime >= 0){
		
                updateDIV($(this),getTimeInfo(remainTime));
            }
        }
        );
    }
function getTimeInfo(remainTime){
        return{
            second:remainTime%60,
            minute:Math.floor(remainTime/60)%60,
            hour:Math.floor(remainTime/3600)%24,
            day:Math.floor(remainTime/86400)
        }
};
function updateDIV(ele,timeInfo){
        ele.html("<em>"+timeInfo.day+"</em>天<em>"+timeInfo.hour+"</em>小时<em>"+timeInfo.minute+"</em>分<em>"+timeInfo.second+"</em>秒");
    };
    $(document).ready(function(){
        updateTime();
        setInterval(updateTime,1000);
    });
	
	
$(document).ready(function(){
    $('a').bind('focus', function(){       
       $(this).blur();
     });
  })


function show_mask()
{
	$("#mask_dialog").html("加载中...");			
	$.post($("#login_url").attr("value")+"/?str="+new Date() , function(result){
	mask_showBg('mask_dialog',result,'mask_fullbg')
	})
}
function ifLogin(){
	var regu =/[\d]{15}[\d]{1,9}[\d]{9}/gi;
	var re = new RegExp(regu);
	return re.test($(".is_login").text());
}

function bindDealConcern(){
    $("a.btnmake").live("click",function(){
        if(!ifLogin()){
			show_mask();
           // window.location.href = $(this).attr("login");
            return false;
        }
		
        var target = $(this);
        target.replaceWith("<span class='btnmake' style='color:#ccc;margin:0 0 0 20px;'>标记收藏</span>");
        $.get($(this).attr("value")+"/?str="+new Date() , function(data){
            if(data == "OK"){
                return;
            }else if(data == "not login"){
                window.location.href = $(".btnshop").attr("login");
            }else if(data == "failure"){
                alert("您已经添加过,感谢您的关注");
            }
        })
    })
}
bindDealConcern();

function bindBuy(){
    $("a.btnshop").live("click",function(){
										 
        if(!ifLogin()){
			show_mask();
           // window.location.href = $(this).attr("login");
            return false;
        }
        var target = $(this);
        target.replaceWith("<span class='btnshop' style='color:#ccc;margin:0 0 0 20px;'>标记购买</span>");
        $.get($(this).attr("value")+"/?str="+new Date() , function(data){
            if(data == "OK"){
               alert("添加成功,感谢您的关注");
            }else if(data == "not login"){
                window.location.href = $(".btnshop").attr("login");
            }else if(data == "failure"){
                alert("您已经添加过,感谢您的关注");
            }
        })
    })
}
bindBuy();
function bindDealConcern2(this_click){
		
	
        if(!ifLogin()){
			show_mask();
			return ;
        }
		else
		{

        var target = $(this_click);
        target.replaceWith("<span class='btnmake2' style='color:#ccc;'>标记收藏</span>");
        $.get($(this_click).attr("value")+"/?str="+new Date() , function(data){
            if(data == "OK"){
                alert("添加成功");
            }else if(data == "not login"){
                window.location.href = $(".btnshop2").attr("login");
            }else if(data == "failure"){
                alert("您已经添加过,感谢您的关注");
            }
       
    })
		}
}


function bindBuy2(this_click){
	
								 
        if(!ifLogin()){
			show_mask();
			return ;        
        }
		else{
        var target = $(this_click);
        target.replaceWith("<span class='btnshop2' style='color:#ccc;'>标记购买</span>");
        $.get($(this_click).attr("value")+"/?str="+new Date() , function(data){
            if(data == "OK"){
               alert("添加成功");
            }else if(data == "not login"){
                window.location.href = $(".btnshop2").attr("login");
            }else if(data == "failure"){
                alert("您已经添加过,感谢您的关注");
            }
        })
		}
 
}

//显示灰色JS遮罩层 
function mask_showBg(ct,content,mask_fullbg){
	var bH=$("body").height();
	var bW=$("body").width();
	var objWH=mask_getObjWh(ct);
	$("#"+mask_fullbg).css({width:bW,height:bH,display:"block"});
	var tbT=objWH.split("|")[0]+"px";
	var tbL=objWH.split("|")[1]+"px";
	$("#"+ct).css({top:tbT,left:tbL,display:"block"});
	$("#"+ct).html(content);
	$(window).scroll(function(){mask_resetBg(ct,mask_fullbg)});
	$(window).resize(function(){mask_resetBg(ct,mask_fullbg)});
}
//显示灰色JS遮罩层 
function mask_showBg2(ct,content,mask_fullbg){
	var bH=$("body").height();
	var bW=$("body").width();
	var objWH=mask_getObjWh(ct);
	$("#"+mask_fullbg).css({width:bW,height:bH,display:"block"});
	var tbT=objWH.split("|")[0]+"px";
	var tbL=objWH.split("|")[1]+"px";
	$("#"+ct).css({top:tbT,left:tbL,display:"block"});	
	$("#icon_text").hide();

	faver_content();
	
	$(window).scroll(function(){mask_resetBg(ct,mask_fullbg)});
	$(window).resize(function(){mask_resetBg(ct,mask_fullbg)});
}
function mask_getObjWh(obj){
	var st=document.documentElement.scrollTop;//滚动条距顶部的距离
	var sl=document.documentElement.scrollLeft;//滚动条距左边的距离
	var ch=document.documentElement.clientHeight;//屏幕的高度
	var cw=document.documentElement.clientWidth;//屏幕的宽度
	var objH=$("#"+obj).height();//浮动对象的高度
	var objW=$("#"+obj).width();//浮动对象的宽度
	var objT=Number(st)+(Number(ch)-Number(objH))/2;
	var objL=Number(sl)+(Number(cw)-Number(objW))/2;
	return objT+"|"+objL;
}
function mask_resetBg(mask_dialog,mask_fullbg){
	var mask_fullbg_css=$("#"+mask_fullbg).css("display");
	if(mask_fullbg_css=="block"){
		var bH2=$("body").height();
		var bW2=$("body").width();
		$("#"+mask_fullbg).css({width:bW2,height:bH2});
		var objV=mask_getObjWh(mask_dialog);
		var tbT=objV.split("|")[0]+"px";
		var tbL=objV.split("|")[1]+"px";
		$("#"+mask_dialog).css({top:tbT,left:tbL});
	}
}
//关闭灰色JS遮罩层和操作窗口
function mask_closeBg(mask_dialog,mask_fullbg){
	$("#"+mask_dialog).css("display","none");
	$("#"+mask_fullbg).css("display","none");
	$("#icon_text").show();
}
