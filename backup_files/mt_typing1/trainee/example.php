<html>
<head>

<script type="text/javascript">
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
    if(sec==0 && min > 0 && hour >0 ){
    	min = min-1;
    	sec = 59;
    }

    if(min==0 && hour>0 ){
    	hour = hour-1;
    	min=59;	
    }
	
	
	 if(hour==0 && sec==0 ){
    	min=00;	
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
	min=59;
	hour=00;
   tStart   = new Date();
   document.form1.Your_Time.value = "00:59:05";
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

</script>

  <title></title>

</head>

<body  >

<form name="form1" action="qa_check_login.php" method="post">


	<table>
		<tr>
			<td>
	              
	        </td>

	    </tr>
	</table>

	<table>




	    <tr>
			
	        </td>

	      
	        	<b>
                 <input type=text name="Your_Time" size=5 readonly
            	style="width:150px; font-family: Tahoma; font-size: 30px; color:#800000;font-weight:bold;"/>

            	</b>
          	  </font>
	        </td>


	    </tr>



	    <tr>
			
	        <td>
	     
			<input type="button" value="Start"  onClick="Start()"/>
			
			<input type="button" value="Start"  onClick="Stop()"/>

	        </td>


	    </tr>

	    <tr>
			<td>&nbsp;

	  			 
	        </td>

	        <td>&nbsp;
	        	 


	        </td>


	    </tr>

	</table>


</form>

</body>

</html>