<?php
session_start();
include 'crawlerBhashSMS.php';
include 'dbobj.php';
include 'errorLog.php';

$loginid = mysqli_real_escape_string($dbhandle, trim($_POST['loginid']));
$password = mysqli_real_escape_string($dbhandle, $_POST['password']);
$Login_Query = "select * from login_table where login_id='" . $loginid . "' and password=sha1('$password')";
//echo $Login_Query;
$Login_Query_Result = $dbhandle->query($Login_Query);
if(!$Login_Query_Result)
	{
		$el = new LogMessage();
		$sql = $Login_Query;
		$error_msg = "<h1>Database Error: Not able to check user credentials.";
		//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
		$el->write_log_message('Login Process', $error_msg, $sql, __FILE__,$loginid);
		$_SESSION["MESSAGE"] = $error_msg;
		$dbhandle->query("unlock tables");
		die;
	}
else
	{
		if($Login_Query_Result->num_rows==0)//checks if the login id row does not exist then show error.
			{
				echo "Invalud Username/Password. Please try again.";
				die;
			}
		else		
			{
				//if the login row exist the proceed next.
				$Login_Query_Row = $Login_Query_Result->fetch_assoc();
				$_SESSION['LOGINID']=$Login_Query_Row["LOGIN_ID"];
				$_SESSION['LOGINTYPE']=$Login_Query_Row["LOGIN_TYPE"];
				$LID = $Login_Query_Row["LID"];
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
							/*End of Default Session information calculation. */	
							//Listing All Sessions from school_master_table;
							$_SESSION["SESSION"] = '';
							$_SESSION["SESSIONLIST"] = array();
							$Get_Session_List_Sql = "select * from school_master_table";
							$Get_Session_List_result = $dbhandle->query($Get_Session_List_Sql);
							if (!$Get_Session_List_result) 
								{
									$el = new LogMessage();
									$sql = $Get_Session_List_Sql;
									$error_msg = "<h1>Database Error: Not able to fetch Session List.";
									//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
									$el->write_log_message('Login Process', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
									$_SESSION["MESSAGE"] = $error_msg;
									$dbhandle->query("unlock tables");
									die;
								}
							while ($Get_Session_List_row = $Get_Session_List_result->fetch_assoc()) 
							{
								array_push($_SESSION["SESSIONLIST"],$Get_Session_List_row["session"]);
								if ($Get_Session_List_row["enabled"] == 1) 
									{ //for default session values.
										$_SESSION["SESSION"] = $Get_Session_List_row["session"];
										$_SESSION["STARTYEAR"] = $Get_Session_List_row["start_year"];
										$_SESSION["ENDYEAR"] = $Get_Session_List_row["end_year"];
									}
							}
							/*End of Session List Creation. */

							$Update_Login_Status_Sql = "update login_table set login_status=1,login_time=now() where login_id='" . $loginid . "'";
							$Update_Login_Status_Result = $dbhandle->query($Update_Login_Status_Sql);
							if ($Update_Login_Status_Result == false) 
								{
									$el = new LogMessage();
									$sql = $Update_Login_Status_Sql;
									$error_msg = "<h1>Database Error: Not able to update login status after successful login.";
									//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
									$el->write_log_message('Login Process', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
									$_SESSION["MESSAGE"] = $error_msg;
									$dbhandle->query("unlock tables");
								}					
							if ($Login_Query_Row["LOGIN_TYPE"] == 'STUDENT') 
							{
								//$Get_Student_Details_Sql = "select * from student_master_table smt,student_class_details scd where LID='" . $LID . "' and enabled=1";
								$Get_Student_Details_Sql="select smt.*,scd.session as Session,scd.Session_Start_Year,scd.Session_End_Year,scd.Class_Id as Class_Id,scd.class_sec_id as Class_Sec_Id,cst.section as Section,cst.stream as Stream,cmt.class_name as Class_Name,scd.School_Id as School_Id from student_master_table smt,student_class_details scd,class_section_table cst,class_master_table cmt where smt.lid=$LID and  scd.student_id=smt.student_id and smt.enabled=1 and scd.enabled=1 and cst.class_sec_id=scd.class_sec_id and cmt.class_id=cst.class_id";
								//echo $Get_Student_Details_Sql;
								$Get_Student_Details_Result = $dbhandle->query($Get_Student_Details_Sql);
								$Get_Student_Details_Row = $Get_Student_Details_Result->fetch_assoc();
								//Setting Session Variable.
								$_SESSION["STATUS"] = 1;
								$_SESSION["USERID"] = $Get_Student_Details_Row["Student_Id"];  //WORKS FOR STUDENT ID IF TYPE IS STUDENT.
								$_SESSION["SESSION"]=$Get_Student_Details_Row["Session"];
								$_SESSION["STARTYEAR"]= $Get_Student_Details_Row["Session_Start_Year"];
								$_SESSION["ENDYEAR"]= $Get_Student_Details_Row["Session_End_Year"];
								$_SESSION["CLASSID"] = $Get_Student_Details_Row["Class_Id"];
								$_SESSION["SECTIONID"] = $Get_Student_Details_Row["Class_Sec_Id"];
								$_SESSION["SECTION"] = $Get_Student_Details_Row["section"];
								$_SESSION["STREAM"] = $Get_Student_Details_Row["Stream"];
								$_SESSION["NAME"] = $Get_Student_Details_Row["First_Name"] . ' ' . $Get_Student_Details_Row["Middle_Name"] . ' ' . $Get_Student_Details_Row["Last_Name"];
								$_SESSION["PARENTID"] = $Get_Student_Details_Row["Parent_LID"];
								$_SESSION["SCHOOLID"] = $Get_Student_Details_Row["School_Id"];
								//$_SESSION["SCHOOLID"]= 1;
								$_SESSION["HOSTNAME"] = $_SERVER['HTTP_HOST'];
								//$_SESSION["HOSTNAME"]=$_SERVER['HTTP_HOST']."/solvethemess/stage";
								//$_SESSION["LOGINGRADE"]= $row["login_grade"];
								$_SESSION["FOOTER"] = "SMS SCHOOL ERP COPYRIGHT 2020";
								$_SESSION["LINK"] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
								$_SESSION["LASTUPDATEON"] = $cur_time = date("Y-m-d H:i:s");
								$_SESSION["INTERVAL"] = '+120 minutes';
								$_SESSION["FOOTERNOTE"] = 'Powered by  <a href="http://swipetouch.tech" target="_blank">SwipeTouch Technologies</a>';
							} 
							else if ($Login_Query_Row["LOGIN_TYPE"] == 'PARENT') 
							{
								$Get_Parent_Details_Sql = "select smt.*,scd.Session as Session,scd.Session_Start_Year as Session_Start_Year,scd.session_end_year as Session_End_Year,scd.class_id as Class_Id,scd.class_sec_id Class_Sec_Id,cmt.class_name,cst.section,scd.stream as Stream from student_master_table smt,student_class_details scd,class_master_table cmt,class_section_table cst where smt.parent_lid=$LID and scd.student_id=smt.student_id and cst.class_sec_id=scd.class_sec_id and cmt.class_id=cst.class_id and scd.enabled=1";
								
								//echo $Get_Parent_Details_Sql;
								$Get_Parent_Details_Result = $dbhandle->query($Get_Parent_Details_Sql);
								//echo $dbhandle->error($Get_Parent_Details_Result);
								$count = 1;
								//Setting Session Variable.
								while ($Get_Parent_Details_Row = $Get_Parent_Details_Result->fetch_assoc()) {
									if ($count == 1) 
									{
										$_SESSION["STATUS"] = 1;
										$_SESSION["USERID"] = $Get_Parent_Details_Row["Student_Id"];  //WORKS FOR STUDENT ID IF TYPE IS STUDENT.
										$_SESSION["CLASSID"] = $Get_Parent_Details_Row["Class_Id"];
										$_SESSION["SECTIONID"] = $Get_Parent_Details_Row["Class_Sec_Id"];
										$_SESSION["SECTION"] = $Get_Parent_Details_Row["section"];
										$_SESSION["STREAM"] = $Get_Parent_Details_Row["Stream"];
										$_SESSION["SESSION"]=$Get_Parent_Details_Row["Session"];
										$_SESSION["STARTYEAR"]= $Get_Parent_Details_Row["Session_Start_Year"];
										$_SESSION["ENDYEAR"]= $Get_Parent_Details_Row["Session_End_Year"];
										$_SESSION["NAME"] = $Get_Parent_Details_Row["Guardian_Name"];
										$_SESSION["PARENTID"] = $Get_Parent_Details_Row["Parent_LID"];
										$_SESSION["SCHOOLID"] = $Get_Parent_Details_Row["School_Id"];
										//$_SESSION["SCHOOLID"]= 1;
										$_SESSION["HOSTNAME"] = $_SERVER['HTTP_HOST'];
										//$_SESSION["HOSTNAME"]=$_SERVER['HTTP_HOST']."/solvethemess/stage";
										//$_SESSION["LOGINGRADE"]= $row["login_grade"];
										$_SESSION["FOOTER"] = "SMS SCHOOL ERP COPYRIGHT 2020";
										$_SESSION["LINK"] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
										
										$_SESSION["LASTUPDATEON"] = $cur_time = date("Y-m-d H:i:s");
										$_SESSION["INTERVAL"] = '+120 minutes';
										$_SESSION["FOOTERNOTE"] = 'Powered by  <a href="http://swipetouch.tech" target="_blank">SwipeTouch Technologies</a>';
										$_SESSION["SELECTEDCHILD"] =  $Get_Parent_Details_Row["First_Name"] . ' ' . $Get_Parent_Details_Row["Middle_Name"] . ' ' . $Get_Parent_Details_Row["Last_Name"];
										//populating first child to sibling list.
										$_SESSION["SIBLINGLIST"][$count]["NAME"] = $Get_Parent_Details_Row["First_Name"] . ' ' . $Get_Parent_Details_Row["Middle_Name"] . ' ' . $Get_Parent_Details_Row["Last_Name"];
										$_SESSION["SIBLINGLIST"][$count]["STUDENTID"] = $Get_Parent_Details_Row["Student_Id"];
										$count++;
									} else 
									{
										//populating remaining child to sibling list.
										$_SESSION["SIBLINGLIST"][$count]["NAME"] = $Get_Parent_Details_Row["First_Name"] . ' ' . $Get_Parent_Details_Row["Middle_Name"] . ' ' . $Get_Parent_Details_Row["Last_Name"];
										$_SESSION["SIBLINGLIST"][$count]["STUDENTID"] = $Get_Parent_Details_Row["Student_Id"];
										$count++;
									}
								}
							} 
							else if ($Login_Query_Row["LOGIN_TYPE"] == 'STAFF') 
							{
								$Get_Staff_Details_Sql = "select * from staff_master_table where LID=$LID and enabled=1";
								//echo $Get_Staff_Details_Sql;
								$Get_Staff_Details_Result = $dbhandle->query($Get_Staff_Details_Sql);
								if(!$Get_Staff_Details_Result)
									{
										$el = new LogMessage();
										$sql = $Get_Staff_Details_Sql;
										$error_msg = "<h1>Database Error while fetching staff information.  Please try again.";
										//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
										$el->write_log_message('Login Process', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
										$_SESSION["MESSAGE"] = $error_msg;
										$dbhandle->query("unlock tables");
									}
								$Get_Staff_Details_Row = $Get_Staff_Details_Result->fetch_assoc();
								$_SESSION["STATUS"] = 1;
								$_SESSION["USERID"] = $Get_Staff_Details_Row["Staff_Id"];  //WORKS FOR STUDENT ID IF TYPE IS STUDENT.
								$_SESSION["NAME"] = $Get_Staff_Details_Row["Staff_Name"];
								$_SESSION["SCHOOLID"] = $Get_Staff_Details_Row["School_Id"];
								$_SESSION["HOSTNAME"] = $_SERVER['HTTP_HOST'];
								//$_SESSION["LOGINGRADE"]= $row["login_grade"];
								//$_SESSION["SMSBALANCE"] = 20587;
								$_SESSION["FOOTER"] = "SMS SCHOOL ERP COPYRIGHT 2020";
								$_SESSION["LINK"] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
								$_SESSION["LASTUPDATEON"] = $cur_time = date("Y-m-d H:i:s");
								$_SESSION["INTERVAL"] = '+120 minutes';
								$_SESSION["FOOTERNOTE"] = 'Powered by  <a href="http://swipetouch.tech" target="_blank">SwipeTouch Technologies</a>';
							}
				
							echo '<meta HTTP-EQUIV="Refresh" content="0; URL=dashboard.php">';
							exit;
					
			}
	}	

?>

<script>
	$(".alert").alert();
</script>