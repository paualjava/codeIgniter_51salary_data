<link rel="stylesheet" href="<?php echo $base_url;?>resource/css/admin_51salary_data/admin.css" type="text/css">
<style tyle="css/text">
#main{padding:10px 0 0 10px; font-size:12px;line-height:26px;}
#main .main1{clear:both;float:left;width:20%;}
#main .main2{float:left;width:70%;color:#900;}
</style>
<div id="main">
  <div class="main1">服务器名</div><div class="main2"><?php echo $server_name; ?></div>
  <div class="main1">服务器端口</div><div class="main2"><?php echo $server_port;?></div>
  <div class="main1">服务器时间</div><div class="main2"><?php echo $server_time;?></div>
  <div class="main1">服务器语种</div><div class="main2"><?php echo $http_accept_language;?></div>
  <div class="main1">脚本超时时间</div><div class="main2"><?php echo $max_execution_time;?>秒</div>
  <div class="main1">服务器解译引擎</div><div class="main2"><?php echo $server_software;?></div>
  <div class="main1">服务器操作系统</div><div class="main2"><?php echo $php_os;?></div>
  <div class="main1">PHP解释器版本</div><div class="main2"><?php echo $php_version;?>  <span style="color:#fefefe;"></span></div>
</div>


