<?php
class Success extends CI_Model {
	function main()
	{
		$m='';
		$redirect_url='';
		$a5=$this->uri->segment(5);
		if(preg_match("/^index2_[^\"]*/is",$a5))
		{
			$m=substr($a5,0,strpos($a5,"_"))."/".substr($a5,strpos($a5,"_")+1);
			$redirect_url=site_url()."admin_51salary_data/".$m."?".$_SERVER["QUERY_STRING"];
		}
		else
		$redirect_url=site_url().$this->router->fetch_class()."/index/manager/".$this->uri->segment(5)."/".$this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8)."?".$_SERVER["QUERY_STRING"];
		return array("redirect_url"=>$redirect_url,"m"=>$m);
	}

}
?>
