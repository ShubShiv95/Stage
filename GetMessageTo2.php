<?php
session_start();
include 'dbobj.php';
include 'error_log.php';
include 'security.php';

$sentto_group_list=$_REQUEST["MessageTo_Type"];


if($sentto_group_list==1)   //1 means individual message sending to Students.
    {
        //Adding Class Select controller.
        $html_str='<div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label>Select Class *</label>
                        <select class="select2" id="classno" name="classno" required onChange="GetSectionList(this.value)">
                        <option value="0">Select Class *</option>';
            
        
           
        $query='select Class_Id,class_name,stream from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
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
        while($row=mysqli_fetch_assoc($result))
            {
                $html_str=$html_str.'<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"];
            }
            $html_str=$html_str . '</select></div>';
            //echo $str;

            //Adding section div with select section crontroller to the html string.
            $html_str=$html_str . '<div class="col-xl-12 col-lg-12 col-12 form-group" id="ClassSection-div">
                                            <label>Select Section *</label>
                                            <select class="select2" id="section" name="section" required>
                                                <option value="">Select Section *</option>
                                            </select>
                                        </div>';
        
            $html_str=$html_str . '<div class="col-xl-12 col-lg-12 col-12 form-group initial-disable1">
                                            <div class="tabular-section-detail comm-message">
                                                    <div class="table-responsive">
                                                        <table class="table display data-table text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                    <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input checkAll">
                                                                            <label class="form-check-label">Student of Nursery A</label>
                                                                    </div>
                                                                    </th>
                                                                    
                                                                    
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input">
                                                                            <label class="form-check-label">Mark Willy</label>
                                                                        </div>
                                                                    </td>
                                                                    
                                                                    
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>';
        echo $html_str;


    }
else if ($sentto_group_list==2)    //2 means individual message sending to Staff.
    {


    }
else if ($sentto_group_list==3)    //3 means individual message sending to other numbers.
    {

    }
else
    {

    }
?>