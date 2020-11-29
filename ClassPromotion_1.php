<?php
session_start();
include_once 'dbobj.php';
include_once 'errorLog.php';
include_once 'security.php';
require_once 'sequenceGenerator.php';
/***** get students list class wise ******/
if (isset($_REQUEST['getStudentDetailsbyClass'])) {
  $class_id = $_REQUEST['class_id'];
  $prom_query = "SELECT scd.*, cmt.Class_Name, smt.First_Name, smt.Middle_Name, smt.Last_Name FROM student_class_details scd, class_master_table cmt, student_master_table smt WHERE scd.Class_Id = cmt.Class_Id AND smt.Student_Id = scd.Student_Id AND scd.Enabled = 1 AND scd.Class_Id = ? AND scd.School_Id = ? AND Promoted != 1";
  $prom_query_prepare = $dbhandle->prepare($prom_query);
  $prom_query_prepare->bind_param("ii",$class_id,$_SESSION["SCHOOLID"]);
  $prom_query_prepare->execute();
  $result_set = $prom_query_prepare->get_result(); $data = array();
  while ($rows = $result_set->fetch_assoc()) {
    $data[] = $rows;
  } 
  echo json_encode($data);
}


/****** save data for promoted or non promoted students ******/
if(isset($_REQUEST['student_prom_data_sender'])){
  mysqli_autocommit($dbhandle, false);
  if (count($_REQUEST['student_details_id']) !=count($_REQUEST['promoted'])) {
    echo '<h4 class="text-danger">*Please Select All CheckBoxes Promoted/Not Promoted</h4>';
  }else{
    $loops = count($_REQUEST['student_details_id']);
    for ($i=0; $i < $loops; $i++) 
    { 
      //$_REQUEST['student_details_id'][$i]; $_REQUEST['promoted'][$i]; $_REQUEST['student_remarks'][$i]; $_SESSION["ENDYEAR"];
      $get_details_query = "SELECT * FROM `student_class_details` WHERE `Student_Details_Id` = ".$_REQUEST['student_details_id'][$i]." AND `School_Id` = ".$_SESSION["SCHOOLID"]." AND `Session_End_Year` = ".$_SESSION["ENDYEAR"]." ";
      $get_details_query_prep = $dbhandle->prepare($get_details_query);
      $get_details_query_prep->execute();
      $result_set = $get_details_query_prep->get_result();
      // student class master table details
      $rows_stdus = $result_set->fetch_assoc();
      print($_REQUEST['promoted'][$i]);
      // next year and next session
        // current Year
        $curr_year = $rows_stdus['Session_End_Year']; // session end year
        // next year
        $next_year = date($curr_year, strtotime('+1 years'));
        // next session
        $next_session = $curr_year.'-'.$next_year;
      echo $rows_stdus['Class_Id'];
      // get same class details
      $class_details_query = "SELECT * FROM `class_master_table` WHERE `Class_Id` = ".$rows_stdus['Class_Id']." AND School_Id = ".$_SESSION["SCHOOLID"]."";
      $class_details_query_prep = $dbhandle->prepare($class_details_query);
      if(!$class_details_query_prep->execute()){
       $error_msg = $class_details_query_prep->error;
        $el = new LogMessage();
        $sql = $class_details_query;
        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
        $el->write_log_message('Student Promotion Class Search ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
        //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
        mysqli_rollback($dbhandle);
        $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
        die;
      }

      $class_result_set = $class_details_query_prep->get_result();
      $class_row = $class_result_set->fetch_assoc();

        // next class detils
        $class_details_query_n = "SELECT * FROM `class_master_table` WHERE `Class_Id` = ".$class_row['Next_Class_Id']." AND School_Id = ".$_SESSION["SCHOOLID"]."";
        $class_details_query_prepn = $dbhandle->prepare($class_details_query_n);
        $class_details_query_prepn->execute();
        $class_result_setn = $class_details_query_prepn->get_result();
        $class_rown = $class_result_setn->fetch_assoc();
                
        // previous year section
        $sec_query = "SELECT * FROM `class_section_table` WHERE `Class_Id` = ".$rows_stdus['Class_Id']." AND Enabled = 1 AND School_Id = ".$_SESSION["SCHOOLID"]." AND Class_Sec_Id = ".$rows_stdus['Class_Sec_Id']." ";
        $sec_query_pre = $dbhandle->prepare($sec_query);
        $sec_query_pre->execute();$result_sec = $sec_query_pre->get_result();
        $sec_rows = $result_sec->fetch_assoc();
        
        // new year section
          $sec_queryn = "SELECT * FROM `class_section_table` WHERE `Class_Id` = ".$class_rown['Class_Id']." AND Enabled = 1 AND School_Id = ".$_SESSION["SCHOOLID"]."  ";
          $sec_query_pren = $dbhandle->prepare($sec_queryn);
          $sec_query_pren->execute();$result_secn = $sec_query_pren->get_result();
          while($sec_rowsn = $result_secn->fetch_assoc()){
            // match sections
            if ($sec_rows['Section']==$sec_rowsn['Section']) 
            {
              $section = $sec_rowsn['Class_Sec_Id'];
            }
            else
            {
              $section = 'NULL';
            }
          }
        if (empty($_REQUEST['student_remarks'][$i])) {
          $student_remarks = 'NULL';
        }
        else{
          $student_remarks = $_REQUEST['student_remarks'][$i];
        }
        
        // update previous data set promoted = 1 else set 0
        $update_query = "UPDATE student_class_details SET Promoted = ?, Remarks = ? WHERE Student_Details_Id = ? AND School_Id = ?";
        $update_query_prepre = $dbhandle->prepare($update_query);
        $update_query_prepre->bind_param("isii",$_REQUEST['promoted'][$i], $student_remarks, $_REQUEST['student_details_id'][$i], $_SESSION["SCHOOLID"]);
       // $update_query_prepre->execute();

      // check if promoted
      if ($_REQUEST['promoted'][$i]==1) 
      {
        $Student_Details_Id_New = sequence_number('student_class_details',$dbhandle);
        // inset new data
        $ins_new_data = "INSERT INTO student_class_details (Student_Details_Id, Student_Id, Class_Id, Class_No, Class_Sec_Id, Roll_No, Session, Session_Start_Year, Session_End_Year, Promotion_UpdatedBy, Updated_By,School_Id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $ins_new_data_prep = $dbhandle->prepare($ins_new_data);
        $ins_new_data_prep->bind_param("isiiiisiissi",$Student_Details_Id_New,$rows_stdus['Student_Id'],$class_row['Next_Class_Id'],$class_rown['Class_No'],$section,$rows_stdus['Roll_No'],$next_session,$curr_year,$next_year,$_SESSION["LOGINID"],$_SESSION["LOGINID"],$_SESSION["SCHOOLID"]);
        if ($ins_new_data_prep->execute()) 
        {
          

        }else{
          $error_msg = $class_details_query_prep->error;
          $el = new LogMessage();
          $sql = $class_details_query;
          //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
          $el->write_log_message('Student Promotion Insert New Record ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
          //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
          mysqli_rollback($dbhandle);
          $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
          die;
        }
      }else if($_REQUEST['promoted'][$i]=='0'){
        $update_query = "UPDATE student_class_details SET Remarks = ? WHERE Student_Details_Id = ? AND Enabled = 1 AND School_Id = ?";
          $update_query_prepre = $dbhandle->prepare($update_query);
          $update_query_prepre->bind_param("sii",$_REQUEST['student_remarks'][$i],$_REQUEST['student_details_id'][$i],$_SESSION["SCHOOLID"]);
          $update_query_prepre->execute();
      }
    }
    echo '<div class="alert alert-success" role="alert">
          <strong>Success</strong> Promoted Successfully With New Session!!!!
        </div>';
  }
  mysqli_commit($dbhandle);
}


/************** get data for secction allotment **************/
if (isset($_REQUEST['get_prom_sec_data'])) {
  // $_REQUEST['class_id]
  $class_sec_q = "SELECT scd.*, cmt.Class_Name, cst.Section, smt.First_Name, smt.Last_Name FROM student_class_details scd, class_master_table cmt, class_section_table cst, student_master_table smt WHERE scd.Enabled=1 AND scd.Class_Id = cmt.Class_Id AND cst.Class_Sec_Id = scd.Class_Sec_Id AND smt.Student_Id = scd.Student_Id AND scd.Promoted=0 AND scd.Session_Start_Year= ? AND scd.School_Id = ? AND scd.Class_Id = ? ORDER BY scd.Class_Sec_Id, scd.Roll_No";
  $class_sec_q_prepare = $dbhandle->prepare($class_sec_q);
  $class_sec_q_prepare->bind_param("iii",$_SESSION["STARTYEAR"],$_SESSION["SCHOOLID"],$_REQUEST['class_id']);
  $class_sec_q_prepare->execute();
  $result_set = $class_sec_q_prepare->get_result(); $data = array();
  while($rows = $result_set->fetch_assoc()){
    $data[] = $rows;
  }
  echo json_encode($data);
}

/* update student section */
if (isset($_REQUEST['update_st_section'])) {
  //$_REQUEST['student_details_id'].', '.$_REQUEST['section_name'];
 // echo $_REQUEST['student_details_id'].', '.$_REQUEST['section_name'];
  $update_query = "UPDATE student_class_details SET Class_Sec_Id = ? WHERE Student_Details_Id = ?";
  $update_query_prep = $dbhandle->prepare($update_query);
  $update_query_prep->bind_param("ii",$_REQUEST['section_name'],$_REQUEST['student_details_id']);
  if ($update_query_prep->execute()) {
    echo '<div class="alert alert-success" role="alert">
    <strong>Success</strong> Section Changed Successfully
  </div>';
  }else{
    echo '<div class="alert alert-danger" role="alert">
    <strong>Alert</strong> Failed to Change.
  </div>';
  }
}

/* update student roll */
if(isset($_REQUEST['update_st_roll'])){
  //$_REQUEST['student_details_id'] $_REQUEST['stud_roll_no'] $_REQUEST['class_id]
  //$_REQUEST['student_details_id']; combined values student_details_id and section_id
  // search student data into table then process
  $stud_data = explode(',',$_REQUEST['student_details_id']);
  $dtudent_details_id = $stud_data[0];
  $student_section_id= $stud_data[1];
  $search_query = "SELECT * FROM student_class_details WHERE Class_Sec_Id = ? AND Roll_No = ? AND Session_Start_Year = ?";
  $search_query_prepare = $dbhandle->prepare($search_query);
  $search_query_prepare->bind_param("iii",$student_section_id,$_REQUEST['stud_roll_no'],$_SESSION["STARTYEAR"]);
  $search_query_prepare->execute();$result_sr_sec = $search_query_prepare->get_result(); $data = array();
  echo $search_query_prepare->num_rows();
  if ($search_query_prepare->num_rows()>0)
  {
    $sect_row = $result_sr_sec->fetch_assoc();
    $data['type'] = 'Error';
    $data ['message'] = 'Roll No Already Alloted To <span class="text-danger">'.$sect_row['Student_Id'].'</span>';
    //echo '<div class="alert alert-warning" role="alert"><strong>Alert </strong>Roll No Already Alloted To <span class="text-danger">'.$sect_row['Student_Id'].'</span></div>';
  }
 /* else{
    $update_query = "UPDATE student_class_details SET Roll_No = ? WHERE Student_Details_Id = ?";
    $update_query_prep = $dbhandle->prepare($update_query);
    $update_query_prep->bind_param("ii",$_REQUEST['stud_roll_no'],$_REQUEST['student_details_id']);
    if ($update_query_prep->execute()) {
      $data['type'] = 'Success';
      $data ['message'] = 'Roll No Updated Successfully';
    }else{
      $data['type'] = 'Eror';
      $data ['message'] = 'Failed To Update';
    }
  }*/
  echo json_encode($data);
}
?>
