<?php
class about_us_edit extends CI_Model {
	private $table_name='about_us';
	private $index_id="id";
	function main()
	{
		//role_check('about_us_edit');
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
		$row=$this->db->get_where($this->db->dbprefix.$this->table_name,array($this->index_id=>$id))->row();
		if(count($row)==0)
		redirect(url_admin()."about_us");
		$data["current"]=($current==0) ? '' : $current;
		$data["this_data"]=$row;
		$data["id"]=$id;
		return $data;
	}
	function save_info($id,$current=0)
	{
		$data = array(
		'title'             =>trim($this->input->post('title')),//标题
		'content'           =>trim($this->input->post('content')),//内容
		'is_show'           =>trim($this->input->post('is_show')),//审核显示
		'sort_order'        =>trim($this->input->post('sort_order')),//排序
		);
		$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, $data,$this->index_id."=".$id);
		$this->db->query($update_str);
		$current=($current) ? "/".$current : "";
		$query_string=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		$arr = array('errno'=>"0", 'error'=>"编辑成功！",'url'=>url_admin()."about_us".$current.$query_string);
		echo json_encode($arr);die();
	}
}
?>