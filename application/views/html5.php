
<!doctype html>
<html>
<head>
<title>html5</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no" />
</head>
<body class="s">
<!--<div id="loading-black" >
  <div class="load"><img src-data="images/loading-black.png" width="64" class="animate-load" /><span></span></div>
</div><div id="text" style="position:fixed; top:20%; left:30%; color:#fff; font-size:50px; z-index:99999999"></div>
<div class="down-ico-box"></div>-->
<div id="uploadloading"></div>
<div id="newloading">
  <div class="loading">
 
     <div class="page_index_zi"></div>
    	<div class="page_2_7"> </div>
        <div class="page_2_8"> </div>

   
   
    
    
    <!--	<img src="images/0.png" style=" position:absolute; left:20px;" />
    <div class="loadbar"> </div>
    <div class="ten" id="loadingnum1"></div>
    <div class="ten bit" id="loadingnum2"></div>
    <div class="percent"></div>--> 
  </div>
</div>

<div id="horizontal"></div>
<!--<span class="sound"></span>-->
<div id="main">
  <div id="content"> 
    <!------------------------------------------------------> 
    <!------------------------------------------------------> 
    <!------------------------------------------------------> 
    <!------------------------------------------------------>
    <div id="bggray"></div>
     <div class="page_1_6"></div>
      <div class="page_1_7"></div>
<div class="page_1_8"></div>
    <div class="box-step step0 zhuquan1">

    <div class="page_1_0"></div>
         <div class="page_1_1"></div>
        <div class="page_1_2"></div>
       
        <div class="page_arrow"></div>
        

    </div>
    <div class="box-step step1 zhuquan2">
        <div class="page_2_0"></div>
      <div class="page_2_1" id="page_2_1"></div>
      <div class="page_1_2"></div>
        <div class="page_arrow"></div>
    </div>
    <!------------------------------------------------------> 
    <!------------------------------------------------------> 
    <!------------------------------------------------------> 
    <!------------------------------------------------------>
    <div class="box-step step2 zhuquan3">
    <div class="page_3_0"></div>
     <div class="page_3_1"></div>
     <div class="page_1_2"></div>
        <div class="page_arrow"></div>
    </div>
    <div class="box-step step3 zhuquan4">
    <div class="page_4_0"></div>
      <div class="page_4_1" id="page_4_1"></div>
      <div class="page_1_2"></div>
       
        <div class="page_arrow"></div>

    </div>
    <div class="box-step step28 zhuquan5">
    <div class="page_5_0"></div>
     <div class="page_5_1" id="page_5_1"></div>
     <div class="page_1_2"></div>
      <div class="page_arrow"></div>

    </div>
    <!--女:红色电脑-->
    
    <!--女:黑色电脑-->
   
    <!--男:蓝色-->
  
    <!--男:白色-->
  
  </div>
</div>

<div style="display:none">
</div>

</body>
 <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: '<?php echo $signPackage["timestamp"];?>',
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareTimeline'
    ]
  });


</script>

<script>
 wx.ready(function () {//立即分享按钮点击
//微信分享配置
wx.onMenuShareTimeline({
			             title: "html5分享标题", // 分享标题
            desc: "html5分享内容", // 分享描述
			  link: "<?php echo $site_url;?>html5", // 分享链接
			  imgUrl: 'http://www.wm18.com/images/201601/qingdao_share.jpg', // 分享图标
	
			  success: function () {
				 
			  }
		  });

wx.onMenuShareAppMessage({
		            title: "html5分享标题", // 分享标题
            desc: "html5分享内容", // 分享描述
			  link: "<?php echo $site_url;?>html5", // 分享链接
			  imgUrl: 'http://www.wm18.com/images/201601/qingdao_share.jpg', // 分享图标
		
			  success: function () {
				 
			  }
});


wx.onMenuShareQQ({
		            title: "html5分享标题", // 分享标题
            desc: "html5分享内容", // 分享描述
			  link: "<?php echo $site_url;?>html5", // 分享链接
			  imgUrl: 'http://www.wm18.com/images/201601/qingdao_share.jpg', // 分享图标
		
			  success: function () {
				 
			  }
});

});
</script>
</html>