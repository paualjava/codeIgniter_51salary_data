<?php
class about_us extends CI_Controller {
	private $table_name='about_us';
	private $index_id="id";
	private $num_links=6;
	private $per_page=18;
	private $page_num=10;
	function index()
	{
		wap_link();
		$this->load->database();
		$search_where=$this->search_where();
		$current=get_current();
		$c_url=get_current_url("index");
		$content_list_search=list_search($this->table_name,$search_where[0],$this->per_page,$this->num_links,$c_url,$current);
		$keyword=trim($this->input->get("keyword"));
		if($keyword)
		{
			$content_list_search['this_page']=preg_replace("/href=\"([^\"]*)\"/isU","href=\"\$1?keyword=".$keyword."\"",$content_list_search['this_page']);
			$data['keyword']=$keyword;
		}
		$data['list']=$content_list_search;
		$data['menu_index']="on";
		/***分类**/
		/*$category_list=array();
		$result=$this->db->query("select * from ".$this->db->dbprefix."about_us_int_cate where is_show=? order by sort_order desc,id asc limit 0,7",array(1));
		foreach ($result->result() as $row)
		{
			$category_list[]=$row;
		}
		$data['category_list']=$category_list;*/
		$data['category']=$search_where[1];
		show("about_us",$data);
	}
	function search_where()
	{
		$sql="where id>0";
		$keyword=trim($this->input->get("keyword"));
		$category="";
		if($keyword)
		{
			$sql.=" and title like '%".$keyword."%'";
		}
		else
		{
			for($i=1;$i<=20;$i++)
			{
				$url=$this->uri->segment($i);
				if(preg_match("/^category_\d+$/is",$url))
				{
					$val=str_replace("category_","",$url);
					$category=$val;
					$sql.=" and cate like '%".$val."%'";
					break;
				}
			}
		}
		$sql.=" order by id desc";
		return array($sql,$category);
	}
	function show()
	{
		wap_link();
		$this->load->database();
		if(preg_match("/^\d+$/is",$this->uri->segment(3)))
		{
			$id=$this->uri->segment(3);
			$page_info=$this->db->get_where($this->db->dbprefix.$this->table_name,array("id"=>$id))->row();
			if(!$page_info)
			header("Location:".site_url());
			$data['page_info']=$page_info;
			show("about_us_show",$data);
		}
		else
		header("Location:".site_url());
	}
}
