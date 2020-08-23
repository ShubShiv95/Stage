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
        
      