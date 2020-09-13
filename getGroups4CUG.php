<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

$msg_receiver_Type=$_REQUEST["msg_receiver_Type"];
$html_str="";

if($msg_receiver_Type==1)   //1 means individual message sending to Students.
    {
        //Adding Class Select controller.
      
        $query='select Class_Id,class_name,class_no,stream from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " order by next_class_id";
        //echo $query;
        $result=mysqli_query($dbhandle,$query);
        if(!$result)
            {
                //var_dump($getStudentCount_result);
                $error_msg=mysqli_error($dbhandle);
                $el=new LogMessage();
                $sql=$query;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                $dbhandle->query("unlock tables");
                mysqli_rollback($dbhandle);
                //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                //$str_end='</div>';
                //echo $str_start.$messsage.$str_end;
                //echo "";
                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
            }
            $html_str=$html_str.'<option value="">Select Class</option>';    
        while($row=mysqli_fetch_assoc($result))
            {
                if($row["class_no"]==0)
                    {continue;}
                 else   
                $html_str=$html_str.'<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . '</option>';
                /*if($row["class_no"]>=-2 and $row["class_no"]<0)
                    {
                       $html_str=$html_str.'<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . '</option>';
                    }    
                if($row["class_no"]>0)  
                    {
                        $html_str=$html_str.'<option value="' . $row["Class_Id"] . '">Class ' . $row["class_n"] . '</option>';
                    } */   
            }
           
            echo $html_str;
            
                 
    }
else if ($msg_receiver_Type==2)    //2 means individual message sending to Staff.
    {

        $query='select * from department_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
        //echo $query;
        $result=mysqli_query($dbhandle,$query);
        if(!$result)
            {
                //var_dump($getStudentCount_result);
                $error_msg=mysqli_error($dbhandle);
                $el=new LogMessage();
                $sql=$query;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Investment Payment',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                $_SESSION["MESSAGE"]="<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                $dbhandle->query("unlock tables");
                mysqli_rollback($dbhandle);
                //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                $messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                //$str_end='</div>';
                //echo $str_start.$messsage.$str_end;
                //echo "";
                //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
            }
            //$html_str=$html_str.'<option value="">Select Department </option>';    
            $html_str=$html_str.'<option value="0">All Departments </option>';    
            while($row=mysqli_fetch_assoc($result))
                {
                  
                           $html_str=$html_str.'<option value="' . $row["department_id"] . '">' . $row["department_name"] . ' Department</option>';
                        
                }
               
                echo $html_str;
                


    }
else if ($msg_receiver_Type==3)    //3 means individual message sending to other numbers.
    {

    }
else
    {

    }
?>