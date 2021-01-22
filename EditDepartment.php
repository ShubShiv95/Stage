<?php
$pageTitle = "Edist Department";
require_once './includes/header.php';
include 'dbobj.php';
$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
$deptid = $_REQUEST["deptid"];

$sqldept = 'select * from department_master_table where Enabled=1 and School_Id="' . $schoolId . '" and Dept_Id="' . $deptid . '"';
$resultdept = mysqli_query($dbhandle, $sqldept);
$row = mysqli_fetch_assoc($resultdept);
require_once './includes/navbar.php';
?>
<!--<form class="new-added-form school-form aj-new-added-form" id="departmentform" method="post" action="EditDepartment_2.php">
						<input type="hidden" value="<?php echo $_REQUEST["deptid"];; ?>" id="deptid" name="deptid" />
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                    <div class="box-sedow">
                                        <div class="brouser-image ">
                                            <h5 class="text-center">Create New Department</h5>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                                 <div class="form-group aj-form-group">
                                                    <label>Category <span>*</span></label>
                                                    <select class="select2" name="deptcat" id="deptcat" required>
                                                        <option value="">Please Select  Category</option>
                                                        <option value="1" <?php if ($row["Dept_Cat"] == "1") {
                                                                                echo "selected";
                                                                            } ?>>Teaching</option>
                                                        <option value="2" <?php if ($row["Dept_Cat"] == "2") {
                                                                                echo "selected";
                                                                            } ?>>Non-Teaching</option>
                                                    </select>
                                                </div> -->
<div class="form-group aj-form-group">
    <label>Department </label>
    <input type="text" name="deptname" id="deptname" placeholder="" value="<?php echo $row["Dept_Name"]; ?>" class="form-control">
</div>
<div class="form-group aj-form-group">
    <label>Remarks </label>
    <textarea type="text" rows="3" name="deptremark" id="deptremark" required="" placeholder="" class="aj-form-control"><?php echo $row["Remarks"]; ?></textarea>
</div>
</div>
</div>
<div class="aaj-btn-chang-cbtn text-right">
    <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Update </button>
</div>
<div class="Attendance-staff mt-5 aj-scroll-Attendance-staff">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20%">Edit </th>
                    <th style="  text-align: center; ">Department Name </th>
                </tr>
            </thead>
            <tbody class="top-position-ss3">
                <?php
                $sqldept = 'select Dept_Id, Dept_Name from department_master_table where Enabled=1 and School_Id="' . $schoolId . '" order by Dept_Id ';
                $resultdept = mysqli_query($dbhandle, $sqldept);
                while ($row = mysqli_fetch_assoc($resultdept)) {
                ?>
                    <tr>
                        <td style="width: 10%; text-align: center;"><a href="EditDepartment.php?deptid=<?php echo $row["Dept_Id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a></td>
                        <td><?php echo $row["Dept_Name"]; ?></td>
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
<?php
require_once './includes/scripts.php';
include_once './includes/closebody.php';

?>