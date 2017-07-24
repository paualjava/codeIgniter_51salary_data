<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tree   {
	public $array_id=array();
	public $array_order=array();
	public $array_url=array();
	public $array_urlcomment=array();
	public $data=array();
	public $cateArray=array();
	function Tree()
	{
	}
	function setNode ($id, $parent, $value,$url,$urlcomment,$order=0)
	{
		$parent = $parent ? $parent : 0;
		$this->array_id[$id] = $id;
		$this->array_order[$id] = $order;
		$this->array_url[$id] = $url;
		$this->array_urlcomment[$id] = $urlcomment;
		$this->data[$id] = $value;
		$this->cateArray[$id] = $parent;
	}
	function getChildsTree($id=0)
	{
		$childs=array();
		foreach ($this->cateArray as $child=>$parent)
		{
			if($parent==$id)
			{
				$childs[$child]=$this->getChildsTree($child);
			}
		}
		return $childs;
	}
	function getChilds($id=0)
	{
		$childArray=array();
		$childs=$this->getChild($id);
		foreach ($childs as $child)
		{
			$childArray[]=$child;
			$childArray=array_merge($childArray,$this->getChilds($child));
		}
		return $childArray;
	}
	function getChild($id)
	{
		$childs=array();
		foreach ($this->cateArray as $child=>$parent)
		{
			if ($parent==$id)
			{
				$childs[$child]=$child;
			}
		}
		return $childs;
	}
	function getNodeLever($id)
	{
		$parents=array();
		if (key_exists($this->cateArray[$id],$this->cateArray))
		{
			$parents[]=$this->cateArray[$id];
			$parents=array_merge($parents,$this->getNodeLever($this->cateArray[$id]));
		}
		return $parents;
	}
	function getLayer($id,$preStr='|-')
	{
		return str_repeat($preStr,count($this->getNodeLever($id)));
	}
	function getValue ($id)
	{
		return $this->data[$id];
	}
	function getId ($id)
	{
		return $this->array_id[$id];
	}
	function getOrder($id)
	{
		return $this->array_order[$id];
	}
	function getUrl($id)
	{
		return $this->array_url[$id];
	}
	function getUrlcomment($id)
	{
		return $this->array_urlcomment[$id];
	}
}