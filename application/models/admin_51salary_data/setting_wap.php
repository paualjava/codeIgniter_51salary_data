<?php
class setting_wap extends CI_Model {
	private $table_name='setting_wap';
	private $index_id="id";
	function main()
	{
		//role_check('setting_wap_edit');
		$this->load->helper("website");
		$form_is_post=$this->input->post('form_is_post');
		if($form_is_post)
		{
			$this->save_info($this->uri->segment(5),$this->uri->segment(6));
		}
		else
		{
			return  $this->show_info();
		}
	}
	function show_info()
	{
		$data=array();
		$result=$this->db->query("select * from ".$this->db->dbprefix.$this->table_name." limit 0,1");
		$row=$result->row();
		$data["this_data"]=$row;
		$data["id"]=$row->id;
		return $data;
	}
	function save_info($id,$current=0)
	{
		$data = array(
		'title'             =>trim($this->input->post('title')),//网站名称
		'keyword'           =>trim($this->input->post('keyword')),//站点关键字
		'description'       =>trim($this->input->post('description')),//站点描述
		'pic'               =>trim($this->input->post('pic'))//网站Logo
		);
		$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, $data,$this->index_id.">0");
		$this->db->query($update_str);
		$current=($current) ? "/".$current : "";
		$query_string=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		$arr = array('errno'=>"0", 'error'=>"修改成功！",'url'=>url_admin()."setting_wap".$current.$query_string);
		echo json_encode($arr);die();
	}
}
?>