<?php
$pageTitle = "Teacher Time Table";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="AddDesignation_2.php">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">
                <div class="Attendance-staff mt-5 aj-scroll-Attendance-staff">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Teacher Name </th>
                                    <th>View Routine </th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss3">
                                <?php
                                $sqldesc = "select ttt.Teacher_Routine_Id,smt.Staff_Name from teacher_time_table ttt,staff_master_table smt where  ttt.Enabled=1 and ttt.School_Id=" . $_SESSION["SCHOOLID"] . " and ttt.Session='" . $_SESSION["SESSION"] . "' AND smt.staff_id=ttt.staff_id  order by smt.staff_name";

                                $resultdesc = mysqli_query($dbhandle, $sqldesc);
                                while ($row = mysqli_fetch_assoc($resultdesc)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["Staff_Name"]; ?></td>
                                        <td><?php echo ''; ?></td>
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
require_once './includes/closebody.php'; ?>