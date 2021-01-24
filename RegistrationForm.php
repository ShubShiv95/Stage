<?php
$pageTitle = "Registration Form";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form aj-new-added-form">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>First Name (As Per Birth Certificate) <span>*</span></label>
                <input type="text" name="f_f_name" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Middle Name</label>
                <input type="text" name="f_m_name" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Last Name</label>
                <input type="text" name="f_l_name" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Class *</label>
                <select class="select2 col-12" name="f_class">
                    <option value="">Please Select Class <span>*</span></option>
                    <option value="1">Play</option>
                    <option value="2">Nursery</option>
                    <option value="3">One</option>
                    <option value="3">Two</option>
                    <option value="3">Three</option>
                    <option value="3">Four</option>
                    <option value="3">Five</option>
                </select>
            </div>




            <div class="form-group aj-form-group">
                <label>Gender *</label>
                <select class="select2 col-12" name="f_Gender">
                    <option value="">Please Select Gender <span>*</span></option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Others</option>
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Date of Birth *</label>
                <input type="text" name="f_dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                <i class="far fa-calendar-alt"></i>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Age</label>
                <input type="text" name="f_age" placeholder="" class="form-control">
            </div>

            <div class="form-group aj-form-group">
                <label>Social Category *</label>
                <select class="select2 col-12" name="f_social_c">
                    <option value="">-- SELECT SOCIAL CATEGORY --</option>
                    <option value="">GENERAL</option>
                    <option value="">OBC</option>
                    <option value="">PHYSICALLY DISABLED</option>
                    <option value="">SC</option>
                    <option value="">SINGLE CHILD</option>
                    <option value="">ST</option>
                </select>
            </div>

            <div class="form-group aj-form-group">
                <label>Academic Session *</label>
                <select class="select2 col-12" name="f_academic_session">
                    <option value="">-- SELECT Session --</option>
                    <option value="10">2015</option>
                    <option value="10">2016</option>
                    <option value="10">2017</option>
                    <option value="10">2018</option>
                    <option value="10">2019</option>
                    <option value="10">2020</option>

                </select>
            </div>

            <div class="form-group aj-form-group">
                <label>Mother Tongue *</label>
                <select class="select2 col-12" name="f_mother_tongue">
                    <option value="">-- SELECT MOTHERTONGUE --</option>
                    <option value="">1-ASSAMESE</option>
                    <option value="">10-MARATHI</option>
                    <option value="">11-NEPALI</option>
                    <option value="">12-ORIYA</option>
                    <option value="">13-PUNJABI</option>
                    <option value="">14-SANSKRIT</option>
                    <option value="">15-SINDHI</option>
                    <option value="">16-TAMIL</option>
                    <option value="">17-TELUGU</option>
                    <option value="">18-URDU</option>
                    <option value="">19-ENGLISH</option>
                    <option value="">2-BENGALI</option>
                    <option value="">20-BODO</option>
                    <option value="">22-DOGRI</option>
                    <option value="">29-FRENCH</option>
                    <option value="">3-GUJARATI</option>
                    <option value="">4-HINDI</option>
                    <option value="">5-KANNADA</option>
                    <option value="">51-MAITHILI</option>
                    <option value="">56-RAJASTHANI</option>
                    <option value="">6-KASHMIRI</option>
                    <option value="">7-KONKANI</option>
                    <option value="">8-MALAYALAM</option>
                    <option value="">8-MANIPURI</option>
                    <option value="">99-Other Languages</option>
                </select>
            </div>

            <div class="form-group aj-form-group">
                <label>Religion *</label>
                <select class="select2 col-12" name="f_religion">
                    <option value="">-- SELECT RELIGION --</option>
                    <option value="6">BUDDHIST</option>
                    <option value="3">CHRISTIAN</option>
                    <option value="1">HINDU</option>
                    <option value="4">JAIN</option>
                    <option value="2">MUSLIM</option>
                    <option value="8">OTHERS</option>
                    <option value="5">SIKH</option>
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Nationality *</label>
                <select class="select2 col-12" name="f_nationality">
                    <option value="">-- SELECT NATIONALITY --</option>
                    <option value="3">AMERICAN</option>
                    <option value="4">CANADIAN</option>
                    <option value="6">CHINESE</option>
                    <option value="1">INDIAN</option>
                    <option value="12">NEPALI</option>
                    <option value="11">OTHERS</option>
                    <option value="8">PAKISTANI</option>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">


            <div class="form-group aj-form-group">
                <label>Blood Group *</label>
                <select class="select2 col-12" name="f_blood_group">
                    <option value="">-- SELECT BLOOD GROUP --</option>
                    <option value="1">A +</option>
                    <option value="2">A -</option>
                    <option value="5">AB +</option>
                    <option value="6">AB -</option>
                    <option value="3">B +</option>
                    <option value="4">B -</option>
                    <option value="7">O +</option>
                    <option value="8">O -</option>
                </select>
            </div>
            <div class="form-group aj-form-group">
                <label>Adhaar Card No.</label>
                <input type="text" name="f_adhaar_card_no" placeholder="" class="form-control">
            </div>

            <div class="form-group faj-form-group">
                <label class="text-dark-medium">Upload Student Photo ( JPEG Less Than 2MB)</label>
                <div class="d-image-user">
                    <img src="img/avtar.png">
                </div>
                <div class="file-in">
                    <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                    <input type="file" name="f_student_photo" class="form-control-file">
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
                <label>School Details</label>
                <input type="text" name="sd_school_details" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Medium of Instrction</label>
                <select class="select2 col-12" name="sd_board">
                    <option value="">SELECT Medium of Instrction</option>
                    <option value="1">English</option>
                    <option value="2">Hindi</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Board</label>
                <select class="select2 col-12" name="sd_board">
                    <option value="">SELECT BOARD</option>
                    <option value="1">CBSE</option>
                    <option value="2">ICSE</option>
                    <option value="3">OTHERS</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12">
            <div class="form-group aj-form-group">
                <label>Class</label>
                <select class="select2 col-12" name="sd_class">
                    <option value="">SELECT CLASS</option>
                    <option value="15">NUR</option>
                    <option value="16">PREP</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="17">Misc</option>
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
                <label>Communication Address <span>*</span></label>
                <textarea type="text" rows="4" name="ra_address" required="" placeholder="" class="aj-form-control"> </textarea>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> Country <span>*</span></label>
                <input type="text" name="ra_country" required="" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>State <span>*</span></label>
                <input type="text" name="ra_state" required="" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>City/ District <span>*</span> </label>
                <input type="text" name="ra_city_district" required="" placeholder="" class="form-control">

            </div>
            <div class="form-group aj-form-group">
                <label> Pincode <span>*</span></label>
                <input type="text" name="ra_pincode" required="" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 ">
            <div class="form-group aj-form-group">
                <label> Contact No.</label>
                <input type="text" minlength="12" maxlength="12" name="ra_telephone" placeholder="" class="form-control">
            </div>
        </div>
    </div>
    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">Residential Address</h3>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Address <span>*</span></label>
                <textarea type="text" rows="4" name="ra_address" placeholder="" class="aj-form-control"> </textarea>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label> Country</label>
                <input type="text" name="ra_country" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>State </label>
                <input type="text" name="ra_state" placeholder="" class="form-control">
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>City/ District <span>*</span> </label>
                <input type="text" name="ra_city_district" required="" placeholder="" class="form-control">

            </div>

            <div class="form-group aj-form-group">
                <label> Pincode </label>
                <input type="text" name="ra_pincode" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12">
            <div class="form-group aj-form-group">
                <label> Contact No.</label>
                <input type="text" name="ra_telephone" placeholder="" class="form-control">
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
                    <label> Father's Name (As Per Birth Certificate) </label>
                    <input type="text" name="fa_d_name" placeholder="" class="form-control">

                </div>
                <div class="form-group aj-form-group">
                    <label> Qualification <span>*</span> </label>
                    <select class="select2 col-12" name="fa_d_qualification">
                        <option value="">Select City</option>
                        <option value="15^NEW DELHI^INDIA">DELHI</option>
                        <option value="7^U.P^INDIA">GHAZIABAD</option>
                        <option value="36^U.P^INDIA">Greater Noida West</option>
                        <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                        <option value="5^U.P^INDIA">NOIDA</option>
                        <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label>Occupation </label>
                    <select class="select2 col-12" name="fa_d_occupation">
                        <option value="">Select City</option>
                        <option value="15^NEW DELHI^INDIA">DELHI</option>
                        <option value="7^U.P^INDIA">GHAZIABAD</option>
                        <option value="36^U.P^INDIA">Greater Noida West</option>
                        <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                        <option value="5^U.P^INDIA">NOIDA</option>
                        <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label> Designation <span>*</span></label>
                    <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Org Name <span>*</span></label>
                    <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Org Address </label>
                    <input type="text" name="fa_d_org_address" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> City <span>*</span></label>
                    <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                <div class="form-group aj-form-group">
                    <label> State </label>
                    <input type="text" name="fa_d_state" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Country </label>
                    <input type="text" name="fa_d_country" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Pincode </label>
                    <input type="text" name="fa_d_pincode" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Email <span>*</span></label>
                    <input type="text" name="fa_d_email" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Telephone </label>
                    <input type="text" name="fa_d_telephone" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Mobile <span>*</span> </label>
                    <input type="text" name="fa_d_mobile" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Annual Income </label>
                    <input type="text" name="fa_d_annual_income" placeholder="" class="form-control">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-12">
                <div class="form-group aj-form-group">
                    <label> Adhaar Card No. </label>
                    <input type="text" name="fa_d_adhaar_card_no" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label>Alumni </label>
                    <select class="select2 col-12" name="fa_d_alumni">
                        <option value="">No</option>
                        <option value="">Yes</option>

                    </select>
                </div>
                <div class="form-group faj-form-group">
                    <label class="text-dark-medium">Upload Father Photo ( JPEG Less Than 2MB)</label>
                    <div class="d-image-user">
                        <img src="img/avtar.png">
                    </div>
                    <div class="file-in">
                        <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                        <input type="file" name="fa_d_father_photo" class="form-control-file">
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
                    <input type="text" name="mo_d_mother" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Qualification * </label>
                    <select class="select2 col-12" name="mo_d_qualification">
                        <option value="">-- Select City --</option>
                        <option value="15^NEW DELHI^INDIA">DELHI</option>
                        <option value="7^U.P^INDIA">GHAZIABAD</option>
                        <option value="36^U.P^INDIA">Greater Noida West</option>
                        <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                        <option value="5^U.P^INDIA">NOIDA</option>
                        <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label>Occupation </label>
                    <select class="select2 col-12" name="mo_d_occupation">
                        <option value="">Select City</option>
                        <option value="15^NEW DELHI^INDIA">DELHI</option>
                        <option value="7^U.P^INDIA">GHAZIABAD</option>
                        <option value="36^U.P^INDIA">Greater Noida West</option>
                        <option value="2^NEW DELHI^INDIA">NEW DELHI</option>
                        <option value="5^U.P^INDIA">NOIDA</option>
                        <option value="37^U.P^INDIA">NOIDA EXTENSION</option>
                    </select>
                </div>
                <div class="form-group aj-form-group">
                    <label> Designation <span>*</span></label>
                    <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Org Name <span>*</span></label>
                    <input type="text" name="mo_d_org_name" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Org Address </label>
                    <input type="text" name="mo_d_org_address" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> City <span>*</span></label>
                    <input type="text" name="fa_d_org_name" placeholder="" class="form-control">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                <div class="form-group aj-form-group">
                    <label> State </label>
                    <input type="text" name="mo_d_state" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Country </label>
                    <input type="text" name="mo_d_country" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Pincode </label>
                    <input type="text" name="mo_d_pincode" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Email <span>*</span></label>
                    <input type="text" name="mo_d_email" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Telephone </label>
                    <input type="text" name="mo_d_telephone" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Mobile <span>*</span> </label>
                    <input type="text" name="mo_d_mobile" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Annual Income </label>
                    <input type="text" name="mo_d_annual_income" placeholder="" class="form-control">
                </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-12">
                <div class="form-group aj-form-group">
                    <label> Adhaar Card No. </label>
                    <input type="text" name="mo_d_adhaar_card_no" placeholder="" class="form-control">
                </div>
                <div class="form-group aj-form-group">
                    <label> Alumni</label>
                    <select class="select2 col-12" name="mo_d_alumni">
                        <option value="">No</option>
                        <option value="">Yes</option>

                    </select>
                </div>
                <div class="form-group faj-form-group">
                    <label class="text-dark-medium">Upload Mother Photo ( JPEG Less Than 2MB)</label>
                    <div class="d-image-user">
                        <img src="img/avatar-female.png">
                    </div>
                    <div class="file-in">
                        <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                        <input type="file" name="mo_d_mother_photo" class="form-control-file">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="item-title aj-item-title f-aj-item-title">
        <h3 class="mb-4">Gaurdian Details</h3>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="form-group aj-form-group text-center">
                <!-- <span> Any Sibling in this School ?(Real brother/sister)</span> -->
                <div class="row-chang">
                    <div class="radio">
                        <span><input type="radio" class="gaurdian-bs" name="gaurdian" checked> Father</span>
                    </div>
                    <div class="radio">
                        <span><input type="radio" class="gaurdian-bs" name="gaurdian"> Mother</span>
                    </div>
                    <div class="radio">
                        <span><input type="radio" class="gaurdian-bs" name="gaurdian"> Others </span>
                    </div>
                </div>
            </div>

            <div class="active-div-aa" style="display: none;">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group aj-form-group">
                            <label>Address</label>
                            <textarea type="text" name="gd_d_address" rows="7" placeholder="" class="aj-form-control"> </textarea>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group aj-form-group">
                            <label> Name</label>
                            <input type="text" name="gd_d_name" placeholder="" class="form-control">
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Relations </label>
                            <input type="text" name="gd_d_relations" placeholder="" class="form-control">
                        </div>
                        <div class="form-group aj-form-group">
                            <label> Mobile No.</label>
                            <input type="text" name="gd_d_mobile_no" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">


                        <div class="form-group faj-form-group">
                            <label class="text-dark-medium">Upload Photo ( JPEG Less Than 2MB)</label>
                            <div class="d-image-user">
                                <img src="img/avtar.png">
                            </div>
                            <div class="file-in">
                                <span class="fa fa-pencil-alt" aria-hidden="true"></span>
                                <input type="file" name="doc_d_photo" class="form-control-file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="footer-sec-aj">

        <div class="top3">
            <ul>
                <li>I hereby certify that the above information is accurate to the best of my knowledge and belief.
                    I understand that if any part of it is found to be false, this application will be cancelled.</li>
                <li>I fully understand that the school, on accepting the registration form of my child, is not bound to grant admission.</li>
                <li>I agree that the decision of the school administration regarding grant of admission will be final and binding on me.</li>
                <li>I understand that the school transport will be provided on specified routes / stops only.</li>
                <li>I acknowledge that the registration fee is non-refundable.</li>
                <li>I agree to follow and ensure that my child abides by all the rules, regulations and procedures laid down by the school from time-to-time.</li>
            </ul>
        </div>
        <div class="top5">
            <div class="row">
                <div class="col-lg-3 aj-mb-2">
                    <div class="form-group aj-form-group text-center">
                        <div class="row-chang">
                            <div class="radio">
                                <span><input type="checkbox" name="gaurdian" checked> I Agree</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Enter Code </label>
                        <input type="text" placeholder="XXXXXXX" name="" class="form-control">
                    </div>
                </div>
                <div class="col-xl-3 aj-mb-2">
                    <div class="number">
                        <a href="javascript:void(0)">8P12ZZ</a>
                    </div>
                </div>
                <div class="col-xl-3 aj-mb-2">
                    <div class="Refresh">
                        <a href="javascript:void(0)">Refresh</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class=" aj-aj-btn-chang-c">
        <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit</button>
        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Print Form</button>
        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Ack Recipt</button>
        <button type="submit" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Questionnaire</button>
        <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Close</button>
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
            $('.active-div-aa').slideToggle('slow');

        } else {

        }
    })
</script>
<?php require_once './includes/closebody.php'; ?>