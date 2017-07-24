<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<title>后台管理</title>
<script type="text/javascript" src="<?php echo $site_url;?>resource/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>resource/js/<?php echo $admin_dir;?>/admin.js"></script>
<script type="text/javascript" src="<?php echo $site_url;?>resource/js/application.js"></script>
<script src="<?php echo $site_url?>resource/js/<?php echo $admin_dir;?>/table.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $site_url?>resource/js/<?php echo $admin_dir;?>/nicebox.js"></script>
<link rel="stylesheet" href="<?php echo $site_url?>resource/css/<?php echo $admin_dir;?>/admin_index.css" type="text/css">
<link rel="stylesheet" href="<?php echo $site_url?>resource/css/<?php echo $admin_dir;?>/v5.style.css" type="text/css">
<div id="top">
  <div id="smenu" style="float:left;">
    <div class="stitle"> &nbsp; &nbsp; 后台管理系统</div>
  </div>
  <div id="link" style="float:left;">
    <ul class="menu">
<!--menu_top-->
				<?php if(role("page_info_list")){?>
          <li>
  <iframe frameborder=0></iframe>
  <a href="<?php echo $admin_url;?>page_info" class="top_class" target="main"><span>页面管理<font class="enarr">&nbsp;</font></span></a>
  <ul class="dmenu">
          <li><a href="javascript:" url='page_info' target="main">页面管理</a></li>
          </ul>
</li><?php }?>
				<?php if(role("about_us_list")){?>
          <li>
  <iframe frameborder=0></iframe>
  <a href="<?php echo $admin_url;?>about_us" class="top_class" target="main"><span>关于我们<font class="enarr">&nbsp;</font></span></a>
  <ul class="dmenu">
          <li><a href="javascript:" url='about_us' target="main">关于我们</a></li>
          </ul>
</li><?php }?><?php if($admin_role_id==1){?><li>
  <iframe frameborder=0></iframe>
  <a href="<?php echo $admin_url;?>manager" class="top_class" target="main"><span>管理员设置<font class="enarr">&nbsp;</font></span></a>
  <ul class="dmenu">
    <li><a href="javascript:" url="manager" target="main">管理员设置</a></li>
    <li><a href="javascript:" url="manager_role" target="main">角色管理</a></li>
  </ul>
</li>
<?php }?>
<li>
  <iframe frameborder=0></iframe>
  <a href="<?php echo $admin_url;?>setting_wap" class="top_class" target="main"><span>手机设置<font class="enarr">&nbsp;</font></span></a>
  <ul class="dmenu">
  <li><a href="javascript:" url="setting_wap" target="main">手机设置</a></li>
    <li><a href="javascript:" url="slide_wap" target="main">首页滑动图</a></li>
  </ul>
</li><!--menu_top_end-->
    </ul>
  </div>
  <div style="z-index:10000;text-align:right;"> 欢迎: <?php echo $admin_name;?> &nbsp; <a href="<?php echo $admin_url?>logout" onclick="javascript:return confirm('确认要退出吗');"><img src="<?php echo $site_url?>resource/images/admin_51salary_data/quit.gif" border="0" align="absmiddle">退出</a> &nbsp; <a href="<?php echo $web_url;?>" target="_blank" style="color:#fff">网站首页</a> </div>
</div>
<!--[if IE 6]><script src="/js/pngfix.js"></script><![endif]--> 
<script>
$(function ()
{
	$(".dmenu>li>a").click(function ()
	{	
		$(this).parent().parent().find("a").removeClass("on");
		$(this).addClass("on");
		//$(".menu_left").html($(this).parent().parent().html());
		$(this).parent().parent().hide();		
		if($(this).attr("url"))
		window.frames["main"].location.href="<?php echo $admin_url?>"+$(this).attr("url");
	}),
	$(".top_class").click(function ()
	{	
		$(this).parent().find(".dmenu").find("li").find("a").removeClass("on");
		$(this).parent().find(".dmenu").find("li").eq(0).find("a").addClass("on");
		//$(".menu_left").html($(this).parent().find(".dmenu").html());
		console.log($(this).parent().find(".dmenu").html());
		if($(this).attr("url"))
		window.frames["main"].location.href="<?php echo $admin_url?>"+$(this).attr("url");
	}),
	$(".menu_left>li>a").live("click",function ()
    {
        $(".menu_left a").removeClass("on");
		$(this).addClass("on");
		window.frames["main"].location.href="<?php echo $admin_url?>"+$(this).attr("url");
    })     
})
$(function(){
	window_height=$(window).height()-100+"px"
	$("#main").css("height",window_height);
	var alldmenu= $('#link').find('ul.dmenu,dl.dmenu2');
	var ddmenu2= alldmenu.filter('dl.dmenu2');
	alldmenu.parent().hover(
		function(){
			var dmenu=$(this).children().eq(2);
			if(isIE6){
				$(this).children('iframe').css({display:'block',height:dmenu.height()});
			}
			dmenu.delay(50).slideDown(100);
			$(this).children('a').addClass('cur');
		},
		function(){
			var dmenu=$(this).children().eq(2);
			dmenu.stop(true,true).fadeOut(50);
			$(this).children('a').removeClass('cur');
			if(isIE6){
				$(this).children('iframe').css({display:'none'});
			}
		}
	);
	$('dd',ddmenu2).hover(
		function(){$(this).addClass('hover');},
		function(){$(this).removeClass('hover');}
	);
});
</script>
<div id="menuline" class="topextend"></div>
<!--首页开始-->
<div id="main" style="padding-top:10px;">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td id="leftlist" valign="top" width="130"><ul class="menu_left">
      <!--menu_left-->
          <?php if(role("page_info_list")){?><li><a href="javascript:" url="page_info" target="main">页面管理</a></li><?php }?>
          <?php if(role("about_us_list")){?><li><a href="javascript:" url="about_us" target="main">关于我们</a></li><?php }?><!--menu_left_end-->
       
        </ul>

       </td>
      <td valign="top" width="15"><div id="sh" class="tol" onclick="switchLeft('sh','leftlist')" title="点击切换" style="margin-top:20px;"></div></td>
      <td valign="top" style="padding-right:6px;"><iframe frameborder="0" id="main" name="main" src="<?php echo $admin_url?><?php echo $start;?>" scrolling="yes" style="height:753px; visibility: inherit; width: 100%; z-index: 1;overflow: auto;border:solid 1px #C0C9D5;text-align:left;margin:0 0 0 1px;"></iframe></td>
    </tr>
  </table>
</div>

<div id=bottom><?php echo $year=date("Y",time());?>Copy Right &copy;  <?php echo $year-8;?>--<?php echo $year;?> </div>
<script type="application/javascript">
$(function ()
{
	window_height=$(window).height()-100+"px"
	$("iframe#main").css("height",window_height);
})
</script>
</body></html>
