<?php
session_start();
include 'crawlerBhashSMS.php';
include 'dbobj.php';
include 'errorLog.php';

$lid = mysqli_real_escape_string($dbhandle, trim($_POST['loginid']));
$passwd = mysqli_real_escape_string($dbhandle, $_POST['password']);
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
$Login_Query_Result = $dbhandle->query($Login_Query);
$Login_Query_Row = $Login_Query_Result->fetch_assoc();
//echo mysqli_num_rows($result);
if (mysqli_num_rows($Login_Query_Result) == 1)  // Checks if the userid exist in the database.
{
	if ($Login_Query_Row['ENABLED'] == 1) {
		if ($Login_Query_Row['PASSWORD'] == sha1($passwd)) // check if the user password matches.
		{

			//Listing All Sessions from school_master_table;
			$Get_Session_List_Sql = "select * from school_master_table";
			$Get_Session_List_result = $dbhandle->query($Get_Session_List_Sql);
			if (!$Get_Session_List_result) {
				$el = new LogMessage();
				$sql = $Get_Session_List_Sql;
				$error_msg = "<h1>Database Error: Not able to fetch Session List.";
				//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
				$el->write_log_message('Login Process', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
				$_SESSION["MESSAGE"] = $error_msg;
				$dbhandle->query("unlock tables");
				die;
			}
			$_SESSION["SESSIONLIST"] = NULL;
			$count = 1;
			$_SESSION["SESSION"] = '';
			$_SESSION["STARTYEAR"] = '';
			$_SESSION["ENDYEAR"] = '';
			while ($Get_Session_List_row = $Get_Session_List_result->fetch_assoc()) {
				$_SESSION["SESSIONLIST"][$count] = $Get_Session_List_row["session"];
				$count++;
				if ($Get_Session_List_row["enabled"] == 1) { //for default session values.
					$_SESSION["SESSION"] = $Get_Session_List_row["session"];
					$_SESSION["STARTYEAR"] = $Get_Session_List_row["start_year"];
					$_SESSION["ENDYEAR"] = $Get_Session_List_row["end_year"];
				}
			}
			$Update_Login_Status_Sql = "update login_table set login_status=1,login_time=now() where login_id='" . $lid . "'";
			$Update_Login_Status_Result = $dbhandle->query($Update_Login_Status_Sql);
			if ($Update_Login_Status_Result == false) {
				$el = new LogMessage();
				$sql = $Update_Login_Status_Sql;
				$error_msg = "<h1>Database Error: Not able to update login status after successful login.";
				//$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
				$el->write_log_message('Login Process', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
				$_SESSION["MESSAGE"] = $error_msg;
				$dbhandle->query("unlock tables");
			}

			if ($Login_Query_Row["LOGIN_TYPE"] == 'STUDENT') {
				$Get_Student_Details_Sql = "select * from student_master_table where student_reff_login_id='" . $lid . "' and enabled=1";
				echo $Get_Student_Details_Sql;
				$Get_Student_Details_Result = $dbhandle->query($Get_Student_Details_Sql);
				$Get_Student_Details_Row = $Get_Student_Details_Result->fetch_assoc();
				//Setting Session Variable.
				$_SESSION["LOGINID"] = $Login_Query_Row["LOGIN_ID"];
				$_SESSION["LOGINTYPE"] = $Login_Query_Row["LOGIN_TYPE"];
				$_SESSION["STATUS"] = 1;
				$_SESSION["USERID"] = $Get_Student_Details_Row["Student_Id"];  //WORKS FOR STUDENT ID IF TYPE IS STUDENT.
				//$_SESSION["SESSION"]=$Get_Student_Details_Row["Session"];
				//$_SESSION["STARTYEAR"]= $Get_Student_Details_Row["Session_Start_Year"];
				//$_SESSION["ENDYEAR"]= $Get_Student_Details_Row["Session_End_Year"];
				$_SESSION["CLASSID"] = $Get_Student_Details_Row["Class_Id"];
				$_SESSION["SECTIONID"] = $Get_Student_Details_Row["Class_Sec_Id"];
				$_SESSION["NAME"] = $Get_Student_Details_Row["First_Name"] . ' ' . $Get_Student_Details_Row["Middle_Name"] . ' ' . $Get_Student_Details_Row["Last_Name"];
				$_SESSION["PARENTID"] = $Get_Student_Details_Row["Parent_Reff_Login_Id"];
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
			} else if ($Login_Query_Row["LOGIN_TYPE"] == 'PARENT') {
				$Get_Parent_Details_Sql = "select * from student_master_table where parent_reff_login_id='" . $lid . "' and enabled=1";
				$Get_Parent_Details_Result = $dbhandle->query($Get_Parent_Details_Sql);

				$_SESSION["STUDENTLIST"] = NULL;
				$count = 1;
				//Setting Session Variable.
				while ($Get_Parent_Details_Row = $Get_Parent_Details_Result->fetch_assoc()) {
					if ($count == 1) {
						$_SESSION["LOGINID"] = $Login_Query_Row["LOGIN_ID"];
						$_SESSION["LOGINTYPE"] = $Login_Query_Row["LOGIN_TYPE"];
						$_SESSION["STATUS"] = 1;
						$_SESSION["USERID"] = $Get_Parent_Details_Row["Student_Id"];  //WORKS FOR STUDENT ID IF TYPE IS STUDENT.
						//$_SESSION["SESSION"]=$Get_Parent_Details_Row["Session"];
						//$_SESSION["STARTYEAR"]= $Get_Parent_Details_Row["Session_Start_Year"];
						//$_SESSION["ENDYEAR"]= $Get_Parent_Details_Row["Session_End_Year"];
						$_SESSION["CLASSID"] = $Get_Parent_Details_Row["Class_Id"];
						$_SESSION["SECTIONID"] = $Get_Parent_Details_Row["Class_Sec_Id"];
						$_SESSION["NAME"] = $Get_Parent_Details_Row["Guardian_Name"];
						$_SESSION["PARENTID"] = $Get_Parent_Details_Row["Parent_Reff_Login_Id"];
						$_SESSION["SCHOOLID"] = $Get_Parent_Details_Row["School_Id"];
						//$_SESSION["SCHOOLID"]= 1;
						$_SESSION["HOSTNAME"] = $_SERVER['HTTP_HOST'];
						//$_SESSION["HOSTNAME"]=$_SERVER['HTTP_HOST']."/solvethemess/stage";
						//$_SESSION["LOGINGRADE"]= $row["login_grade"];
						$_SESSION["FOOTER"] = "SMS SCHOOL ERP COPYRIGHT 2020";
						$_SESSION["LINK"] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
						$count++;
						$_SESSION["STUDENTLIST"]["NAME"][$count] = $Get_Parent_Details_Row["First_Name"] . ' ' . $Get_Parent_Details_Row["Middle_Name"] . ' ' . $Get_Parent_Details_Row["Last_Name"];
						$_SESSION["STUDENTLIST"]["STUDENTID"][$count] = $Get_Parent_Details_Row["Student_Id"];
						$_SESSION["LASTUPDATEON"] = $cur_time = date("Y-m-d H:i:s");
						$_SESSION["INTERVAL"] = '+120 minutes';
						$_SESSION["FOOTERNOTE"] = 'Powered by  <a href="http://swipetouch.tech" target="_blank">SwipeTouch Technologies</a>';
					} else {
						$_SESSION["SIBLINGLIST"]["NAME"][$count] = $Get_Parent_Details_Row["First_Name"] . ' ' . $Get_Parent_Details_Row["Middle_Name"] . ' ' . $Get_Parent_Details_Row["Last_Name"];
						$_SESSION["SIBLINGLIST"]["STUDENTID"][$count] = $Get_Parent_Details_Row["Student_Id"];
						$count++;
					}
				}
			} else if ($Login_Query_Row["LOGIN_TYPE"] == 'STAFF') {
				$Get_Staff_Details_Sql = "select * from staff_master_table where login_id='" . $lid . "' and enabled=1";
				//echo $Get_Staff_Details_Sql;
				$Get_Staff_Details_Result = $dbhandle->query($Get_Staff_Details_Sql);
				$Get_Staff_Details_Row = $Get_Staff_Details_Result->fetch_assoc();

				$_SESSION["LOGINID"] = $Login_Query_Row["LOGIN_ID"];
				$_SESSION["LOGINTYPE"] = $Login_Query_Row["LOGIN_TYPE"];
				$_SESSION["STATUS"] = 1;
				$_SESSION["USERID"] = $Get_Staff_Details_Row["Staff_Id"];  //WORKS FOR STUDENT ID IF TYPE IS STUDENT.
				//$_SESSION["SESSION"]=$Get_Staff_Details_Row["Default_Session"];
				//_SESSION["STARTYEAR"]= $Get_Staff_Details_Row["Default_Start_Year"];
				//$_SESSION["ENDYEAR"]= $Get_Staff_Details_Row["Default_End_Year"];
				//$_SESSION["CLASSID"]=$Get_Student_Details_Row["Class_Id"];
				//$_SESSION["SECTIONID"]=$Get_Student_Details_Row["Class_Sec_Id"];
				$_SESSION["NAME"] = $Get_Staff_Details_Row["Staff_Name"];
				//$_SESSION["PARENTID"]=$Get_Student_Details_Row["Parent_Reff_Login_Id"];
				$_SESSION["SCHOOLID"] = $Get_Staff_Details_Row["School_Id"];
				//$_SESSION["SCHOOLID"]= 1;
				$_SESSION["HOSTNAME"] = $_SERVER['HTTP_HOST'];
				//$_SESSION["HOSTNAME"]=$_SERVER['HTTP_HOST']."/solvethemess/stage";
				//$_SESSION["LOGINGRADE"]= $row["login_grade"];
				$_SESSION["SMSBALANCE"] = 20587;
				$_SESSION["FOOTER"] = "SMS SCHOOL ERP COPYRIGHT 2020";
				$_SESSION["LINK"] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
				$_SESSION["LASTUPDATEON"] = $cur_time = date("Y-m-d H:i:s");
				$_SESSION["INTERVAL"] = '+120 minutes';
				$_SESSION["FOOTERNOTE"] = 'Powered by  <a href="http://swipetouch.tech" target="_blank">SwipeTouch Technologies</a>';

				$_SESSION["SECTIONID"] = 1;
			}

			/*
			$_SESSION["DISTRICTID"]= $financialYear_row["district_id"];
			$_SESSION["STARTMONTH"]= $financialYear_row["start_month"];
			$_SESSION["ENDMONTH"]= $financialYear_row["end_month"];
			$_SESSION["STARTYEAR"]= $financialYear_row["Start_Year"];
			$_SESSION["ENDYEAR"]= $financialYear_row["End_Year"];
			$_SESSION["FINYEAR"]= $financialYear_row["Start_Year"] . '-' . $financialYear_row["End_Year"];
			$_SESSION["SCHOOL"]=$row["school_name"] . ', ' . $row["area"] ;*/
			//$_SESSION["GRADE"] = array();
			//$_SESSION['PASSWORD']= $passwd;

			/*
			$query = "select category,grade from imb_user_control where userid='" . $lid . "'";
			//echo $query;
			$result = mysqli_query($dbhandle,$query);
			$cat = array();
			{
				$_SESSION["CATEGORY"][$i] = $row["category"];
				$_SESSION["GRADE"][$i] = $row["grade"];
				//echo "GRADE " . $_SESSION["GRADE"][$i];
				//echo "CATEGORY " . $_SESSION["CATEGORY"][$i];
				$i++;
			}

			$_SESSION["CATEGORY"] = $cat; // ####taking category from user_login but need to change to table imb_user_control.
			$_SESSION["GRADE"] = "";			// ####taking grade from user_login but need to change to table imb_user_control.
			$_SESSION["CATEGORY"] = $result;
			$query = "select grade from imb_user_control where user_id='" . $lid . "'";
			$result = mysqli_query($dbhandle,$query);
			$_SESSION["GRADE"] = $result;
			$i=0;
			$j=0;
			while($row=mysqli_fetch_assoc($result))
			{
				$_SESSION["CATEGORY"][0][$i] = $row["category"];
				//$_SESSION["GRADE"][$j] = $row["grade"];
				$i++;
				//$j++;
			}

			$query = "select * from imb_user_control where user_id='" . $lid . "'";
			$result = mysqli_query($dbhandle,$query);		//mysqli_query just runs the query only without returning any extra properties.
			for($i=0;$row=mysqli_fetch_assoc($result);$i++)
			{
			$_SESSION["CATEGORY"] = $row["category"];
			$_SESSION["GRADE"] =  $row["grade"];
			}
			*/

			//$query= "update user_login set status=1,last_login_time=now() where user_id='" . $lid . "'";
			//mysqli_query($dbhandle,$query);
			//echo 'login done';

			echo '<meta HTTP-EQUIV="Refresh" content="0; URL=dashboard.php">';
			exit;
		} else {
			$_SESSION["ERRORNO"] = 3;  //redirection at incorrect password.
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<strong>Warning</strong> Use Correct Password 
			</div>';
			//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=sessionerror.php">';
			exit;
		}
	} else {
		$_SESSION["ERRORNO"] = 2;   //redirection at disabled loginid.
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Warning</strong> Your Annount Is Disabled
			</div>';
		//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=sessionerror.php">';
		exit;
	}
} else {
	$_SESSION["ERRORNO"] = 1;    //redirection at incorrect loginid.
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
	<strong>Warning</strong> Invalid User Name
  </div>';
	//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=sessionerror.php">';
	exit;
}
?>

<script>
	$(".alert").alert();
</script>