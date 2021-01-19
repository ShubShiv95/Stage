<?php
$pageTitle  = "Add Staff Attendance";
require_once './includes/header.php';
$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
require_once './includes/navbar.php';
?>

<form class="new-added-form school-form aj-new-added-form">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Select Department <span>*</span></label>
                        <select class="select2 col-12" name="depar_Category">
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                            <option value="">All Department</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <div class="form-group aj-form-group">
                            <label>In Time</label>
                            <input type="time" name="f_age" placeholder="" class=" form-control">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Out Time</label>
                        <input type="time" name="f_age" placeholder="" class=" form-control">
                    </div>
                </div>
                <div class="col-lg-12 aaj-btn-chang-cbtn text-right">
                    <a href="javascript:void(0);" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Update Time </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
            <div class="Attendance-staff  aj-scroll-Attendance-staff">
                <div class="tebal-promotion">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Staff Name </th>
                                    <th>In Time </th>
                                    <th>Out Time </th>
                                    <th>Clear Time</th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss">
                                <tr>
                                    <td>Account Department</td>

                                    <td>9:00 AM</td>
                                    <td>4:00 PM</td>
                                    <td style="text-align: center;"><a href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true" style="color: #f44336"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Account Department</td>

                                    <td>9:00 AM</td>
                                    <td>4:00 PM</td>
                                    <td style="text-align: center;"><a href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true" style="color: #f44336"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Account Department</td>

                                    <td>9:00 AM</td>
                                    <td>4:00 PM</td>
                                    <td style="text-align: center;"><a href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true" style="color: #f44336"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Account Department</td>

                                    <td>9:00 AM</td>
                                    <td>4:00 PM</td>
                                    <td style="text-align: center;"><a href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true" style="color: #f44336"></i></a></td>
                                </tr>
                                <tr>
                                    <td>Account Department</td>

                                    <td>9:00 AM</td>
                                    <td>4:00 PM</td>
                                    <td style="text-align: center;"><a href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true" style="color: #f44336"></i></a></td>
                                </tr>
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