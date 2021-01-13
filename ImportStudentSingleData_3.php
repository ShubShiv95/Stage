<?php
   session_start();
   include 'dbobj.php';
   include 'AdmissionModel.php';
   include 'security.php';
   include 'errorLog.php';   

   mysqli_autocommit($dbhandle,FALSE);


   $file = $_FILES['file']['tmp_name'];
   $fileHandle = fopen($file, "r");
   $counter = 0;
   $columnName = "";
   $isSuccess = true;
   $finalMsg = "";
   $fileparsed = false;
   while(($filesop = fgetcsv($fileHandle,10000,',')) !== false) {
   $fileparsed = true;
    if($counter == 0){
        $counter++;
        $columnName = $filesop[6];
        continue;
     }
     $valueTobeUpdated = $filesop[6];
     $studentId = $filesop[0];
     $updateQuery = "update student_master_table set $columnName = '" . $valueTobeUpdated . "' where Student_Id = '" . $studentId . "'";
     $finalMsg= $finalMsg ."--" . $updateQuery;
     $resultupdated = $dbhandle->query($updateQuery);
     
     if($resultupdated != 1){
        $isSuccess = false;
        mysqli_rollback($dbhandle);
        break;
     }
     $counter++;
   }


   if($isSuccess && $fileparsed){
    mysqli_commit($dbhandle);
    $finalMsg =  "Data Updated into the system successfully.";
   }else {
    mysqli_rollback($dbhandle);
    $finalMsg = "Error in updating data, Error happened in Row # : " . $counter+1;
   }
   
   echo $finalMsg;
?>