function Remove_Select(select_id){


    var selectObj = document.getElementById(select_id);
    selectObj.remove();


}

function smsLength(msg)
	{
		var msglength;
		var smscount=1;
		msglength=document.getElementById(msg).value.length;
		
		smscount=Math.ceil(msglength/160);
		strprint='<h6><b>Character Count: </b><span >'+msglength+'</span></h6><h6><b>Sms Count:  </b><span>'+smscount+'</span></h6>';
		document.getElementById("PrintCount-div").innerHTML=strprint;

			/*	
			if(msglength > 160)
					{
						
						smscount=Math.ceil(msglength/160);
						//document.getElementById("charCount-span").style.color = "Red";
						//document.getElementById("smsCount-span").style.color = "Red";
						document.getElementById("charCount-div").innerHTML=msglength;
						document.getElementById("smsCount-div").innerHTML=smscount;
					}
				else
					{
						//document.getElementById("charCount-span").style.color = "Black";
						//document.getElementById("smsCount-span").style.color = "Black";
						smscount=msglength/160;
						document.getElementById("charCount-div").innerHTML=msglength;
						document.getElementById("smsCount-div").innerHTML=smscount;

					}
					*/
		return;
	}