<?php
class page_info_add extends CI_Model {
	private $table_name='page_info';
	function main()
	{
		role_check('page_info_add');
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
		'url'               =>trim($this->input->post('url')),//url
		'info'              =>trim($this->input->post('info')),//内容
		'postdate'          =>time()//添加时间
		);
		$insert_str=$this->db->insert_string($this->db->dbprefix.$this->table_name, $data);
		$this->db->query($insert_str);
		$arr = array('errno'=>"0", 'error'=>"添加成功！",'url'=>url_admin()."page_info");
		echo json_encode($arr);die();
	}
}
?>