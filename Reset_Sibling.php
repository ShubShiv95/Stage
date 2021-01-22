<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
    $sid=$_REQUEST["studentid"];
    $Get_Student_Details_Sql = "select smt.*,scd.Session as Session,scd.Session_Start_Year as Session_Start_Year,scd.session_end_year as Session_End_Year,scd.class_id as Class_Id,scd.class_sec_id Class_Sec_Id,cmt.class_name,cst.section,scd.stream as Stream from student_master_table smt,student_class_details scd,class_master_table cmt,class_section_table cst where smt.student_id='$sid' and scd.student_id=smt.student_id and cst.class_sec_id=scd.class_sec_id and cmt.class_id=cst.class_id and scd.enabled=1";
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
   
    $_SESSION["LASTUPDATEON"] = $cur_time = date("Y-m-d H:i:s");
    $_SESSION["INTERVAL"] = '+120 minutes';
  
    echo '<meta HTTP-EQUIV="Refresh" content="0; URL=dashboard.php">';
exit;
?>