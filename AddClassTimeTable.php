<?php
$pageTitle  = "Add Class Time Table";
require_once './includes/header.php';
include 'dbobj.php';
include 'security.php';
$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="AddClassTimeTable1.php" enctype="multipart/form-data">
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Select Class <span>*</span></label>
                            <select class="select2 col-12" required name="classid" id="classid" onchange="showsection(this.value)">
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
                                    $el->write_log_message('Student Attendance Entry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                    $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                                    $dbhandle->query("unlock tables");
                                    mysqli_rollback($dbhandle);

                                    $messsage = 'Error: Class list not generated.  Please consult application consultant.';						
                                }
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . '</option>';
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
                        <div class="form-group aj-form-group">
                            <label class="ml-4">PDF Files only</label>
                            <input type="file" name="class_routine" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" name="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                </div>
                <div class="pt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>Edit </th>
                                    <th>Class </th>
                                    <th>Section</th>
                                    <th>View Routine</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqldesc = "select ctt.Class_Routine_Id, cmt.Class_Name,cst.Section, ctt.filename from class_time_table ctt,class_master_table cmt,class_section_table cst where ctt.Enabled=1 and ctt.School_Id=? and ctt.Session=? and cst.class_sec_id=ctt.class_sec_id and cmt.class_id=cst.class_id order by ctt.Class_Routine_Id desc";
                                $query_prep = $dbhandle->prepare($sqldesc);
                                $query_prep->bind_param("is", $_SESSION["SCHOOLID"], $_SESSION["SESSION"]);
                                $query_prep->execute();
                                $result_set = $query_prep->get_result();
                                while ($row_routine = $result_set->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><a href="./EditClassTimeTable.php?Routineid=<?php echo $row_routine["Class_Routine_Id"]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td><?php echo $row_routine["Class_Name"]; ?></td>
                                        <td><?php echo $row_routine["Section"]; ?></td>
                                        <td> <a href="./app_images/class_timetable/<?php echo $row_routine["filename"]; ?>" target="_blank">click to View</a> </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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