jQuery(function(){
	
	//Fancybox
	$('.js_nr_fancy_box').each(function(){
		$(this).fancybox({
		   'padding':0,
		   'scrolling':'no',
		   'hideOnOverlayClick': false
	    });
	});//END Fancybox
	
	//表单默认初始化
	$(".js_dval_ipt").each(function(){
			var $this = $(this);
			var dval = $this.val();
			
			$this.focus(function(){
				var cval = $(this).val();
				if(cval == dval){
					$(this).val("");
				}
			})
			$this.blur(function(){
				var cval = $(this).val();
				if(cval == "" || cval == dval){
					$(this).val(dval);
				}
			})
			
	});
	
	if($(".js_has_dval").length){
		$(".js_has_dval").each(function(){
			var $this = $(this);
			var $label = $this.parent().find("label");
			
			if($this.val() != ''){
				$label.hide();
			};
			$this.focus(function(){
				$label.hide();
			});
			$this.blur(function(){
				var cval = $(this).val();
				if(cval == ''){
					$label.show();
				}
			});
			$label.click(function(){
				$(this).parent().find("input").focus();
			});
		});
	}//END 搜索框默认初始化
	
	if($(".js_show_hide_tips").length){
		$(".js_show_hide_tips").hover(function(){$('.js_hide_tips').show();},function(){$('.js_hide_tips').hide();})
	};
		
	
	//默认登陆勾选模拟checkbox
	if($(".js_c_radio").length){
		$(".js_c_radio").click(function(){
			var $this = $(this);
			var $cb = $this.parent().find("input[type='checkbox']");
			
			if($this.hasClass('on')){
				$this.removeClass('on');
				$cb.attr('checked',false);
			}else{
					$this.addClass('on');
					$cb.attr('checked',true);
				}
			
		});
	}//END 默认登陆勾选模拟radio
	
	$(".js_btn_login,.js_btn_next").click(function(){
		$(this).parents('form').submit();
	});
	
	$('.js_nr_login_form,.js_nr_f_pw_form').MMJS_validation().each(function(){
		jQuery(this).submit( function(){
			if ( !jQuery(this).MMJS_validate() ){
				return false;
			}else{
					return true;
				}
		});
	});
	
	//回车提交
	$(window).keydown(function(e){
		if(e.keyCode == 13){
			$(".js_btn_login").click();
		}
	});
	
	//找回密码方式
	$(".js_get_way").click(function(){
		var $this = $(this);
		var $parent = $this.parent();
		
		$this.addClass("on");
		$parent.find("input[type='radio']").attr("checked",true);
		$parent.siblings().find("a").removeClass("on");
		$parent.siblings().find("input[type='radio']").attr("checked",false);
	});
	
	//账户授权Radio
	$(".js_nr_other_id li").click(function(){
		var $this = $(this);
		
		$this.addClass("on");
		$this.find("input[type='radio']").attr("checked",true);
		$this.siblings().removeClass("on");
		$this.siblings().find("input[type='radio']").attr("checked",false);
	});
	
	//更换邮箱
	$(".js_btn_change").click(function(){
		var $root =  $(".js_change_email");
		$root.fadeIn();
	});
	$(".js_btn_change").click(function(){
		var $root =  $(".js_change_email");
		$root.fadeIn();
	});
	
	$(".js_btn_modify").click(function(){
		var _val = $(this).parent().find("input").val();
		var regexp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var $error = $(".error");
		var $form = $(this).parents("form");
		
		if(_val == '' || !regexp.test(_val)){
			$error.show();
		}else{
				$error.hide();
				$form.submit();
			}
		
	});
	
	//注册成功页面跳转
	$(".js_countdown_box").each(function(){
		var $number = $(this).find(".countdown_number");
		var _number = $number.text();
		var _link = $(this).find(".countdown_link").attr("href");
		
		function num(){
			_number--;
			$number.html(_number);
			if(_number ==1){
				window.location.href = _link;
			}
		}
		
		var cd = window.setInterval(num,1000);
		
	});
	
	$(".js_nr_reg_success_pro").each(function(){
		
		var $ipt_check = $(this).find(".js_ipt_check");
		
		$ipt_check.click(function(){
			
			var $this = $(this);
			var $ipt = $this.find("input[type='checkbox']");
			
			if($this.hasClass("on")){
				$this.removeClass("on");
				$ipt.attr("checked",false);
			}else{
					$this.addClass("on");
					$ipt.attr("checked",true);
				}
		});
		
	});
	
})
var retImg;
var isemtel=false;
var isyzm=false;
var pwdsix='您输入的密码小于6位';
var pwdfirst='密码由6-20个字母，数字及符号组成';
var pwdsecond='再次输入您设置的新密码';
function EmailTel(obj,type){
	retImg= $('#retImg');
    var s=$(obj);
    var v=$.trim(s.val());
    var vn=arguments[1] ? arguments[1] : '2';
    if(v.length>0){
        if(vn=='2'){
            $.post($(".base_url").attr("value")+'member/getpwd',{
                name:v
            },function(msg){
                if(msg['res']==1){
                    isemtel=true;
                    retImg.removeClass('write wrong');
                    retImg.addClass('dgou');
                    retImg.html('');
                    if(msg['type']==2){
                        $('#sumtype').val('email');
                        $('#emailtel').attr('name','email');
                    }else if(msg['type']==1){
                        $('#sumtype').val('tel');
                        $('#emailtel').attr('name','tel');
                    }
                    isemtel=true;
                }else{
                    isemtel=false;
                    retImg.removeClass('write');
                    retImg.removeClass('dgou');
                    retImg.addClass('wrong');
                    retImg.html('该账号还没注册哦！<a href="'+$(".base_url").attr("value")+'member/register">请注册>></a>');
                }
            },
			"json");
        }
    }else{
        isemtel=false;
        if(vn==2){
            retImg.removeClass('dgou wrong write');
            retImg.text('');  
        }else{
            retImg.removeClass('dgou wrong');
            retImg.addClass('left write');
            retImg.text('请填写您的邮箱或手机号');  
        }
    }
    
}
function yzmpd(obj,type){
    var vid=$(obj);
    var v=$.trim(vid.val());
    var vn=arguments[1] ? arguments[1] : '1';
    if(v.length==4){
        $.post($(".base_url").attr("value")+'member/getpwd',{
            code:v,
            istype:2
        },function(msg){
            if(msg==1){
                $('#retImgOne').removeClass('wrong write');
                $('#retImgOne').text('');
                $('#retImgOne').addClass('dgou');//
                isyzm=true;
            }else{
                $('#retImgOne').removeClass('write dgou');
                $('#retImgOne').addClass('wrong');
                $('#retImgOne').text('验证码输入错误');
                isyzm=false;
            }
        });
    }else if(v.length==0){
        isyzm=false;
        if(vn==2){
            $('#retImgOne').removeClass('wrong dgou write');
            $('#retImgOne').text('');
        }else{
            $('#retImgOne').removeClass('wrong dgou');
            $('#retImgOne').addClass('write');
            $('#retImgOne').text('请输入验证码');
        }
    }else if(v.length<4||v.length>4){
        $('#retImgOne').removeClass('write dgou');
        $('#retImgOne').addClass('wrong');
        $('#retImgOne').text('验证码输入错误');
        isyzm=false;
    }
   
}
function pdmm(obj,pwdtype){
    var tt='';
    if(pwdtype=='retImgpwd2'){
        tt=pwdsecond;
    }else{
        tt=pwdfirst;
    }
    var i=$(obj);
    var pi=$('#'+pwdtype);
    var v=i.val();
    var v1=$('#pwdid1').val();
    if(v.length>=6){
        pi.removeClass('wrong write');
        pi.addClass('dgou');
        pi.text('');
        if(v1.length>0){
            czmm();  
        }
        return false;
    }else if(v.length==0){
        pi.removeClass('wrong dgou');
        pi.addClass('write');
        pi.text(tt);
        return false;
    }else{
        pi.removeClass('write dgou');
        pi.addClass('wrong');
        pi.text(pwdsix);
        return false;
    }
}
function subemtel(){
    EmailTel('#emailtel');
    yzmpd('#yzmid');
    if(isyzm==true && isemtel==true){
        return true;
    }else{
        return false;
    }
}