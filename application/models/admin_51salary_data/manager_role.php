<?php
class manager_role extends CI_Model {
	private $table_name='manager_role';
	private $index_id="id";
	private $per_page=20;
	private $num_links=10;
	function main()
	{
		//$this->init();
		$current=get_current();
		if($this->uri->segment(5)=="delete")
		delete($this->table_name,$this->uri->segment(6),$this->uri->segment(7));
		if($this->uri->segment(5)=="delete_all")
		delete_all($this->uri->segment(6),$this->table_name,$this->uri->segment(7),$this->index_id);

		if($this->uri->segment(5)=="ajax_save_is_show")
		$this->ajax_save_is_show($this->uri->segment(6));
		if($this->uri->segment(5)=="ajax_save_sort_order")
		$this->ajax_save_sort_order();
		$c_url=get_current_url();
		$keyword=$this->input->get("keyword");
		if($keyword)
		$search_where=" where ".$this->index_id.">0 and name like '%".$keyword."%' order by sort_order desc, id desc";
		else
		$search_where=" where ".$this->index_id.">0 order by sort_order desc, id desc";
		$content_list_search=list_search($this->table_name,$search_where,$this->per_page,$this->num_links,$c_url,$current);
		if($_SERVER["QUERY_STRING"])
		$content_list_search['this_page']=preg_replace("/href=\"([^\"]*)\"/isU","href=\"\$1?".$_SERVER["QUERY_STRING"]."\"",$content_list_search['this_page']);
		$data=array("list"=>$content_list_search,"per_page"=>$this->per_page,"current"=>$current);
		$data['keyword']=$keyword;
		$data['query_string']=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		return $data;
	}
	function init()
	{
		$table="manager_role_cate";
		$priv=array("about"=>"关于我们","activity_order"=>"活动报名");
		$priv_key=array("list"=>"查看","add"=>"添加","edit"=>"编辑","del"=>"删除");
		foreach($priv as $key=>$value)
		{
			$data=array("name"=>$value,"parent_id"=>0,"key"=>$key);
			$insert_str=$this->db->insert_string($this->db->dbprefix.$table, $data);
			$this->db->query($insert_str);
			$insert_id=$this->db->insert_id();
			foreach($priv_key as $key2=>$value2)
			{
				$data=array("name"=>$value2,"parent_id"=>$insert_id,"key"=>$key."_".$key2);
				$insert_str=$this->db->insert_string($this->db->dbprefix.$table, $data);
				$this->db->query($insert_str);
			}
		}
		die();
	}
	function ajax_save_is_show($id)
	{
		$is_show=0;
		if(preg_match("/^\d+$/is",$id))
		{
			$info=get_table_row($this->table_name,$id);
			if($info)
			{
				$is_show=$info->is_show;
				$is_show=($is_show==1) ? 0 : 1;
				$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, array("is_show"=>$is_show),"id=?");
				$this->db->query($update_str,$id);
			}
		}
		echo $is_show;die();
	}
	function ajax_save_sort_order()
	{
		$id=$this->input->post("id");
		$order=$this->input->post("orderby");
		if(preg_match("/^\d+$/is",$id) && preg_match("/^\d+$/is",$order))
		{
			$info=get_table_row($this->table_name,$id);
			if($info)
			{
				$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, array("sort_order"=>$order),"id=?");
				$this->db->query($update_str,$id);
			}
		}
		echo $order;die();
	}

}
?>
