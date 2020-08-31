function showsection(str)
{
var xmlhttp;    
  //document.getElementById("studentdiv").innerHTML='<select name="sid" id="sid" disabled="disabled"><option value="0">Select Student</option></select>';
  var element = document.getElementById("secid");			
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("secid").innerHTML=xmlhttp.responseText;
    //element.classList.add("select2");
    }
  }
xmlhttp.open("GET","get_section_student.php?classid="+str,true);
xmlhttp.send();
}

	function showstudent(str)
		{
			var xmlhttp;    
			
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("sid").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","get_student.php?secid="+str,true);
			xmlhttp.send();
		}


        function fillsid(str)
        {
            document.getElementById("studentid").value=str;
        }
        

function outtime(outtime_control,visitor_id,target_td)
	{
		var outtime=document.getElementById(outtime_control).value;
		var xmlhttp;    
		if (outtime=="")
		{
		alert('Please Provide Outtime.');
		return;
		}
		//alert(outtime);
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById(target_td).innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","update_outtime.php?outtime="+outtime+"&veid="+visitor_id+"&target_td="+target_td,true);
		xmlhttp.send();
}
function GetMessageTo2(MessageTo_Type)
	{
		//var outtime=document.getElementById(outtime_control).value;
		var xmlhttp;    
		
		//alert(outtime);
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById('messageto2-div').innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","GetMessageTo2.php?MessageTo_Type="+MessageTo_Type,true);
		xmlhttp.send();
}

//Ajex Function for Submit Operation used by visitorSearch.php file.  
var frm = $('#searchEnquiryForm');

    frm.submit(function (e) {
        //alert(data);
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                //alert(data);
                $('div#visitorList').html(data);
                //alert(data);
            },
            error: function (data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                $('div#visitorList').html(data);
                
            },
        });
	});
	
//End of Ajex Function for Submit Operation used by visitorSearch.php file. 