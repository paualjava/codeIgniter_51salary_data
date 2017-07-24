// JavaScript Document
window.onload=function(){
	pic();
	};
	
function pic()
{
	var s_li = document.getElementById("img_th").getElementsByTagName("li"),
	    s_pic = document.getElementById("img_th").getElementsByTagName("img");

	
    for(i=0;i<s_li.length;i++)
	{
		(function(i){s_li[i].onmouseover=function()
		                                {
											soure=s_pic[i].getAttribute("name")
											scr=s_pic[i].getAttribute("src")
											fun(i);
										}
		})(i);
		
		(function(i){s_li[i].onmouseout=function()
		                                {
											sun(i);
										}
		})(i);
	};
	
	function fun(a)
	{
		    s_pic[a].setAttribute("src",soure)
			

			
	}
	function sun(b)
	{
            s_pic[b].setAttribute("src",scr)
			

			
	}
}