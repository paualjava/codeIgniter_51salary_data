<?php
class Page extends CI_Model
{
	private $table_name='code_page';
	private $search_item="url";
	function main()
	{
		return  $this->show_info($this->uri->segment(4));
	}
	function title()
	{
		$sql="select * from ".$this->table_name." where ".$this->search_item."='".$this->uri->segment(4)."'";
		$result=$this->db->query($sql);
		$row =$result->row();
		return array("title"=>$row->title);
	}
	function show_info($page_url)
	{
		$sql="select * from ".$this->table_name." where ".$this->search_item."='".$page_url."'";
		$result=$this->db->query($sql);
		$row =$result->row();
		return array("this_data"=>$row);
	}
}
?>
