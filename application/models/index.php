<?php
class Index extends CI_Model {

	function main()
	{
		$demo_list=$this->show_demo_list();
		//$this->temp3();die();
		return array("demo_list"=>$demo_list);
	}
	function title()
	{
		return array("title","");
	}
	function show_demo_list()
	{
		$result=$this->db->query("select * from code_demo order by id asc limit 0,15");
		foreach ($result->result() as $row)
		{
			$temp[]=$row;
		}
		return $temp;
	}
	function get_content()
	{
		$result=$this->db->query("select * from code_demo where id=36");
		$row =$result->row();
		return $row->page_text;
	}
	function temp2()
	{
		$result=$this->db->query("select * from code_demo order by id asc");
		foreach ($result->result() as $row)
		{
			$id=$row->id;
			$pic=$row->pic;
			$pic=str_replace(".gif","",$pic);
			$page_text=$this->get_content();
			$page_text=str_replace("0385oscommerce_bag","0385".$pic,$page_text);
			$page_text=str_replace('<img border="0" src="http://zhihui001.com/taobao_pic2/oscommerce_bag.jpg" />','<img border="0" src="http://zhihui001.com/taobao_pic2/'.$pic.'.jpg" />',$page_text);
			$page_text=str_replace('oscommerce_bag/" target="_blank">http://oscommerce.zhihui001.com/oscommerce_bag/</a> (请点右键',$pic.'/" target="_blank">http://oscommerce.zhihui001.com/'.$pic.'/</a> (请点右键',$page_text);
			$data=array("page_text"=>$page_text);
			$update_str=$this->db->update_string("code_demo",$data,"id=".$id);
			$this->db->query($update_str);
		}

	}
	function temp3()
	{
		$result=$this->db->query("select * from code_demo where id>=37 order by id asc");
		foreach ($result->result() as $row)
		{
			$id=$row->id;
			$pic=$row->pic;
			$pic=str_replace(".gif","",$pic);
			$page_text=$this->get_content();
			$page_text=str_replace("0385oscommerce_drug","0385".$pic,$page_text);
			$page_text=str_replace('<img border="0" src="http://zhihui001.com/taobao_pic2/oscommerce_drug.jpg" />','<img border="0" src="http://zhihui001.com/taobao_pic2/'.$pic.'.jpg" />',$page_text);
			$page_text=str_replace('oscommerce_drug/" target="_blank">http://oscommerce.zhihui001.com/oscommerce_drug/</a> (请点右键',$pic.'/" target="_blank">http://oscommerce.zhihui001.com/'.$pic.'/</a> (请点右键',$page_text);
			$data=array("page_text"=>$page_text);
			$update_str=$this->db->update_string("code_demo",$data,"id=".$id);
			$this->db->query($update_str);
		}

	}
	function temp()
	{
		$result=$this->db->query("select * from wp_posts WHERE ID>0 and post_type='post' order by ID desc");
		$i=1;
		foreach ($result->result() as $row)
		{
			$title=$row->post_title;
			$post_name=$row->post_name;
			$data=array("pic"=>$post_name.".gif","subject"=>$title);
			$insert_str=$this->db->update_string("code_demo",$data,"id=".$i);
			$this->db->query($insert_str);
			$i++;
		}
	}
}
?>
