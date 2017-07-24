<?php
class Site extends CI_Controller {

	private $index_id="id";
	private $num_links=6;
	private $per_page=36;
	private $page_num=20;
	function index()
	{
		$this->load->database();
		$slide_index=array();
		$sql="select * from ".$this->db->dbprefix."slide_index where status=? order by sort_order desc,id desc limit 0,1000";
		$result=$this->db->query($sql,array(1));
		foreach ($result->result() as $row)
		{
			$slide_index[]=$row;
		}
		$data['slide_index']=$slide_index;
		$data['menu_index']="on";
		show("index",$data);
	}
	function banner()
	{
		$data["seo"]=array("seo_keywords"=>get_setting("cfg_keywords"),"seo_description"=>get_setting("cfg_description"));
		show("site_banner",$data,0);
	}
	function order_product()
	{
		$this->load->database();
		$id=$this->uri->segment(3);
		$result=$this->db->query("select * from ".$this->db->dbprefix."product where id=?",array($id));
		$row=$result->result();
		if(!$row)
		show_404();
		if($this->input->post('name') && $this->input->post('mobile'))
		{
			$data=array("name"=>$this->input->post('name'),"mobile"=>$this->input->post('mobile'),"product_id"=>$id,"buy_info"=>$this->input->post('buy_info'),"province"=>$this->input->post('province'),"email"=>$this->input->post('email'),"qq"=>$this->input->post('qq'),"postdate"=>time());
			$insert_str=$this->db->insert_string("order_product", $data);
			$this->db->query($insert_str);
			alert("提交成功，我们会尽快和您联系!",site_url()."site/order_product/".$id);
		}
		$data["name"]="";
		$data["mobile"]="";
		if(get_uid())
		{
			$user_info=get_table_row("member",get_uid());
			$data["name"]=$user_info->name;
			$data["mobile"]=$user_info->mobile;
		}
		$data["solution_all"]=$this->get_solution_all();
		$data['seo']=array("seo_title"=>"产品订购");
		$data['seo']=array("seo_title"=>"产品订购");
		$data['row_f']=$row[0];
		show("order_product",$data);
	}
	function get_solution_all()
	{
		$this->load->database();
		$result=$this->db->query("select * from ".$this->db->dbprefix."solutions order by id desc");
		$temp=array();
		foreach ($result->result() as $row)
		{
			$temp[]=$row;
		}
		return $temp;
	}
	function ajax_ad_other()
	{
		$id=$this->uri->segment(3);
		$ad=get_advertise($id);
		$str='<a href="'.site_url().'goto/redirect-ad-to-'.$ad->id.'" target="_blank" rel="nofollow"><img src="'.base_url().@$ad->pic.'" width="238" height="179" /></a>';
		echo $str;die();
	}
	function ajax_index_site()
	{
		$str='<dl id="index2"><dt>商城名站：</dt><dd>';
		$product_site=get_table_list("product_site where length(sale_url)>10","18","desc","sale_order");
		$i=1;
		foreach($product_site as $site_r){
			$str.='<a href="'.site_url().'goto/site-to-'.$site_r->id.'" target="_blank" rel="nofollow">'.$site_r->name.'</a>';
			$str.=($i % 13==0) ? "<br/>" : "";
			$i++;
		}
		$str.='</dd><div class="clear"></div></dl>';
		echo $str;die();
	}
	function kuaidi()
	{
		$data["seo"]=array("seo_keywords"=>get_setting("cfg_keywords"),"seo_description"=>get_setting("cfg_description"),"seo_title"=>get_setting("cfg_webname"));
		$data['kuaidi']=' class="li2"';
		show("kuaidi",$data);
	}
	/*	function index_get_sale($category,$count=8)
	{
	//58唯品会,57聚尚网,54走秀网,507俏物悄语
	$this->load->database();
	$site_array=array(58=>"2,3",57=>"2,3",54=>"3,4",507=>"3,4");
	$i=1;
	$temp=array();
	foreach($site_array as $key=>$key_v)
	{
	$rand1=rand(0,5);
	$key_v=explode(",",$key_v);
	$rand1=rand(0,5);
	$rand2=rand($key_v[0],$key_v[1]);
	$search_where="select * from ".$this->db->dbprefix."sale where find_in_set('$category',category) and web_id=$key order by id desc limit $rand1,$rand2";
	$result=$this->db->query($search_where);
	foreach ($result->result() as $row)
	{
	if($i<=$count)
	{
	$temp[]=$row;
	$i++;
	}
	}
	}
	return $temp;
	}*/

	/**
	 * 评论
	 *
	 */
	function comment()
	{
		$data["seo"]=array("seo_keywords"=>get_setting("cfg_keywords"),"seo_description"=>get_setting("cfg_description"));
		show("comment",$data);
	}
	function ajax_comment_add()
	{
		$this->load->database();
		$data=array("name"=>$this->uri->segment(3),"tel"=>$this->uri->segment(4),"email"=>$this->uri->segment(5),"qq"=>$this->uri->segment(6),"info"=>$this->uri->segment(7),"postdate"=>time());
		$insert_str=$this->db->insert_string($this->db->dbprefix."comment", $data);
		$this->db->query($insert_str);
		echo $this->uri->segment(3)."|||".$this->uri->segment(4);
	}
	function count()
	{
		$data["seo"]=array("seo_keywords"=>get_setting("cfg_keywords"),"seo_description"=>get_setting("cfg_description"));
		show("count",$data);
	}
	function index_site($limit=20)
	{
		$this->load->database();
		$sql="select * from ".$this->db->dbprefix."product_site where status=1 limit ".$limit;
		$result=$this->db->query($sql);
		$temp=array();
		foreach ($result->result() as $row)
		{
			$temp[]=$row;
		}
		return $temp;
	}
	function sale()
	{
		$data["seo"]=array("seo_keywords"=>get_setting("cfg_keywords"),"seo_description"=>get_setting("cfg_description"));
		show("sale",$data);
	}
	function create_data()
	{
		$this->create_brand();
		$this->create_xml();
		$this->create_city_xml();
	}
	function siteList()
	{
		$this->load->database();
		$temp_cate=array();
		$result=$this->db->query("select * from ".$this->db->dbprefix."product_site_category order by sort_order desc");
		$temp=array();
		foreach ($result->result() as $row)
		{
			$temp_cate[]=$row;
		}
		$search_where="order by id asc";
		if($this->uri->segment(2))
		{
			$result=$this->db->query("select * from ".$this->db->dbprefix."product_site_category where url=?",array($this->uri->segment(2)));
			$row =$result->row();
			$search_where="where find_in_set('$row->id',category) order by id asc";

		}

		//$search_where="order by id asc";
		$current=(preg_match("/^\d+$/is",$this->uri->segment(3))) ? $this->uri->segment(3) : 0;
		$current=(preg_match("/^\d+$/is",$this->uri->segment(2))) ? $this->uri->segment(2) : $current;
		$content_list_search=list_search("product_site",$search_where,$this->per_page,$this->num_links,"site",$current);
		$data=array("list"=>$content_list_search);
		$data["site_url_current"]=$this->uri->segment(2);
		$data["site_cate"]=$temp_cate;
		show("siteList",$data);
	}
	function seo()
	{
		$this->load->database();
		$site_url=$this->uri->segment(1);
		$site_url=substr($site_url,strrpos($site_url,"-")+1);
		if(!$site_url)
		redirect(base_url());
		$result=$this->db->query("select * from ".$this->db->dbprefix."product_site where url=?",array($site_url));
		$row =$result->row();
		if(!$row)
		show_404();
		return array("seo"=>array("seo_title"=>$row->name,"seo_keywords"=>$row->info,"seo_description"=>$row->info));
	}
	function siteShow()
	{
		$this->load->database();
		$site_url=$this->uri->segment(1);
		$site_url=substr($site_url,strpos($site_url,"-")+1);
		if(!$site_url)
		redirect(base_url());
		$result=$this->db->query("select * from ".$this->db->dbprefix."product_site where url=?",array($site_url));
		$site_info =$result->row();
		if(!$site_info)
		show_404();
		$web_id=$site_info->id;
		//$search_where="where web_id='".$web_id."'  and category is not null and status=1 order by id desc";
		if($this->uri->segment(2))
		{
			$row_info=get_table_row("sale_category",$this->uri->segment(2),"url");
			if(!$row_info)
			show_404();
			$search_where="where web_id='".$web_id."' and find_in_set('$row_info->id',category) and category is not null and status=1 order by id desc";

		}
		else
		$search_where="where web_id='".$web_id."' and category is not null and status=1 order by id desc";
		$search_sql="select * from ".$this->db->dbprefix."sale $search_where limit 0,99";
		$result=$this->db->query($search_sql);
		$temp=array();
		foreach ($result->result() as $row)
		{
			$temp[]=$row;
		}
		$str_cate='';
		$class_on='style="color:#f00;font-weight:bold"';
		$result=$this->db->query("select * from ".$this->db->dbprefix."sale_category order by sort_order desc");
		if($this->uri->segment(2))
		$str_cate="";
		else
		$str_cate="";
		$current_on=($this->uri->segment(2)=='') ? $class_on : "";
		$str_cate="<a href='".site_url().$this->uri->segment(1)."/' ".$current_on.">全部(".get_count_sale("where web_id=".$web_id." and category is not null and status=1").")</a> &nbsp;";
		foreach ($result->result() as $row)
		{
			$current_on=(str_replace("f_","",$this->uri->segment(2))==$row->url) ? $class_on : "";

			$search_where_sql="where web_id=".$web_id." and find_in_set('$row->id',category) and category is not null and status=1";
			$count2=get_count_sale($search_where_sql);
			$count2=($count2>99) ? 99 : $count2;
			if($count2>0)
			$str_cate.="<a href='".site_url().$this->uri->segment(1)."/".$row->url."/' ".$current_on.">".$row->name."(".$count2.")</a> &nbsp;";
		}
		$result=$this->db->query("select * from ".$this->db->dbprefix."sale where status=1 order by pos desc limit 0,8");
		$temp_relate=array();
		foreach ($result->result() as $row4)
		{
			$temp_relate[]=$row4;
		}
		$data["sale_relate"]=$temp_relate;
		$data['str_cate']=$str_cate;
		$data['product_sale']=$temp;
		$data["canonical"]=($this->uri->segment(2)) ? '<link rel="canonical" href="'.site_url().'site-'.$site_info->url.'/'.$row_info->url.'" />' : '<link rel="canonical" href="'.site_url().'site-'.$site_info->url.'/" />';
		$seo_title=(($this->uri->segment(2)) ? $site_info->name.$row_info->name : $site_info->seo_title);
		$seo_description=($this->uri->segment(2)) ? $site_info->name.@$row_info->name." 限时特卖，客服电话:".$site_info->tel : "";
		$data['seo']=array("seo_title"=>$seo_title,"seo_description"=>$seo_description);
		$data['site_info']=$site_info;
		$data['url2']=$this->uri->segment(2);
		$data['row_info']=@$row_info;
		show("site_show",$data);

	}
	function redirect_url()
	{
		if(preg_match("/^site-to-[\d]+$/is",$this->uri->segment(2)))
		{
			$id=preg_replace("/^site-to-([\d]+)$/is","\$1",$this->uri->segment(2));
			$site_row=get_table_row("product_site",$id,"id");
			show("redirect_site",array("site_info"=>$site_row),"head_none");
		}
		else
		show_404();
	}
	function ajax_404()
	{
		$str="";
		$list1=$this->index_get_sale(42,4);
		$list2=$this->index_get_sale(43,4);
		$str='<div class="index3">
<h3>女装<span class="more"><a href="'.site_url().'f_dress-woman/" name="dress-woman">更多</a></span></h3>';
		$i=1;
		foreach ($list1  as $list)
		{
			$time=$list->left_time;
			$time=$time-time();
			$time=($time>0) ? $time : 0;
			$day=floor($time/86400);
			$hour=floor($time/3600)%24;
			$minute=floor($time/60)%60;
			$xianshi_last=($i % 4==0) ? ' class="dl2"' : "";
			$cate_info=get_table_row("sale_category",preg_replace("/^,(\d+),.*$/is","\$1",$list->category));
			$str.='<dl'.$xianshi_last.'>';
			$pic=($list->image=="") ? $site_url()."resource/images/none.gif" : ((substr($list->image,0,7)=="http://") ? $list->image : site_url().$list->image);
			$str.='<dt><a href="'.site_url().'site-'.get_site_name($list->web_id,"url").'/info-'.$list->id.'.html"  class="image_link" target="_blank"><img src="'.$pic.'"></a></dt><dd>';

			$str.='<p class="p2"><span class="sp2">'.$list->discount.'</span> <span class="sp1">'.get_time($list->postdate,"m月d日").'-'.get_time($list->left_time,"m月d日").'</span></p>';
			$url2=get_site_name($list->web_id,"url");
			$str.='<p>【<span class="fc3"><a href="'.site_url().'site-'.$url2.'/">'.get_site_name($list->web_id).'</a></span>】<a href="'.site_url().'site-'.$url2.'/info-'.$list->id.'.html" target="_blank">'.$list->name.'</a></p>';
			$str.='<p>剩余：<span alt="" class="time_div"><em>'.$day.'</em>天<em>'.$hour.'</em>小时<em>'.$minute.'</em>分</span>';
			$str.='<span class="ico01"><a href="'.site_url().'goto/sale-to-'.$list->id.'" target="_blank">去看看</a></span></p></dd> </dl>';


			if($i % 4==0){
				$str.'<div class="clear"></div>';
			}
			$i++;
		}
		$str.='<div class="index3">
<h3>男装<span class="more"><a href="'.site_url().'f_dress-man/" name="dress-woman">更多</a></span></h3>';
		$i=1;
		foreach ($list2  as $list)
		{
			$time=$list->left_time;
			$time=$time-time();
			$time=($time>0) ? $time : 0;
			$day=floor($time/86400);
			$hour=floor($time/3600)%24;
			$minute=floor($time/60)%60;
			$xianshi_last=($i % 4==0) ? ' class="dl2"' : "";
			$cate_info=get_table_row("sale_category",preg_replace("/^,(\d+),.*$/is","\$1",$list->category));
			$str.='<dl'.$xianshi_last.'>';
			$pic=($list->image=="") ? $site_url()."resource/images/none.gif" : ((substr($list->image,0,7)=="http://") ? $list->image : site_url().$list->image);
			$str.='<dt><a href="'.site_url().'site-'.get_site_name($list->web_id,"url").'/info-'.$list->id.'.html"  class="image_link" target="_blank"><img src="'.$pic.'"></a></dt><dd>';

			$str.='<p class="p2"><span class="sp2">'.$list->discount.'</span> <span class="sp1">'.get_time($list->postdate,"m月d日").'-'.get_time($list->left_time,"m月d日").'</span></p>';
			$url2=get_site_name($list->web_id,"url");
			$str.='<p>【<span class="fc3"><a href="'.site_url().'site-'.$url2.'/">'.get_site_name($list->web_id).'</a></span>】<a href="'.site_url().'site-'.$url2.'/info-'.$list->id.'.html" target="_blank">'.$list->name.'</a></p>';
			$str.='<p>剩余：<span alt="" class="time_div"><em>'.$day.'</em>天<em>'.$hour.'</em>小时<em>'.$minute.'</em>分</span>';
			$str.='<span class="ico01"><a href="'.site_url().'goto/sale-to-'.$list->id.'" target="_blank">去看看</a></span></p></dd> </dl>';


			if($i % 4==0){
				$str.'<div class="clear"></div>';
			}
			$i++;
		}
		$str.="<div>&nbsp;</div>";
		echo $str;die();
	}
}
