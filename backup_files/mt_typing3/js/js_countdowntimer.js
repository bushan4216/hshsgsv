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

    if(min==0 && hour>0 ){
    	hour = hour-1;
    	min=59;	
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
	sec=05;
	min=00;
	hour=00;
   tStart   = new Date();
   document.form1.Your_Time.value = "00:00:05";
   timerID  = setTimeout("UpdateTimer()", 1000);
}


function Stop() {
   if(timerID) {
      clearTimeout(timerID);
      timerID  = 0;
   }
   tStart = null;
   //form1.Start1.disabled=false;
   //form1.Stop1.disabled=true;
}