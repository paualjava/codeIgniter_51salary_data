<link href="<?php echo $base_url;?>resource/wap/site_yn/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  $(document).ready(function(){
});
</script>
<!-- 主体 -->
	<div id="mainout">
<header class="maintop">
  <h2>公司新闻</h2>
      <a class="a1" href="/blog/news/"><img src="<?php echo $base_url;?>resource/wap/site_yn/images/back.png" /></a>
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
  <td ><a class="show0<?php echo $i;?>" title="<?php echo $row->name;?>" href="<?php echo $site_url;?>wap/club_page/index/category_<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
  <?php echo ($i % 4==0) ? "</tr>
  <tr>" : "";?>
<?php $i++; }?>

  <!--<td class="sel"><a class="show01" title="公司新闻" href="/blog/news/">公司新闻</a></td><td ><a class="show02" title="团队文化" href="/blog/tuandui/">团队文化</a></td><td ><a class="show03" title="行业资讯" href="/blog/zixun/">行业资讯</a></td><td ><a class="show04" title="媒体报道" href="/blog/baodao/">媒体报道</a></td><td ><a class="show05" title="网站公告" href="/blog/gonggao/">网站公告</a></td>-->
  </tr>
</table><div class="clear10"></div>
<club_page class="news_con">
  <h3><?php echo $page_info_show->title;?></h3>
  <h4>2015-03-08 20:03/ 人气685 / 评论0</h4>
  <p><?php echo $page_info_show->content;?></p>
</club_page>
<div class="clear10"></div>

</div>
	<!-- /主体 -->