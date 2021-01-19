<?php
$pageTitle = "Edit Class Time-Table";
require_once './includes/header.php';
include_once './includes/navbar.php';
include 'dbobj.php';

$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
?>
<?php

if (isset($_SESSION['successmsg'])) {
    echo $_SESSION["successmsg"];
}
$displayroutineid = "select * from class_time_table ctt where ctt.Enabled=1 and ctt.School_Id=? and ctt.Class_Routine_Id=? ";
$displayroutineid_prep = $dbhandle->prepare($displayroutineid);
$displayroutineid_prep->bind_param("ii", $_SESSION["SCHOOLID"], $_REQUEST['Routineid']);
$displayroutineid_prep->execute();
$result_set = $displayroutineid_prep->get_result();
$row_routine = $result_set->fetch_assoc();

?>
<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="EditClassTimeTable1.php" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">
                <div class="form-group aj-form-group">
                    <label class="ml-4">Routineid</label>
                    <input type="number" readonly value="<?php echo $_REQUEST['Routineid'] ?>" name="class_routine_id" placeholder="" class="form-control">
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Select Class <span>*</span></label>
                            <select class="select2 col-12" required name="classid" id="classid" onchange="showsection(this.value)">
                                <!--option value="">Please Select Class *</option-->
                                <option value="0">Please Select Class </option>
                                <?php
                                $str = '';
                                $query = 'select Class_Id,class_name from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                                $result = $dbhandle->query($query);
                                if (!$result) {
                                    //var_dump($getStudentCount_result);
                                    $error_msg = mysqli_error($dbhandle);
                                    $el = new LogMessage();
                                    $sql = $query;
                                    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                    $el->write_log_message('Student Attendance Entry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                    $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                                    $dbhandle->query("unlock tables");
                                    mysqli_rollback($dbhandle);
                                    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                                    $messsage = 'Error: Class list not generated.  Please consult application consultant.';
                                    //$str_end='</div>';
                                    //echo $str_start.$messsage.$str_end;
                                    //echo "";
                                    //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                                }
                                while ($row = $result->fetch_assoc()) {
                                    if ($row_routine['class_id'] == $row["Class_Id"]) {
                                        echo '<option value="' . $row["Class_Id"] . '" selected="selected">Class ' . $row["class_name"] . '</option>';
                                    } else {
                                        echo '<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . '</option>';
                                    }
                                }




                                //echo $str;
                                ?>
                            </select>
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Select Section</label>
                            <select class="select2 col-12" name="secid" id="secid" required>
                                <option value="">Please Select Section *</option>
                            </select>
                        </div>
                        <!-- <div class="form-group aj-form-group">
                                                    <label>Select  Teacher <span>*</span></label>
                                                    <select class="select2 col-12" name="desi_department" required>
                                                        <option value="">Select  Teacher</option>
													
                                                    </select>
                                                    
                                                </div>  -->
                        <div class="form-group aj-form-group">
                            <label class="ml-4">PDF Files only</label>
                            <input type="text" value="<?php echo $row_routine['filename ']; ?>" name="previous_file" class="d-none">
                            <input type="file" name="class_routine" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" name="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                    <!-- <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>-->
                </div>



            </div>
        </div>
    </div>
</form>

<?php
unset($_SESSION['successmsg']);
?>
<?php require_once './includes/scripts.php'; ?>
<script>
    function showsection(str) {
        var xmlhttp;
        if (str == "") {
            document.getElementById("section").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("secid").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getSectionList.php?classid=" + str, true);
        xmlhttp.send();
    }
</script>
<?php require_once './includes/closebody.php'; ?>