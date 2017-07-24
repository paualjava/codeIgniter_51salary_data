<style type="text/css">
.table_class{background:#777;margin:100px auto 0 auto;}
.table_class td{background:#ccc;padding:4px;}
</style>
<table  border="0" cellpadding="1" cellspacing="1"  class="table_class" style="text-align:center;width:600px;" align="center">
<tr><td>执行成功</td></tr>
<tr><td>页面 <span id="tiao">3</span><a href="javascript:countDown"></a> 秒后自动跳转...</td></tr>
</table>

<script language="javascript" type="">
function countDown(secs){
	if(-- secs > 0){
		document.getElementById('tiao').innerHTML = secs;
		setTimeout("countDown("+secs+")",500);
	}else{
	
		<?php if(preg_match("/^index2\/[^\"]*/is",$m)){
		?>
		window.top.location.href="<?php echo $redirect_url;?>";
		<?php }else{
		?>
		location.href="<?php echo $redirect_url;?>";
		<?php }?>
	}
}
countDown(1);
</script>