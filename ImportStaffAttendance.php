<?php
$pageTitle = "Import Staff Attendance";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">


            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">

                    <div class="form-group text-center">
                        <label>Download Excel Format</label>
                        <br>
                        <a href="javascript:void(0);"><img src="img/aj-img/excel.png" width="80"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <div class="brouser-image staf-brouser-image">
                        <h6>Supported Browser:

                            <div class="image">
                                <img src="img/aj-img/Firefox.png">
                                <img src="img/aj-img/chrome1.png">
                            </div>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>School Name <span>*</span></label>
                        <select class="select2" name="sttaf-a-class">
                            <option value="">Please Select School Name</option>
                            <option value="3">One</option>
                            <option value="3">Two</option>
                            <option value="3">Three</option>
                            <option value="3">Four</option>
                            <option value="3">Five</option>
                        </select>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">

                    <div class="form-group aj-form-group">
                        <label>Import Excel</label>
                        <input type="file" name="sttaf-a-name" placeholder="" required="" class="form-control">
                    </div>
                </div>
            </div>

            <div class="aaj-btn-chang-cbtn">
                <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Import </button>
                <button type="reset" class="aj-btn-a1 btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>

            </div>
        </div>

    </div>


</form>
<?php require_once './includes/scripts.php';
require_once './includes/closebody.php'; ?>