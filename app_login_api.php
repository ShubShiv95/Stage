<?php

//include 'crawlerBhashSMS.php';
include 'dbobj.php';



$lid = mysqli_real_escape_string($dbhandle,trim($_REQUEST['loginid']));
$passwd = mysqli_real_escape_string($dbhandle,$_REQUEST['password']);
/*
@ $dbhandle = mysql_connect('localhost','dsc_user','dscuser','dsc'); // mysqli('hostname','databasse_user','database_user_password','database name')

$name = "";
$lid = mysql_real_escape_string(trim($_POST['loginid']), $dbhandle);
$passwd = mysql_real_escape_string($_POST['passwd'],$dbhandle);
//$_SESSION['LOGINID']= $lid;
*/
//include 'dbhandle.php';

//$lid = mysqli_real_escape_string($dbhandle,trim($_REQUEST['loginid']));
//$passwd = mysqli_real_escape_string($dbhandle,$_REQUEST['password']);

//$lid = mysql_real_escape_string(trim($_POST['loginid']), $dbhandle);
//$passwd = mysql_real_escape_string($_POST['passwd'],$dbhandle);

$Login_Query = "select * from login_table where login_id='" . $lid . "' and enabled=1";
//echo $Login_Query;

//select * from user_login where user_id='admin';
//$result = mysqli_query($dbhandle,$query);   //mysqli_query just runs the query only without returning any extra properties.
$Login_Query_Result=$dbhandle->query($Login_Query);
$Login_Query_Row = $Login_Query_Result->fetch_assoc();
//echo mysqli_num_rows($result);
if(mysqli_num_rows($Login_Query_Result) == 1)  // Checks if the userid exist in the database.
{
	if($Login_Query_Row['ENABLED']==1)
	{

		if($Login_Query_Row['PASSWORD']== sha1($passwd)) // check if the user password matches.

		{
			
			//Listing All Sessions from school_master_table;
			$Get_Session_List_Sql="select session from school_master_table";
			$Get_Session_List_result=$dbhandle->query($Get_Session_List_Sql);
			if(!$Get_Session_List_result)

			{
					$el=new LogMessage();
					$sql=$Get_Session_List_Sql;
					$error_msg="<h1>Database Error: Not able to fetch Session List.";
					//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
					$el->write_log_message('Login Process',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
					$_SESSION["MESSAGE"]=$error_msg;    
					$dbhandle->query("unlock tables");
					$data = array(
						"status" => "500",
						"message" => "failed",
						"details"=> "Database Error: Not able to fetch Session List.");
					die;
			}
				$_SESSION["SESSIONLIST"]=NULL;
				$count=1;
				while($Get_Session_List_row=$Get_Session_List_result->fetch_assoc())
				{
					$_SESSION["SESSIONLIST"][$count]=$Get_Session_List_row["session"];
					$count++;
				}

			
			$Update_Login_Status_Sql="update login_table set login_status=1,login_time=now() where login_id='" . $lid . "'";
			$Update_Login_Status_Result=$dbhandle->query($Update_Login_Status_Sql);
			if($Update_Login_Status_Result==false)
			{
				$el=new LogMessage();
				$sql=$Update_Login_Status_Sql;
				$error_msg="<h1>Database Error: Not able to update login status after successful login.";
				//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
				$el->write_log_message('Login Process',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
				$_SESSION["MESSAGE"]=$error_msg;    
				$dbhandle->query("unlock tables");
				$data = array(
					"status" => "500",
					"message" => "failed",
					"details"=> "Database Error: Not able to update login status after successful login");
			}
				

			if($Login_Query_Row["LOGIN_TYPE"]=='STUDENT')
			{
				$Get_Student_Details_Sql="select * from student_master_table where student_reff_login_id='" . $lid . "' and enabled=1";
				//echo $Get_Student_Details_Sql;
				$Get_Student_Details_Result=$dbhandle->query($Get_Student_Details_Sql);
				$Get_Student_Details_Row=$Get_Student_Details_Result->fetch_assoc();
				//Setting Session Variable.
				$data = array(
					"status" => "200",
					"message" => "success",
					"details"=> array(
						"LOGINID"   =>      $Login_Query_Row["LOGIN_ID"],
						"LOGINTYPE" =>      $Login_Query_Row["LOGIN_TYPE"],
						"STATUS"    =>      1,
						"USERID"    =>      $Get_Student_Details_Row["Student_Id"],
						"SESSION"   =>      $Get_Student_Details_Row["Session"],
						"STARTYEAR" =>      $Get_Student_Details_Row["Session_Start_Year"],
						"ENDYEAR"   =>      $Get_Student_Details_Row["Session_End_Year"],
						"CLASSID"   =>      $Get_Student_Details_Row["Class_Id"],
						"SECTIONID" =>      $Get_Student_Details_Row["Class_Sec_Id"],
						"NAME"      =>      $Get_Student_Details_Row["First_Name"].' '.    
											$Get_Student_Details_Row["Middle_Name"]. ' '.$Get_Student_Details_Row["Last_Name"],
						"PARENTID" =>      $Get_Student_Details_Row["Parent_Reff_Login_Id"],
						"SCHOOLID"  =>      $Get_Student_Details_Row["School_Id"]
					));
				
			}

			else if($Login_Query_Row["LOGIN_TYPE"]=='PARENT')
			{
				$Get_Parent_Details_Sql="select * from student_master_table where parent_reff_login_id='" . $lid . "' and enabled=1";
				$Get_Parent_Details_Result=$dbhandle->query($Get_Parent_Details_Sql);
				
				$_SESSION["STUDENTLIST"]=NULL;
				$count=1;
				//Setting Session Variable.
				while($Get_Parent_Details_Row=$Get_Parent_Details_Result->fetch_assoc())
					{
						if($count==1)	
						{
							$data = array(
								"status" => "200",
								"message" => "success",
								"details"=> array(
									"LOGINID"   =>      $Login_Query_Row["LOGIN_ID"],
									"LOGINTYPE" =>      $Login_Query_Row["LOGIN_TYPE"],
									"STATUS"    =>      1,
									"USERID"    =>      $Get_Parent_Details_Result["Student_Id"],
									"SESSION"   =>      $Get_Parent_Details_Result["Session"],
									"STARTYEAR" =>      $Get_Parent_Details_Result["Session_Start_Year"],
									"ENDYEAR"   =>      $Get_Parent_Details_Result["Session_End_Year"],
									"CLASSID"   =>      $Get_Parent_Details_Result["Class_Id"],
									"SECTIONID" =>      $Get_Parent_Details_Result["Class_Sec_Id"],
									"NAME"      =>      $Get_Parent_Details_Result["Guardian_Name"],
									"PARENTID" =>      $Get_Parent_Details_Result["Parent_Reff_Login_Id"],
									"SCHOOLID"  =>      $Get_Parent_Details_Result["School_Id"],
									"STUDENTLISTNAME"=> $Get_Parent_Details_Result["First_Name"] . ' ' . 
														$Get_Parent_Details_Result["Middle_Name"] . ' ' . $Get_Parent_Details_Result["Last_Name"],
									"STUDENTID" =>      $Get_Parent_Details_Result["Student_Id"],
								));
						}
						else
						{
							$_SESSION["SIBLINGLIST"]["NAME"][$count]= $Get_Parent_Details_Row["First_Name"] . ' ' . $Get_Parent_Details_Row["Middle_Name"] . ' ' . $Get_Parent_Details_Row["Last_Name"];
							$_SESSION["SIBLINGLIST"]["STUDENTID"][$count]= $Get_Parent_Details_Row["Student_Id"];
							$count++;
						}
					}		

			}	
			else if($Login_Query_Row["LOGIN_TYPE"]=='STAFF')
			{
				$Get_Staff_Details_Sql="select * from staff_master_table where staff_reff_login_id='" . $lid . "' and enabled=1";

				$Get_Staff_Details_Result=$dbhandle->query($Get_Staff_Details_Sql);
				$Get_Staff_Details_Row=$Get_Staff_Details_Result->fetch_assoc();
                $data = array(
                    "status" => "200",
                    "message" => "success",
                    "details"=> array(
                        "LOGINID"   =>      $Login_Query_Row["LOGIN_ID"],
                        "LOGINTYPE" =>      $Login_Query_Row["LOGIN_TYPE"],
                        "STATUS"    =>      1,
                        "USERID"    =>      $Get_Staff_Details_Row["Staff_Id"],
                        "SESSION"   =>      $Get_Staff_Details_Row["Default_Session"],
                        "STARTYEAR" =>      $Get_Staff_Details_Row["Default_Start_Year"],
                        "ENDYEAR"   =>      $Get_Staff_Details_Row["Default_End_Year"],
                        "NAME"      =>      $Get_Staff_Details_Row["Staff_Name"],
                        "SCHOOLID"  =>      $Get_Staff_Details_Row["School_Id"]
                ));			
		}		
		}
		else
		{
			$data = array(
				"status" => "500",
				"type"	=>	"error",
				"message" => "Password Not Matched"
			);

		}
	}
	else
	{
		$data = array(
			"status" => "500",
			"type"	=>	"error",
			"message" => "Login Id Is Disabled"
		);
	}
	
}
else
{
	$data = array(
		"status" => "500",
		"type"	=>	"error",
		"message" => "Login Id/Password In-Correct"
		);
}
echo json_encode($data, JSON_PRETTY_PRINT);

