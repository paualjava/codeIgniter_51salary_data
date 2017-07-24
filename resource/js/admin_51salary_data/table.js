var beginMoving=false;
var old_bg="";

function inStyle(obj)
{   old_bg=obj.style.background;
	obj.style.background="#E6F3FB";
}
function outStyle(obj)
{    
	obj.style.background=old_bg;
}


function MouseDownToMove(obj ,e){
	var e = e||window.event;
	obj.style.zIndex=1;
	obj.mouseDownY=e.clientY;
	obj.mouseDownX=e.clientX;
	beginMoving=true;
	obj.style.cursor="move";
	obj.setCapture();
}

function MouseMoveToMove(obj ,e){
	var e = e||window.event;
	if(!beginMoving) return false;
	obj.style.top = (e.clientY-obj.mouseDownY);
	obj.style.background="#C0C9D5"
	//obj.style.left = (e.clientX-obj.mouseDownX); //≤ª◊Û”““∆∂Ø
}

function MouseUpToMove(obj ,e){
	var e = e||window.event;
	if(!beginMoving) return false;
	obj.releaseCapture();
	obj.style.top=0;
	obj.style.left=0;
	obj.style.zIndex=0;
	beginMoving=false;
	var tempTop=e.clientY-obj.mouseDownY;
	var tempRowIndex=(tempTop-tempTop%25)/25;
	var toID=tempRowIndex;
	if(tempRowIndex+obj.rowIndex <0 )
	{
		tempRowIndex=-1;
		toID=-1;
	}	else  {
		tempRowIndex=tempRowIndex+obj.rowIndex;
		toID=tempRowIndex-1;
	}
	if(tempRowIndex >= obj.parentNode.rows.length-1) {
		tempRowIndex = obj.parentNode.rows.length-1;
		toID=tempRowIndex-1;
	}
	if(toID<0)return false;
	if(toID>document.getElementsByName("ID").length )return false;
	toID=document.getElementsByName("ID")[toID].value;
	//obj.parentNode.moveRow(obj.rowIndex,tempRowIndex);
	if(toID!=obj.IDFrom)changeOrder(toID,obj.IDFrom)
}