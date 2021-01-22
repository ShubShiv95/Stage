<?php
$pageTitle  = "Admission Add Form";
require_once './includes/header.php';
require_once './includes/navbar.php';
include 'AdmissionModel.php';
require_once './GlobalModel.php';
?>

<form class="new-added-form aj-new-added-form" method="post" action="AdmissionAdd_1.php" id="newAdmission" enctype="multipart/form-data">
    <div class="row">
        <input type="text" name="newStudentEntry" autofill="off" style="display: none;">
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>First Name (As Per Birth Certificate) <span>*</span></label>
                <input type="text" name="studentFirstName" id="studentFirstName" placeholder="" class="form-control" required="">
            </div>
            <div class="form-group aj-form-group">
                <label>Middle Name</label>
                <input type="text" name="studentMiddleName" id="studentMiddleName" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Last Name</label>
                <input type="text" name="studentLastName" id="studentLastName=" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Class <span>*</span></label>
                <select class="select2 studclassToApply col-12" name="studclassToApply" id="studclassToApply">
                    <option value="0">Select Class</option>


                </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Stream</label>
                <select class="select2 col-12" name="stud_stream" id="stud_stream" readonly>
                    <option value="0">Select Stream</option>
                    <?php
                    foreach ($GLOBAL_CLASS_STREAM as $stream) {
                        echo '<option value="' . $stream . '">' . $stream . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group aj-form-group">
                <label>Gender <span>*</span></label>
                <select class="select2 col-12" name="studentGender" id="studentGender">
                    <option value="">Please Select Gender </option>
                    <option value="MALE">Male</option>
                    <option value="FEMALE">Female</option>
                    <option value="OTHER">Others</option>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Date of Birth <span>*</span></label>
                <input type="text" name="studentDOB" id="studentDOB" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off" required="">
                <i class="far fa-calendar-alt"></i>
            </div>

            <div class="form-group aj-form-group">
                <label>Age</label>
                <input type="text" name="studentAge" id="studentAge" placeholder="" readonly="true" class="form-control">
            </div>

            <div class="form-group aj-form-group">
                <label>Social Category <span>*</span></label>
                <select class="select2 col-12" name="studentSocialCat" id="studentSocialCat">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_SOCIAL_CAT as $x => $x_value) {

                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>
            <div class="form-group a
                <label>Discount Category <span>*</span></label>
                <select class="select2 col-12" name="studDiscCat" id="studDiscCat">
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Locality </label>
                <select class="select2 col-12" name="studLocality" id="studLocality">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_LOCALITY as $x => $x_value) {
                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?> </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Academic Session <span>*</span></label>
                <select class="select2 col-12" name="studAcademicSession" id="studAcademicSession">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_SCHOOL_SESSION as $x => $x_value) {

                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>
            <div class="form-group aj-form-group">

                <label>Mother Tongue <span>*</span></label>
                <select class="select2 col-12" name="studMotherTongue" id="studMotherTongue">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_LANGUAGES as $x => $x_value) {
                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>

        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Religion <span>*</span></label>
                <select class="select2 col-12" name="studReligion" id="studReligion">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_RELIGION as $x => $x_value) {
                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>

            <div class="form-group aj-form-group">
                <label>Nationality <span>*</span></label>
                <select class="select2 col-12" name="studNationality" id="studNationality">
                    <option value="">Select Nationality</option>
                    <option selected value="INDIAN">Indian</option>
                    <option value="OTHERS">Other</option>
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Blood Group </label>
                <select class="select2 col-12" name="studBloodGroup" id="studBloodGroup">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_BLOOD_GROUP as $x => $x_value) {

                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>

            <div class="form-group aj-form-group">
                <label>Adhaar Card No.</label>
                <input type="text" name="studAdharCardNo" id="studAdharCardNo" placeholder="" class="form-control" maxlength="12" minlength="12">
            </div>

            <div class="form-group faj-form-group">
                <label class="text-dark-medium">Upload Student Photo ( JPEG Less Than 2MB)</label>
                <div class="d-image-user">
                    <img src="img/avtar.png" id="studentImageDisplay" style="width: 200px; height:125px;">
                </div>
                <div class="file-in">
                    <span class="fa fa-pencil" aria-hidden="true"></span>
                    <input type="file" name="studentPhoto" id="studentPhoto" class="form-control-file" accept="image/jpg,image/jpeg">
                </div>
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">Previous School Details</h3>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>School Name</label>
                <input type="text" name="studPrevSchoolName" id="studPrevSchoolName" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Medium of Instruction</label>
                <select class="select2 col-12" name="studMOI" id="studMOI">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_LANGUAGES as $x => $x_value) {
                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Board</label>
                <select class="select2 col-12" name="studBoard" id="studBoard">
                    <?php
                    $string = "";
                    foreach ($GLOBAL_SCHOOL_BOARD as $x => $x_value) {
                        $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                    }
                    echo $string;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12">
            <div class="form-group aj-form-group">
                <label>Class</label>
                <select class="select2 col-12" name="studClass" id="studClass">
                </select>
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">Communication Address</h3>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Communication Address<span>*</span></label>
                <textarea type="text" rows="4" name="commAddress" id="commAddress" placeholder="" class="aj-form-control"> </textarea>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>City/ District<span>*</span></label>
                <input type="text" name="commCityDist" id="commCityDist" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Pincode<span>*</span></label>
                <input type="text" name="commPinCode" id="commPinCode" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>State<span>*</span> </label>
                <input type="text" name="commState" id="commState" placeholder="" class="form-control">

            </div>
            <div class="form-group aj-form-group">
                <label>Contact No.<span>*</span></label>
                <input type="text" name="commContactNo" id="commContactNo" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 ">
            <div class="form-group aj-form-group">
                <label>Country</label>
                <input type="text" maxlength="" name="commCountry" id="commCountry" placeholder="" class="form-control">
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">Residential Address</h3>
    </div>
    <div class="row">
        <div class="col-12 aj-mb-2">
            <p class="text-primary">Same As Communication Address <span><input type="checkbox" name="copy_address" id="copy_address"></span></p>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Residential Address<span>*</span></label>
                <textarea type="text" rows="4" name="raAddress" id="raAddress" placeholder="" class="aj-form-control"> </textarea>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> City/ District <span>*</span></label>
                <input type="text" name="raCityDist" id="raCityDist" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Pincode <span>*</span></label>
                <input type="text" name="raPinCode" id="raPinCode" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>State <span>*</span> </label>
                <input type="text" name="raState" id="raState" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Contact No. <span>*</span></label>
                <input type="text" name="raContactNo" id="raContactNo" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 ">
            <div class="form-group aj-form-group">
                <label>Country</label>
                <input type="text" maxlength="12" name="raCountry" id="raCountry" placeholder="" class="form-control">

            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">

        <h3 class="mb-4">Sibling Details <small> (if Any, After entering Admission No. Kindly press enter key again)</small></h3>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="form-group aj-form-group text-center">
                <span>Any Sibling in this School ?(Real brother/sister)</span>
                <div class="row-chang">
                    <div class="radio">
                        <span><input type="radio" class="sibling-bs" name="sibling"> Yes</span>
                    </div>
                    <div class="radio">
                        <span><input type="radio" class="sibling-bs" name="sibling" checked>No</span>
                    </div>
                </div>
            </div>
            <div class="active-div-a" style="display: none;">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-12">

                        <div class="form-group aj-form-group">
                            <label>Student Id</label>
                            <input type="text" name="sibling1StudId" id="sibling1StudId" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="form-group aj-form-group">
                            <label>Class <span>*</span></label>
                            <select class="select2 col-12" name="sibling1Class" id="sibling1Class">
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="form-group aj-form-group">
                            <label>Section</label>
                            <input type="text" name="sibling1Section" id="sibling1Section" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12">
                        <div class="form-group aj-form-group">
                            <label>Roll No.</label>
                            <input type="text" name="sibling1RollNo" id="sibling1RollNo" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12 mt-4">
                        <div class="form-group aj-form-group">
                            <label>Student Id</label>
                            <input type="text" name="sibling2StudId" id="sibling2StudId" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12 mt-4">
                        <div class="form-group aj-form-group">
                            <label>Class <span>*</span></label>
                            <select class="select2 col-12" name="sibling2Class" id="sibling2Class">
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12 mt-4">
                        <div class="form-group aj-form-group">
                            <label>Section</label>
                            <input type="text" name="sibling2Section" id="sibling2Section" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-12 mt-4">
                        <div class="form-group aj-form-group">
                            <label>Roll No.</label>
                            <input type="text" name="sibling2RollNo" id="sibling2RollNo" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">Parent Details</h3>
    </div>
    <div class="f-section-n">
        <h3>Father's Details</h3>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                <div class="form-group aj-form-group aj-form-group0">
                    <label>Father's Name (As Per Birth Certificate) </label>
                    <input type="text" name="fatherName" id="fatherName" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Qualification</label>
                    <select class="select2 col-12" name="fatherQualification" id="fatherQualification">
                        <?php
                        $string = "";
                        foreach ($GLOBAL_QUALIFICATION as $x => $x_value) {
                            $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                        }
                        echo $string;
                        ?>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label>Occupation</label>
                    <select class="select2 col-12" name="fatherOccupation" id="fatherOccupation">
                        <?php
                        $string = "";
                        foreach ($GLOBAL_OCCUPATION as $x => $x_value) {
                            $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                        }
                        echo $string;
                        ?>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label>Designation</label>
                    <input type="text" name="fatherDesig" id="fatherDesig" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Org Name</label>
                    <input type="text" name="fatherOrgName" id="fatherOrgName" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Org Address</label>
                    <input type="text" name="fatherOrgAdd" id="fatherOrgAdd" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>City</label>
                    <input type="text" name="fatherCity" id="fatherCity" placeholder="" class="form-control">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                <div class="form-group aj-form-group">
                    <label>State</label>
                    <input type="text" name="fatherState" id="fatherState" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Country</label>
                    <input type="text" name="fatherCountry" id="fatherCountry" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Pincode</label>
                    <input type="text" name="fatherPinCode" id="fatherPinCode" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Email</label>
                    <input type="text" name="fatherEmail" id="fatherEmail" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Contact No.</label>
                    <input type="text" minlength="10" maxlength="10" name="fatherContactNo" id="fatherContactNo" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Annual Income</label>
                    <input type="text" name="fatherAnnualIncome" id="fatherAnnualIncome" placeholder="" class="form-control">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-12 ">
                <div class="form-group aj-form-group">
                    <label>Adhaar Card No.</label>
                    <input type="text" name="fatherAdharCardNo" id="fatherAdharCardNo" placeholder="" class="form-control" minlength="12" maxlength="12">
                </div>
                <div class="form-group aj-form-group">
                    <label>Alumni</label>

                    <select class="select2 col-12" name="fatherAlumni" id="fatherAlumni">

                        <option selected value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
                <div class="form-group faj-form-group">
                    <label class="text-dark-medium">Upload Father Photo ( JPEG Less Than 2MB)</label>
                    <div class="d-image-user">
                        <img src="img/avtar.png" id="fatherImageDisplay" style="width: 200px; height:125px;">
                    </div>
                    <div class="file-in">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                        <input type="file" name="fatherPhoto" id="fatherPhoto" class="form-control-file" accept="image/jpg,image/jpeg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-section-n">
        <h3>Mother's Details</h3>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                <div class="form-group aj-form-group aj-form-group0">
                    <label> Mother's Name (As Per Birth Certificate)</label>
                    <input type="text" name="motherName" id="motherName" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Qualification</label>
                    <select class="select2 col-12" name="motherQualification" id="motherQualification">
                        <?php
                        $string = "";
                        foreach ($GLOBAL_QUALIFICATION as $x => $x_value) {
                            $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                        }
                        echo $string;
                        ?>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label>Occupation </label>
                    <select class="select2 col-12" name="motherOccupation" id="motherOccupation">
                        <?php
                        $string = "";
                        foreach ($GLOBAL_OCCUPATION as $x => $x_value) {
                            $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                        }
                        echo $string;
                        ?>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label>Designation</label>
                    <input type="text" name="motherDesig" id="motherDesig" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Org Name</label>
                    <input type="text" name="motherOrgName" id="motherOrgName" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Org Address</label>
                    <input type="text" name="motherOrgAdd" id="motherOrgAdd" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>City</label>
                    <input type="text" name="motherCity" id="motherCity" placeholder="" class="form-control">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                <div class="form-group aj-form-group">
                    <label>State</label>
                    <input type="text" name="motherState" id="motherState" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Country </label>
                    <input type="text" name="motherCountry" id="motherCountry" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Pincode</label>
                    <input type="text" name="motherPinCode" id="motherPinCode" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Email</label>
                    <input type="text" name="motherEmail" id="motherEmail" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Contact No.</label>
                    <input type="text" minlength="10" maxlength="12" name="motherContactNo" id="motherContactNo" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Annual Income</label>
                    <input type="text" name="motherAnnualIncome" id="motherAnnualIncome" placeholder="" class="form-control">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-12 ">
                <div class="form-group aj-form-group">
                    <label>Adhaar Card No.</label>
                    <input type="text" name="motherAdharCardNo" id="motherAdharCardNo" placeholder="" class="form-control" maxlength="12" minlength="12">
                </div>
                <div class="form-group aj-form-group">
                    <label>Alumni</label>
                    <select class="select2 col-12" name="motherAlumni" id="motherAlumni">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
                <div class="form-group faj-form-group">
                    <label class="text-dark-medium">Upload Mother Photo ( JPEG Less Than 2MB)</label>
                    <div class="d-image-user">
                        <img src="img/avatar-female.png" id="motherImageDisplay" style="width: 200px; height:125px;">
                    </div>
                    <div class="file-in">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                        <input type="file" name="motherPhoto" id="motherPhoto" class="form-control-file" accept="image/jpg,image/jpeg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">

        <h3 class="mb-4">Guardian Details</h3>

    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12 ">
            <div class="form-group aj-form-group text-center">
                <!-- <span> Any Sibling in this School ?(Real brother/sister)</span> -->
                <div class="row-chang">
                    <div class="radio">
                        <span><input type="radio" class="gaurdian-f" name="gaurdian" checked>Father</span>
                    </div>
                    <div class="radio">
                        <span><input type="radio" class="gaurdian-f" name="gaurdian">Mother</span>
                    </div>
                    <div class="radio">
                        <span><input type="radio" class="gaurdian-bs" name="gaurdian">Others </span>
                    </div>
                </div>
            </div>
            <div class="active-div-aa" style="display: none;">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Address</label>
                            <textarea type="text" name="othersAddress" id="othersAddress" rows="7" placeholder="" class="aj-form-control"> </textarea>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group aj-form-group">
                            <label>Name</label>
                            <input type="text" name="othersName" id="othersName" placeholder="" class="form-control">
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Relations</label>
                            <select class="select2 col-12" name="othersRelation" id="othersRelation">
                                <?php
                                $string = "";
                                foreach ($GLOBAL_OTHER_RELATION as $x => $x_value) {
                                    $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                }
                                echo $string;
                                ?>
                            </select>
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Mobile No.</label>
                            <input type="text" name="othersMobileNo" id="othersMobileNo" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group faj-form-group">
                            <label class="text-dark-medium">Upload Photo ( JPEG Less Than 2MB)</label>
                            <div class="d-image-user">
                                <img src="img/avtar.png">
                            </div>
                            <div class="file-in">
                                <span class="fa fa-pencil" aria-hidden="true"></span>
                                <input type="file" name="othersPhoto" id="othersPhoto" class="form-control-file" accept="image/jpg,image/jpeg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">SMS Communication</h3>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>SMS Contact No. <span>*</span></label>
                <input type="text" name="studSMSContactNo" id="studSMSContactNo" minlength="10" maxlength="10" placeholder="" class="form-control" required="">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Whatsapp Contact No.</label>
                <input type="text" name="studWhatsAppContactNo" id="studWhatsAppContactNo" minlength="10" maxlength="10" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>E-Mail Address</label>
                <input type="text" name="studEmailAddress" id="studEmailAddress" placeholder="" class="form-control">
            </div>
        </div>
    </div>
    <!-- <div class="item-title aj-item-title f-aj-item-title">
                                <h3 class="mb-4">Documents Submited</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_1" id="docUpload_1">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_2" id="docUpload_2">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_3" id="docUpload_3">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload </label>
                                            <select class="select2" name="docUpload_4" id="docUpload_4">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div> <br><br>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                           <label>Document Upload</label>
                                            <select class="select2" name="docUpload_5" id="docUpload_5">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_6" id="docUpload_6">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_7" id="docUpload_7">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                                	<div class="form-group aj-form-group">
                                            <label>Document Upload</label>
                                            <select class="select2" name="docUpload_8" id="docUpload_8">
                                            <?php
                                            $string = "";
                                            foreach ($GLOBAL_DOC_TYPE as $x => $x_value) {
                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                            }
                                            echo $string;
                                            ?>                                      
                                            </select>
                                        </div>
                                </div>
                                
                            </div> -->
    <div class="footer-sec-aj mt-3" id="formOutput" style="display: none;"> </div>

    <div class="aaj-btn-chang-c">

        <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark submit_btn">Submit</button>

        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    $('.sibling-bs').change('.sibling-bs', function() {
        var a = $('input[name="sibling"]:checked').val();
        var id = $(this).attr('id')
        if (a == 'on') {
            $('.active-div-a').slideToggle('slow');

        } else {

        }
    })
    $('.gaurdian-bs').change('.gaurdian-bs', function() {
        var a = $('input[name="gaurdian"]:checked').val();
        var id = $(this).attr('id')
        if (a == 'on') {
            $('.active-div-aa').slideDown('slow');

        } else {
            $('.active-div-aa').slideUp('slow');
        }
    });
    $('.gaurdian-f').change(function() {
        $('.active-div-aa').slideUp('slow');
    });
    $(document).ready(function() {
        $("#studentAge").focusin(function() {
            var dob = $('#studentDOB').val();
            $("#studentAge").val(moment().diff(moment(dob, 'DD-MM-YYYY'), 'years'));
        });

        $('#newAdmission').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#formOutput').fadeIn('slow');
                    $('#formOutput').html(data);

                    $('.submit_btn').hide();

                    window.setTimeout(function() {
                        $('.hide_time').fadeOut('slow');
                    }, 3000);
                }
            });
        });

        // show submit button
        $(document).on('blur','#studentFirstName',function(){
            $('.submit_btn').show();
        });

        /* image preview */
        $('#studentPhoto').change(function() {
            var output = document.getElementById('studentImageDisplay');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        });

        $('#fatherPhoto').change(function() {
            var output = document.getElementById('fatherImageDisplay');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        });

        $('#motherPhoto').change(function() {
            var output = document.getElementById('motherImageDisplay');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src);
            }
        });

    });

    getAllClass();

    function getAllClass() {
        $.ajax({
            url: './universal_apis.php',
            type: 'get',
            data: {
                'getAllClass': 1
            },
            dataType: 'json',
            success: function(data) {
                var classData = JSON.parse(JSON.stringify(data));
                var html = '<option value="">Select</option>';
                for (let i = 0; i < classData.length; i++) {
                    const classRow = classData[i];

                    html += '<option value="' + classRow.Class_Id + '|' + classRow.Class_No + '">' + classRow.Class_Name + '</option>';

                }
                $('.studclassToApply').html(html);
                $('#studClass').html(html);
                $('#sibling1Class').html(html);
                $('#sibling2Class').html(html);
            }
        });
    }
    get_discount();


    function get_discount() {
        var disc_data = '<option value="0">Select Discount Category</option>';
        const discount_url = './universal_apis.php?get_all_discounts=1';
        $.getJSON(discount_url, function(disc_resp) {
            $.each(disc_resp, function(key, value) {
                disc_data += '<option value="' + value.Concession_Id + '">' + value.Concession_Name + '</option>';
            });
            $('#studDiscCat').html(disc_data);
        });
    }

    $('#stud_stream').change(function(){
        check_stream();
    });
    function check_stream(){
        var stream = $('#stud_stream').val();
        var class_nos = $('#studclassToApply').val();
        var class_no_arr = class_nos.split('|');
        class_no = class_no_arr[1];
        if((stream !='General') && (class_no<=10)){
            alert("Stream Should Be General If Class is Less Than 10");
        }

    }
    $(document).on('click', '#copy_address', function() {
        const comm_add = $('#commAddress').val();
        const comm_city = $('#commCityDist').val();
        const comm_state = $('#commState').val();
        const comm_country = $('#commCountry').val();
        const comm_pin = $('#commPinCode').val();
        const comm_contact = $('#commContactNo').val();
        if ($('#copy_address').is(':checked')) {
            $('#raAddress').val(comm_add);
            $('#raCityDist').val(comm_city);
            $('#raState').val(comm_state);
            $('#raCountry').val(comm_country);
            $('#raPinCode').val(comm_pin);
            $('#raContactNo').val(comm_contact);
        } else {
            $('#raAddress').val('');
            $('#raCityDist').val('');
            $('#raState').val('');
            $('#raCountry').val('');
            $('#raPinCode').val('');
            $('#raContactNo').val('');
        }
    });
</script>
<?php require_once './includes/closebody.php'; ?>