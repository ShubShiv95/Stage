<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';


$_REQUEST["enqtype"];
$_REQUEST["class"];
$_REQUEST["session"];
$_REQUEST["locality"];
$_REQUEST["searchdate"];
$_REQUEST["fromdate"];
$_REQUEST["todate"];


$condition_found=0;
$query="select aet.*,mlt.location_name as location_name from admission_enquiry_table aet,marketting_location_table mlt where mlt.locationid=aet.locality_id and ";

if($_REQUEST["enqtype"]=='All'){

    null;
}    
else{    
    //if($condition_found==0){
        $query=$query . "enquiry_status='" . $_REQUEST["enqtype"] . " ' and ";
      //  $condition_found++;
    }
    //else{
      //  $query=$query . "and  enquiry_status='" . $_REQUEST["enqtype"] . "' ";
      //  $condition_found++;
   // }
//}

if($_REQUEST["class"]=='All'){

    null;
}    
else{    
  //  if($condition_found==0){
        $query=$query . " aet.class='" . $_REQUEST["class"] . " ' and ";
  //      $condition_found++;
    }
   // else{
     //   $query=$query . "and  class_id='" . $_REQUEST["class"] . "' ";
       // $condition_found++;
   // }
//}

if($_REQUEST["session"]=='All'){

    null;
}    
else{    
  //  if($condition_found==0){
        $query=$query . " aet.session='" . $_REQUEST["session"] . "' and ";
//        $condition_found++;
    }
  //  else{
    //    $query=$query . "and  session='" . $_REQUEST["session"] . "' ";
      //  $condition_found++;
   // }
//}


if($_REQUEST["locality"]=='All'){

    null;
}    
else{    
   // if($condition_found==0){
        $query=$query . " aet.locality_id='" . $_REQUEST["locality"] . "' and ";
     //   $condition_found++;
    }
    //else{
      //  $query=$query . "and  locality_id='" . $_REQUEST["locality"] . "' ";
      //  $condition_found++;
   // }
//}


if($_REQUEST["searchdate"]=='createdon'){

   // if($condition_found>0){
        $query=$query . "aet.created_on between str_to_date('" . $_REQUEST["fromdate"] . "','%d/%m/%Y') and str_to_date('" . $_REQUEST["todate"] . "','%d/%m/%Y') and ";            
    }
    //else{
      //  $query=$query . " where created_on between str_to_date('" . $_REQUEST["fromdate"] . "','%d/%m/%Y') and str_to_date('" . $_REQUEST["todate"] . "','%d/%m/%Y')";                      
      //  $condition_found++;
   // }  
//}

if($_REQUEST["searchdate"]=='followup'){

  //  if($condition_found>0){
        $query=$query . " followup_date between str_to_date('" . $_REQUEST["fromdate"] . "','%d/%m/%Y') and str_to_date('" . $_REQUEST["todate"] . "','%d/%m/%Y') and ";            
    }
  //  else{
    //    $query=$query . "where followup_date between str_to_date('" . $_REQUEST["fromdate"] . "','%d/%m/%Y') and str_to_date('" . $_REQUEST["todate"] . "','%d/%m/%Y')";            
      //  $condition_found++;
    //}  
//}    
$query=$query . " aet.school_id=" . $_SESSION["SCHOOLID"];
echo $query;


$result=mysqli_query($dbhandle,$query);
if(!$result)
			{
                $error_msg=mysqli_error($dbhandle);
                $sql="";
                $el=new LogMessage();
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Admission Eqnuiry',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch Student Enquiry list array. Please try after some time.</h1>";
                $dbhandle->query("unlock tables");
                mysqli_rollback($dbhandle);
                $str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                $str_end='</div>';
                echo $str_start.$messsage.$str_end;
            }   
            

$str='<div class="table-responsive"><table class="table display data-table text-nowrap dataTable no-footer">
<thead>
    <tr>
        <th>
      SL NO.
        </th>
        <th>Enquirer Name</th>
        <th>Contact No.</th>
        <th>Student Name</th>
        <th>Location</th>
        <th>Class</th>
        <th>Session</th>
        <th>Relation</th>
        <th>Sibling</th>
        <th>Last Attend By</th>
        <th>Last Attend On</th>
        <th>Status</th>
        <th>Action</th>
        
    </tr>
</thead>
<tbody>';

$chkcount=1;
while($result_row=$result->fetch_assoc()){


    $str=$str.'<tr>
       <td>
            '.$chkcount . '
                       
        </td>
    	<td>'. $result_row["ENQUIRER_NAME"] . '</td>
		<td>'. $result_row["MOBILE_NO"] . '</td>
		<td>'. $result_row["STUDENT_NAME"] . '</td>
		<td>'. $result_row["location_name"] . '</td>
		<td>'. $result_row["Class"] . '</td>
		<td>'. $result_row["SESSION"] . '</td>
		<td>'. $result_row["ENQUIRER_RELATION"] . '</td>
		<td>'. $result_row["SIBLING"] . '</td>
		<td>'. $result_row["CREATED_BY"] . '</td>
		<td>'. $result_row["CREATED_ON"] . '</td>
		<td>'. $result_row["ENQUIRY_STATUS"] . '</td>
		<td class="text-center"><a href="FollowupNote.php?aeid=' . $result_row["AEID"]  . '" class="flink">Follow</a></td>
    </tr>'; 
    $chkcount++;
    //echo $str;
}

$str=$str . '</tbody></table></div>';
echo $str;



?>


