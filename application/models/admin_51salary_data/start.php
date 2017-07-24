<?php
class Start extends CI_Model {

	function main()
	{
		$server_name=getenv("SERVER_NAME");
		$server_port=getenv("SERVER_PORT");
		$server_time=date("Y年m月d日 H:i:s",time()+8*3600);
		$http_accept_language=getenv("HTTP_ACCEPT_LANGUAGE");
		$max_execution_time=get_cfg_var("max_execution_time");
		$server_software=getenv("SERVER_SOFTWARE");
		$php_os=PHP_OS;
		$php_version=PHP_VERSION;
		return array("server_name"=>$server_name,"server_port"=>$server_port,"server_time"=>$server_time,"http_accept_language"=>$http_accept_language,"max_execution_time"=>$max_execution_time,"server_software"=>$server_software,"php_os"=>$php_os,"php_version"=>$php_version);
	}
}
?>
