<?php if ( ! defined('BASEPATH')) 
exit('No direct script access allowed');
set_time_limit(0);
class admin_51salary_data extends CI_Controller {
	function this_router($f_right='')
	{
		$this->load->library('session');
		$this->load->helper('admin');
		$admin_name=$this->session->userdata("ADMIN_USER_CODEIGNITER_51SALARY_DATA");
		$admin_role_id=$this->session->userdata("ADMIN_ROLE_ID_CODEIGNITER_51SALARY_DATA");
		$admin_id=$this->session->userdata("ADMIN_ID_CODEIGNITER_51SALARY_DATA");
		$admin_dir="admin_51salary_data";
		$data=array("site_url"=>base_url(),"base_url"=>base_url(),"web_url"=>site_url(),"admin_dir"=>$admin_dir,"admin_name"=>$admin_name,"admin_role_id"=>$admin_role_id,"admin_id"=>$admin_id,"admin_url"=>site_url().$this->router->fetch_class()."/index/manager/");
		$this_url=($this->uri->segment(4)) ? $this->uri->segment(4) : "index";
		$mod=(!$admin_name) ? "login" : $this_url;
		$this->load->model($admin_dir.'/'.$mod, '', TRUE);
		$array_data=$this->$mod->main();
		$data['start']=($f_right) ? $f_right : "start";
		if(is_array($array_data))
		$data=array_merge($data,$array_data);
		if($mod!="login" && $mod!="ajax_module_step" && $mod!="index")
		$this->load->view($admin_dir.'/header',$data);
		$this->load->view($admin_dir.'/'.$mod,$data);
	}
	function index2()
	{
		$m=($this->uri->segment(3)) ? $this->uri->segment(3) : "start";
		$this->this_router($m);
	}
	function index()
	{
		$this->this_router();
	}
}