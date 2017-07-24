<?php
class manager_role_edit extends CI_Model {
	private $table_name='manager_role';
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
		$data=array();

		$row=$this->db->get_where($this->db->dbprefix.$this->table_name,array($this->index_id=>$id))->row();
		$data["current"]=($current==0) ? '' : $current;
		$data["role_list"]=$role_list;
		$data["this_data"]=$row;
		$data["id"]=$id;
		return $data;
	}
	function save_info($id,$current=0)
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
		'role'              =>$role_str//权限设置
		);
		$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, $data,$this->index_id."=".$id);
		$this->db->query($update_str);

		$current=($current) ? "/".$current : "";
		$query_string=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		$arr = array('errno'=>"0", 'error'=>"编辑成功！",'url'=>url_admin()."manager_role".$current.$query_string);
		echo json_encode($arr);die();
	}
}
?>
