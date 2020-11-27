<?php
session_start();
include 'dbhandle.php';
include 'errorLog.php';
include 'security.php';
require_once 'sequenceGenerator.php';

if(isset($_REQUEST['notice_sender']))
{
  if(empty($_REQUEST['notice_sender']))
  {
    $errors = array();
    // commitment start
    mysqli_autocommit($dbhandle, false);
    $notice_id = $assignmentId = sequence_number('notice_master_table',$dbhandle);
    $notice_title = $_REQUEST['notice_title'];
    $notice_type = $_REQUEST['notice_type'];
    $notice_details = $_REQUEST['notice_details'];
    $publish = $_REQUEST['publish'];
    $notice_attachment = $_FILES['notice_attachment']['name'];
    
    // notice_refs
    if(empty($notice_title)){
      $errors[] = 'Notice Title Cannot Be Empty.';
    }
    if (empty($notice_type)) {
      $errors[] = 'Notice Type Cannot Be Empty.';
    }
    if (empty(stripslashes(strip_tags($notice_details)))) {
      $errors[] = 'Notice Details Cannot Be Empty.';
    }
    else{
    // file updateion
    if (!empty($notice_attachment)) 
    {
      
      $directory = 'notices';
      $dir_path = "./app_images/".$directory;
      $file_path = $dir_path;
      if (!file_exists($dir_path)) {
        mkdir('./app_images/notices/', 0777, true);
      }
      $allowedImageExtension = array("jpg","jpeg","pdf");
      $fileExtension = strtolower(pathinfo($_FILES['notice_attachment']['name'],PATHINFO_EXTENSION));
      if (!in_array($fileExtension, $allowedImageExtension)) {
        $errors[] = 'Only pdf/jpg/jpeg are Allowed';
      }
      else{
        $file_name = md5($_SESSION["LOGINID"].date('YmdHis')).'.'.$fileExtension;
        $target_path = $dir_path.'/'.$file_name;
        $move_files = move_uploaded_file($_FILES['notice_attachment']['tmp_name'],$target_path);
      }
    }else
    {
      $file_name = 'NULL'; $file_path = 'NULL';
    }
    
    $updatedBy = $_SESSION["LOGINID"];
    $schoolId = $_SESSION["SCHOOLID"];

    $noticeQuery = 'INSERT INTO `notice_master_table`(`Notice_Id`, `Notice_Title`, `Notice_Type`, `Notice_Description`, `Filename`, `Filepath`, `Publish_In_Web`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?,?,?,?)';
    $noticeQueryPrepare = $dbhandle->prepare($noticeQuery);
    $noticeQueryPrepare->bind_param('isssssiis',$notice_id,$notice_title,$notice_type,$notice_details,$file_name,$file_path,$publish,$schoolId,$updatedBy);
    if (!$noticeQueryPrepare->execute()) 
    {
      $error_msg = $noticeQueryPrepare->error;
      $errors[] = $error_msg;
      $el = new LogMessage();
      $sql = $noticeQuery;
      //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
      $el->write_log_message('Create Notice ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
      //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
      mysqli_rollback($dbhandle);
      $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
      die;
    }else{
      // notice reference transactions
      if ($_REQUEST['notice_to']=='All') 
      {
        // select * from class then insert
        $class_query = "SELECT * FROM `class_master_table` WHERE `Enabled` = 1 AND `School_Id` =".$_SESSION["SCHOOLID"]." ";
        $class_query_prepare = $dbhandle->prepare($class_query);
        $class_query_prepare->execute();
        $result_class_data = $class_query_prepare->get_result();
        while($class_rows = $result_class_data->fetch_assoc())
        {
         
          $class_refs= 'ClassId';
          $notice_ref_id = $assignmentId = sequence_number('notice_list_table',$dbhandle);
          $queryList = "INSERT INTO `notice_list_table`(`Notice_List_Id`, `Notice_Id`, `Reff_Type`, `Reff_Id`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
          $queryListPrepare = $dbhandle->prepare($queryList);
          $queryListPrepare->bind_param("iisiis",$notice_ref_id,$notice_id,$class_refs,$class_rows['class_id'],$schoolId,$updatedBy);
          $qLink = $queryListPrepare->execute();
        }

        // select * from department then insert
        $dept_query = "SELECT * FROM `department_master_table` WHERE `Enabled`=1 AND `School_Id` = ".$_SESSION["SCHOOLID"]."";
        $dept_query_prepare = $dbhandle->prepare($dept_query);
        $dept_query_prepare->execute();
        $dept_result = $dept_query_prepare->get_result();
        while($rows_dept = $dept_result->fetch_assoc())
        {
          $dept_refs = 'DepartmentId';
          $notice_ref_id = $assignmentId = sequence_number('notice_list_table',$dbhandle);
          $queryList = "INSERT INTO `notice_list_table`(`Notice_List_Id`, `Notice_Id`, `Reff_Type`, `Reff_Id`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
          $queryListPrepare = $dbhandle->prepare($queryList);
          $queryListPrepare->bind_param("iisiis",$notice_ref_id,$notice_id,$dept_refs,$rows_dept['Dept_Id'],$schoolId,$updatedBy);
          $qLink = $queryListPrepare->execute();
        }
      }
      else
      {
       $total_loops = count($_REQUEST['notice_refs']); 
        for ($i=0; $i <$total_loops ; $i++) 
        { 
          $notice_ref_id = $assignmentId = sequence_number('notice_list_table',$dbhandle);
          $queryList = "INSERT INTO `notice_list_table`(`Notice_List_Id`, `Notice_Id`, `Reff_Type`, `Reff_Id`, `School_Id`, `Updated_By`) VALUES (?,?,?,?,?,?)";
          $queryListPrepare = $dbhandle->prepare($queryList);
          $queryListPrepare->bind_param("iisiis",$notice_ref_id,$notice_id,$_REQUEST['notice_to'],$_REQUEST['notice_refs'][$i],$schoolId,$updatedBy);
        
          $qLink = $queryListPrepare->execute();
        }
      }  
    }
    if($qLink == true){
      $errors[] = 'Notice Saved Successfully!!';
    }
    else{
      $errors[] = 'Failed To Save!!';
    }
    $htlml_d = '';
    $htlml_d = '<ul class="list-group">  ';
    foreach ($errors as $error) {
      $htlml_d .= '<li class="list-group-item text-primary">'.$error.'</li>';
    }
    $htlml_d .= '</ul>';
    echo $htlml_d;
    // commitment ends
    mysqli_commit($dbhandle);
  }
  }
}

/*************** new notice request ***************/
if (isset($_REQUEST['getAllNotices'])) 
{
  $start_date =$_REQUEST['date_from']; $end_date = $_REQUEST['date_to'];
  if ($_SESSION["LOGINTYPE"] == 'STUDENT') 
  {
    $class_id = $_SESSION["CLASSID"];
    $student_query = "SELECT nmt.*, nlt.* FROM notice_master_table nmt, notice_list_table nlt WHERE nmt.Notice_Id = nlt.Notice_Id AND nmt.Enabled = 1 AND nlt.Reff_Id = ? AND nmt.School_Id = ?  AND DATE(nmt.Updated_On) BETWEEN str_to_date(?,'%d/%m/%Y') AND str_to_date(?,'%d/%m/%Y') AND nlt.Reff_Type !='DepartmentId' ";
    $notice_query_prepare = $dbhandle->prepare($student_query);
    $notice_query_prepare->bind_param("iiss",$class_id,$_SESSION["SCHOOLID"],$start_date,$end_date);
  }
  else if($_SESSION["LOGINTYPE"] == 'STAFF')
  {
    if ($_REQUEST['notice_to']=='ClassId') 
    {
      $teacher_query = "SELECT nmt.*, nlt.* FROM notice_master_table nmt, notice_list_table nlt WHERE nmt.Notice_Id = nlt.Notice_Id AND nmt.Enabled = 1 AND nmt.School_Id = ? AND nlt.Reff_Type = ? AND DATE(nmt.Updated_On) BETWEEN str_to_date(?,'%d/%m/%Y') AND str_to_date(?,'%d/%m/%Y')";
      $notice_query_prepare = $dbhandle->prepare($teacher_query);
      $notice_query_prepare->bind_param("isss",$_SESSION["SCHOOLID"],$_REQUEST['notice_to'],$start_date,$end_date);
    }
    else if ($_REQUEST['notice_to']=='DepartmentId') 
    {
      $teacher_query = "SELECT nmt.*, nlt.* FROM notice_master_table nmt, notice_list_table nlt WHERE nmt.Notice_Id = nlt.Notice_Id AND nmt.Enabled = 1  AND nmt.School_Id = ? AND nlt.Reff_Type = ? AND DATE(nmt.Updated_On) BETWEEN str_to_date(?,'%d/%m/%Y') AND str_to_date(?,'%d/%m/%Y')";
      $notice_query_prepare = $dbhandle->prepare($teacher_query);
      $notice_query_prepare->bind_param("isss",$_SESSION["SCHOOLID"],$_REQUEST['notice_to'],$start_date,$end_date);
    }
    else if ($_REQUEST['notice_to']=='All') 
    {
      $teacher_query = "SELECT nmt.*, nlt.* FROM notice_master_table nmt, notice_list_table nlt WHERE nmt.Notice_Id = nlt.Notice_Id AND nmt.Enabled = 1 AND nlt.Reff_Type = 'ClassId' or 'DepartmentId' AND nmt.School_Id = ? AND DATE(nmt.Updated_On) BETWEEN str_to_date(?,'%d/%m/%Y') AND str_to_date(?,'%d/%m/%Y') ";
      $notice_query_prepare = $dbhandle->prepare($teacher_query);
      $notice_query_prepare->bind_param("isss",$_SESSION["SCHOOLID"],$start_date,$end_date);
    }
  }
  $notice_query_prepare->execute();
  $notice_result = $notice_query_prepare->get_result(); 
  $data = array();
  while($rows_notice = $notice_result->fetch_assoc())
  {
      $data[] = $rows_notice;
  }
  echo json_encode($data);
}
?>
