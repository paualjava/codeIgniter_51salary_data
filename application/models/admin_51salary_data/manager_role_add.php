<?php
class manager_role_add extends CI_Model {
	private $table_name='manager_role';
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
			$sql="select * from ".$this->db->dbprefix."manager_role_cate where parent_id=0 order by id asc";
			$result=$this->db->query($sql);
			foreach ($result->result() as $row)
			{
				$role_str="";
				$role_status="";
				$sql="select * from ".$this->db->dbprefix."manager_role_cate where parent_id=? order by id asc";
				$result2=$this->db->query($sql,array($row->id));
				foreach ($result2->result() as $row2)
				{
					$role_str.=$row2->id.",";
					$role_status.=$row2->status.",";
				}
				$row->role_str=$role_str;
				$row->role_status=$role_status;
				$role_list[]=$row;
			}
			return array("role_list"=>$role_list);
		}

	}
	function sava_info()
	{
		$role=$this->input->post('priv');
		$role_str=",";
		foreach($role as $v)
		{
			if(is_array($v))
			{
				foreach($v as $v2)
				{
					if($v2)
					$role_str.=$v2.",";
				}
			}
		}
		$data = array(
		'name'              =>$this->input->post('name'),//角色名称
		'description'       =>$this->input->post('description'),//角色描述
		'role'              =>$role_str,//权限设置
		'is_show'           =>1
		);
		$insert_str=$this->db->insert_string($this->db->dbprefix.$this->table_name, $data);
		$this->db->query($insert_str);
		$arr = array('errno'=>"0", 'error'=>"添加成功！",'url'=>url_admin()."manager_role");
		echo json_encode($arr);die();
	}
}
?>
