<?php
/*打错的用红色显示，后台列表， 用户名和头像也显示一下
TRUNCATE  `site_question`;
TRUNCATE  `site_user_info`;

CNZZ监测网站，
账号：835115487@qq.com
密码：cnzz-yym
*/
@ini_set('display_errors',"On");
class html5 extends CI_Controller {

	private $uid=0;
	private $appid       = 'wx045d9f4fde4d29b8';								// APPID
	private $secret      = '8662709459bf397d6b53c3ecaf72255a';				    // AppSecret
	function index()
	{
		$this->load->library('session');
		$uid=$this->session->userdata('wx_user_id2');
		$uid=2;
		if(empty($uid))
		{
			$this->get_code();
		}
		else
		{
			$this->load->database();
			/*$res=$this->db->query("select * from ".$this->db->dbprefix."question where type=1 and uid=".$uid. " limit 0,1");
			$row=$res->result();
			$row=@$row[0];
			if(@$row->name && @$row->phone && @$row->address)
			{
				$data['info_sumbit']=1;
			}
			else
			$data['info_sumbit']=0;
			$data['prize']=(!empty($row)) ? @$row->prize : '';
			*/
			$data=array();
			$this->load->library('weixin');
			$data['uid']=$uid;
			$data['signPackage']=$this->weixin->get_share();
			show("html5",$data,0);
		}
	}
		function share()
	{
		require_once FCPATH."application/views/jssdk.php";
		$jssdk = new JSSDK($this->appid, $this->secret);
		$signPackage = $jssdk->GetSignPackage();
		return $signPackage;
	}
	function get_code()
	{
		$this->load->library('session');
		$this->load->library('weixin');
		$this->load->database();
		if(!empty($_GET['code']))
		{

			$this->weixin->get_user_info($_GET['code'],$this->db,$this->session);
			$this->index();
		}
		else
		{
			//$this->weixin2->init(site_url()."/html5/get_code",$this->db);
			$this->weixin->init(site_url()."html5/get_code",$this->db);
		}
	}
	function test()
	{
		$this->load->library('session');
		$this->session->unset_userdata('wx_user_id2');
		
	}
}
