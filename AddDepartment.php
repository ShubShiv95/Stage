<?php
$pageTitle  = "Add Department";
require_once './includes/header.php';
$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" id="departmentform" method="post" action="AddDepartment_2.php">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">
                <div class="brouser-image ">
                    <h5 class="text-center">Create New Department</h5>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <!-- <div class="form-group aj-form-group">
                                                    <label>Category <span>*</span></label>
                                                    <select class="select2" name="deptcat" id="deptcat">
                                                        <option value="">Please Select  Category</option>
                                                        <option value="Teaching">Teaching</option>
                                                        <option value="Non-Teaching">Non-Teaching</option>
                                                    </select>
                                                </div> -->
                        <div class="form-group aj-form-group">
                            <label>Department </label>
                            <input type="text" name="deptname" id="deptname" placeholder="" class="form-control">
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Remarks </label>
                            <textarea type="text" rows="3" name="deptremark" id="deptremark" required="" placeholder="" class="aj-form-control"> </textarea>
                        </div>
                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                    <!--  <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>-->
                </div>


                <div class="Attendance-staff mt-5 aj-scroll-Attendance-staff">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20%; text-align: center;">Edit </th>
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
                                        <td style="width: 10%; text-align: center;"><a href="EditDepartment.php?deptid=<?php echo $row["Dept_Id"]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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

    <?php require_once './includes/scripts.php'; require_once './includes/closebody.php';?>