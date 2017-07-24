function delete_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}
function delete_all(url)
{
		var check = $("input:checked");
		if(check.length<1){
			alert('请选择删除项');
		}
		else
		{
		var id = '';
		check.each(function(i){
			if($(this).val())
			{
				id=id+$(this).val()+"`";
			}
		});
		$.post(url+id,function(data){
			if (data==1)
			{
				location.reload();
			} else {
				location.href=data;
			}

		});
		}
	
}
	
	
