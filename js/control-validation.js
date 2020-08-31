function check_select(id_name,id_description)
	{
		var value=document.getElementById(id_name).value;
		//alert(value);
		if(value<=0)
			{
				alert('Error Invalid Selection: Please select ' + id_description);
				document.getElementById(id_name).focus();
				return false;
			}
		else 
			return true;
	}

	

function check_empty(id_name,id_description)
	{
		if(document.getElementById(id_name).value=="" || document.getElementById(id_name).value<=0)
			{
				alert('Error Empty Value: Please provide value for '+ id_description); 
				document.getElementById(id_name).focus();
				return false;
			}
		else return true;
	}
	
function check_int(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
			
          return true;
       }
	
//Parameter Description: range1=Starting value	
function check_range(range1,range2,id_name,id_description)
	{
		var id_value=document.getElementById(id_name).value;
		if(id_value >= range1 && id_value <= range2)
			{
				return true;
			}
		else
			{
				alert('Error Value Range: Please provide valid value for ' + id_description + ' between '+ range1 + ' and ' + range2 +'.' );
				document.getElementById(id_name).focus();
				return false;
			}
	} //end of this function
	

//Parameter Description:: value=current selected value; compare_with= data comparing with valuel; id_name= control to whom it enable/disable.	
function enable_disable_equal(value,compare_with,id_name)
		{
			if(value==compare_with)
			{
				document.getElementById(id_name).disabled=false;
				document.getElementById(id_name).focus();
			}
			else
				{
				document.getElementById(id_name).value="";
				document.getElementById(id_name).disabled=true;
				
				}
		}
	
function enable_disable_greater(value,compare_with,id_name)	
{
			if(value>compare_with)
			{
				document.getElementById(id_name).disabled=false;
				document.getElementById(id_name).focus();
			}
			else
				{
				document.getElementById(id_name).value="";
				document.getElementById(id_name).disabled=true;					
				}
		}
function check_textlength(id_name,length_limit,id_description)
	{
		var curr_length=document.getElementById(id_name).value.length;
		
			if(curr_length > length_limit)
				{
					alert('Error String Length: ' +id_description + ' length cannot exceed more than ' + length_limit + ' characters.');
					document.getElementById(id_name).focus();
					return false;
				}
			else
				return true;
	}
	
function restrict_textlength(id_name,length_limit,id_description)
	{
		var curr_length=document.getElementById(id_name).value.length;
		var ch='';
		
			if(curr_length >= length_limit)
				{
					alert('Error String Length: ' +id_description + ' length cannot exceed more than ' + length_limit + ' characters.');
					ch=document.getElementById(id_name).value.substring(1,length_limit);
					document.getElementById(id_name).value=ch;
					
					event.preventDefault();
					return false;
				}
			else
				return true;
	}	
	
	
function copy_paste(sourceid,destinationid)
	{
		document.getElementById(destinationid).value=document.getElementById(sourceid).value;
	}
	
function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
	   
	   
function isdigitKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }	   
	 
function compareClass(classid1,classid2)
		{
			//comparekey : 'lowertoupper' or 'uppertolower'
			var classval1 = document.getElementById(classid1).value;
			var classval2 = document.getElementById(classid2).value;
			
					if(classval2 > classval1)
						{
							alert('The class selection is not valid.');
							document.getElementById(classid2).value=0;
						}	
			
			
		}
