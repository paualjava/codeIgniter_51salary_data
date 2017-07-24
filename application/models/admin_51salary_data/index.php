<?php
class Index extends CI_Model {
	function main()
	{
		return array("menu_array"=>$this->get_admin_menu());
	}
	function get_admin_menu()
	{
		$menu_array=array();
		$result=$this->db->query("select * from ".$this->db->dbprefix."menu_admin where parent_id=0 order by sort_order desc");
		foreach ($result->result() as $row)
		{
			$result2=$this->db->query("select * from ".$this->db->dbprefix."menu_admin where parent_id=".$row->id."  order by sort_order desc");
			$temp=array();
			array_push($temp,array($row->name,$row->url));
			foreach ($result2->result() as $row2)
			{
				array_push($temp,array($row2->name,$row2->url));
			}
			array_push($menu_array,$temp);
		}
		return $menu_array;
		$menu_file=FCPATH."cache/menu_admin.php";
		$menu_content=file_get_contents($menu_file);
		$menu_content=explode("--",$menu_content);
		$menu_array=array();
		$pp=1;
		foreach($menu_content as $menu_v)
		{
			if($menu_v)
			{
				$p=explode("______",$menu_v);
				$temp=array();
				$i=1;
				foreach($p as $key=>$p_v)
				{
					$p2=explode("@",$p_v);
					$parent_id=($i==1) ? 0 : $pp;
					$data=array("name"=>$p2[0],"url"=>$p2[1],"parent_id"=>$parent_id,"postdate"=>time());
					$insert_str=$this->db->insert_string($this->db->dbprefix."menu_admin", $data);
					//$this->db->query($insert_str);
					array_push($temp,$p2);
					$i++;
				}
				$pp++;
				array_push($menu_array,$temp);
			}
		}
		return $menu_array;
	}
}
?>
