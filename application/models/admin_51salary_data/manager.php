<?php
class manager extends CI_Model {
	private $table_name='manager';
	private $index_id="id";
	private $per_page=20;
	private $num_links=10;
	function main()
	{
		$current=get_current();
		if($this->uri->segment(5)=="delete")
		delete($this->table_name,$this->uri->segment(6),$this->uri->segment(7));
		if($this->uri->segment(5)=="delete_all")
		delete_all($this->uri->segment(6),$this->table_name,$this->uri->segment(7),$this->index_id);
		
		
		
		$c_url=get_current_url();
		$keyword=$this->input->get("keyword");
		if($keyword)
		$search_where=" where ".$this->index_id.">0 and username like '%".$keyword."%' order by  id desc";
		else
		$search_where=" where ".$this->index_id.">0 order by  id desc";
		$content_list_search=list_search($this->table_name,$search_where,$this->per_page,$this->num_links,$c_url,$current);
		if($_SERVER["QUERY_STRING"])
		$content_list_search['this_page']=preg_replace("/href=\"([^\"]*)\"/isU","href=\"\$1?".$_SERVER["QUERY_STRING"]."\"",$content_list_search['this_page']);
		$data=array("list"=>$content_list_search,"per_page"=>$this->per_page,"current"=>$current);
		$data['keyword']=$keyword;
		$data['query_string']=($_SERVER["QUERY_STRING"]) ? "?".$_SERVER["QUERY_STRING"] : "";
		return $data;
	}
	
	
	
}
?>
