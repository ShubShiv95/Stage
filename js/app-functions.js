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
		document.getElementById("charCount-div").innerHTML='<span>Character Count: '+msglength+'</span>';
		document.getElementById("smsCount-div").innerHTML='<span>SMS Count: '+smscount+'</span>';
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