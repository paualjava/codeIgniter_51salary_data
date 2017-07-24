String.prototype.trim = function()
{
    return this.replace(/(^\s*)|(\s*$)/g,"");
}
function isKG(str) 
{ 
	if(str.indexOf(" ")!=-1){ 
		return true; 
	}else{
		return false;
	}
	return true;
}
function Len(str)
{
	 str=str.trim();
     var i,sum;
     sum=0;
     for(i=0;i<str.length;i++)
     {
         if ((str.charCodeAt(i)>=0) && (str.charCodeAt(i)<=255))
             sum=sum+1;
         else
             sum=sum+2;
     }
     return sum;
}
function CheckCode() {
	var xmlhttp = createAjaxObj();
	try
	{
		var time=new Date();
		var hour=time.getHours();
		var minu=time.getMinutes(); 
		var sec=time.getSeconds();
		var ibz=hour +"-"+minu +"-"+sec;
		params="phone="+document.UserReg.txtPhone.value+"&v="+document.UserReg.txtcheckcode.value+"&bz="+ibz;
			
		xmlhttp.abort();	
		
		xmlhttp.open("get","/basic/check.aspx?"+params,true);
	
		xmlhttp.setRequestHeader("Content-type", "text/html;charset=gb2312");	
		
		xmlhttp.setRequestHeader("If-Modified-Since","0");	
	
		xmlhttp.setRequestHeader("Content-length", params.length);
		
		xmlhttp.setRequestHeader("Connection", "close");
	
		xmlhttp.onreadystatechange=f

		xmlhttp.send(null);	
	
	}catch(ex){}
	function f()
	{	
		if(xmlhttp.readyState!= 4 || xmlhttp.status!=200 )
			return ;
		var arr = xmlhttp.responseText.split("@:");
		if(trim(arr[0]) == 'true')
		{
			document.UserReg.txthcheckcode.value="true";
			checkcode_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_right.gif' height='13' width='13'>&nbsp;<font color='#2F5FA1'>符合要求</font>";
			return true;
		}
		else
		{
			document.UserReg.txthcheckcode.value="false";
			checkcode_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>验证码不正确</font>";
			return false;
		}
	}
}

function setcheckcode()
{
	document.getElementById("Imagecheckcode").src = '/basic/checkimage.aspx?flag=' + Math.random();
	//document.Imagecheckcode.src = '/basic/checkimage.aspx?flag=' + Math.random();
}

function CheckCodes() {
	var xmlhttp = createAjaxObj();
	try
	{
		var time=new Date();
		var hour=time.getHours();
		var minu=time.getMinutes(); 
		var sec=time.getSeconds();
		var ibz=hour +"-"+minu +"-"+sec;
		params="phone="+document.UserReg.txtPhone.value+"&v="+document.UserReg.txtcheckcode.value+"&bz="+ibz;
			
		xmlhttp.abort();	
		
		xmlhttp.open("get","/basic/check.aspx?"+params,true);
	
		xmlhttp.setRequestHeader("Content-type", "text/html;charset=gb2312");	
		
		xmlhttp.setRequestHeader("If-Modified-Since","0");	
	
		xmlhttp.setRequestHeader("Content-length", params.length);
		
		xmlhttp.setRequestHeader("Connection", "close");
	
		xmlhttp.onreadystatechange=f

		xmlhttp.send(null);	
	
	}catch(ex){}
	function f()
	{	
		if(xmlhttp.readyState!= 4 || xmlhttp.status!=200 )
			return ;
		var arr = xmlhttp.responseText.split("@:");
		if(trim(arr[0]) == 'true')
		{
			document.UserReg.txthcheckcode.value="true";
			return true;
		}
		else
		{
			document.UserReg.txthcheckcode.value="false";
			return false;
		}
	}
}

function changeProvLv1()
{
	var controlLv1 = document.getElementById('ddl_Prov_Name');
	var controlLv2 = document.getElementById('ddl_City_Name');
	//var hidLv1 = document.getElementById('hid_Prov');
	var hidLv2 = document.getElementById('hid_City');
	var controlLv1Value = controlLv1.value;
	var aryLv1Length = aryProvLv1.length;
	controlLv2.length = 0;
	for(var i=0;i<aryLv1Length;++i)
	{
		if (aryProvLv1[i][0] == controlLv1Value)
		{
			controlLv2.options[controlLv2.length] = new Option(aryProvLv1[i][1],aryProvLv1[i][2]);
		}
	}
	var controlLv2Value = controlLv2.options[controlLv2.selectedIndex].value;
	hidLv2.value = controlLv2Value;
	
	if(hidLv2.value=="0")
	{
		enter_Prov.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请选择常居地</font>";
	}
	else
	{
		enter_Prov.innerHTML = "";
	}
}

function changeCity()
{
	var controlLv2 = document.getElementById('ddl_City_Name');
	var hidLv2 = document.getElementById('hid_City');
	var controlLv2Value = controlLv2.options[controlLv2.selectedIndex].value;
	hidLv2.value = controlLv2Value;
	
	if(hidLv2.value=="0")
	{
		enter_Prov.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请选择常居地</font>";
	}
	else
	{
		enter_Prov.innerHTML = "";
	}
}

function CheckName() {
    if(Len(document.UserReg.txtUserName.value)<3)
	{
		enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>用户名不得小于3个字符</font>";
	return false;
	}
	else if(Len(document.UserReg.txtUserName.value)>15)
	{
		enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>用户名不得多于15个字符</font>";
	return false;
	}
	else if (!/[\u4e00-\u9fa5]/g.test(document.UserReg.txtUserName.value) && Len(document.UserReg.txtUserName.value)<3)
	{
		enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>英文用户名不得少于3个字符</font>";
	return false;
	}
	else if (!/[\u4e00-\u9fa5]/g.test(document.UserReg.txtUserName.value) && Len(document.UserReg.txtUserName.value)>15)
	{
		enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>英文用户名不得大于15个字符</font>";
	return false;
	}else if(isKG(document.UserReg.txtUserName.value.trim()))
	{
		enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>你注册的用户名中含有非法字符</font>";
		return false;
	}
	else{
		//var isTag=Web_User_Register.GetUserInfo(document.UserReg.txtUserName.value).value;
		
				$.ajax({
				   type:"post",
				   url:$(".base_url").attr("value")+"member/ajax_username_is_have",
				   data: {username:$("#txtUserName").val()},
				   success: function(isTag){
   					if(isTag=="SpecialChar")
			{
			enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>你注册的用户名中含有非法字符</font>";
			return false;
		}
		if(isTag=="true")
		{
			enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_right.gif' height='13' width='13'>&nbsp;<font color='#2F5FA1'>允许注册</font>";
			return true;
		}
		else{
			enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>用户名已经存在</font>";
		}				  
				  }
				});
	}
}
function UserPassword_enter()
{
	if(document.UserReg.txtpwd.value.length<1)
	{
		enter_pwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>登录密码必须填写</font>";
	}
	if(document.UserReg.txtpwd.value.length<5)
	{
		enter_pwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>登录密码不得少于六位</font>";
	}
	if(document.UserReg.txtpwd.value.length>5)
	{
		enter_pwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_right.gif' height='13' width='13'>&nbsp;<font color='#2F5FA1'>符合要求</font>";
	}
}
function PwdConfirm_enter()
{
	if(document.UserReg.txtpwd.value != document.UserReg.txtpwd2.value)
	{
		enter_repwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>两次密码输入不一致</font>";
	}
	else
	{
		if (document.UserReg.txtpwd2.value.length<1)
		{
			enter_repwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>确认密码不能为空</font>";
		}
		else
		{
			enter_repwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_right.gif' height='13' width='13'>&nbsp;<font color='#2F5FA1'>符合要求</font>";
		}
	}
}
function UserEmail_enter()
{
	mail_text = document.UserReg.txteMail.value
	var myreg = /^([a-zA-Z0-9]+[_|\_|\.|-]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(!myreg.test(mail_text))
	{
		enter_mail.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>电子邮箱地址不正确</font>";
	}
	else
	{
		if (mail_text.length<1)
		{
			enter_mail.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>邮箱不能为空</font>";
		}
		else
		{
			//var isTag=Web_User_Register.GetUserEmail(mail_text).value;
			$.ajax({
				   type:"post",
				   url:$(".base_url").attr("value")+"member/ajax_email_is_have",
				   data: {email:$("#txteMail").val()},
				   success: function(isTag){
   					if(isTag=="true")
					{
					enter_mail.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_right.gif' height='13' width='13'>&nbsp;<font color='#2F5FA1'>符合要求</font>";
					return true;
					}
					else
					{
					enter_mail.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>电子邮箱地址已经存在</font>";
					}				  
				  }
				});
		}
		
	}

}
function UserEmail1_enter()
{
	mail_text = document.UserReg.txteMail2.value
	if(document.UserReg.txteMail.value != mail_text)
	{
		enter_mail1.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>两次邮箱输入不一致</font>";
	}
	else
	{
		if (mail_text.length<1)
		{
			enter_mail1.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>邮箱不能为空</font>";
		}
		else
		{
			enter_mail1.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_right.gif' height='13' width='13'>&nbsp;<font color='#2F5FA1'>符合要求</font>";
		}
	}
}

function UserPhone_enter()
{
	mail_text = document.UserReg.txtPhone.value
	if(document.UserReg.txtPhone.value.length<1)
	{
		enter_phone.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请填写手机号</font>";
	}else{
		if(!isMobil(document.UserReg.txtPhone.value))
		{
			enter_phone.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请输入正确的手机号码</font>";
		}else{
			enter_phone.innerHTML = "";
		}
	}
}

function user_from()
{
	signal=false;
	mail_text = document.UserReg.txteMail.value
	var myreg = /^([a-zA-Z0-9]+[_|\_|\.|-]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	if(!myreg.test(mail_text))
	{
		enter_mail.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>电子邮箱地址不正确</font>";
		document.UserReg.txteMail.focus();
		return false;
	}
	
	$.ajax({
	   type:"post",
	   url:$(".base_url").attr("value")+"member/ajax_email_is_have",
	   data: {email:$("#txteMail").val()},
	   success: function(isTag){
		if(isTag=="false")
		{
		enter_mail.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>电子邮箱地址已经存在</font>";
		document.UserReg.txteMail.focus();
		return false;
		}
		else
		{
			if(Len(document.UserReg.txtUserName.value)<3)
				{
					enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>用户名不得小于3个字符</font>";
					return false;
				}
				else if(!/[\u4e00-\u9fa5]/g.test(document.UserReg.txtUserName.value) && Len(document.UserReg.txtUserName.value)<3)
				{
					enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>英文用户名3-15字符,中文用户名2-7字符</font>";
					document.UserReg.txtUserName.focus();
					return false;
				}
				if(Len(document.UserReg.txtUserName.value)>15)
				{
					enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>英文用户名3-15字符,中文用户名2-7字符</font>";
				return false;
				}
				if(isKG(document.UserReg.txtUserName.value.trim()))
				{
					enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>你注册的用户名中含有非法字符</font>";
					return false;
				}
				$.ajax({
				   type:"post",
				   url:$(".base_url").attr("value")+"member/ajax_username_is_have",
				   data: {username:$("#txtUserName").val()},
				   success: function(isTag){
   					if(isTag=="SpecialChar")
				{
					enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>你注册的用户名中含有非法字符</font>";
					document.UserReg.txtUserName.focus();
					return false;
				}
				if(isTag=="false")
				{
					enter_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>用户名已经存在</font>";
					document.UserReg.txtUserName.focus();
					return false;
				}
				else
				
				{
					if(document.UserReg.txtPhone.value.length<1)
				{
					enter_phone.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请填写手机号</font>";
					document.UserReg.txtPhone.focus();
					return false;
				}
				else if(!isMobil(document.UserReg.txtPhone.value))
				{
					enter_phone.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请输入正确的手机号码</font>";
					document.UserReg.txtPhone.value.focus();
					return false;
				}
				else if(document.UserReg.txtpwd.value.length<1)
				{
					enter_pwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>登录密码必须填写</font>";
					document.UserReg.txtpwd.focus();
					return false;
				}
				else if(document.UserReg.txtpwd.value.length<6)
				{
					enter_pwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>登录密码不得少于六位</font>";
					document.UserReg.txtpwd.focus();
					return false;
				}
				else if(document.UserReg.txtpwd.value != document.UserReg.txtpwd2.value)
				{
					enter_repwd.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>两次密码输入不一致</font>";
					document.UserReg.txtpwd2.focus();
					return false;
				}
				else if(document.UserReg.hid_City.value == '0')
				{
					enter_Prov.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请选择常居地</font>";
					//document.UserReg.ddl_Prov_Name.select();
					return false;
				}
				else
				
				{
					$("#UserReg").submit();
				}
					
				
				//CheckCodes();
				
				//if(document.UserReg.txthcheckcode.value=="false" || document.UserReg.txtcheckcode.value=="")
				//{
				//	checkcode_name.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>验证码不正确</font>";
				//	return false;
				//}
				
				
			/*	if(document.UserReg.ckTk.checked==false)
				{
					enter_xfTk.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#FF0000'>是否接受幸福条款,请选择</font>";
					document.UserReg.ckTk.focus();
					return false;
				}*/
				
				}	  
				}
				})
				
				
				}				  
				  }
	});
	return false;
	
}

//手机号码验证信息
function isMobil(s) {
    var patrn = /(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
    if (!patrn.exec(s)) {
        return false;
    }
    return true;
}
var leftSeconds = 60;
var intervalId;
function getCode() {
	if(document.UserReg.txtPhone.value.length<1)
	{
		enter_phone.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请填写手机号</font>";
		document.UserReg.txtPhone.focus();
		return false;
	}
	if(!isMobil(document.UserReg.txtPhone.value))
	{
		enter_phone.innerHTML = "<img src='"+$(".base_url").attr("value")+"resource/images/member1_check_err.gif' height='13' width='13'>&nbsp;<font color='#ff0000'>请输入正确的手机号码</font>";
		document.UserReg.txtPhone.value.focus();
		return false;
	}
	sendCode();
	leftSeconds = 60;
	$("#btn_sms").css("color","#999");
	$("#btn_sms").attr("disabled", true);
	//$("#txtPhone").attr("disabled", true);
	intervalId = setInterval("CountDown()",1000);
	return false;
}
function CountDown() {
	if (leftSeconds <= 0) {
		$("#btn_sms").css("color","#fc7198");
		$("#btn_sms").val("重发验证码"); 
		$("#btn_sms").attr("disabled",false);
		//$("#txtPhone").attr("disabled", false);
		clearInterval(intervalId); 
		return;
	}
	leftSeconds--;
	$("#btn_sms").val("("+leftSeconds+"秒后)重发验证码");
}
function sendCode() {
	var time=new Date();
	var hour=time.getHours();
	var minu=time.getMinutes(); 
	var sec=time.getSeconds();
	var ibz=hour +"-"+minu +"-"+sec;

	$.ajax({
	   type: "POST",
	   url: "/basic/sms.aspx?phone="+document.UserReg.txtPhone.value+"&bz="+ibz,
	   success: function(msg){
			document.UserReg.txtPhone.value=document.UserReg.txtPhone.value;
			if(trim(msg)=="true"){
				return true;
			}else{
				return false;
			}
	   },
	   error:function (XMLHttpRequest, textStatus, errorThrown) {
		   return false;
	   }
	});
}