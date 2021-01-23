<?php
$pageTitle = "Edit Syllabus Class";
require_once './includes/header.php';
require_once './includes/navbar.php';
$displayroutineid = "select * from class_syllabus_table where Class_Syllabus_Id=?";
$displayroutineid_prep = $dbhandle->prepare($displayroutineid);
$displayroutineid_prep->bind_param("i", $_REQUEST['Class_Syllabus_Id']);
$displayroutineid_prep->execute();
$result_set = $displayroutineid_prep->get_result();
$row_routine = $result_set->fetch_assoc();

$displaysubject = "SELECT * FROM class_syllabus_table where Class_Syllabus_Id=?";
$displaysubject_prep = $dbhandle->prepare($displaysubject);
$displaysubject_prep->bind_param("i", $_REQUEST['Class_Syllabus_Id']);
$displaysubject_prep->execute();
$subject_result_set = $displaysubject_prep->get_result();
$subject_row_routine = $subject_result_set->fetch_assoc();
?>
<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="./SyllabusEditClass_1.php" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">
                <div class="form-group aj-form-group">
                    <label class="ml-4">Syllabus Id</label>
                    <input type="number" readonly value="<?php echo $_REQUEST['Class_Syllabus_Id'] ?>" name="class_routine_id" placeholder="" class="form-control">
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">

                        <div class="form-group aj-form-group">

                            <label>Select Class <span>*</span></label>
                            <select class="select2" name="assignment_class" required>
                                <option value="">Select Class</option>
                                <?php
                                $Class_Syllabus_Id = $_REQUEST['Class_Syllabus_Id'];
                                $sqldept = "select Class_Id,class_name from class_master_table";
                                $resultdept = mysqli_query($dbhandle, $sqldept);
                                while ($row_c = mysqli_fetch_assoc($resultdept)) {
                                    if ($row_routine['Class_Id'] == $row_c["Class_Id"]) {
                                        echo '<option value="' . $row_c["Class_Id"] . '" selected="selected">' . $row_c["class_name"] . '</option>';
                                    } else {
                                        echo '<option value="' . $row_c["Class_Id"] . '" >' . $row_c["class_name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Select Subject</label>
                            <select class="select2" required="" name="assignment_subject" required>
                                <option value="">Select One</option>
                                <?php
                                $Class_Syllabus_Id = $_REQUEST['Class_Syllabus_Id'];
                                $sqlsubject = "select Subject_Id,Subject_Name from subject_master_table";
                                $resultsubject = mysqli_query($dbhandle, $sqlsubject);
                                while ($row_s = mysqli_fetch_assoc($resultsubject)) {
                                    if ($subject_row_routine['Subject_Id'] == $row_s["Subject_Id"]) {
                                        echo '<option value="' . $row_s["Subject_Id"] . '" selected="selected">' . $row_s["Subject_Name"] . '</option>';
                                    } else {
                                        //echo 'hlw';
                                        echo '<option value="' . $row_s["Subject_Id"] . '" >' . $row_s["Subject_Name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" name="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Update </button>
                    <!-- <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>-->
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    $('#opne-form-Promotion').click('.sibling-bs', function() {
        $('.tebal-promotion').slideToggle('slow');
    })
</script>
<?php require_once './includes/closebody.php'; ?>