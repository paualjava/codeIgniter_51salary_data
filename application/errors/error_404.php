<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>页面不存在</title>
<meta content="" name="keywords">
<meta content="" name="description">
<?php 
include "application/config/config.php";
$site_url=$config['base_url'];
?>
<style type="text/css">
.w990{width:970px;margin:auto;}
.body-skin{margin-top:10px;}
ol, ul {
    list-style: none outside none;
}
body {
    color: #666666;
    font-family: Tahoma,Arial,SimSun,sans-serif;
    font-size: 12px;
    line-height: 15px;
}
* {
    margin: 0;
    padding: 0;
}
.moda {
    background: none repeat scroll 0 0 #FBFBFB;
    border: 1px solid #D4D4D4;
    margin-bottom: 10px;
    padding: 35px 36px 35px 39px;
}
.moda .bd {
    background: url("<?php echo $site_url;?>resource/images/bg404.jpg") no-repeat scroll 0 0 transparent;
    height: 394px;
    padding-left: 204px;
    width: 712px;
}
.myaction {
    margin-left: 104px;
}
.moda ul.pagenotfound li {
    
    color: #000000;
    font-size: 14px;
    line-height: 24px;
    padding: 18px 0 18px 74px;
}
.moda h3 {
    color: #E60012;
    font-size: 12px;
}
h3 {
    font-size: 16px;
    line-height: 20px;
}
.myaction {
    margin-left: 104px;
}
.myaction li {
    float: left;
    padding: 20px 18px;
}
.myaction li a {
    outline: 0 none;
}
fieldset, img {
    border: 0 none;
}
</style>
</head>
<body>
<div class="body-skin w990">
 
  <div class="moda">
    <div class="bd">
      <ul class="pagenotfound">
        <li class="first"><h3>404 Error 找不到该页面</h3></li>
        <li>很抱歉!<br />您要查看的网页可能已被删除、名称已被更改，或者暂时不可用……</li>
        <li>我们已记录了您的遇到错误信息；并尽快修复它。<br />现在，您可以选择如下操作：</li>

      </ul>
      <ul class="myaction"> 
        
        <li><a href="<?php echo $site_url;?>"><img src="<?php echo $site_url;?>resource/images/home404.jpg" /></a></li>
     
      </ul>
    </div>
  </div>
</div>



</body>
</html>