<?php
$pageTitle = "Add Teacher Time Table";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>

<form class="new-added-form school-form aj-new-added-form" id="add_teacher_timetable" method="post" action="AddTeacherTimeTable_2.php" enctype="multipart/form-data">

    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Select Teacher <span>*</span></label>

                            <select class="select2 col-12" name="teacher_id" required>

                                <option value="">Select Teacher</option>
                                <?php
                                $sqldept = "select Staff_Id, Staff_Name from staff_master_table where Enabled=1 and School_Id=" . $_SESSION["SCHOOLID"] . " and category='Teaching' order by Staff_Name";
                                $resultdept = mysqli_query($dbhandle, $sqldept);
                                while ($row = mysqli_fetch_assoc($resultdept)) {
                                ?>
                                    <option value="<?php echo $row["Staff_Id"]; ?>"><?php echo $row["Staff_Name"]; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="form-group aj-form-group">
                            <label class="ml-4">PDF Files only</label>
                            <input type="file" name="notice_attachment" placeholder="" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">

                    <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" name="submit">Submit </button>

                    <!-- <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>-->
                </div>

                <div class="Attendance-staff mt-5 aj-scroll-Attendance-staff">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Edit </th>
                                    <th>Teacher Name </th>
                                    <th>View Routine </th>

                                </tr>
                            </thead>
                            <tbody class="top-position-ss3">
                                <?php

                                $sqldesc = "select ttt.Teacher_Routine_Id,smt.Staff_Name from teacher_time_table ttt,staff_master_table smt where  ttt.Enabled=1 and ttt.School_Id=" . $_SESSION["SCHOOLID"] . " and ttt.Session='" . $_SESSION["SESSION"] . "' AND smt.staff_id=ttt.staff_id  order by ttt.teacher_routine_id desc";


                                $resultdesc = mysqli_query($dbhandle, $sqldesc);
                                while ($row = mysqli_fetch_assoc($resultdesc)) {


                                ?>
                                    <tr>

                                        <td style="text-align: center; width:10%;"><a href="EditTeacherTimeTablef.php?Teachertimetableid=<?php echo $row["Teacher_Routine_Id"]; ?>">
                                                <!--<?php echo $row["Teacher_Routine_Id"]; ?>--><i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                            </a></td>
                                        <td><?php echo $row["Staff_Name"]; ?></td>
                                        <td><?php echo 'Hello'; ?></td>


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
<?php require_once './includes/scripts.php';
require_once './includes/closebody.php';
?>