<script type="text/javascript">
$(function(){
	//左右滚动幻灯片广告
	var the_three = {
			 "boxid":"threebox",//最外层id
			 "sumid":"threesum",//列表id
			 "li01":"threeli01",//li标签id
			 "li02":"threeli02",//重复li二号id
			 "stylename":"newslist",//内部滚动的标签class
			 "numid":"threenum",//数字id
			 "boxwidth":415,//宽度
			 "boxheight":280,//高度
			 "preid":"threepre",//上一个id
			 "nextid":"threenext",//下一个id
			 "speed":5000,// 切换速度
			 "gospeed":600,//轮换速度
			 "gocartoon":false
		  };
	$.ljs_adcartoon.arrowNum(the_three);
});
$(document).ready(function(){
  caseShowName("case_name",-210,100);
  caseShowName("team_show",-430,100);
  imgShowName("office_show",-200,300);
  hoverCartoon("contact_a",-400,200);
  hoverCartoon("about_a",-200,200);
  hoverCartoon("team_a",-200,200);
  moreCartoon("about_a_more",-200,200);
  moreCartoon("team_a_more",-200,200);
  cartoonNav("mainnav","navsel",90,7);
  navScroll("navbox","go_topnav");
  indexBanner("banner_box","banner_sum","banner_part",180,6000,"banner_pre","banner_next");
  indexPartGo("index_part","sectionbg");
});
		$(function(){
			var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
		});
</script>
<!--banner-->
<section id="banner_box">
 <div class="main">
  <div id="banner_sum">
        <a class="banner_part" href="/about/office/" style="background:#ff5a00;left:0;">
      <span><img src="<?php echo $base_url;?>resource/site_yn/images/ad_two_01.jpg" /></span>
      <span style="left:810px;top:25px;"><img src="<?php echo $base_url;?>resource/site_yn/images/ad_two_02.png" /></span>
      <span style="left:265px;top:265px;"><img src="<?php echo $base_url;?>resource/site_yn/images/ad_two_03.png" /></span>
      <span class="white fs40" style="left:265px;top:90px;line-height:40px;">云南最具规模和实力的网络公司</span>
      <span class="white fs18" style="left:265px;top:150px;">拥有300人专业服务团队，5000平米经营规模</span>
      <span class="white fs18" style="left:265px;top:185px;">10年品牌基础和实力见证，服务超过6000家企业和政府单位</span>
      <span class="white fs18" style="left:265px;top:220px;">云南百强企业75%选择了天度</span>
    </a>
    <a class="banner_part" href="/site/quanwang/" style="background:#0b8ffe;">
      <span><img src="<?php echo $base_url;?>resource/site_yn/images/ad_one_01.jpg" /></span>
      <span style="top:50px;left:815px;"><img src="<?php echo $base_url;?>resource/site_yn/images/ad_one_02.png" /></span>
      <span style="left:566px;top:270px;"><img src="<?php echo $base_url;?>resource/site_yn/images/ad_one_03.png" /></span>
      <span class="fs46 white" style="left:250px;top:90px;line-height:50px;">全网电子商务系统</span>
      <span class="fs22 white" style="left:350px;top:155px;">PC网站+手机触屏版+手机APP客户端</span>
      <span class="fs18 c2" style="left:400px;top:190px;">从PC电脑端，到手机移动终端全面兼容</span>
      <span class="fs18 c2" style="left:514px;top:225px;">采用全新一代响应式布局</span>
    </a>
    <a class="banner_part" href="/marketing/" style="background:#008abe;">
      <span><img src="<?php echo $base_url;?>resource/site_yn/images/ad_three_01.png" /></span>
      <span style="top:40px;left:890px;"><img src="<?php echo $base_url;?>resource/site_yn/images/ad_three_02.png" /></span>
      <span style="left:250px;top:245px;"><img src="<?php echo $base_url;?>resource/site_yn/images/ad_three_03.png" /></span>
      <span class="white fs46" style="left:250px;top:90px; line-height:50px;">让网站销售额提高60%</span>
      <span class="white fs18" style="left:250px;top:155px;">我们知道您要的不仅是个网站，而是能赢利的网站</span>
      <span class="white fs18" style="left:250px;top:190px;">天度为您节省大笔额外推广费用，有效提高网站流量和客户转化率</span>
    </a>
    <a id="banner_pre" href="javascript:void(0);"></a>
    <a id="banner_next" href="javascript:void(0);"></a>
  </div>
 </div>
  <div class="clear"></div>
</section>
<section class="index_part section00">
  <div class="sectionbg"></div>
  <h2 class="index_tit" style="color:#fff;">
   <span class="fs36 mt10 mr10">我们</span>
   <span class="fs24 mt15 mr10">About us</span>
   <a class="arrow_p" style="display:block;" href="/about/"  title="关于我们"><img src="<?php echo $base_url;?>resource/site_yn/images/arrow01.png" /></a>
   <div class="clear"></div>
  </h2>
  <table class="about_tab">
    <tr>
      <td rowspan="2" width="457" valign="middle" class="bg-w" style="z-index:1">
        <div class="news_box">
          <h3>最新动态</h3>
<p style="display:none;">
  <a id="threepre" href="javascript:void(0);">上一页</a>
  <a id="threenext" href="javascript:void(0);">下一页</a>
</p>
 <div id="threebox">
  <ul id="threesum">
    <li id="threeli01">
      <div class="newslist">
<a title="天度云纺国际商厦19楼新增办公场地正式挂牌使用" href="/blog/news/208.html">天度云纺国际商厦19楼新增办公场地正式挂牌<span>2015-03-08</span></a><a title="昆明楚然科技有限公司正式加入云南天度集团" href="/blog/news/206.html">昆明楚然科技有限公司正式加入云南天度集团<span>2015-03-02</span></a><a title="昆明丫丫手机网与天度签订网站建设及软件开发合同" href="/blog/news/191.html">昆明丫丫手机网与天度签订网站建设及软件开发<span>2015-02-05</span></a><a title="热烈庆祝云南天度集团十周年庆典圆满举行" href="/blog/tuandui/186.html">热烈庆祝云南天度集团十周年庆典圆满举行<span>2015-02-02</span></a><a title="致天度集团所有小伙伴们的一封信" href="/blog/news/196.html">致天度集团所有小伙伴们的一封信<span>2015-02-17</span></a>
      </div>
      <div class="newslist">
<a title="云南天度网络集团2015新版网站正式上线" href="/blog/gonggao/151.html">云南天度网络集团2015新版网站正式上线<span>2015-01-11</span></a><a title="热烈祝贺恒基与天度合同签字仪式圆满举行" href="/blog/news/41.html">热烈祝贺恒基与天度合同签字仪式圆满举行<span>2014-10-28</span></a><a title="云南天度集团“员工互助基金会”正式挂牌成立" href="/blog/news/86.html">云南天度集团“员工互助基金会”正式挂牌成立<span>2014-08-15</span></a><a title="云南天度集团完成首轮整合并获《企业集团登记证》" href="/blog/news/87.html">云南天度集团完成首轮整合并获《企业集团登记<span>2014-08-08</span></a><a title="云南天度集团组织员工向昭通地震灾区捐款" href="/blog/tuandui/64.html">云南天度集团组织员工向昭通地震灾区捐款<span>2014-08-13</span></a>
      </div>
      <div class="newslist">
<a title="天度近百名员工到安宁龙溪沟野战营举行真人CS大赛" href="/blog/tuandui/69.html">天度近百名员工到安宁龙溪沟野战营举行真人C<span>2014-10-18</span></a><a title="云南天度集团周末组织部分员工到野鸭湖进行团队拓展" href="/blog/tuandui/68.html">云南天度集团周末组织部分员工到野鸭湖进行团<span>2014-08-16</span></a><a title="2014年天度集团圣诞装扮及新年庆祝活动" href="/blog/tuandui/96.html">2014年天度集团圣诞装扮及新年庆祝活动<span>2014-12-20</span></a><a title="天度JAVA网站研发中心正式挂牌成立" href="/blog/news/55.html">天度JAVA网站研发中心正式挂牌成立<span>2014-08-06</span></a><a title="天度集团企业宣传片于昨日拍摄完毕（拍摄花絮）" href="/blog/tuandui/73.html">天度集团企业宣传片于昨日拍摄完毕（拍摄花絮<span>2014-02-08</span></a>      </div>
    </li>
    <li id="threeli02"></li>
  </ul>
  <div class="clear"></div>
</div>
        <div class="clear"></div>
        </div>
      </td>
      <td colspan="3" class="td02">
        昆明天度作为最具规模和实力的<a href="http://www.ynyes.com">云南网络公司</a>，拥有网站开发、APP开发、网页设计等专业团队近300人，整体办公面积近5000平方米，目前已经为超过6000家客户提供了服务，客户遍布北美、欧洲、上海、北京、广州、云南等地区，其中75%的滇商100强知名企业选择了天度，是您首选的<a href="http://www.ynyes.com">云南网站建设公司</a>和<a href="http://www.ynyes.com/app/">昆明APP开发服务</a>商。 </td>
    </tr>
    <tr>
      <td>
        <a class="about_a a1" href="/site/">
          <p><img src="<?php echo $base_url;?>resource/site_yn/images/about_ico01.png" /></p>
          <p>网站建设</p>
        </a>
      </td>
      <td>
        <a class="about_a a2" href="/site/quanwang/">
          <p><img src="<?php echo $base_url;?>resource/site_yn/images/about_ico02.png" /></p>
          <p>全网营销</p>
        </a>
      </td>
      <td>
       <a class="about_a a3" href="/app/">
          <p><img src="<?php echo $base_url;?>resource/site_yn/images/about_ico03.png" /></p>
          <p>APP开发</p>
        </a>
      </td>
    </tr>
    <tr>
      <td><a class="office_show" href="/about/office/"><img src="<?php echo $base_url;?>resource/site_yn/images/img01.jpg" height="200" /><span>办公环境展示</span></a></td>
      <td>
        <a class="about_a a4" href="/yun/">
          <p><img src="<?php echo $base_url;?>resource/site_yn/images/about_ico04.png" /></p>
          <p>云主机</p>
        </a>
      </td>
      <td>
        <a class="about_a a5" href="/marketing/">
          <p><img src="<?php echo $base_url;?>resource/site_yn/images/about_ico05.png" /></p>
          <p>网店托管</p>
        </a>
      </td>
      <td>
        <a class="about_a_more a6" href="/about/video/">
          <span><img src="<?php echo $base_url;?>resource/site_yn/images/arrow02.png" /></span>
          <p>天度视频</p>
        </a>
      </td>
    </tr>
  </table>
  <div class="clear"></div>
</section><!-- index_part END-->
<section class="index_part section01">
  <div class="sectionbg"></div>
  <h2 class="index_tit">
   <span class="fs36 mt10 mr10">优势</span>
   <span class="fs24 mt15 mr10">Advantage</span>
   <a class="arrow_p" href="/about/youshi/" title="优势"><img src="<?php echo $base_url;?>resource/site_yn/images/arrow01.png" /></a>
   <div class="clear"></div>
  </h2>
  <article class="advantage_box">
    <div class="fl" style="width:330px;">
      <a class="advantage_a a1" href="/about/office/">
        <h3>5000平米规模</h3>
        <p>集团拥有8家控股企业，办公面积超过五千平方米，是云南最具规模的互联网企业</p>
      </a>
      <a class="advantage_a a2" href="/blog/tuandui/">
        <h3>300人专业团队</h3>
        <p>拥有近三百人的专业团队，其中技术开发、设计、运营等专业服务团队占80%比例</p>
      </a>
      <a class="advantage_a a3" href="/case/">
        <h3>6000家客户案例</h3>
        <p>为云南三九手机网、丫丫手机网、盘龙云海、中国移动等六千家企业单位提供了服务</p>
      </a>
    </div><!--flet END-->
    <div class="advantage_suc">
      <a href="/blog/news/91.html">
        <h3>客户沙龙</h3>
        <p>天度每月举行客户沙龙，解决客户在开展网络营销和电子商务过程中的一些技术问题，并进行追踪服务</p>
        <img src="<?php echo $base_url;?>resource/site_yn/images/img02a.jpg" />
      </a>
      <a href="/blog/news/114.html">
        <h3>免费培训</h3>
        <p>天度免费为客户讲授互联网的新技术、新理念和新发展，让客户随时掌握最新发展动态和网站运营知识</p>
        <img src="<?php echo $base_url;?>resource/site_yn/images/img02.jpg" />
      </a>
    </div>
    <div class="fr" style="width:330px;">
      <a class="advantage_a a4" href="/yun/">
        <h3>200台云服务器</h3>
        <p>拥有近200台高端云计算服务器，昆明电信400GB带宽机房接入CHINANET骨干网络</p>
      </a>
      <a class="advantage_a a5" href="/about/development/">
        <h3>10年品质见证</h3>
        <p>从2005年成立至今，天度10年品质见证和品牌服务，成为高端网站建设的代名词</p>
      </a>
      <a class="advantage_a a6" href="/marketing/">
        <h3>SEO免费推广</h3>
        <p>天度免费为客户提供SEO网站优化推广服务和运营支持，为客户节省大笔推广费用</p>
      </a>
    </div><!--right END-->
  </article>
  <div class="clear"></div>
</section><!-- index_part END-->
<section class="index_part section02">
  <div class="sectionbg"></div>
  <h2 class="index_tit">
   <span class="fs36 mt10 mr10">客户</span>
   <span class="fs24 mt15 mr10">Client</span>
   <a class="arrow_p" href="/about/client/" title="客户"><img src="<?php echo $base_url;?>resource/site_yn/images/arrow01.png" /></a>
   <div class="clear"></div>
  </h2>
  <table class="client_tab">
    <tr>
      <td colspan="2" rowspan="2" style="z-index:1"><a href="/blog/news/75.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com01.jpg" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c01.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c02.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c03.jpg" width="129" height="64" /></a></td>
      <td><a href="/blog/news/79.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c04.jpg" width="129" height="64" /></a></td>
      <td colspan="2"><a href="/case/pinpai/16.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com03.png" /></a></td>
    </tr>
    <tr>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c05.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c06.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c07.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c08.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c29.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c28.jpg" width="129" height="64" /></a></td>
    </tr>
 <tr>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c11.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c12.jpg" width="129" height="64" /></a></td>
      <td rowspan="2"><a href="/blog/news/81.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com04.jpg" /></a></td>
      <td rowspan="3" colspan="2" style="z-index:1"><a href="/case/pinpai/30.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com05.jpg" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c13.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c14.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/pinpai/21.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c15.jpg" width="129" height="64" /></a></td>
    </tr>
    <tr>
      <td><a href="/case/xinxi/161.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c16.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c17.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/pinpai/36.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c18.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c20.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/dianzi/167.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c19.jpg" width="129" height="64" /></a></td>
    </tr>
    <tr>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c21.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c22.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/pinpai/166.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c23.jpg" width="129" height="64" /></a></td>
      <td><a href="/blog/news/83.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c24.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/pinpai/18.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c25.jpg" width="129" height="64" /></a></td>
      <td><a href="/blog/news/76.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c26.jpg" width="129" height="64" /></a></td>
    </tr>
    <tr>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c27.jpg" width="129" height="64" /></a></td>
      <td colspan="2" rowspan="2" style="z-index:1"><a href="/blog/news/191.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com06.jpg" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c10.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c09.jpg" width="129" height="64" /></a></td>
      <td rowspan="2"><a href="/case/pinpai/20.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com07.jpg" /></a></td>
      <td><a href="/case/pinpai/123.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c30.jpg" width="129" height="64" /></a></td>
      <td rowspan="2"><a href="/case/xinxi/115.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com08.jpg" /></a></td>
    </tr>
    <tr>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c31.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c32.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/wangluo/139.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c33.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c34.jpg" width="129" height="64" /></a></td>
    </tr>
    <tr>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c35.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c36.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/wangluo/25.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c37.jpg" width="129" height="64" /></a></td>
      <td><a href="#"><img src="<?php echo $base_url;?>resource/site_yn/images/c38.jpg" width="129" height="64" /></a></td>
      <td colspan="2"><a href="/case/pinpai/116.html"><img src="<?php echo $base_url;?>resource/site_yn/images/com09.jpg" /></a></td>
	  <td><a href="/case/xinxi/180.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c40.jpg" width="129" height="64" /></a></td>
      <td><a href="/case/dianzi/133.html"><img src="<?php echo $base_url;?>resource/site_yn/images/c39.jpg" width="129" height="64" /></a></td>
    </tr>
  </table>
  <div class="clear"></div>
</section><!-- index_part END-->
<section class="index_part section03">
  <div class="sectionbg"></div>
  <h2 class="index_tit">
   <span class="fs36 mt10 mr10">案例</span>
   <span class="fs24 mt15 mr10">Case</span>
   <a class="arrow_p" href="/case/"  title="案例"><img src="<?php echo $base_url;?>resource/site_yn/images/arrow01.png" /></a>
   <div class="clear"></div>
  </h2>
  <table class="case_tab">
    <tr>
<td><a class="case_name"  title="中茶集团" href="/case/pinpai/20.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54a2699aeab48.jpg" /><span><p></p>中茶集团</span></a></td><td><a class="case_name"  title="云草堂" href="/case/pinpai/18.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54a2677fb9b1f.jpg" /><span><p></p>云草堂</span></a></td><td><a class="case_name"  title="昆明安宁心景酒店" href="/case/pinpai/118.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54aa53b283268.jpg" /><span><p></p>昆明安宁心景酒店</span></a></td>
    </tr>
    <tr>
<td><a class="case_name"  title="重庆缙云心景酒店" href="/case/pinpai/117.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54aa51f955009.jpg" /><span><p></p>重庆缙云心景酒店</span></a></td><td><a class="case_name"  title="奥润居" href="/case/dianzi/33.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54a69d85ddce5.jpg" /><span><p></p>奥润居</span></a></td><td><a class="case_name"  title="昆明丫丫手机网" href="/case/dianzi/211.html"><img src="<?php echo $base_url;?>resource/site_yn/images/551790b20e191.jpg" /><span><p></p>昆明丫丫手机网</span></a></td>
    </tr>
    <tr>
<td><a class="case_name"  title="七彩云南" href="/case/pinpai/30.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54a4eb11b4595.jpg" /><span><p></p>七彩云南</span></a></td><td><a class="case_name"  title="嘉康利经销商管理系统" href="/case/shouji/153.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54b49ecbab397.jpg" /><span><p></p>嘉康利经销商管理系统</span></a></td><td><a class="case_name"  title="德宏网APP及手机触屏网站" href="/case/quanwang/152.html"><img src="<?php echo $base_url;?>resource/site_yn/images/54b49153415ea.jpg" /><span><p></p>德宏网APP及手机触屏网站</span></a></td>
    </tr>
  </table>
  <a class="case_more" href="/case/">更多案例</a>
  <div class="clear"></div>
</section><!-- index_part END-->
<section class="index_part section04">
  <div class="sectionbg"></div>
  <h2 class="index_tit">
   <span class="fs36 mt10 mr10">团队</span>
   <span class="fs24 mt15 mr10">Team</span>
   <a class="arrow_p" href="/blog/tuandui/" title="团队"><img src="<?php echo $base_url;?>resource/site_yn/images/arrow01.png" /></a>
   <div class="clear"></div>
  </h2>
  <table class="team_tab">
    <tr>
      <td><a class="team_show" href="/blog/tuandui/186.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team05.jpg" width="426" height="210" /><span>云南天度集团十周年庆典活动</span></a></td>
      <td><a class="team_show" href="/blog/tuandui/64.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team02.jpg" width="210" height="210" /><span>向地震灾区捐款</span></a></td>
      <td><a class="team_show" href="/blog/tuandui/70.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team03.jpg" width="210" height="210" /><span>天度表彰大会</span></a></td>
      <td>
        <a class="team_a" href="/about/manage/" title="团队">
          <p><img src="<?php echo $base_url;?>resource/site_yn/images/video.png" /></p>
          <p>管理团队</p>
        </a>
      </td>
    </tr>
    <tr>
      <td rowspan="2"><a class="team_show" href="/blog/tuandui/65.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team04.jpg" width="426" height="426" /><span>云南天度集团团队拓展之毕业墙</span></a></td>
      <td colspan="2"><a class="team_show" href="/blog/tuandui/68.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team01.jpg" width="428" height="210" /><span>云南天度集团户外拓展活动</span></a></td>
      <td><a class="team_show" href="/blog/tuandui/69.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team06.jpg" width="210" height="210" /><span>天度真人CS大赛</span></a></td>
    </tr>
    <tr>
      <td><a class="team_show" href="/blog/tuandui/74.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team07.jpg" width="210" height="210" /><span>朝气蓬勃的天度人</span></a></td>
      <td><a class="team_show" href="/blog/tuandui/112.html"><img src="<?php echo $base_url;?>resource/site_yn/images/team08.jpg" width="210" height="210" /><span>战无不胜的天度人</span></a></td>
      <td>
        <a class="team_a_more a1" href="/about/job/" title="招聘">
          <span><img src="<?php echo $base_url;?>resource/site_yn/images/arrow02.png" /></span>
          <p style="font-size:30px;">加入我们</p>
        </a>
      </td>
    </tr>
  </table>
  <div class="clear"></div>
</section><!-- index_part END-->
<section class="index_part section05">
  <div class="sectionbg"></div>
  <h2 class="index_tit">
   <span class="fs36 mt10 mr10">联系</span>
   <span class="fs24 mt15 mr10">Contact us</span>
   <a class="arrow_p" href="/about/service/" title="客服"><img src="<?php echo $base_url;?>resource/site_yn/images/arrow01.png" /></a>
   <div class="clear"></div>
  </h2>
  <article class="main">
    <a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODA1OTU5MF8yMjg2MzRfNDAwNzM5MTIwMF8yXw" target="_blank" rel="nofollow" class="contact_a contact01 fl" id="BizQQWPA"><img src="<?php echo $base_url;?>resource/site_yn/images/contact_qq.png" /></a>
    <a class="contact_a contact02 fl ml10" href="javascript:loginWinOpen('weixin_win','myselfbox',200);"><img src="<?php echo $base_url;?>resource/site_yn/images/contact_wx.png" /></a>
    <a href="http://weibo.com/ynsite" target="_blank" rel="nofollow" class="contact_a contact03 fr"><img src="<?php echo $base_url;?>resource/site_yn/images/contact_wb.png" /></a>
    <div class="clear"></div>
    <div class="contact_box fl contact04">
      <p class="p1"><img src="<?php echo $base_url;?>resource/site_yn/images/con_phone.png" /></p>
      <p><span>地址：</span>云南省.昆明市环城南路668号云纺国际商厦A座18层-19层</p>
      <p style="padding-left:80px;width:230px;"><span>电话：0871-</span>63167196  63157171  63157172 63157517  63168206  63156299</p>
      <p><span>咨询：</span>0871-63395062</p>
      <p><span>售后：</span>0871-63365932</p>
      <p><span>投诉：</span>0871-63386022</p>
      <p><span>邮箱：</span>info@ynyes.com</p>
    </div>
    <div class="contact_box fl ml10 ta-c"><a href="/about/service/"><img class="mt5" src="<?php echo $base_url;?>resource/site_yn/images/map.jpg" /></a>
    </div>
    <div class="contact_box fr contact06">
      <span>您的姓名：</span>
      <input type="text" class="text"   name="name" id="name"/>
      <div class="clear"></div>
      <span>您的电话：</span>
      <input type="text" class="text"  name="tel" id="tel"/>
      <div class="clear"></div>
      <span>公司名称：</span>
      <input type="text" class="text"  name="compantname" id="compantname"/>
      <div class="clear"></div>
      <span>需求描述：</span>
      <textarea name="contents" id="contents"></textarea>
      <div class="clear"></div>
      <span>验证码：</span>
      <input style="width:80px;" type="text" class="text" id="reg_rand" name="reg_rand"/>
      <a class="fl ml10 mt10"  href="javascript:;"><img class="verifyimg reloadverify" alt="点击切换" src="http://www.ynyes.com/index.php?m=home&c=user&a=verify" width="130" style="cursor:pointer;"></a>
      <div class="clear"></div>
      <input type="submit" class="sub" value="提交信息" onclick="addmessage()" />
    </div>
    <div class="clear"></div>
  </article>
</section><!-- index_part END-->
