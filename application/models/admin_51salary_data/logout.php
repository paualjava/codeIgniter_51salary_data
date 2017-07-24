<?php
class Logout extends CI_Model {

	function main()
	{
		$CI=& get_instance();
		$CI->session->unset_userdata(array("ADMIN_USER_CODEIGNITER_51SALARY_DATA"=>'',"ADMIN_ID_CODEIGNITER_51SALARY_DATA"=>''));
		$this->load->helper('url');
		$site_url=$CI->config->site_url();
		redirect($site_url.$this->router->fetch_class());
	}
}

