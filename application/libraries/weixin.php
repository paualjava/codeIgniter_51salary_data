<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class weixin   {
	private $appid       = 'wx045d9f4fde4d29b8';								// APPID
	private $secret      = '8662709459bf397d6b53c3ecaf72255a';				    // AppSecret
	private $table_token = 'weixin_token';										// 用户表
	private $session     = '';
	private $db          = '';
	public $session_name = '';
	function init($redirect_uri,$db,$session_name,$callback='')
	{
		$this->session_name  = $session_name;
		$redirect_uri 	     = urlencode($redirect_uri);
		$callback            = ($callback) ? urlencode($callback) : mt_rand(1,10000);
		$this->db            = $db;
		$url                 = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state='.$callback.'&connect_redirect=1#wechat_redirect';
		header('location:'.$url);
	}
	//获取微信用户详情
	function get_user_info($code,$db,$session)
	{
		$this->db       = $db;
		$this->session  = $session;
		//第二步：通过code获取access_token
		if(!empty($code))
		{
			$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->secret."&code=".$code."&grant_type=authorization_code";
			$result = $this->https_request($url);
			$jsoninfo = json_decode($result, true);
			if(!empty($jsoninfo["access_token"]) && !empty($jsoninfo["openid"]) ) {
				$access_token = $jsoninfo["access_token"];
				$openid = $jsoninfo["openid"];
			}else{
				echo 'Link shixiao ,pleace again';
				die();
			}
			//检验授权凭证（access_token）是否有效
			$url2 = "https://api.weixin.qq.com/sns/auth?access_token=$access_token&openid=$openid";
			$result2=$this-> https_request($url2);
			$jsoninfo2 = json_decode($result2, true);
			if($jsoninfo2['errmsg'] == 'ok')
			{
				//获取用户个人信息（UnionID机制）
				$url3 = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
				$result3= $this->https_request($url3);
				$jsoninfo3 = json_decode($result3, true);
				if (!empty($jsoninfo3['unionid'])){
					$uid=$this->save_user_info($jsoninfo3);
					/*if (substr($_REQUEST ['state'],0,4)=="http") {
					header('location:'.trim ($_REQUEST['state']));
					}*/
				}
				return $jsoninfo3;
			}
		}
	}
	function save_user_info($wx_user_info)
	{

		$result=$this->db->query("SELECT `id`,`openid` FROM ".$this->db->dbprefix."user_info WHERE  wx_unionid =?",array($wx_user_info['unionid']));
		$row=$result->result();
		if(!empty($row))
		{
			$id=@$row[0]->id;
			if($wx_user_info ['openid'] && $wx_user_info ['unionid'] && $wx_user_info ['nickname'] && $wx_user_info ['headimgurl'])
			{
				$data = array(
				'openid'            =>trim($wx_user_info ['openid']),//openid
				'wx_unionid'        =>trim($wx_user_info ['unionid']),//unionid
				'nickname'          =>trim($wx_user_info ['nickname']),//用户昵称
				'headimgurl'        =>trim($wx_user_info ['headimgurl']),//头像
				);
				$update_str=$this->db->update_string($this->db->dbprefix."user_info", $data,"id=".$id);
				$this->db->query($update_str);
			}
			$newdata = array($this->session=>$id,'sess_expiration' => 3600);
			$this->session->set_userdata($newdata);
			return $id;
		}
		else
		{
			$data = array(
			'openid'            =>trim($wx_user_info ['openid']),//openid
			'wx_unionid'        =>trim($wx_user_info ['unionid']),//unionid
			'nickname'          =>trim($wx_user_info ['nickname']),//用户昵称
			'headimgurl'        =>trim($wx_user_info ['headimgurl']),//头像
			'postdate'          =>time()//时间
			);
			$insert_str=$this->db->insert_string($this->db->dbprefix."user_info", $data);
			$this->db->query($insert_str);
			$insert_id=$this->db->insert_id();

			$newdata = array($this->session=>$insert_id,'sess_expiration' => 3600);
			$this->session->set_userdata($newdata);
			return $insert_id;
		}
	}
	//获取access_token的值
	public function get_access_token($code='')
	{
		//读取文件中的access_token 如果过期再写入
		$file_content = $this->get_token();
		if( !empty($file_content) )
		{
			$data = explode(';',$file_content);
			if(count($data) == 2 && !empty($data[0]))
			{
				if(time()-$data[1] < 7000 )
				{
					//取出access_token
					return $data[0];
				}else
				{
					$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->secret;
					$result = $this->https_request($url);
					$jsoninfo = json_decode($result, true);
					$access_token = $jsoninfo["access_token"];

					$data = array(
					'access_token'      =>$access_token,//openid
					'time     '        =>time(),//unionid
					);
					$update_str=$this->db->update_string($this->db->dbprefix.$this->table_token,$data,"1=1");
					$this->db->query($update_str);
					//print_r($jsoninfo);
					//重新写入access_token
					return $access_token;
				}
			}
		}
		else
		{
			die("table weixin_token empty");
		}
	}
	function get_token()
	{
		$result=$this->db->query("SELECT * FROM ".$this->db->dbprefix.$this->table_token." limit 1");
		$row=$result->result();
		$data=$row[0];
		if($data)
		{
			$str_conten = $data->access_token.';'.$data->time;
			return $str_conten;
		}
		else
		return "";
	}
	function get_share()
	{
		require_once FCPATH."application/views/jssdk.php";
		$jssdk = new JSSDK($this->appid, $this->secret);
		$signPackage = $jssdk->GetSignPackage();
		return $signPackage;
	}
	function https_request($url, $data = null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}

}