<?php
class manager_edit extends CI_Model {
	private $table_name='manager';
	private $index_id="id";
	function main()
	{
		$this->load->helper("website");
		$form_is_post=$this->input->post('form_is_post');
		if($form_is_post)
		{
			$this->save_info($this->uri->segment(5),$this->uri->segment(6));
		}
		else
		{
			return  $this->show_info($this->uri->segment(5),$this->uri->segment(6));
		}
	}
	function show_info($id,$current='')
	{
		$data=array();
		$role_list=array();
		$sql="select * from ".$this->db->dbprefix."manager_role order by id asc";
		$result=$this->db->query($sql);
		foreach ($result->result() as $row)
		{
			$role_list[]=$row;
		}
		$row=$this->db->get_where($this->db->dbprefix.$this->table_name,array($this->index_id=>$id))->row();
		$data["current"]=($current==0) ? '' : $current;
		$data["this_data"]=$row;
		$data["role_list"]=$role_list;
		$data["id"]=$id;
		return $data;
	}
	function save_info($id,$current=0)
	{
		$data = array(
		'username'          =>$this->input->post('username'),//用户名
		'truename'          =>$this->input->post('truename'),//姓名
		'email'             =>$this->input->post('email'),//邮箱
		'phone'             =>$this->input->post('phone')//电话
		);
		if($this->input->post('role_id'))
		$data['role_id']=$this->input->post('role_id');//所属角色
		if(trim($this->input->post('password')))
		{
			$data['password']=md5(trim($this->input->post('password')));
		}
		$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, $data,$this->index_id."=".$id);
		$this->db->query($update_str);

		$current=($current) ? "/".$current : "";
		$query_string=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		$arr = array('errno'=>"0", 'error'=>"编辑成功！",'url'=>url_admin()."manager".$current.$query_string);
		echo json_encode($arr);die();
	}
}
?>
