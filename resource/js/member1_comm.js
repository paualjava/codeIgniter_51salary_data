function createAjaxObj(){
	var httprequest=false
	//document.domain='chinaz.com';
	if (window.XMLHttpRequest){ // if Mozilla, Safari etc
		httprequest=new XMLHttpRequest()
		if (httprequest.overrideMimeType)
			httprequest.overrideMimeType('text/xml');
	}
	else if (window.ActiveXObject){ // if IE
		try 
		{
			httprequest=new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e)
		{
			try
			{
				httprequest=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){}
		}
	}
	return httprequest;
}

function trim(s) {
 return s.replace( /^\s*/, "" ).replace( /\s*$/, "" );
}