<?php
session_start();
include 'dbobj.php';

$loginid = mysqli_real_escape_string($dbhandle,trim($_REQUEST["loginid"]));
$passwd = mysqli_real_escape_string($dbhandle,$_REQUEST['password']);

$Login_Query = "select * from login_table where login_id='$loginid' and password=sha1('$passwd')";
//echo $Login_Query;
$Login_Query_Result=$dbhandle->query($Login_Query);
$data=array();
//echo mysqli_num_rows($Login_Query_Result);
if(mysqli_num_rows($Login_Query_Result) == 1)  // Checks if the userid exist in the database.
{
	$Login_Query_Row = $Login_Query_Result->fetch_assoc();
	if($Login_Query_Row['ENABLED']==1)
	{
        
		$Update_Login_Status_Sql="update login_table set login_status=1,login_time=now() where login_id='" . $loginid . "'";
			//echo $Update_Login_Status_Sql;
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
					"type" => "error",
					"message"=> "Database Error: Not able to update login status. Access Operation Failed");
			} 
					
		else
			{
				$Get_Staff_Details_Sql ="select * from staff_master_table where LID='" . $Login_Query_Row["LID"] . "' and enabled=1";

				$Get_Staff_Details_Result=$dbhandle->query($Get_Staff_Details_Sql);
				if($Get_Staff_Details_Result->num_rows==0)
					{
						$data = array(
						"status" => "500",
						"type" => "error",
						"message"=> "Missing Data Error: No Staff information found. Access Operation Failed");

					}
				else	
					{
						$Get_Staff_Details_Row=$Get_Staff_Details_Result->fetch_assoc();
						/*CREATING DEFAULT SESSION AS PER SYSTEM DATE. */
							$month=date("m");
							$year=date("Y");
							$start_year=0;
							$end_year=0;
							$session='';
							if($month>=4 and $month<=12 )
								{
									$session=$year . '-' . $year+1;
									$start_year=$year;
									$end_year=$year+1;
								}
							else if($month>=1 and $month<=3)
								{
									$session=$year-1  . '-' . $year;
									$start_year=$year-1;
									$end_year=$year;
								}	

						$data = array(
							"status" => "200",
							"message" => "success",
							"details"=> array(
								"LOGINID"   =>      $Login_Query_Row["LOGIN_ID"],
								"LOGINTYPE" =>      $Login_Query_Row["LOGIN_TYPE"],
								"STATUS"    =>      1,
								"STAFFID"   =>     $Get_Staff_Details_Row["Staff_Id"],
								"USERID"    =>      $Get_Staff_Details_Row["Staff_Id"],
								"SESSION"   =>      $session,
								"STARTYEAR" =>      $start_year,
								"ENDYEAR"   =>      $end_year,
								"NAME"      =>      $Get_Staff_Details_Row["Staff_Name"],
								"SCHOOLID"  =>      $Get_Staff_Details_Row["School_Id"],
								"IMAGE"  	=>		$_SERVER['HTTP_HOST'] . '/app_images/profile/admin.jpg'
						));	
					}		
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
