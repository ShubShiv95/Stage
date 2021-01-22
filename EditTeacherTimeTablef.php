<?php
$pageTitle = 'Edit Teacher Time Table';
require_once './includes/header.php';
include 'dbobj.php';

$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="EditTeacherTimeTable_2.php" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">

                <div class="row justify-content-center">

                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label class="ml-4">Teacher Routine Id</label>
                            <input type="text" name="routine_id" placeholder="" class="form-control" readonly value="<?php echo $_REQUEST['Teachertimetableid']; ?>">
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Select Teacher <span>*</span></label>
                            <select class="select2 col-12" name="teacher_id" required>
                                <option value="">Select Teacher</option>
                                <?php
                                $sqldept = "select Staff_Id, Staff_Name from staff_master_table where Enabled=1 and School_Id=" . $_SESSION["SCHOOLID"] . " and category='Teaching' order by Staff_Name";
                                $resultdept = mysqli_query($dbhandle, $sqldept);
                                while ($row = mysqli_fetch_assoc($resultdept)) {
                                    if ($row_routine['Staff_Id'] == $row["Staff_Id"]) {
                                        echo '<option value="' . $row["Staff_Id"] . '" selected="selected">' . $row["Staff_Name"] . '</option>';
                                    } else {
                                        echo '<option value="' . $row["Staff_Id"] . '" >' . $row["Staff_Name"] . '</option>';
                                    }
                                }
                                ?>

                            </select>

                        </div>
                        <div class="form-group aj-form-group">
                            <label class="ml-4">PDF Files only</label>
                            <input type="text" name="prev_file_name" value="<?php echo $row_routine["Filename"]; ?>" class="d-none">
                            <input type="file" name="taecher_timetable" placeholder="" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" name="submit">Update </button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once './includes/scripts.php';
require_once './includes/closebody.php'; ?>