<?php
$pageTitle = "Fee Form";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" action="" method="post">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
            <div class="">
                <!--h5 class="text-center">Student Attendence Message</h5-->
                <div class="row  mb-4">
                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Fee Name <span>*</span></label>
                            <input type="text" name="" placeholder="" required="" class="form-control">
                            <p class="mt-2 font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Fee Print Label <span>*</span></label>
                            <input type="text" name="" placeholder="" required="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group aj-form-group">
                            <label>Select Fee Type</label>
                            <select class="select2" name="">
                                <option value="">-- Select Fee Type --</option>
                                <option value="10">2015</option>
                                <option value="10">2016</option>
                                <option value="10">2017</option>
                                <option value="10">2018</option>
                                <option value="10">2019</option>
                                <option value="10">2020</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-12">
                        <div class="form-group aj-form-group text-center">
                            <div class="row ml-3">
                                <div class="radio">
                                    <span><input type="radio" class="sibling-bs" name="sibling" checked=""> <b>Refundable Fee Amount</b> </span>
                                </div>
                                <div class="radio ml-5">
                                    <span><input type="radio" class="sibling-bs" name="sibling"> <b>Include In Tax Benifit Certificate</b></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group aj-form-group text-center">
                            <div class="row ml-3">
                                <h6>
                                    <div class="radio mr-5">
                                        <span><input type="checkbox" class="sibling-bs" name="sibling" checked=""> <b>Refundable Fee Amount</b></span>
                                    </div>
                                </h6>
                                <h6>
                                    <div class="radio">
                                        <span><input type="checkbox" class="sibling-bs" name="sibling"> <b>Include In Tax Benifit Certificate</b></span>
                                    </div>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-12 text-right mb-5">
                        <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="Attendance-staff  aj-scroll-Attendance-staff">
                            <div class="table-responsive">
                                <table class="table display ">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%;">Available Fee Heads. </th>
                                            <th style="width: 15%;">Print Label</th>
                                            <th style="width: 20%;">Fee Type </th>
                                            <th style="width: 15%;">Refundable </th>
                                            <th style="width: 15%;">Tax Benifit</th>
                                            <th style="width: 10%;">Discount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="top-position-ss">
                                        <tr>
                                            <td style="width: 25%;">Admission Fee</td>
                                            <td style="width: 15%;">Tuition Fee</td>
                                            <td style="width: 20%;">Computer Fee</td>
                                            <td style="width: 15%;">Biology Fee</td>
                                            <td style="width: 15%;">Physices Fee</td>
                                            <td style="width: 10%;">Total Fee</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</form>
<?php require_once './includes/scripts.php';
require_once './includes/closebody.php'; ?>