<?php
class about_us_add extends CI_Model {
	private $table_name='about_us';
	function main()
	{
		role_check('about_us_add');
		$this->load->helper("website");
		$form_is_post=$this->input->post('form_is_post');
		if($form_is_post)
		{
			$this->sava_info();
		}
	}
	function sava_info()
	{
		$data = array(
		'title'             =>trim($this->input->post('title')),//标题
		'content'           =>trim($this->input->post('content')),//内容
		'is_show'           =>trim($this->input->post('is_show')),//审核显示
		'sort_order'        =>trim($this->input->post('sort_order')),//排序
		'postdate'          =>time()//添加时间
		);
		$insert_str=$this->db->insert_string($this->db->dbprefix.$this->table_name, $data);
		$this->db->query($insert_str);
		$arr = array('errno'=>"0", 'error'=>"添加成功！",'url'=>url_admin()."about_us");
		echo json_encode($arr);die();
	}
}
?>