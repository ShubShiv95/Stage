function showsection(str)	//Function to get select option of section list for a class. Can be used in any other module.
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
xmlhttp.open("GET","get_section_list.php?classid="+str,true);
xmlhttp.send();
}

	function showstudent(str)		//Function used to get selection option for student list. This is used in Addmission Enquiry and is deprecated in the module. Can be used in any other module.
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
        


function outtime(outtime_control,visitor_id,target_td)  //Function used to update visitor outtime in visitor module.
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


function Communication_Call1(msg_receiver_Type)	
//Function used to get select list of either school classes or of staff departments.  Used in Communicatin module. Can be used in any other module.
//Function Prototype GET_L2_Select_List(<1 for Student class list or 2 for Staff department list or 3 for Others  mobile numbers>) 
	{
		
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
			document.getElementById('L2-Select').innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","GetMessageTo2.php?msg_receiver_Type="+msg_receiver_Type,true);
		xmlhttp.send();
}


function Communication_Call2(first_Select_id,second_select_value,next_dest_id1,next_dest_id2)	
//Function used to get requested data list of either school classes or of staff departments.  Used in Communicatin module. Can be used in any other module.
//Function Prototype GET_L2_Select_List(<1 for Student class list or 2 for Staff department list or 3 for Others  mobile numbers>) 
	{
		
		var xmlhttp;    
		var first_select_val=document.getElementById(first_Select_id).value;
		var controller_php='';
		
		if(first_select_val==1)
			{
				controller_php='get_section_list.php?classid='+second_select_value;
				//alert(controller_php);
			}
		if(first_select_val==2)
			{
				controller_php='get_department_staff.php?deptid='+second_select_value;
				//alert(controller_php);
			}
			//alert(first_select_val);

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
			
				if(first_select_val==1)
				{
					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
				}
			if(first_select_val==2)
				{
					document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
				}
				//document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST",controller_php,true);
		xmlhttp.send();
}




function getStuNumList(secid)	
//Function used to get requested data list of student's sms contact number for a section.  Used in Communicatin module. Can be used in any other module.
//Function Prototype getStudentNumberList(<sectionid of the class>) 
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
				document.getElementById("Select-level4-subdiv1").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","getStudentMsgNumbers.php?secid="+secid,true);
			xmlhttp.send();
}







//Ajex Function for Submit Operation used by visitorSearch.php file.  This function can use used to post the entire form data.  Make the changes as required 
var MainForm = $('#MainForm');

MainForm.submit(function (e) {
        //alert(data);
        e.preventDefault();

        $.ajax({
            type: MainForm.attr('method'),
            url: MainForm.attr('action'),
            data: MainForm.serialize(),
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