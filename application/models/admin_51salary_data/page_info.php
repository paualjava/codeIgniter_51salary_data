<?php
class page_info extends CI_Model {
	private $table_name='page_info';
	private $index_id="id";
	private $per_page=20;
	private $num_links=10;
	function main()
	{
		role_check('page_info_view');
		$current=get_current();
		if($this->uri->segment(5)=="delete")
		delete($this->table_name,$this->uri->segment(6),$this->uri->segment(7));
		if($this->uri->segment(5)=="delete_all")
		delete_all($this->uri->segment(6),$this->table_name,$this->uri->segment(7),$this->index_id);
		if($this->uri->segment(5)=="export_excel")
		$this->export_excel();
		$c_url=get_current_url();
		$keyword=$this->input->get("keyword");
		$search_where="";
		if($keyword)
		{
			$search_where.="  where ".$this->index_id.">0 ";
			if($keyword)
			$search_where.=" and (`title` like '%".$keyword."%' or `url` like '%".$keyword."%' or `info` like '%".$keyword."%')";
			$search_where.="  order by  id desc";
		}
		else
		$search_where=" where ".$this->index_id.">0 order by  id desc";
		$content_list_search=list_search($this->table_name,$search_where,$this->per_page,$this->num_links,$c_url,$current);
		if($_SERVER["QUERY_STRING"])
		$content_list_search['this_page']=preg_replace("/href=\"([^\"]*)\"/isU","href=\"\$1?".$_SERVER["QUERY_STRING"]."\"",$content_list_search['this_page']);
		$data=array("list"=>$content_list_search,"per_page"=>$this->per_page,"current"=>$current);
		$data['search_keyword']=$keyword;
		$data['query_string']=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		return $data;
	}
	//导出Excel
	function export_excel()
	{
		$data=array();
		$result=$this->db->query("select * from ".$this->db->dbprefix.$this->table_name);
		foreach ($result->result_array() as $row)
		{
			$row['postdate']=($row['postdate']>0) ? get_time($row['postdate']) : "";
			$data[]=$row;
		}
		$data_colunm=array("id"=>"ID","title"=>"标题","url"=>"url","info"=>"内容","postdate"=>"添加时间");
		create_excel_file($data,$data_colunm,"页面管理");
		die();
	}
}
?>