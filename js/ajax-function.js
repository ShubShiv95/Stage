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
xmlhttp.open("GET","getSectionList.php?classid="+str,true);
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
			xmlhttp.open("GET","getStudent.php?secid="+str,true);
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
		xmlhttp.open("GET","updateOuttime.php?outtime="+outtime+"&veid="+visitor_id+"&target_td="+target_td,true);
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
		xmlhttp.open("GET","getMsgGrpList.php?msg_receiver_Type="+msg_receiver_Type,true);
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
				controller_php='getSectionList.php?classid='+second_select_value;
				//alert(controller_php);
			}
		if(first_select_val==2)
			{
				controller_php='getDepartmentStaff.php?deptid='+second_select_value;
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
					/*
					if(second_select_val==0){
						//if all classes option is selected then data is directly thrown to the div table section.
						document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
					}
					else {
						//if particular class is selected then the replied section list is thrown to the next select option section.
					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
					}  */

					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;

					}
					//document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
				
				
				
				
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

/*
This function is designed to fetch fetch departmentids and classids for students and parents with Select all department and Select all class ooptions.
*/
function GrpMsgGroupList(msg_receiver_Type)	
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
		xmlhttp.open("GET","getGrpMsgGrpList.php?msg_receiver_Type="+msg_receiver_Type,true);
		xmlhttp.send();
}


//End of GrpMsgGroupList function;


function Grp_Communication_Call2(first_Select_id,second_select_value,next_dest_id)	
//Function used to get requested data list of either school classes or of staff departments.  Used in Communicatin module. Can be used in any other module.
//Function Prototype GET_L2_Select_List(<1 for Student class list or 2 for Staff department list or 3 for Others  mobile numbers>) 
	{
		
		var xmlhttp;    
		var first_select_val=document.getElementById(first_Select_id).value;
		var controller_php='';
		
		
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
			
				
					document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
						
				//document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","getMessageGrpChkbox.php?usergrptype="+first_select_val+"&usergrpid="+second_select_value,true);
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




function getGroups4CUG(msg_receiver_Type)	
//Function used to get select list of either school classes or staff departments 
//based on request for student group or of staff group in CUG.PHP page.  
//Can be used in any other module.
//Function Prototype getGroups4CUG(<1 for Student class list or 2 for Staff department list) 
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
		xmlhttp.open("GET","getGroups4CUG.php?msg_receiver_Type="+msg_receiver_Type,true);
		xmlhttp.send();
}

function getGroupList4CUG(first_Select_id,second_select_value,next_dest_id1,next_dest_id2)	
//Function used to get requested data list of either school classes or of staff departments.  Used in Communicatin module. Can be used in any other module.
//Function Prototype GET_L2_Select_List(<1 for Student class list or 2 for Staff department list or 3 for Others  mobile numbers>) 
	{
		
		var xmlhttp;    
		var first_select_val=document.getElementById(first_Select_id).value;
		var controller_php='';
		
		if(first_select_val==1)
			{
				controller_php='getSectionList4CUG.php?classid='+second_select_value;
				//alert(controller_php);
			}
		if(first_select_val==2)
			{
				controller_php='getDepartmentStaff4CUG.php?deptid='+second_select_value;
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
					/*
					if(second_select_val==0){
						//if all classes option is selected then data is directly thrown to the div table section.
						document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
					}
					else {
						//if particular class is selected then the replied section list is thrown to the next select option section.
					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
					}  */

					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;

					}
					//document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
				
				
				
				
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


function getStuNumList4CUG(secid)	
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
			xmlhttp.open("GET","getStuNumList4CUG.php?secid="+secid,true);
			xmlhttp.send();
}









function getUserList4CUG(first_Select_id,second_select_value,next_dest_id1,next_dest_id2)	
//Function used to get requested data list of either school classes or of staff departments.  Used in Communicatin module. Can be used in any other module.
//Function Prototype GET_L2_Select_List(<1 for Student class list or 2 for Staff department list or 3 for Others  mobile numbers>) 
	{
		
		var xmlhttp;    
		var first_select_val=document.getElementById(first_Select_id).value;
		var controller_php='';
		
		if(first_select_val==1)
			{
				controller_php='getSectionList.php?classid='+second_select_value;
				//alert(controller_php);
			}
		if(first_select_val==2)
			{
				controller_php='getDepartmentStaff4CUG.php?deptid='+second_select_value;
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
					/*
					if(second_select_val==0){
						//if all classes option is selected then data is directly thrown to the div table section.
						document.getElementById('Select-level4-subdiv1').innerHTML=xmlhttp.responseText;
					}
					else {
						//if particular class is selected then the replied section list is thrown to the next select option section.
					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
					}  */

					document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;

					}
					//document.getElementById('L3-Select').innerHTML=xmlhttp.responseText;
				
				
				
				
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





