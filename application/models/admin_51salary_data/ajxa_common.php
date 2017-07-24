<?php
class ajxa_common extends CI_Model {
	private $index_id="id";
	private $per_page=22;
	private $num_links=10;
	function main()
	{
		if($this->uri->segment(5)=="ajax_tag")
		$this->ajax_tag($this->uri->segment(6),$this->uri->segment(7),$this->uri->segment(8));
		if($this->uri->segment(5)=="ajax_show_tag")
		$this->ajax_show_tag($this->uri->segment(6),$this->uri->segment(7));
		if($this->uri->segment(5)=="ajax_reload")
		$this->ajax_reload();
	}
	function ajax_show_tag($table_name,$category_str)
	{
		echo ajax_show_tag($table_name,$category_str);die();
	}
	function ajax_tag($column,$table_name,$tag_str)
	{
		//延迟05.秒
		for($j=0;$j<1000000;$j++)
		{
		}
		$str="";
		$show_categroy=show_categroy($table_name);
		$i=1;
		foreach ($show_categroy as $key=>$row) {
			$str.="<div class='cate_ajax_2'><a href=\"javascript:set_category('".$row->name."','".$row->id."','".$column."','".site_url()."','".$table_name."');\">".$row->name."</a>&nbsp; <img src=\"".base_url()."resource/images/admin_51salary_data/correct.gif\" class=\"pic_".$column.$row->id."\" style=\"display:none\" onclick=\"javascript:set_category('".$row->name."','".$row->id."','".$column."','".site_url()."','".$table_name."');\")/></div>";
		}
		if($tag_str)
		{
			$tag_str=explode("_",$tag_str);
			foreach ($tag_str as $tag_value)
			{
				$str=str_replace("class=\"pic_".$column.$tag_value."\" style=\"display:none","class=\"pic_".$column.$tag_value."\" style=\"",$str);
			}
		}
		echo $str;die();
	}
	function ajax_reload()
	{
		$table_name=$this->uri->segment(6);
		$column_name=$this->uri->segment(7);
		$current_cate=$this->input->post($column_name);
		$str='<option value="">请选择</option>';
		$result=$this->db->query("select * from ".$this->db->dbprefix.$table_name." order by sort_order desc,id asc");
		foreach ($result->result() as $row)
		{
				$select=($row->id==$current_cate) ? ' selected="selected"' : "";
				$str.='<option value="'.$row->id.'"'.$select.'>'.$row->name.'</option>';
		}
		echo $str;die();
	}
}
?>
