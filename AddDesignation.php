<?php
$pageTitle  = "Add Designation";
require_once './includes/header.php';
$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="AddDesignation_2.php">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">
                <div class="brouser-image ">
                    <h5 class="text-center">Create New Designation</h5>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Department <span>*</span></label>
                            <select class="select2 col-12" name="desi_department" required>
                                <option value="">Please Select Department</option>
                                <?php
                                $sqldept = 'select Dept_Id, Dept_Name from department_master_table where Enabled=1 and School_Id="' . $schoolId . '" order by Dept_Id ';
                                $resultdept = mysqli_query($dbhandle, $sqldept);
                                while ($row = mysqli_fetch_assoc($resultdept)) {
                                ?>
                                    <option value="<?php echo $row["Dept_Id"]; ?>"><?php echo $row["Dept_Name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Designation </label>
                            <input type="text" name="desi_designation" placeholder="" required="" class="form-control">
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Remarks </label>
                            <textarea type="text" rows="3" name="desi_remarks" required="" placeholder="" class="aj-form-control"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                </div>

                <div class="Attendance-staff mt-5 aj-scroll-Attendance-staff">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Edit </th>
                                    <th>Designation Name </th>
                                    <th>Department Name</th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss3">
                                <?php
                                $sqldesc = 'select Desig_Id, Designation, Dept_Id from designation_master_table where Enabled=1 and School_Id="' . $schoolId . '" order by Dept_Id ';
                                $resultdesc = mysqli_query($dbhandle, $sqldesc);
                                while ($row = mysqli_fetch_assoc($resultdesc)) {
                                    $deptid = $row["Dept_Id"];
                                    $sqldept = 'select Dept_Name from department_master_table where Enabled=1 and School_Id="' . $schoolId . '" and Dept_Id="' . $deptid . '" ';
                                    $resultdept = mysqli_query($dbhandle, $sqldept);
                                    $rowdept = mysqli_fetch_assoc($resultdept);
                                ?>
                                    <tr>
                                        <td style="text-align: center; width:10%;"><a href="EditDesignation.php?descid=<?php echo $row["Desig_Id"]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td><?php echo $row["Designation"]; ?></td>
                                        <td><?php echo $rowdept["Dept_Name"]; ?></td>
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
<?php require_once './includes/scripts.php'; require_once './includes/closebody.php';?>