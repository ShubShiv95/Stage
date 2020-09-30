<?php
session_start();
include 'crawlerBhashSms.php';
/*
@ $dbhandle = mysql_connect('localhost','dsc_user','dscuser','dsc'); // mysqli('hostname','databasse_user','database_user_password','database name')


$name = "";
$lid = mysql_real_escape_string(trim($_POST['loginid']), $dbhandle);
$passwd = mysql_real_escape_string($_POST['passwd'],$dbhandle);
//$_SESSION['LOGINID']= $lid;
*/
//include 'dbhandle.php';
include 'dbobj.php';
$lid = mysqli_real_escape_string($dbhandle,trim($_REQUEST['loginid']));
$passwd = mysqli_real_escape_string($dbhandle,$_REQUEST['password']);



$query = "select * from employee_master_table where login_id='" . $lid . "' and enabled=1"; 
//echo $query;

          //select * from user_login where user_id='admin';
//$result = mysqli_query($dbhandle,$query);   //mysqli_query just runs the query only without returning any extra properties.
$result=$dbhandle->query($query);
$row = $result->fetch_assoc();
//echo mysqli_num_rows($result);
if(mysqli_num_rows($result) == 1)  // Checks if the userid exist in the database.
{

	if($row['login_enabled']==1)
	{
	
	if($row['password']== sha1($passwd)) // check if the user password matches.
		{
			//23 June 2020 :: Disabling all financial year statements.
			//$financialYear_sql = "select * from financial_year_table where enabled=1 and start_year=" . $_POST["fyear"]; 
			//echo $financialYear_sql;
			//$financialYear_result = mysqli_query($dbhandle,$financialYear_sql);		
			/*
			if($financialYear_result)
				$financialYear_row=mysqli_fetch_assoc($financialYear_result);
			*/	
			$_SESSION["SMSBALANCE"]=crawlerBhashSMS('CHECK_BALANCE');
			$_SESSION["STATUS"]=$row["LOGIN_STATUS"];
			
			$_SESSION["NAME"] = $row["Employee_Name"];
			$_SESSION["LOGINID"] = $row["Login_id"];
			$_SESSION["EMPLOYEEID"] = $row["Employee_Id"];
			$_SESSION["STATUS"] = 1;
			$_SESSION["EMPID"] = $row["Employee_Id"];
			//$_SESSION["SCHOOLID"]= $row["School_Id"];
			$_SESSION["SCHOOLID"]= 1;
			$_SESSION["HOSTNAME"]=$_SERVER['HTTP_HOST'];
			//$_SESSION["HOSTNAME"]=$_SERVER['HTTP_HOST']."/solvethemess/stage";
			$_SESSION["LOGINGRADE"]= $row["login_grade"];
			$_SESSION["FOOTER"]="SMS SCHOOL ERP COPYRIGHT 2020";
			$_SESSION["LINK"]=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
			$_SESSION["SESSION"]='2020-2021';
			/*
			//$_SESSION["DISTRICTID"]= $financialYear_row["district_id"];
			$_SESSION["STARTMONTH"]= $financialYear_row["start_month"];
			$_SESSION["ENDMONTH"]= $financialYear_row["end_month"];
			$_SESSION["STARTYEAR"]= $financialYear_row["Start_Year"];
			$_SESSION["ENDYEAR"]= $financialYear_row["End_Year"];
			$_SESSION["FINYEAR"]= $financialYear_row["Start_Year"] . '-' . $financialYear_row["End_Year"]; 
			*/
			//$_SESSION["SCHOOL"]=$row["school_name"] . ', ' . $row["area"] ;
			$_SESSION["LASTUPDATEON"]=$cur_time=date("Y-m-d H:i:s");
			$_SESSION["INTERVAL"]='+30 minutes';
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
		}
		else
		{
			$_SESSION["ERRORNO"]=3;  //redirection at incorrect password.
			echo 'incorrect password';
			//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=sessionerror.php">';
			exit;
		}
	}
	else
	{
		$_SESSION["ERRORNO"]=2;   //redirection at disabled loginid.
		echo 'disabled login';
		//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=sessionerror.php">';
		exit;
	}
}	
else
{
	$_SESSION["ERRORNO"]=1;    //redirection at incorrect loginid.
	echo $lid;
	
	//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=sessionerror.php">';
	exit;
}		
?>

</body>
</html>