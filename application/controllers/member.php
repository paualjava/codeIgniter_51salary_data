<?php
class Member extends CI_Controller {
	private $table_name="member";
	private $index_id="id";
	private $num_links=6;
	private $per_page=48;
	function index()
	{
		redirect(site_url()."member/info");
	}
	/**
	 * 判断是否登录
	 *
	 */
	function check()
	{
		$this->load->library('Session');
		if($this->session->userdata('SITE_USER'))
		redirect(site_url());
	}
	/**
	 * 判断是否已经登录
	 *
	 */
	function check_have()
	{
		$this->load->library('Session');
		$from="";
		$from.=($this->uri->segment(1)) ? $this->uri->segment(1)."/" : '';
		$from.=($this->uri->segment(2)) ? $this->uri->segment(2)."/" : '';
		$from.=($this->uri->segment(3)) ? $this->uri->segment(3)."/" : '';
		$from=substr($from,0,strlen($from)-1);
		$from=str_replace("/","__",$from);
		if(!$this->session->userdata('SITE_USER'))
		redirect(site_url()."member/login/".$from);
	}
	/**
	 * 得到登录用户名
	 *
	 * @return unknown
	 */
	function get_username()
	{
		$this->load->library('Session');
		$username=$this->session->userdata('SITE_USER');
		return $username;
	}
	function reg_info()
	{
		$str="&nbsp;";
		$from="";
		for($i=3;$i<8;$i++)
		{
			if($this->uri->segment($i))
			{
				$from.=$this->uri->segment($i)."/";
			}
			else
			break;
		}
		//$from=(substr($from,-1)=="/") ? substr($from,0,strlen($from)-1) : $from;
		if(get_uid())
		{
			$str.= '您好,'.get_username().' !<a href="'.site_url().'member/info">会员中心</a> &nbsp;[<a href="'.site_url().'member/logout/'.$from.'">退出</a>]';
		}
		else
		{
			$str.="<a href='".site_url()."member/login/".$from."' rel='nofollow'>登录</a> | <a href='".site_url()."member/register/' rel='nofollow'>免费注册</a>";
		}
		echo $str;die();
	}
	/**
	 * 用户登录
	 *
	 */
	function login()
	{
		$input=$this->input;
		$data_url=array("base_url"=>base_url(),"web_url"=>base_url()."site/index/","site_url"=>site_url(),"error_info"=>"");
		$this->check();
		if($input->post('user_username') && $input->post('user_password'))
		{
			$this->load->database();
			$pass=$input->post('user_password');
			$sql="select * from ".$this->db->dbprefix."member where username=?";
			$result=$this->db->query($sql,array($input->post('user_username')));
			if ($result->num_rows()==1)
			{
				$row =$result->row();
				if($row->pass==md5($pass))
				{
					$user_info=array(
					"SITE_USER"=>$row->username,
					"SITE_USERID"=>$row->id,
					"SITE_CODE"=>base64_encode($pass)
					);
					$this->load->library('Session');
					$this->session->set_userdata($user_info);
					redirect(site_url().$this->get_from());
				}
				else
				{
					$data_url['error_info']="登录密码不正确";
					show('member_login',$data_url);
				}
			}
			else
			{
				$data_url['error_info']="当前用户不存在";
				show('member_login',$data_url);
			}
		}
		else
		{
			$data_url=array("base_url"=>base_url(),"web_url"=>base_url()."site/index/","site_url"=>site_url(),"error_info"=>"","seo"=>array("seo_title"=>'会员登录'));
			show('member_login',$data_url);
		}
	}
	/**
	 * ajax用户登录
	 *
	 */
	function ajax_login2()
	{
		$data_url=$this->base_url();
		$data_url['from']=$this->uri->segment(3)."/".$this->uri->segment(4);
		show('member_ajax_login',$data_url,2);
	}
	/**
	 * 发邮件
	 *
	 * @param unknown_type $row
	 */
	function ajax_send_activate_email()
	{
		$email=$this->input->post("email");
		$uername=$this->input->post("uername");
		$url=site_url()."member/active/".$this->uri->segment(3);
		$this->load->helper("function");
		mail_send($email,"亲爱的特卖天下用户".$uername.", 请激活您的账号, 完成注册",$this->register_email_content($uername,$url));
		echo "确认信已经发往你的邮箱 ".$email."， 需要你点击邮件中的链接来完成注册。";die();
	}
	function register_email_content($uername,$url)
	{
		$content='
		亲爱的特卖天下用户'.$uername.'，您好：<br><br>请您点击下面链接来激活您的特卖天下帐号:<br><br><a target="_blank" href="'.$url.'">'.$url.'</a>
        <br><br>如果点击链接无效，请您选择并复制整个链接，打开浏览器窗口并将其粘贴到地址栏中，然后单击"转到"按钮或按键盘上的 Enter 键。<br><br>
        请勿直接回复此邮件<br><br><div style="text-align:right;">特卖天下</div>   ';
		return $content;
	}
	function password_get_email_content($uername,$url)
	{
		$content='
		亲爱的特卖天下用户'.$uername.'，您好：<br><br>请您点击下面链接来修改您的特卖天下帐户密码:<br><br><a target="_blank" href="'.$url.'">'.$url.'</a>
        <br><br>如果点击链接无效，请您选择并复制整个链接，打开浏览器窗口并将其粘贴到地址栏中，然后单击"转到"按钮或按键盘上的 Enter 键。<br><br>
        请勿直接回复此邮件<br><br><div style="text-align:right;">特卖天下</div>   ';
		return $content;
	}
	/**
	 * 判断用户是否存在
	 *
	 * @param unknown_type $code
	 */
	function member_have($key,$value)
	{
		$this->load->database();
		$sql="select * from ".$this->db->dbprefix."member where $key=?";
		$result=$this->db->query($sql,array($value));
		return ($result->num_rows()==0) ? true : false;
	}
	/**
	 * 激活用户
	 *
	 */
	function active()
	{
		$code=$this->uri->segment(3);
		$this->load->database();
		$sql="select * from ".$this->db->dbprefix."member where code=?";
		$result=$this->db->query($sql,array($code));
		$row =$result->row();
		if($row)
		{
			if($row->active==2)
			{
				$data=array("active"=>1);
				$update_str=$this->db->update_string($this->db->dbprefix."member", $data,"code='".$code."'");
				$this->db->query($update_str);
				show('member_active_success',array_merge($this->base_url(),array("info"=>$row)));
			}
			else
			{
				show('member_active_again',$this->base_url());
			}

		}
		else
		{
			show('member_active_faild',$this->base_url());
		}

	}

	/**
	 * 用户注册
	 *
	 */
	function register()
	{
		//$this->check();
		$input=$this->input;
		$username=$input->post('txtUserName');
		if($username && $input->post('txtpwd'))
		{
			if($this->member_have("username",$username))
			{
				$this->load->database();
				$data=array(
				"username"=>$username,
				"pass"=>md5($input->post('txtpwd')),
				"email"=>$input->post('txteMail'),
				"province"=>$input->post('province'),
				"mobile"=>$input->post('txtPhone'),
				"sex"=>$input->post('Sex'),
				"reg_time"=>date("Y-m-d H:i:s",time()),
				"ip"=>$input->ip_address(),
				"active"=>2,
				"code"=>uniqid().rand(1,1000));
				$insert_str=$this->db->insert_string("member", $data);
				$this->db->query($insert_str);
				$u_id=$this->db->insert_id();
				$data_url=base_url();

				$user_info=array(
				"SITE_USER"=>$username,
				"SITE_USERID"=>$u_id,
				"SITE_CODE"=>base64_encode($input->post('pass')),
				"SITE_TYPE"=>"2"
				);
				$this->load->library('Session');
				$this->session->set_userdata($user_info);
				redirect(site_url());
			}
			else
			show('member_register_send',array_merge($this->base_url(),array("email"=>$input->post('email'),"username"=>$input->post('username'),"pass"=>$input->post('pass'))));
		}
		else
		{
			show('member_register',array_merge($this->base_url(),array("seo"=>array("seo_title"=>'会员注册'))));
		}
	}
	/**
	 * 新密码设置
	 *
	 */
	function getpwd_findpwd()
	{
		$this->load->database();
		$checkcode=base64_decode($this->input->get("checkcode"));
		if(time()-$checkcode>1200)
		{
			//大于20分钟，链接失效
		}
		$data_url=$this->base_url();
		if($this->input->post("is_post_form"))
		{
			$password=$this->input->post("password");
			if(strlen($password)>=6)
			{
				$update_str=$this->db->update_string($this->db->dbprefix.$this->table_name, $data,$this->index_id."=".$id);
				$this->db->query($update_str);
				$current=($current) ? "/".$current : "";
				$arr = array('errno'=>"0", 'error'=>"编辑成功！",'url'=>url_admin()."grogshop".$current);
				echo json_encode($arr);die();
			}
			//更新密码
			show('member_getpwd_findpwd',$data_url);
		}
	}
	/**
	 * 忘记密码
	 *
	 */
	function getpwd()
	{
		$this->check();
		$this->load->database();
		$data_url=$this->base_url();
		$data_url['return_info']='';
		if($this->input->post("is_post_form"))
		{
			$email=$this->input->post("email");
			$uername=$this->input->post("uername");
			$url=site_url()."member/member_active/".$this->uri->segment(3);
			mail_send($email,"亲爱的用户".$email.", 点击链接进行新密码设置：<a href='".site_url()."member/findpwd/?checkcode='".base64_encode(time())." target='_blank'".site_url()."</a> (20分钟内有效)",$this->register_email_content($email,$url));
			$data_url['email']=$email;
			show('member_getpwd_send_email',$data_url);
		}
		else
		{
			//验证码
			$code=$this->input->post('code');
			$istype=$this->input->post('istype');
			if($code && $istype==2)
			{
				if(strlen($code)==4)
				{
					$this->load->library('session');
					$vcode=$this->session->userdata('vcode');
					if(strtolower($vcode)==strtolower($code))
					{
						echo 1;die();
					}
					else
					echo 0;die();
				}
			}
			$username=$this->input->post('name');
			if($username)
			{
				$member_row=$this->db->get_where($this->db->dbprefix.$this->table_name,array("email"=>$username))->row();
				if(!$member_row)
				{
					echo '{"type":2,"res":0}';die();
				}
				else
				{
					echo '{"type":2,"res":1}';die();
				}
				$this->load->library('session');
				$vcode=$this->session->userdata('vcode');
				if(strtolower($vcode)==strtolower($this->input->post('code')))
				{
					$email=$this->input->post('email');
					$url=site_url()."member/password_reset/".$this->get_member_info("email",$email,"code");
					$uername=$this->get_member_info("email",$email,"username");
					$this->load->helper("function");
					mail_send($email,"亲爱的特卖天下用户".$uername.", 请您重置密码",$this->password_get_email_content($uername,$url));
					$data_url['return_info']='确认信已经发往你的邮箱 '.$email.'， 请点击邮件中的链接来完成密码重置。如果5分钟后您的收件箱仍没有收到此邮件，请查看您的垃圾邮件。</p><p>请输入您注册的电子邮箱，然后点击确定重新设置密码。';
					show('member_getpwd',$data_url);

				}
				else {
					$data_url['return_info']='验证码错误。';
					show('member_getpwd',$data_url);
				}

			}
			else
			{
				show('member_getpwd',array_merge($data_url,array("seo"=>array("seo_title"=>'忘记密码'))));
			}
		}

	}
	/**
	 * 重置密码
	 *
	 */
	function password_reset()
	{
		$this->check_have();
		$data_url=$this->base_url();
		$code=$this->uri->segment(3);
		$this->load->database();
		$data_url['return_info']='';
		if($this->input->post('NewPassword') && $this->input->post('ConfirmPassword') && $this->input->post('NewPassword')==$this->input->post('ConfirmPassword'))
		{
			$data=array("pass"=>md5($this->input->post('NewPassword')));
			$update_str=$this->db->update_string($this->db->dbprefix."member", $data,"id=?");
			$this->db->query($update_str,array(get_uid()));
			$data_url['return_info']='密码修改成功！';
			show('member_password_reset',$data_url);
		}
		else
		{
			show('member_password_reset',$data_url);
		}
	}
	function get_website()
	{
		//'http://192.168.1.111/codeIgniter_system2/';
		$url=site_url();
		$n=0;
		$pos = -1;
		do{
			$pos = strpos($url, "/", $pos+1);
			$n++;
			if($n==3){
				echo $pos;
				break;
			}
		}while($pos!==false);
		return substr($url,0,$pos+1);

	}
	/**
	 * 修改头像
	 *
	 */
	function avatar()
	{
		$this->check_have();
		$data_url=$this->base_url();
		$code=$this->uri->segment(3);
		$this->load->database();
		$data_url['return_info']='';
		$member_info=get_table_row("member",get_uid());
		$data_url['member_info']=$member_info;
		if($this->uri->segment(3)=="ajax_avatar_crop")
		{
			if($this->input->post("ix") && $this->input->post("iy"))
			
			{
				$array_pic=array();
				$pic_x=$this->input->post("ix");
				$pic_x2=$pic_x+$this->input->post("iw");
				$pic_y=$this->input->post("iy");
				$pic_y2=$pic_y+$this->input->post("ih");

				$new_file_pic=$this->input->post("ip");
				$dir_local=dirname(dirname(dirname(dirname(str_replace("\\","/",__FILE__)))));
				$new_file_pic=$dir_local.$new_file_pic;
				/**生成大图片***/
				$new_crop=substr($new_file_pic,0,strrpos($new_file_pic,"."))."c".substr($new_file_pic,strrpos($new_file_pic,"."));
				$this->load->library("image_moo");
				$sing=$this->image_moo
				->load($new_file_pic)
				->crop(intval($pic_x),intval($pic_y),intval($pic_x2),intval($pic_y2))
				->save($new_crop,true);
				$array_pic['pic']=str_replace($dir_local,"",$new_crop);
				/**生成中图片***/
				$new_crop_middle=substr($new_file_pic,0,strrpos($new_file_pic,"."))."m".substr($new_file_pic,strrpos($new_file_pic,"."));
				$config['image_library'] = 'gd2';
				$config['source_image'] = $new_file_pic;
				$config['maintain_ratio'] = TRUE;
				$config['quality']='100%';
				$config['new_image'] = $new_crop_middle;//(必须)设置图像的目标名/路径
				$config['width'] = 90;
				$config['height'] = 90;
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				if ( ! $this->image_lib->resize())
				{
					echo $this->image_lib->display_errors();
					die();
				}
				else
				{
					$array_pic['pic_middle']=str_replace($dir_local,"",$new_crop_middle);
					$array_pic['pic_small']=str_replace($dir_local,"",$new_crop_middle);
				}
				/**生成小图片***/
				/*	$new_crop_small=substr($new_file_pic,0,strrpos($new_file_pic,"."))."s".substr($new_file_pic,strrpos($new_file_pic,"."));
				$config['image_library'] = 'gd2';
				$config['source_image'] = $new_file_pic2;
				$config['maintain_ratio'] = TRUE;
				$config['quality']='100%';
				$config['new_image'] = $new_crop_small;//(必须)设置图像的目标名/路径
				$config['width'] = 30;
				$config['height'] = 30;
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				if ( ! $this->image_lib->resize())
				{
				echo $this->image_lib->display_errors();
				die();
				}
				else
				$array_pic['pic_small']=$new_crop_small;*/
				$update_str=$this->db->update_string($this->db->dbprefix."member", $array_pic,$this->index_id."=".get_uid());
				$this->db->query($update_str);
				$arr = array('success'=>1, 'sp_url'=>str_replace($dir_local,"",$new_crop),'bp_url'=>str_replace($dir_local,"",$new_crop));
				echo json_encode($arr);die();
				//{"success":1,"sp_url":"http:\/\/www.chasefuture.com\/uploads\/201406\/BDCDA013-8BE7-1304-24E2-7A8EBCB1B1AB.jpg","bp_url":"http:\/\/www.chasefuture.com\/uploads\/201406\/734F4487-A77E-DEB4-1040-11155BC57AB2.jpg"}
			}
			elseif(($this->uri->segment(4)=="save"))
			{
				$arr = array('success'=>true, 'message'=>"更新头像成功!",'content'=>"","callback"=>"","immediately"=>"");
				echo json_encode($arr);die();
			}
		}
		else
		{
			show('member_avatar',$data_url);
		}
	}
	function get_from()
	{
		$from="";
		$str="";
		$from=$this->uri->segment(3);
		$from=str_replace("member__login__","",$from);
		if(strpos($from,"__"))
		{
			$from=explode("__",$from);
			foreach($from as $f_row)
			{
				$str.=$f_row."/";
			}
			$str=(substr($str,-1)=="/") ? substr($str,0,strlen($str)-1) : $str;
		}
		return $str;
	}
	/**
	 * 用户退出
	 *
	 */
	function logout()
	{

		$this->load->library('session');
		$this->session->unset_userdata(array('SITE_USER'=>'','SITE_USERID'=>'','SITE_CODE'=>''));
		redirect(site_url().$this->get_from());
	}
	function center()
	{
		$this->load->database();
		$row=$this->db->get_where($this->db->dbprefix.$this->table_name,array("id"=>get_uid()))->row();
		//$row=array_merge($this->base_url(),$row);
		//$row=array_merge($row,array("current_nav"=>"info"));
		$data['member_left']=$this->load->view('member_left',$row, true);
		$data['info']=$row;
		$data['seo']=array("seo_title"=>"个人信息设置");
		//$data['member_left']=$this->load->view('member_left',$row, true);
		show('member_center',$data);
	}
	/**
	 * 修改资料
	 *
	 */
	function info()
	{
		$this->check_have();
		$input=$this->input;
		$error_info='';
		$this->load->database();
		if($input->post('chk'))
		{
			$info = array(
			"name"	=> $input->post('name'),
			"sex"	=> $input->post('sex'),
			"birthday"	=> $input->post('birthday'),
			"mobile"	=> $input->post('mobile'),
			"email"	=> $input->post('email'),
			"address"	=> $input->post('address'),
			"username"	=> $this->get_username(),
			);
			$sql="UPDATE ".$this->db->dbprefix."member SET name=?,sex=?,birthday=?,mobile=?,email=?,address=?"
			."WHERE status<>'2' AND username=?";
			$this->db->query($sql,$info);
			$error_info="用户信息修改成功";
		}

		$sql="select * from ".$this->db->dbprefix."member where id=?";
		$result=$this->db->query($sql,array(get_uid()));
		$row=$result->result();
		$data_url=$this->base_url();
		$row=array_merge($data_url,$row);
		$row=array_merge($row,array("current_nav"=>"info"));
		$data['member_left']=$this->load->view('member_left',$row, true);
		$data['info']=$row[0];
		$data['seo']=array("seo_title"=>"个人信息设置");
		$data['error_info']=$error_info;
		//$data['member_left']=$this->load->view('member_left',$row, true);
		show('member_info',$data);
	}
	function base_url()
	{
		$data_url=array("base_url"=>base_url(),"web_url"=>base_url()."site/index/","site_url"=>site_url());
		return $data_url;
	}
	/**
	 * 订单列表
	 *
	 */
	function order()
	{
		$this->check_have();
		$lock_file=FCPATH."cache/lock_order.txt";
		$time_c=file_get_contents($lock_file);
		//if((time()-intval($time_c))<1200)
		//if((time()-intval($time_c))<3600)
		if((time()-intval($time_c))>40)
		{
			@file_put_contents($lock_file,time());
			$this->load->database();
			$new_url="http://www.linktech.cn/AC/trans_cps08.htm";
			$content=$this->get_linktech_content($new_url);
			//<tr bgcolor=#FFFFFF align=center><td><a href="merchant_view08.htm?merchant_id=fclub">fclub</a></td><td>A100129113</td><td>DD20130418D18BA</td><td>2013.04.18 16:26</td><td>1578</td><td align=right>1</td><td align=right>139.00</td><td align=right>139.00</td><td align=right>7.65</td><td>未核对</td><td></td><td></td><td></td></tr>
			preg_match_all("/<tr bgcolor=#FFFFFF align=center>[^<]*<td>[^<]*<a href=[^>]*>([^<]*)<\/a>[^<]*<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td align=right>([^<]*)<\/td>[^<]*<td align=right>([^<]*)<\/td>[^<]*<td align=right>([^<]*)<\/td>[^<]*<td align=right>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<td>([^<]*)<\/td>[^<]*<\/tr>/is",$content,$list);
			$shop=array_reverse($list[1]);
			$order_id=array_reverse($list[3]);
			$postdate=array_reverse($list[4]);
			$item_count=array_reverse($list[6]);
			$price=array_reverse($list[7]);
			$price_fanli=array_reverse($list[9]);
			$status=array_reverse($list[10]);
			foreach($order_id as $key=>$value)
			{
				if($this->linktech_not_exist($value,$key))
				{
					$postdate[$key]=str_replace(".","-",$postdate[$key]);
					$info=array("order_id"=>$value,"uid"=>get_uid(),"order_index"=>$key,"price_fanli"=>$price_fanli[$key],"order_time"=>strtotime($postdate[$key]),"price"=>$price[$key],"shop"=>$shop[$key],"item_count"=>$item_count[$key],"postdate"=>time());
					$insert_str=$this->db->insert_string($this->db->dbprefix."member_order", $info);
					$this->db->query($insert_str);
				}
			}
			//@file_put_contents($lock_file,time());
		}
		$row=array();
		//$row=array_merge($data_url,$row);
		$row=array_merge($row,array("current_nav"=>"inbox"));
		//$row['member_left']=$this->load->view('member_left',$row, true);
		$this->load->library('memberlist');
		$memberinbox=$this->memberlist->order();
		$row=array_merge($row,$memberinbox);
		show('member_order',$row);
	}
	/**
	 * 评论
	 *
	 */
	function comment()
	{
		$this->check_have();
		$this->load->database();
		$result=$this->db->query("select * from ".$this->db->dbprefix."member_comment where uid=".get_uid());
		$temp=array();
		foreach ($result->result() as $row)
		{
			$temp[]=$row;
		}
		$data['list']=$temp;
		show('member_comment',$data);
	}
	/**
	 * 修改密码
	 *
	 * @param unknown_type $oldpwd
	 * @param unknown_type $newpwd
	 * @return unknown
	 */
	function chgpwd()
	{
		$this->check_have();
		$input=$this->input;
		$error_info='';
		if($input->post('chk'))
		{
			$pass_old=$input->post('old_pass');
			$pass_new=$input->post('new_pass');
			if($pass_old && $pass_new)
			{
				$this->load->database();
				$sql="select * from ".$this->db->dbprefix."member where username=?";
				$result=$this->db->query($sql,array($this->get_username()));
				if ($result->num_rows()==1)
				{
					$row =$result->row();
					if($row->pass==md5($pass_old))
					{
						$sql="UPDATE ".$this->db->dbprefix."member SET pass=? WHERE status<>'2' AND username=?";
						$this->db->query($sql,array(md5($pass_new),$this->get_username()));
						$error_info="密码修改成功";
					}
					else
					{
						$error_info="旧密码不正确";
					}
				}
				else
				{
					$error_info="当前用户不存在";
				}
			}
		}
		$data_url=array("base_url"=>base_url(),"web_url"=>base_url()."site/index/","site_url"=>site_url(),"error_info"=>$error_info,"current_nav"=>"chgpwd");
		$data_url['member_left']=$this->load->view('member_left',$data_url, true);
		$data_url=array_merge($data_url,array("nav_on_info"=>"on"));
		$data_url['seo']=array("seo_title"=>"修改密码");
		show('member_chgpwd',$data_url);
	}
	/**
	 * 标记收藏
	 *
	 */
	function add_collect()
	{
		if(!get_username() && get_uid())
		{
			echo "not login";die();
		}
		else
		{
			$this->load->database();
			$sql="select * from ".$this->db->dbprefix."member_collect where sale_id=? and uid=?";
			$result=$this->db->query($sql,array($this->uri->segment(3),get_uid()));
			if($result->num_rows()==0)
			{
				$data=array("sale_id"=>intval($this->uri->segment(3)),"uid"=>get_uid(),"postdate"=>time());
				$insert_str=$this->db->insert_string($this->db->dbprefix."member_collect", $data);
				$this->db->query($insert_str);
				echo "ok";die();
			}
			else
			{
				echo "failure";die();
			}
		}
	}
	/**
	 * 异步提交 判断验证码
	 *
	 */
	function ajax_code($code)
	{
		$this->load->library('session');
		$vcode=$this->session->userdata('vcode');
		echo (strtolower($vcode)==strtolower($code)) ? "ok" : "0";
	}


	/**
	 * 异步提交
	 *
	 */
	function ajax()
	{
		$type=$this->input->post("type");
		switch ($type)
		{
			case "username":
				$this->ajax_valid($type,$this->input->post($type));
				break;
			case "email":
				$this->ajax_valid($type,$this->input->post($type));
				break;
			case "code":
				$this->ajax_code($this->input->post($type));
				break;

		}
	}
	/**
	 * 删除收藏
	 *
	 */
	function del_collect_item()
	{
		$this->check_have();
		$this->load->database();
		$id=intval($this->uri->segment(3));
		$sql ="delete from ".$this->db->dbprefix."member_collect"." where id=".$id;
		$this->db->query($sql);
		echo "ok";
	}
	/**
	 * 删除购买
	 *
	 */
	function del_buy_item()
	{
		$this->check_have();
		$this->load->database();
		$id=intval($this->uri->segment(3));
		$sql ="delete from ".$this->db->dbprefix."member_buy"." where id=".$id;
		$this->db->query($sql);
		echo "ok";
	}
	function get_member_info($col,$col_value,$column='id')
	{
		$this->load->database();
		$result=$this->db->query("select * from ".$this->db->dbprefix."member where ".$col."=?",array($col_value));
		$row =$result->row();
		if(!$row)
		show_404();
		return $row->$column;
	}
	function generate()
	{
		echo generate();
	}
	/**
	 * ajax用户登录
	 *
	 */
	function ajax_login()
	{
		if($this->input->post('username') && $this->input->post('pass'))
		{
			$this->load->database();
			$pass=$this->input->post('pass');
			$sql="select * from ".$this->db->dbprefix."member where username=?";
			$result=$this->db->query($sql,array($this->input->post('username')));
			if ($result->num_rows()==1)
			{
				$row =$result->row();
				if($row->pass==md5($pass))
				{
					$user_info=array(
					"SITE_USER"=>$row->username,
					"SITE_USERID"=>$row->id,
					"SITE_CODE"=>base64_encode($pass)
					);
					$this->load->library('Session');
					$this->session->set_userdata($user_info);
					echo "ok";die();
				}
				else
				{
					echo "用户名或密码错误";die();
				}
			}
			else
			{
				echo "不存在该用户";die();
			}
		}
	}
	function ajax_email_is_have()
	{
		$email=$this->input->post("email");
		$is_tag=$this->ajax_valid("email",$email);
		insert_log("email",$email);
		echo ($is_tag) ? "true" : "false";
		die();
	}
	function ajax_username_is_have()
	{
		$username=$this->input->post("username");
		$is_tag=$this->ajax_valid("username",$username);
		echo ($is_tag) ? "true" : "false";
		die();
	}	/**
	 * 异步提交 判断是否存在
	 *
	 */
	function ajax_valid($key,$value)
	{
		$this->load->database();
		$sql="select * from ".$this->db->dbprefix."member where $key=?";
		$result=$this->db->query($sql,array($value));
		return ($result->num_rows()==0) ? true : false;
	}
}
