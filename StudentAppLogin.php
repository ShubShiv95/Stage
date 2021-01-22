<?php
session_start();
include 'dbobj.php';

$loginid = mysqli_real_escape_string($dbhandle,trim($_REQUEST["loginid"]));
$passwd = mysqli_real_escape_string($dbhandle,$_REQUEST['password']);

$Login_Query = "select * from login_table where login_id='$loginid' and password=sha1('$passwd')";
//echo $Login_Query;
$Login_Query_Result=$dbhandle->query($Login_Query);
$Login_Query_Row = $Login_Query_Result->fetch_assoc();
$data=array();
//echo mysqli_num_rows($Login_Query_Result);
if(mysqli_num_rows($Login_Query_Result) == 1)  // Checks if the userid exist in the database.
{
	if($Login_Query_Row['ENABLED']==1)
	{
        

			
			$Update_Login_Status_Sql="update login_table set login_status=1,login_time=now() where login_id='" . $loginid . "'";
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
				

			else
			{
				$Get_Student_Details_Sql="select smt.*,scd.session as scdsession,scd.session_start_year,scd.session_end_year,scd.class_id,scd.class_sec_id,cst.section,cst.stream,cmt.class_name from student_master_table smt,student_class_details scd,class_section_table cst,class_master_table cmt where smt.lid=" . $Login_Query_Row["LID"] . " and  scd.student_id=smt.student_id and smt.enabled=1 and scd.enabled=1 and cst.class_sec_id=scd.class_sec_id and cmt.class_id=cst.class_id";
				//echo $Get_Student_Details_Sql;
				$Get_Student_Details_Result=$dbhandle->query($Get_Student_Details_Sql);
				$Get_Student_Details_Row=$Get_Student_Details_Result->fetch_assoc();
				//Setting Session Variable.
                $SESSION=$Get_Student_Details_Row["scdsession"];
                $STARTYEAR= $Get_Student_Details_Row["session_start_year"];
                $ENDYEAR= $Get_Student_Details_Row["session_end_year"];
                $data = array(
					"status" => "200",
					"message" => "success",
					"details"=> array(
                        "LOGINID"   =>      $Login_Query_Row["LOGIN_ID"],
                        "LOGINTYPE" =>      $Login_Query_Row["LOGIN_TYPE"],
                        "LID"       =>      $Login_Query_Row["LID"],
						"STATUS"    =>      1,
						"STUDENTID" =>      $Get_Student_Details_Row["Student_Id"],
						"USERID"    =>      $Get_Student_Details_Row["Student_Id"],
						"SESSION"   =>      $SESSION,
						"STARTYEAR" =>      $STARTYEAR,
						"ENDYEAR"   =>      $ENDYEAR,
						"CLASSID"   =>      $Get_Student_Details_Row["class_id"],
						"CLASSNAME" =>      $Get_Student_Details_Row["class_name"],
						"SECTIONID" =>      $Get_Student_Details_Row["class_sec_id"],
						"SECTION"   =>      $Get_Student_Details_Row["section"],
						"STREAM"    =>      $Get_Student_Details_Row["stream"],
						"NAME"      =>      $Get_Student_Details_Row["First_Name"].' '.    
											$Get_Student_Details_Row["Middle_Name"]. ' '.$Get_Student_Details_Row["Last_Name"],
						"PARENTID"  =>      $Get_Student_Details_Row["Parent_LID"],
						"SCHOOLID"  =>      $Get_Student_Details_Row["School_Id"],
						"IMAGE"  =>      $_SERVER['HTTP_HOST'] . '/app_images/profile/' . $Get_Student_Details_Row["Student_Image"]
                    ));
                    
                    
				
            }
        // }
		// else
		// {
		// 	$data = array(
		// 		"status" => "500",
		// 		"type"	=>	"error",
		// 		"message" => "Password Not Matched"
		// 	);

		// }
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
		"message" => "Invalid Login Id or Password"
		);
}
echo json_encode($data, JSON_PRETTY_PRINT);
?>