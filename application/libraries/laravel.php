<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class laravel   {
	private $appid       = 'wx045d9f4fde4d29b8';								// APPID
	private $secret      = '8662709459bf397d6b53c3ecaf72255a';				    // AppSecret
	private $table_token = 'weixin_token';										// 用户表
	private $session     = '';
	private $db          = '';
	public $session_name = '';
	function init($redirect_uri,$db,$session_name,$callback='')
	{

	}
	function write_file_yii2_view($table_name,$array_url,$input_data,$array_type_new,$table_name_zh,$create_view="")
	{
		$table_col="";
		$str_view_list="";
		$is_show="";
		$sort_order="";
		$search_cate="";
		$search_cate_column_view="";
		$search_is_show="";//审核显示
		$search_cate_js="";
		$search_cate_js2="";
		$search_cate_search_keywrod="";
		$kind=1;
		foreach($input_data as $key=>$value)
		{
			if($value[15]=="1" && $value[14]!="1")//列显示
			{
				$table_col.="            <th>".$value[10]."</th>\r\n";
				if($value[9]=="pic")
				{
					$str_view_list.="<?php \$pic=@\$val->".$value[0]."; \$pic=(substr(@\$pic,0,4)=='http' || substr(@\$pic,0,1)=='/') ? @\$pic : ((@\$pic) ? Yii::getAlias(\"@base_url\").\"/\".@\$pic : Yii::getAlias(\"@web\").\"/\".'resource/images/white.gif');?>"
					. "<td><?=Html::img(\$pic,['border'=>0,'style'=>'padding:1px;height:23px;border:solid 1px #ddd;']);?></td>\r\n";
				}
				elseif($value[9]=="pic_multiple")
				{
					$str_view_list.="<?php \$pic=@\$val->".$value[0]."; \$pic=(substr(@\$pic,0,4)=='http' || substr(@\$pic,0,1)=='/') ? @\$pic : ((@\$pic) ? Yii::getAlias(\"@base_url\").\"/\".@\$pic : '@web/'.'resource/images/none_small.png');?>"
					. "<td><?=Html::img(\$pic,['border'=>0,'style'=>'padding:1px;height:23px']);?></td>\r\n";
				}
				elseif($value[9]=="postdate")
				$str_view_list.="            <td><?= Html::encode(date(\"Y-m-d H:i:s\",\$val->".$value[0]."));?></td>\r\n";
				elseif($value[9]=="cate" || $value[9]=="cate_simple")
				{
					$cate_table=$this->get_cate_table($value[0],$value[10],$table_name,$value[9]);
					$str_view_list.="            <td><?= \$val->getCategory".ucfirst($value[0])."(\$val->".$value[0].");?></td>\r\n";
					$search_cate.='<span  style="color:#808080;">&nbsp; '.$value[10].':</span><select name="'.$value[0].'" id="'.$value[0].'" style="width:120px;height:28px;" class="wizard-ignore ui-wizard-content ui-helper-reset ui-state-default">
<option value="">全部</option>
<?php foreach ($category_list_'.$value[0].'  as $row){
$select=($row->id==@$search_value[\''.$value[0].'\']) ? \'selected="selected"\' : "";?>
 <option value="<?php echo $row->id;?>"  <?php echo $select;?>><?php echo $row->name;?></option>
<?php }?></select> ';
					$search_cate.="\r\n";
					$search_cate_js.='		'.$value[0].'=$("#'.$value[0].'").val();';
					$search_cate_js.="\r\n";
					$search_cate_js2.=' && '.$value[0].'==""';
					$search_cate_column_view.=' || @$search_'.$value[0];
				}
				elseif($value[9]=="cate_more" || $value[9]=="cate_more_simple")
				{
					$cate_table=$this->get_cate_table($value[0],$value[10],$table_name,$value[9]);
					$str_view_list.="            <td><?= \$val->getCategory".ucfirst($value[0])."(\$val->".$value[0].");?></td>\r\n";
					$search_cate.='<span  style="color:#808080;">&nbsp; '.$value[10].':</span><select name="'.$value[0].'" id="'.$value[0].'" style="width:120px;height:28px;" class="wizard-ignore ui-wizard-content ui-helper-reset ui-state-default">
<option value="">全部</option>
<?php foreach ($category_list_'.$value[0].'  as $row){
$select=($row->id==@$search_value[\''.$value[0].'\']) ? \'selected="selected"\' : "";?>
 <option value="<?php echo $row->id;?>" <?php echo $select;?>><?php echo $row->name;?></option>
<?php }?></select> ';
					$search_cate.="\r\n";
					$search_cate_js.='		'.$value[0].'=$("#'.$value[0].'").val();';
					$search_cate_js.="\r\n";
					$search_cate_js2.=' && '.$value[0].'==""';
					$search_cate_column_view.=' || @$search_'.$value[0];
				}
				elseif($value[9]=="is_show")
				{
					$search_cate_js.='		'.$value[0].'=$("#'.$value[0].'").val();';
					$search_cate_js2.=' && '.$value[0].'==""';
					$search_is_show.='<span  style="color:#808080;">&nbsp; '.$value[10].':</span> <select name="'.$value[0].'" id="'.$value[0].'" style="width:70px;height:28px;" class="wizard-ignore ui-wizard-content ui-helper-reset ui-state-default">
<option value="">全部</option>
<?php 
$category_is_show=array("1"=>"显示","2"=>"隐藏");
foreach ($category_is_show  as $key=>$value){
$select=($key==@$search_value[\''.$value[0].'\']) ? \'selected="selected"\' : "";?>
 <option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value;?></option>
<?php }?>
</select>';
					$str_view_list.="            <td><?php echo (\$val->is_show==1) ? '<span class=\"label label-satgreen is_show\" style=\"cursor:pointer\">显示</span>' : '<span class=\"label is_show\" style=\"cursor:pointer\">隐藏</span>';?></td>\r\n";
					$is_show='<script type="text/javascript">
$(".is_show").each(function ()
{
	$(this).live("click",function ()
	{
		sort_id=$(this).parent().parent().find("td").eq(1).html();
		this_url="<?php echo Url::toRoute(["'.$table_name.'/ajax-save-is-show"]);?>";
                var a=$(this);
                $.post(this_url,{"id":sort_id,"_csrf": "<?php echo $CsrfToken;?>"},function (result)
                {
                    if(result==1)
                    {

                            $(a).attr("class","label label-satgreen is_show");
                            $(a).html("显示");
                    }
                    else
                    {
                            $(a).attr("class","label is_show");
                            $(a).html("隐藏");
                    }
                })
})
})

</script>';
				}
				elseif($value[9]=="sort_order")
				{
					$str_view_list.="            <td><input name=\"sort_order\" type=\"text\" value=\"<?= Html::encode(\$val->".$value[0].");?>\" style=\"width:50px;\" class=\"sort_order\"></td>\r\n";
					$sort_order='<script type="text/javascript">
$(".sort_order").focusin(function() {
		$(this).attr("v", $(this).val());
	}).focusout(function() {
		var orderby = $(this).val();
		var old_orderby = $(this).attr("v");
		if(orderby == old_orderby) {return;}
		sort_id=$(this).parent().parent().find("td").eq(1).html();
		this_url="<?php echo Url::toRoute(["'.$table_name.'/ajax-save-sort-order"]);?>";
		$.post(this_url,{id:sort_id, orderby:orderby,"_csrf": "<?php echo $CsrfToken;?>"}, function(data){
			//if(data.err==0) //get_data();
		});
	});
</script>';
				}
				elseif($value[9]=="value_multiple")
				{
					$str_view_list.="            <td></td>\r\n";
				}
				else
				$str_view_list.="            <td><?= Html::encode(\$val->".$value[0].");?></td>\r\n";
			}
		}
		$this->load->helper('file');
		/****view_add******/
		$search_cate_search_keywrod=($search_cate_js!="") ? "请输入搜索条件" : "请输入关键词";
		if($create_view=="create_view")
		$file=FCPATH."application/models2/yii2/views/slide/index.php";
		else
		$file=FCPATH."application/models2/yii2/views/slide/index.php";
		$content=file_get_contents($file);
		$content=str_replace("<str_view_list>",$str_view_list,$content);
		$content=str_replace("slide",$table_name,$content);
		$content=str_replace("<table_col>",$table_col,$content);
		$content=str_replace("<table_name_zh>",$table_name_zh,$content);
		$content=str_replace("<table_name_zh_add>",str_replace("管理","",$table_name_zh),$content);
		$content=str_replace("<is_show>",$is_show,$content);
		$content=str_replace("<search_is_show>",$search_is_show,$content);
		$content=str_replace("<sort_order>",$sort_order,$content);
		$content=str_replace("<search_cate>",$search_cate,$content);
		$content=str_replace("<search_cate_column_view>",$search_cate_column_view,$content);
		$content=str_replace("<search_cate_js2>",$search_cate_js2,$content);
		$content=str_replace("<search_cate_js>",$search_cate_js,$content);
		$content=str_replace("<search_cate_search_keywrod>",$search_cate_search_keywrod,$content);
		//$content=$this->replace_file_view($content,$array_zh,$array_url,$table_name,$table_name_zh,$array_type);
		$file2=FCPATH."yii2/backend/views/".$table_name."/";
		@create_dir($file2);
		$content=$this->replace_blank_row($content);
		$s=write_file($file2."index.php", $content,"w");
	}

}