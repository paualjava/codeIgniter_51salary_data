<?php
class manager_add extends CI_Model {
	private $table_name='manager';
	function main()
	{
		$this->load->helper("website");
		$form_is_post=$this->input->post('form_is_post');
		if($form_is_post)
		{
			$this->sava_info();
		}
		else
		{
			$role_list=array();
			$sql="select * from ".$this->db->dbprefix."manager_role order by id asc";
			$result=$this->db->query($sql);
			foreach ($result->result() as $row)
			{
				$role_list[]=$row;
			}
			$parent_role_id=$this->session->userdata("parent_role_id");
			$parent_role_id=($parent_role_id) ? $parent_role_id : 0;
			return array("parent_role_id"=>$parent_role_id,"role_list"=>$role_list);

		}
	}
	function sava_info()
	{
		$data = array(
		'username'          =>$this->input->post('username'),//用户名
		'password'          =>md5(trim($this->input->post('password'))),//密码
		'role_id'           =>$this->input->post('role_id'),//所属角色
		'truename'          =>$this->input->post('truename'),//姓名
		'email'             =>$this->input->post('email'),//邮箱
		'phone'             =>$this->input->post('phone')//电话
		);
		$insert_str=$this->db->insert_string($this->db->dbprefix.$this->table_name, $data);
		$this->db->query($insert_str);
		$session_info=array("parent_role_id"=>$this->input->post('role_id'));
		$this->session->set_userdata($session_info);
		$arr = array('errno'=>"0", 'error'=>"添加成功！",'url'=>url_admin()."manager");
		echo json_encode($arr);die();
	}
}
?>
