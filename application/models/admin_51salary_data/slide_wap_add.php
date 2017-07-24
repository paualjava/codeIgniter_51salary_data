<?php
class slide_wap_add extends CI_Model {
	private $table_name='slide_wap';
	function main()
	{
		role_check('slide_wap_add');
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
		'pic'               =>trim($this->input->post('pic')),//图片
		'width'             =>trim($this->input->post('width')),//宽度
		'height'            =>trim($this->input->post('height')),//高度
		'url'               =>trim($this->input->post('url')),//链接地址
		'info'              =>trim($this->input->post('info')),//备注
		'sort_order'        =>trim($this->input->post('sort_order')),//排序
		'postdate'          =>time()//添加时间
		);
		$insert_str=$this->db->insert_string($this->db->dbprefix.$this->table_name, $data);
		$this->db->query($insert_str);
		
		
		$arr = array('errno'=>"0", 'error'=>"添加成功！",'url'=>url_admin()."slide_wap");
		echo json_encode($arr);die();
	}
}
?>
