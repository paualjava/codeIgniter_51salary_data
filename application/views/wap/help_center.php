<script type="text/javascript">
  $(document).ready(function(){
   newEnter("case_nav","a","route");
   newEnter("caselist","a","leftgo");
   searchTextClear("case_searchtext","请输入案例关键词");
});
</script>
<script>
var page=1;
function showdata()
{
 $.ajax({
	type: "GET",
	url: "/index.php?m=wap&c=article&a=indexajax&category=case&p="+(page+1),
	dataType: "text",
	success: function (txt) {
		//alert(txt);
	if(txt.replace(/[\r\n]/g,'') && txt.length>2){
	 jQuery("#morenews").append(txt);
	 	 page+=1;}
	 else{
	     jQuery("#index_more").html('已经全部显示完了');
         }
	  }
	});
}
//$(window).scroll(function(){
//    if($(window).scrollTop() == $(document).height() - $(window).height()){
//		jQuery("#index_more").html('<img src="<?php echo $base_url;?>resource/site_yn/images/loading.gif" />');
//		showdata();
//    }
//});
</script>
<link href="<?php echo $base_url;?>resource/wap/site_yn/css/style.css" rel="stylesheet" type="text/css" />
<!-- 主体 -->
	<div id="mainout">
<header class="maintop">
<h2>案例展示</h2>
    <a class="a1" href="http://m.ynyes.com/"><img src="<?php echo $base_url;?>resource/wap/site_yn/images/back.png" /></a>
  <a class="a2" href="javascript:moreFloat(200);"><img src="<?php echo $base_url;?>resource/wap/site_yn/images/top_more.png" /></a>
</header>
<div class="maintop_bg"></div>
<!--<div class="maintop_bg"></div>-->
<!--头部 END-->
<table class="comtab" id="case_nav">
  <tr>
  <?php 
$i=1;
foreach ($category_list as $row){
?>
<td>
      <a class="a<?php echo $i;?> route0<?php echo $i;?>" title="<?php echo $row->name;?>" href="<?php echo $site_url;?>wap/help_center/index/category_<?php echo $row->id;?>"><span><?php echo msubstr($row->name,0,3);?></span></a>
    </td>
<?php echo ($i % 4==0) ? "</tr>
  <tr>" : "";?>
<?php $i++; }?>
    
  
    <td>
      <a class="a8 route08" href="javascript:showSearch('#case_search','#case_searchbg');"><span>案例搜索</span></a>
      <div id="case_searchbg"></div>
    </td>
  </tr>
  <tr>
    <td colspan="4" id="case_search">
          <script type="text/javascript">
function formCheck()
{
        var $q=$("#q").val();
		if ($.trim($q)=='' || $.trim($q)=='请输入企业或网站名称'){
		showtip("亲~请输入关键词查询！");
		$("#q").focus();
		return false;
		}
}
</script>
     <form name="search" type="get" action="<?php echo $site_url;?>wap/help_center" id="search" onsubmit="return formCheck();">
      <input class="text case_searchtext" type="text" name="q" id="q"/>
      <div class="sub"><input type="submit" value="案例搜索" /></div>
      </form>
    </td>
  </tr>
</table>
<div class="clear"></div>
<table class="comtab case_list" id="caselist">
<?php 
$i=1;
foreach ($list["this_data"] as $row){
?>  
<tr><td><a  title="<?php echo $row->title;?>" href="<?php echo $site_url;?>wap/help_center/show/<?php echo $row->id;?>"><img src="<?php echo (@$row->int) ? ((substr(@$row->int,0,4)=='http' || substr(@$row->int,0,1)=='/') ? @$row->int : $base_url.@$row->int)  : "";?>" /><span><?php echo $row->title;?></span></a></td></tr>
      <?php $i++;}?>

</table>
<table class="comtab case_list" id="morenews">
</table>
<div class="clear10"></div>
<p class="case_more"><a href="javascript:;" id="index_more" onclick="showdata();"><img src="<?php echo $base_url;?>resource/wap/site_yn/images/case_page.png" /></a></p>

	<!-- /主体 -->
    <div class="clear10"></div>