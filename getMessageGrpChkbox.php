<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';


$usergrptype=$_REQUEST["usergrptype"];
$usergrpid=$_REQUEST["usergrpid"];

$html_str="";

if($usergrptype==1)   //1 means Group message sending to Students. So we will treat the second select value as classid.
    {
        //Adding Class Select controller.
        $query='';
        $classid="";
       // echo $usergrpid;
        if($usergrpid==0)
        {
            
            $classid= " cmt.class_id in (select class_id from class_master_table where enabled=1 and school_id=" . $_SESSION["SCHOOLID"]  . ")";
            
            //$query='select class_name,section,class_sec_id from class_master_table cmt,class_section_table cst where cst.class_id=cmt.class_id and  cst.enabled=1  and cst.School_Id=' . $_SESSION["SCHOOLID"] . " order by class_no";
        }
        else{
            $classid=" cmt.class_id=$usergrpid";
            }
        
            $query='select class_name,section,class_sec_id,class_no from class_master_table cmt,class_section_table cst where ' . $classid . ' and cst.class_id=cmt.class_id and cst.enabled=1' . ' and cst.School_Id=' . $_SESSION["SCHOOLID"] . " order by class_no";
    

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
               
            $str='<div class="table-responsive"><table class="table display data-table text-nowrap dataTable no-footer">
            <thead>
                <tr>
                    <th> <label>Select Class Sections</label>
                        <!--div class="form-check">
                            <input type="checkbox" class="form-check-input checkAll">
                            <label class="form-check-label">Select All</label>
                        </div-->
                    </th>	
                </tr>
            </thead>
            <tbody>';
            $prev_class_name='';  
            $next_class_name='';  
    
            while($row=mysqli_fetch_assoc($result))
            {
    
    
                if($next_class_name!=$row["class_name"])
                {
                    $prev_class_name=$next_class_name;
                    $next_class_name=$row["class_name"];
                    $str=$str . '</td></tr><tr>    
                                    <td>
                                        <div>
                                            <label><B>' .($row["class_no"] > 0 ? 'Class ' : '') .  $row["class_name"] .' </B></label>
                                        </div>
                                    </td>
                                    
                            
                                </tr><tr><td style="text-align:left;">';
                    
                }
                
    
                //$str= $str .  '<div class="form-check"><input type="checkbox" class="form-check-input" name="msgGrpId[]" value="' . $row["class_sec_id"] .  '"><label class="form-check-label"> ' . $row["section"] . '</label></div>';
                $str= $str .  '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="msgGrpId[]" value="' . $row["class_sec_id"] .  '">&nbsp;' . $row["section"];
    
    
            }	
                $str = $str . ' </td></tr></tbody></table></div>';
                echo $str;



                    /*
                                $html_str='<div class="table-responsive"><table class="table display data-table text-nowrap dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th> <label>Select Groups</label>
                                            <!--div class="form-check">
                                                <input type="checkbox" class="form-check-input checkAll">
                                                <label class="form-check-label">Select All</label>
                                            </div-->
                                        </th>	
                                    </tr>
                                </thead>
                                <tbody>';
                                
                                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                
                                
                                    $html_str= $html_str .  '<tr><td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="classsecid[]" value="' . $row["class_sec_id"].'">
                                                            <label class="form-check-label"> Section ' . $row["section"] . '</label>
                                                            </div>
                                                        </td></tr>';
                                
                                
                                }	
                                    $html_str = $html_str . ' </tbody>
                                    </table></div>';
                                    echo $html_str;
                                */
                 
    }
else if ($usergrptype==2)    //2 means individual message sending to Staff.
    {


        $department=NULL;
        $deptid=$usergrpid;

        if($deptid==0)
        {
            $department='dept.dept_id in (select deptn.dept_id from department_master_table as deptn)';
        }

        if($deptid>0)
        {
            $department='dept.dept_id=' . $deptid;
        }


        $query="select employee_name,employee_id,sms_number,whatsapp_number,mob_number,dept_name,emp.dept_id deptid from employee_master_table emp,department_master_table dept where " . $department . " and dept.dept_id=emp.dept_id and emp.enabled=1 and emp.school_id=" . $_SESSION["SCHOOLID"] . ' order by dept_name,employee_name';


        echo $query;


        $result=mysqli_query($dbhandle,$query);

        $str='<div class="table-responsive"><table class="table display data-table text-nowrap dataTable no-footer">
        <thead>
            <tr>
                <th> <label>Select Departments</label>
                    <!--div class="form-check">
                        <input type="checkbox" class="form-check-input checkAll">
                        <label class="form-check-label">Select All</label>
                    </div-->
                </th>	
            </tr>
        </thead>
        <tbody>';
        $prev_dept_name='';  
        $next_dept_name='';  

        while($row=mysqli_fetch_assoc($result))
        {


            if($next_dept_name!=$row["dept_name"])
            {
                $prev_dept_name=$next_dept_name;
                $next_dept_name=$row["dept_name"];
                $str=$str . '<tr>    
                                <td>
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="msgGrpId[]" value="' . $row["deptid"] .  '">
                                        <label><B>' . $row["dept_name"] .' Department</B></label>
                                    </div>
                                </td>
                                
                        
                            </tr>';
                
            }
            

            $str= $str .  '<tr><td>
                                <div>
                                    
                                    <label class="form-check-label">' . $row["employee_name"] . '</label>
                                    </div>
                                </td></tr>';


        }	
            $str = $str . ' </tbody></table></div>';
            echo $str;

}
    
        /*

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
            $html_str=$html_str.'<option value="0">Select Department </option>';    
            $html_str=$html_str.'<option value="-1">All Departments </option>';    
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

    */
?>