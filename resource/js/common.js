function promptBox(id,text){
	$('#prompt').html('<b class="promptIcon-'+id+'"></b><p>'+text+'</p>');
	$('#prompt').fadeIn(300);
	setTimeout( function(){ 
		$('#prompt').fadeOut(3500);
	},1000); 
}