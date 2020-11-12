<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
//include 'security.php';
include 'sequenceGenerator.php';


/*Algorithm Steps
Step1: Perform server side validation process on all posted $_REQUEST objects and store them in local variables.
Step2: Create additional abstract variables required in the page.
Step3: Perform fetching mobile numbers and user_reff_id (student id or employee id) based on the type of group selected.
Step4: Insert the fetched mobile numbers and user refference id (student id or employee id) to the message tables including message master table and message details table.
Step5: Commit the changes.
*/


// Step1 starts here.

$User_TypeId=0;                     //Initialized with 0 value means this option is not selected.
$groupList=array();                 //Blank Array created.
$messageTitle='';                   //Initialized with no string value.
$composegMessage='';                //Initialized with no string value.
$smsMessage=0;                      //Initialized with 0 value means this option is not selected.
$whatsappMessage=0;                 //Initialized with 0 value means this option is not selected.
$messageDate=date("d/m/Y");         //Initialized with current date value in dd/mm/yyyy format.  This value will be used only if the user has not provided any scheduled date for the message date.    
$messageTime=date('G:i');           //Initialized with current time value in hh24:mm format.  This value will be used only if the user has not provided any scheduled time for the message time.

/*Server Side Validataion Process*/


    //First Variable Checking.
    if(!isset($_REQUEST['user_type'])) //checing the main group is selected or not for fetching contact numbers.  
        {
            echo "No Group provided.  Please select message receiving group for sending group messages.";
            die;

    }
    else {
            $User_TypeId=$_REQUEST['user_type'];
    


            //Second Variable Checking.
            if($User_TypeId<4) //checing the sub groups selected or not for fetching contact numbers.  
                {
                    if(!isset($_REQUEST['msgGrpId']))
                        {
                            echo "No receiver contact group provided.  Please select message receiving group for sending group messages.";
                            die;
                        }

                        
                        else {
                                $groupList=$_REQUEST['msgGrpId'];
                        }
                }        
        }    

    //Third Variable Checking.
    if(!isset($_REQUEST["messagetitle"]))   //Checking if the message title has been left blank and thus generating alert message.
        {

            echo "Data Required :: Title cannot left blank.";
            die;
        }
    else {

        $messageTitle=$_REQUEST['messagetitle'];
    }    

    //Forth Variable Checking.
    if(!isset($_REQUEST["composemsg"])) //checking if the compose text box has been left blank and generate alert message.
        {

            echo "Data Required :: Compose message cannot left blank.";
            die;
        }
    else {

            $composegMessage=$_REQUEST['composemsg'];
        }   


    //Fifth and Sixth Variable Checking.
    if(!isset($_REQUEST["smsmessage"]) and !isset($_REQUEST["whatsappmessage"]))    //Checking if both message types are not left blank. Requirement is atleast one message type must be checked.
        {

            echo "Selection Rquired :: Please provide at least any one message services from SMS and Whatsapp.";
            die;
        }
    else {

        
        if(isset($_REQUEST["smsmessage"]))
            {
                $smsMessage=$_REQUEST["smsmessage"];
            }

        if(isset($_REQUEST["whatsappmessage"]))
            {
                $whatsappMessage=$_REQUEST["whatsappmessage"];
            }
        
                
        }   
    

   //Seventh and Eighth Variable Checking.
    
    if($_REQUEST["messagedate"]!="")        //if Message Date is in not blank then allocate the posted message date to the messageDate variable.
        {
            $messageDate=$_REQUEST["messagedate"];
        }
      
    if($_REQUEST["messagetime"]!="")        //if Message Time is in not blank then allocate the posted message Time to the messageDate variable.
        {
            $messageTime=$_REQUEST["messagetime"];
        }



//End of Step1: Server side validation
 

// Step2: Creating additional abstract variables required in the page.


    //The messageDateTime variable is created herein by concatenating message date and message time variable.  This variable will be used to store in the database for message date time value.        
    $messageDateTime="str_to_date('" . $messageDate . " " . $messageTime. "','%d/%m/%Y %H:%i')";    

    //Fetching string of sub groups delimetered with comma character to be used with in operator in sql query.
    $GroupListStr= implode(',',$groupList);
    
    //$loginid=$_SESSION['LOGINID'];      //user login id Taken from session variable for entry in table for future accountability purpose.
    //$schoolId=$_SESSION['SCHOOLID'];    //School Id Taken from session variable for entry with table row to relate the row with the corresponding school if chain of schools are configured in the same erp.
    

// End of Step2: Creating additional abstract variables required in the page.

//Step3:  
$getContactDetails_sql='';
    if($User_TypeId==1)     //Designing SQL for Student Type Group Messaging.
        {
            $getContactDetails_sql="select smt.student_id,smt.sms_contact_no,whatsapp_contact_no from student_master_table smt, student_class_details scd where smt.student_id=scd.student_id and scd.class_sec_id in($GroupListStr) and scd.session='" . $_SESSION["SESSION"] . "' and scd.school_id=" . $_SESSION["SCHOOLID"] . " order by scd.class_sec_id";
            echo "Student Group SMS created Successfully."; 

        }
    else if($User_TypeId==2)    //Designing SQL for Staff Type Group Messaging.
        {
            $getContactDetails_sql="select emt.employee_id,emt.sms_number,emt.whatsapp_number from employee_master_table emt where emt.dept_id in($GroupListStr) and emt.school_id=" . $_SESSION["SCHOOLID"] . " and emt.enabled=1 order by emt.dept_id";
            echo "Staff Group SMS created Successfully."; 
        }    
    else if($User_TypeId==3)       //Designing SQL for CUG Type Group Messaging.
        {
            $cug_id=$groupList[0];
            $getContactDetails_sql="select cugd.* from close_user_group_details cugd,close_user_group_master cugm where cugd.cug_id=cugm.cug_id and cugm.cug_id=" . $cug_id . " and cugd.school_id=" . $_SESSION["SCHOOLID"] . " and cugd.enabled=1 order by cugd.user_type,cugd.cugd_id desc";
            echo "Close User Group SMS created Successfully."; 
        }    
    else if($User_TypeId==4)    //Designing SQL for Entire School Type Group Messaging.
        {
            echo "Entire School Group SMS created Successfully."; 
        }    
        


//End of Step3.


// Step4: processing above sql created.

  /* to be used for next course of action

    $getContactDetails_result=$dbhandle->query($getContactDetails_sql);
    
    if(!$getContactDetails_result)
        {
            $el=new LogMessage();
            $sql=$getContactDetails_sql;
            $error_msg="<h1>Database Error: Not able to fetch user contact list for messaging. Please try after some time or contact Application Consultant.</h1>";
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Group Message',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            //$_SESSION["MESSAGE"]=$error_msg;  
            echo  $error_msg;
            echo  $getContactDetails_sql;
            die;
        }
    else
        echo "Group SMS created Successfully.";    //for testing printing messages here but contact list update in sms table is remainig.

*/
//End of Step4.





/*commenting entire below block...
userGroupid

if($user_type==1)   //sql design for students contact numbers.  Here the requested group are the section ids of the students.
{

$getMobileNoList_sql=
mobileno 
userid
}


    $mid=sequence_number('message_master_table',$dbhandle);

    if($mid==false)
        {
                $el=new LogMessage();
                $sql='Please fix generate_sequence.php file.';
                $error_msg="<h1>Database Error: Not able to generate Message Unique Id. Please try after some time or contact Application Consultant.</h1>";
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Individual Message',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
                $_SESSION["MESSAGE"]=$error_msg;  
                echo   $error_msg;
                die;
        }
    

    



    mysqli_autocommit($dbhandle,FALSE);

    //Inserting Message master data into message_master_table.
    
    $putMessageMasterRow_sql="insert into message_master_table(mid,message_title,message,message_date,sms,whatsapp,school_id,created_by) values($mid,'$messagetitle','$composemsg',$message_date_time,$smsmessage,$whatsappmessage,$schoolid,'$loginid')";


    $putMessageMasterRow_result=$dbhandle->query($putMessageMasterRow_sql);
    //echo $dbhandle->error;
    //echo $putMessageMasterRow_sql;
    if($putMessageMasterRow_result==false)
    {
            $el=new LogMessage();
            $sql='Please fix generate_sequence.php file.';
            $error_msg="<h1>Database Error: Not able to insert into message_master_table . Please try after some time.</h1>";
            //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
            $el->write_log_message('Individual Message',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
            $_SESSION["MESSAGE"]=$error_msg;    
            $dbhandle->query("unlock tables");
            mysqli_rollback($dbhandle);
            echo "Error 01:The SMS has been failed to create.  Please consult Application Consultant.";
            die();
    }
    

    $success_count=0;
    $total_count=0;

    

        $insertMessageDetails_sql="insert into message_details_table
        (mid,
        mobile_number,
        delivery_status,
        message_view_status,
        user_type,
        user_id) 
        values(?,?,1,1,?,?)";
     
        $insertMessageDetails_stmt=$dbhandle->prepare($insertMessageDetails_sql);
        //echo $dbhandle->error;	
        $insertMessageDetails_stmt->bind_param('isis',
        $mid,
        $mob_no,
        $user_type,
        $userid);
        
        foreach ($_REQUEST['mobileno'] as $selectedOption) {
            $piece_value = explode("-", $selectedOption);
            $mob_no=$piece_value[0];
            $userid=$piece_value[1];

        if($insertMessageDetails_stmt->execute())
            {
                $success_count++;
                
                //echo 'Mobile Number: ' . $mob_no . '   Userid: ' . $userid."<br>";
            } 
        $total_count++;
        //echo $dbhandle->error;
       // echo 'Mobile Number: ' . $mob_no . '   Userid: ' . $userid."<br>";

}



if($success_count!=$total_count)
{
    //var_dump($getStudentCount_result);
    $error_msg=mysqli_error($dbhandle);
    $sql="";
    $el=new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('Individual Message ',$error_msg,$sql,__FILE__,$_SESSION['LOGINID']);
    $_SESSION["MESSAGE"]="<h1>Database Error: Not able to save all contact numbers to send message. Please try after some time.</h1>";
    $dbhandle->query("unlock tables");
    mysqli_rollback($dbhandle);
    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
    //$str_end='</div>';
    //echo $str_start.$messsage.$str_end;
    //die;
    echo "Error 02:The SMS has been failed to create.  Please consult Application Consultant.";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
}
else
{
    mysqli_commit($dbhandle);
    echo "The SMS has been created Successfully.";
    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=individualSms.php">';
}    



*/ 

?>