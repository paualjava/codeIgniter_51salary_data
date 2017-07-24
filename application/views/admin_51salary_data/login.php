<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<script src="<?php echo $site_url?>resource/js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $site_url?>resource/css/<?php echo $admin_dir;?>/admin_index.css" type="text/css">
<script type="text/javascript">

    if( window.top != window.self ){
            top.location.href = location.href;
     }
</script>
<script type="text/javascript">
var winStl = null;
var winProp = null;
function hideInfo(){
	var wn=document.getElementById('Warning');
	var ld=document.getElementById('Loadding');
	if(!wn || !ld) return;
	wn.style.display="none";
	ld.style.display="none";
	for(var ii=0; ii<document.links.length; ii++)
	    document.links[ii].onfocus=function(){this.blur()}
}
function showInfo(){
	var wn=document.getElementById('Warning');
	var ld=document.getElementById('Loadding');
	if(!wn || !ld) return;
	wn.style.display="";
	ld.style.display="";
}
function change_red(input1)
{
	$(input1).css("border","solid 1px #f00");
}
function change_gray(input1)
{
	$(input1).css("border","solid 1px #737373");
	
}	
	
function form_click()
{

  if($("#login_username").val()=="")
  {
  $("#login_username").focus();
  alert("请填写用户名");
  return false;
  }
  else if($("#login_password").val()=="")
  {
  $("#login_password").focus();
  alert("请填写密码");
  return false;
  }
  else if($("#code").val()=="")
  {
  $("#code").focus();
  alert("请填写验证码");
  return false;
  }
 /*else if($("input[@name='identify_code']").val()=="")
 {
  $("input[@name='identify_code']").focus();
    alert("请填验证码");
     return false;
 
  }*/
  else
  $("#check_form").submit();

}
</script>
</head>
<body bgcolor="#1675B7">
<div class="admin2">
<div id="container">
  <div id="header"></div>
  <div id="menu"></div>
  <div id="mainContent" >
    <div id="sidebar"></div>
    <div id="sidebar2"></div>
    <div id="content" onload="hideInfo()" class="login_body">
      <div class="mainoverflow"   >
        <div class="inputbox formbox" id="oForm">
        <!--<div style="margin-top:200px;margin-bottom:140px;<?php echo $display_error;?>;font-size:14px;" id="eForm">-->
        <div style="margin-top:200px;margin-bottom:140px;display:none;font-size:14px;" id="eForm">
<img src="<?php echo $site_url?>resource/images/<?php echo $admin_dir;?>/admin1_error.gif" width="16" height="16" align="absmiddle"> <font color="red"><?php echo @$text_error;?></font><br ><br >

<input type="button" value="   重新登陆   " style="cursor:pointer;"  onclick="document.getElementById('eForm').style.display='none';document.getElementById('oForm').style.display='';">
</div>
          <form class="cmxform" action="" method="post" id="check_form" name="check_form" onsubmit="return form_click();" target="_top">
            <input type="hidden" name="file" value="login"/>
            <li><span class="ibl"></span>
              <input type="text" name="login_username" id="login_username" class="btn1" onMouseOver="this.className='btn2'" onMouseOut="this.className='btn1'" value=""/>
              </span class="ibr"></span> </li>
            <li><span class="ibl"></span>
              <input name="login_password" type="password" class="btn1" id="login_password" onMouseOver="this.className='btn2'" onMouseOut="this.className='btn1'"/>
              &nbsp;
              <div id="kb" style="display:none;"></div>
              <span class="ibr"></span></li>
            <li><span class="ibl"></span>
              <input name="code" id="code" type="text" size="6" value="" class="btn31" onMouseOver="this.className='btn32'" onMouseOut="this.className='btn31'"/>
              &nbsp; <img src="<?php echo $site_url."member/generate/".microtime();?>" align="absmiddle" title="点击换验证码" onclick="this.src='<?php echo $site_url."member/generate/";?>'+new Date().getTime()" id="checkCode" name="checkCode" /> <span class="ibr"></span> </li>
            <li><span class="ibl"></span>
              <input name="" type="image" src="<?php echo $site_url?>resource/images/<?php echo $admin_dir;?>/admin2_btn_login.gif"/>
              <!-- <input type="button" name="button" value="登 录" class="button btn11" onMouseOver="this.className='btn21'" onMouseOut="this.className='btn11'" onclick="login()"> -->
              <span class="ibr"></span></li>
          </form>
        </div>
      </div>
    </div>
    <div id="footera"></div>
    <div id="footerb"></div>
  </div>
</div>
</div>
</body>
</html>
