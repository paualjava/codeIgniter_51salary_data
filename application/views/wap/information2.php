<link href="<?php echo $base_url;?>resource/wap/site_yn/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
  $(document).ready(function(){
});
</script>
<script>
var page=1;
function showdata()
{
 $.ajax({
	type: "GET",
	url: "/index.php?m=wap&c=information2&a=indexajax&category=blog&p="+(page+1),
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
//		jQuery("#index_more").html('<img src="<?php echo $base_url;?>resource/wap/site_yn/images/loading.gif" />');
//		showdata();
//    }
//});
</script>
<!-- 主体 -->
	<div id="mainout">
<header class="maintop">
<h2>新闻动态</h2>
    <a class="a1" href="http://m.ynyes.com/"><img src="<?php echo $base_url;?>resource/wap/site_yn/images/back.png" /></a>
  <a class="a2" href="javascript:moreFloat(200);"><img src="<?php echo $base_url;?>resource/wap/site_yn/images/top_more.png" /></a>
</header>
<div class="maintop_bg"></div>
<!--<div class="maintop_bg"></div>-->
<!--头部 END-->
<table id="news_nav">
  <tr>
   <?php 
$i=1;
foreach ($category_list as $row){
?>
  <td ><a class="show0<?php echo $i;?>" title="<?php echo $row->name;?>" href="<?php echo $site_url;?>wap/information2/index/category_<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
  <?php echo ($i % 4==0) ? "</tr>
  <tr>" : "";?>
<?php $i++; }?>

  </tr>
</table>
<div class="clear10"></div>
<section class="news_list">
<?php 
$i=1;
foreach ($list["this_data"] as $row){
?> 
<a title="<?php echo $row->name;?>" href="<?php echo $site_url;?>wap/information2/show/<?php echo $row->id;?>">
    <h3><img src="<?php echo (@$row->int) ? ((substr(@$row->int,0,4)=='http' || substr(@$row->int,0,1)=='/') ? @$row->int : $base_url.@$row->int)  : "";?>"/></h3>
    <h4><?php echo $row->name;?></h4>
    <p><?php echo msubstr(strip_tags($row->id),0,80);?></p>
    <div class="clear"></div>
  </a>
 <?php $i++;}?> 
  
<div id="morenews"></div>
</section>
<div class="clear30"></div>
<div class="content_page ">
      <menu>
        <div> <?php echo $list['this_page'];?></div>
      <div class="clear"></div>
      </menu>
      <div class="clear"></div>
    </div>
<div class="clear10"></div>

</div>
	<!-- /主体 -->