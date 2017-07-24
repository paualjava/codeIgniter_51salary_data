<?php
class Login extends CI_Model {
	private $user_table="manager";
	function main()
	{
		$CI=& get_instance();
		$this->load->helper('url');
		$site_url=$CI->config->site_url();
		$login_username=$this->input->post("login_username");

		$login_password=$this->input->post("login_password");
		if($login_username && $login_password)
		{
			return $this->login_user();
		}
		else
		{
			return array("display_error"=>"display:none","display_form"=>"");
		}
	}
	function login_user()
	{
		$CI=& get_instance();
		$user=$_POST['login_username'];
		$pass=$_POST['login_password'];
		$code=$_POST['code'];
		$error=array();
		$sql="select * from ".$this->db->dbprefix.$this->user_table." where username='".$user."'";
		$result=$CI->db->query($sql);
		$this->load->library('session');
		$vcode=$this->session->userdata('vcode');

		if(strtolower($vcode)==strtolower($code))
		{
			if ($result->num_rows()==1)
			{

				$row =$result->row();
				if($row->password==md5($pass))
				{
					$user_info=array(
					"ADMIN_USER_CODEIGNITER_51SALARY_DATA"=>$row->username,
					"ADMIN_ID_CODEIGNITER_51SALARY_DATA"=>$row->id,
					"ADMIN_ROLE_ID_CODEIGNITER_51SALARY_DATA"=>$row->role_id,
					);

					$data=array("web_name"=>$row->truename."登陆","content"=>"IP:<span style='color:#f00'>".$this->input->ip_address()."</font>","type"=>7,"postdate"=>time());
					$insert_str=$this->db->insert_string($this->db->dbprefix."log", $data);
					$this->db->query($insert_str);

					$data=array("ip"=>$this->input->ip_address(),"login_time"=>time());
					$update_str=$this->db->update_string($this->db->dbprefix.$this->user_table, $data,"id=".$row->id);
					$this->db->query($update_str);
					$CI->session->set_userdata($user_info);
					redirect($CI->config->site_url().$this->router->fetch_class());
					//return 3;
				}
				else
				{
					$error['text_error']="用户名密码输入错误,登陆失败!";
					$error['display_error']="";
					$error['display_form']="display:none";
				}
			}
			else
			{

				$error['text_error']="用户名密码输入错误,登陆失败!";
				$error['display_error']="";
				$error['display_form']="display:none";
			}
		}
		else
		{
			$error['text_error']="验证码输入错误!";
			$error['display_error']="";
			$error['display_form']="display:none";
		}
		return $error;

	}
}

?>
