<?php
    session_start();
    include 'dbobj.php';
    include 'security.php';
    include 'errorLog.php';
    //include 'generate_sequence.php';

    // Turn on all error reporting
    // Report all PHP errors (see changelog)
    error_reporting(E_ALL);
    //ini_set — Sets the value of a configuration option.Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.
    ini_set('display_errors', 1);
    
    //starts here
    $lid=$_SESSION["LOGINID"];
    $schoolId=$_SESSION["SCHOOLID"];
    $session = $_SESSION["SESSION"];
    //$dcrd = $_REQUEST["dcrd"];
    $headlist=array();
  
    // if (!empty($dcrd)) 
    // {
            $FeeHeadListSql="select fee_Print_Lable from fee_head_table where enabled=1 and school_id=?";
            $FeeHeadListPrep=$dbhandle->prepare($FeeHeadListSql);
            $FeeHeadListPrep->bind_param("i", $schoolId); 
            $FeeHeadListPrepResult=$FeeHeadListPrep->execute(); 
            if(!$FeeHeadListPrepResult)
                {
                    //errorlog
                    null;
                }
        $FeeHeadListResultset = $FeeHeadListPrep->get_result(); 
        $htmlStr='<table border="1" style="text-align: center;"><tr><td>Receipt No.</td><td>Student Name</td><td>Class</td>';

        while($row = $FeeHeadListResultset->fetch_assoc()) //
            {
                //array_push($headlist,$row["fee_head_name"]);
                $htmlStr=$htmlStr . '<td>' . $row["fee_Print_Lable"].'</td>';
            }
            $htmlStr=$htmlStr . '<td>ReAdm Fee</td>'. '<td>OD Fee</td>'. '<td>Late Fee</td>'. '<td>Discount</td><td>Adv. Amt</td><td>Total Amt</td>';
        //echo $admission_Id;
        /*
        foreach($headlist as $value)
            {
                $htmlStr=$htmlbody . '<td>' . $value.'</td>';
            }*/
        $htmlStr=$htmlStr . '</tr></table>';
        echo $htmlStr ;
    //}
?>
