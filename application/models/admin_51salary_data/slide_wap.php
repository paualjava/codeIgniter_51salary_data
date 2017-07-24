<?php
class slide_wap extends CI_Model {
	private $table_name='slide_wap';
	private $index_id="id";
	private $per_page=20;
	private $num_links=10;
	function main()
	{
		role_check('slide_wap_view');
		$current=get_current();
		if($this->uri->segment(5)=="import")
		$this->import();
		if($this->uri->segment(5)=="delete")
		delete($this->table_name,$this->uri->segment(6),$this->uri->segment(7));
		if($this->uri->segment(5)=="delete_all")
		delete_all($this->uri->segment(6),$this->table_name,$this->uri->segment(7),$this->index_id,site_url()."admin_51salary_data/index/manager/slide_wap");
		
		if($this->uri->segment(5)=="ajax_save_sort_order")
		$this->ajax_save_sort_order();
		$c_url=get_current_url();
		$keyword=$this->input->get("keyword");
		if($keyword)
		$search_where=" where ".$this->index_id.">0 and (title like '%".$keyword."%' or pic like '%".$keyword."%' or url like '%".$keyword."%') order by sort_order desc, id desc";
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
	function import()
	{
		$dir="upload/advertise/";
		if (is_dir($dir))
		{
			if ($dh = opendir($dir))
			{
				while (($file = readdir($dh)) !== false)
				{
					if($file!="." && $file!=".." && (substr($file,-4)==".jpg" || substr($file,-4)==".png" || substr($file,-4)==".gif") && $file!="Thumbs.db")
					{
						$file_name=$dir.$file;
						$row=get_table_row($this->table_name,$file_name,"pic");
						if(!$row)
						{
						 	$pic_size=@getimagesize($file_name);
							//$data=array("title"=>substr($file,0,strpos($file,".")),"pic"=>$file_name,"width"=>$pic_size[0],"height"=>$pic_size[1],"sort_order"=>0,"postdate"=>time());
							$data=array("title"=>substr($file,0,strpos($file,".")),"pic"=>$file_name,"width"=>$pic_size[0],"height"=>$pic_size[1],"sort_order"=>0,"postdate"=>time());
							$insert_str=$this->db->insert_string($this->db->dbprefix.$this->table_name, $data);
							$this->db->query($insert_str);
						}
						
					}
				}
				closedir($dh);
			}
		}
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
