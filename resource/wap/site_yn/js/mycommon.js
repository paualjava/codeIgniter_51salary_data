function GetIEVer() {
    var browser = navigator.appName,
        b_version = navigator.appVersion;
    b_version = b_version ? b_version.split(";") : null;
    b_version = b_version && b_version.length>1 ? b_version[1].replace(/[ ]/g, "") : null;
    if (browser == "Microsoft Internet Explorer") {
        switch (b_version) {
            case 'MSIE6.0': return 6;
            case 'MSIE7.0': return 7;
            case 'MSIE8.0': return 8;
            default: return null;
        }
    }
}



function showbuild(){
	if (',6,7,8,'.indexOf(',' + GetIEVer() + ',') >= 0) alert("正在努力建设中~");
	else
	layer.open({
		content: '小伙伴稍后访问噢~正在努力建设中~',
		style: 'background-color:#00b5dc; color:#fff; border:none;',
		time: 1
	});
}


function showtip(content){
	if (',6,7,8,'.indexOf(',' + GetIEVer() + ',') >= 0) alert(content);
	else layer.open({
    content: content,
    style: 'background-color:#0295a7; color:#fff; border:none;',
    time: 1
});
}



function addmessage(type) 
{

    var $name=$("#name").val();
	var $tel=$("#tel").val();
	var $compantname =$("#compantname").val();
	var $contents =$("#contents").val();
	var $reg_rand =$("#reg_rand").val();
	


		if ($.trim($name)==''){
		showtip("请输入您的姓名！");
		$("#name").focus();
		return false;
		}
		
		
		if(getByteLen($.trim($name))<2 || getByteLen($.trim($name))>20)
		{
		showtip("姓名应该为2-20位之间！");
		$("#name").focus();
		return false;
		}
		
		if ($.trim($tel)==''){
		showtip("请输入您手机号码！");
		$("#tel").focus();
		return false;
		}
		
		var TelFont=  /^1[3,5]\d{9}$/;
		if($.trim($tel)!=''&&!TelFont.test($.trim($tel))){
		showtip("手机号码不正确，请重新输入！");
		$("#tel").focus();
		return false;
		}
				
		if ($.trim($compantname)==''){
		showtip("请输入您的公司名称！");
		$("#compantname").focus();
		return false;
		}

		if ($.trim($contents)==''){
		showtip("请输入您的需求描述！");
		$("#contents").focus();
		return false;
		}
		
		if(getByteLen($.trim($contents))<5)
		{
		showtip("亲~需求描述再多一点！");
		$("#contents").focus();
		return false;
		}
		
		if ($.trim($reg_rand)==''){
		showtip("请输入验证码！");
		$("#reg_rand").focus();
		return false;
		}
		

	 
    $.ajax({
        type: "POST",
        url: "/index.php?m=home&c=feedback&a=add",
        data: "name=" + $name + "&tel=" + $tel + "&compantname=" + $compantname +"&contents=" + $contents +"&reg_rand=" + $reg_rand +"",
        success: function (msg) {
			//alert(msg);
            if(msg.replace(/[\r\n]/g,'')=='codeHad')showtip('验证码错误!');
			if(msg.replace(/[\r\n]/g,'')=='success'){showtip('亲~提交成功了!我们会尽快和您联系');
			javascript:location.reload();
			}
   		}
	});
}

function getByteLen(val) {
            var len = 0;
            for (var i = 0; i < val.length; i++) {
                 var a = val.charAt(i);
                 if (a.match(/[^\x00-\xff]/ig) != null) 
                {
                    len += 2;
                }
                else
                {
                    len += 1;
                }
            }
            return len;
        }
		
