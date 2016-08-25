// JavaScript Document

var timerID = 0;
var tStart  = null;
var sec=0;
var min=0;
var hour=0;
var f_today=new Date()
var l_today=new Date()

function UpdateTimer() {
if(timerID) {
      clearTimeout(timerID);
      clockID  = 0;
   }

    sec=sec-1;
	
    if(sec==0 && min > 0 && hour >0){
    	min = min-1;
    	sec = 59;
	
    }
	

    if(min==0 && hour>0  ){
    	hour = hour-1;
    	min=59;	
	
    }
	
	if(hour==0 && sec==0 ){
    	min=00;	
    }
	
	
	if(sec<0 ){
    	min = min-1;
    	sec = 59;
    }
	

		
 	if (hour<10){
 		HOURS="0" + hour ;
 	}
 	else{
		HOURS =hour;
	}

 	if (min<10){
 		MINUTES="0" + min ;
 	}
 	else{
		MINUTES =min;
	}

 	if (sec<10){
 		SECONDS="0" + sec ;
 	} 
 	else{
		SECONDS = sec;
	}
		
	var  times =  HOURS+":"+MINUTES+":"+SECONDS;
    document.form1.Your_Time.value = times;
   
   if(times > "00:00:00") {
   
  	timerID = setTimeout("UpdateTimer()", 1000);
	
   } else {
   
   Stop();
  
   }


}

function Start() {
	
   var timeset = document.form1.temptime.value;
   timeset1 =  timeset.split(":",3);
   sec=parseInt(timeset1[2]);
   min=parseInt(timeset1[1]);
   hour=parseInt(timeset1[0]);
   tStart   = new Date();
   document.form1.Your_Time.value = document.form1.temptime.value;
   timerID  = setTimeout("UpdateTimer()", 1000);
   document.form1.start.disabled = true;
   document.form1.stop1.disabled = false;
   document.form1.newspeedtest.disabled = true;
   document.form1.editortext.readOnly=false;
  
  
    var currentTime = new Date()
	var month = currentTime.getMonth() + 1
	var day = currentTime.getDate()
	var year = currentTime.getFullYear()
	var hours = currentTime.getHours()
	var minutes = currentTime.getMinutes()
	var seconds = currentTime.getSeconds()
	document.form1.timestarted.value = year+"-"+month+"-"+day+" "+hours+":"+minutes+":"+seconds;



}


function Stop() {
   if(timerID) {
      clearTimeout(timerID);
      timerID  = 0;
   }
   tStart = null;
  	
	 document.form1.editortext.readOnly=true;
 	 document.form1.start.disabled = true;
	 document.form1.stop1.disabled = true;
	 document.form1.dtime.disabled = true;
	 document.form1.timeset.disabled = true;
	 document.form1.newspeedtest.disabled = false;
	 document.form1.timestop.value = document.form1.Your_Time.value;
	 
	 
	var currentTime = new Date()
	var month = currentTime.getMonth() + 1
	var day = currentTime.getDate()
	var year = currentTime.getFullYear()
	var hours = currentTime.getHours()
	var minutes = currentTime.getMinutes()
	var seconds = currentTime.getSeconds()
	
	document.form1.timestopped.value = year+"-"+month+"-"+day+" "+hours+":"+minutes+":"+seconds;
	 
	 var copytext   = document.form1.copyeditor.value;
	 var editortype = document.form1.editortext.value;
	 var settime    = document.form1.temptime.value;
	 var timestop   = document.form1.timestop.value;
	 var datestarted = document.form1.timestarted.value;
	 var datestopped = document.form1.timestopped.value;
	 
	 ShowResults(copytext,editortype,settime,timestop,datestarted,datestopped);
	 
	 alert('Finished!!');
	 //alert(document.form1.copyeditor.value);
	// alert(document.form1.editortext.value);
	 
	


}


function Set() {

	document.form1.dtime.disabled = true;
	document.form1.timeset.disabled = true;
	document.form1.start.disabled = false;
	document.form1.Your_Time.value = document.form1.temptime.value;
	
	Showtext(document.form1.Your_Time.value);
	
	

}


function SelectValue(val) {
	document.form1.temptime.value = val;
}

function BodyLoad() {
	
	document.form1.start.disabled = true;
	document.form1.stop1.disabled = true;
	document.form1.editortext.value = "";
	document.form1.newspeedtest.disabled = true;
    document.form1.editortext.readOnly=true;
	document.form1.dtime.disabled = false;
	document.form1.timeset.disabled = false;
	document.form1.Your_Time.value = '00:00:00';
	document.form1.timestarted.value = "";
	document.form1.timestopped.value ="";
	
}


function right(e) {
if (navigator.appName == 'Netscape' && 
(e.which == 3 || e.which == 2))
return false;
else if (navigator.appName == 'Microsoft Internet Explorer' && 
(event.button == 2 || event.button == 3)) {
alert("Sorry, you do not have permission to right click.");
return false;
}
return true;
}

document.onmousedown=right;
document.onmouseup=right;
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
if (document.layers) window.captureEvents(Event.MOUSEUP);
window.onmousedown=right;
window.onmouseup=right;




document.onkeydown = function(){

	if(window.event && window.event.keyCode == 116){
	// Capture and remap F5
	window.event.keyCode = 505;
	}

	if(window.event && window.event.keyCode == 505){
	// New action for F5
	return false;
	// Must return false or the browser will refresh anyway
	}
}
