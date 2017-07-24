$(document).ready(function()
{

	$(".t_button").each(function (i)
	{
		$(this).find("img").css("border","0");
	})
})

function confirm_op(url,text)
{
	text=(text) ? text : "确定执行该操作吗?";
	if(confirm(text)){
		window.location.href=url;
		}return ;
}
function save_ad(id)
{
	$("#id").val(id);
	$("#advertisement").submit();
}
function close_div(div_id)
{
	//$("#"+div_id).hide();
	$("#"+div_id).modal("show");
	$(".confirm_button").hide();	
}
function show_tag_div(tag_str,admin_url,table_name,column)
{
	this_url=admin_url+"ajxa_common/ajax_tag/"+column+"/"+table_name+"/"+tag_str+"/?str="+new Date();
	//length2=$("#"+table_name+"_content").html().length;

	$.ajax({
	　   type: "post",
		 url: this_url, 
	　   data: "p=1&tmp="+new Date(), 
	　　 success: function(result) {
		$("#"+table_name+"_content").html(result);
		$("#"+table_name+"_layer").modal("show"); 
     }     
	});
		
}
function set_category(name,id,column,site_url,table_name)
{
	hide_tag="hide_"+column;
	if($(".pic_"+column+id).css("display")=="none")
	{	
	$(".pic_"+column+id).show();	
	category=$("#"+hide_tag).val();
	if(category=='')
	category=",";
	$("#"+hide_tag).val(category+id+",");
	}
	else
	{
	category=$("#"+hide_tag).val();
	category=category.replace(id+",","");
	$("#"+hide_tag).val(category);
	$(".pic_"+column+id).hide();
	}
	url=site_url+"admin_51salary_data/index/manager/ajxa_common/ajax_show_tag/"+table_name+"/"+escape($("#"+hide_tag).val());
	$.post(url,function(data){	
		$("#"+column).val(data);						 
    })
}
function select_cate_load(admin_url,table_name,column_name,formname)
{
	
	$.ajax({
	type: "POST",
	url:admin_url+"ajxa_common/ajax_reload/"+table_name+"/"+column_name,
	data:$('#'+formname).serialize(),
	success: function(result) {
	$("#"+column_name).html(result);
	}
 });
}
//显示隐藏左边栏
function switchLeft(id1,id2) {
	//class1=$("#"+id1).class();
	
	//$(".id1").class();
	//$G(id1).className=$G(id1).className=='tol'? 'tor':'tol';
	//$G(id2).style.display= $G(id2).style.display==''? 'none':'';
}
//重新计算 行号
function hanghao(type) {
        $("."+type).each(function(i){
            $(this).find(".num_"+type).html(i+1);
                var names=""
                if(type){
                names=type
                }else{
                names="select";
                }
            $(this).find("input[type='checkbox']:last").val(names+(i+1));
        })
}
