<?php
$pageTitle = "Create Certirficate";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center text-uppercase" style="margin-top: 400px;">
            <h2 style="font-weight: bold;"><span class="certificate_header"></span></h2>
        </div>
        <div class="col-6" style="margin-top: 40px;">
            <span style="border-bottom: 1px dotted black;"> No :</span>
            <span style="border-bottom: 1px dotted black;" class="admission_no"> 123/2021</span>
        </div>
        <div class="col-6 text-right" style="margin-top: 40px;">
            <span style="border-bottom: 1px dotted black;">Date : </span>
            <span style="border-bottom: 1px dotted black;" class="date_of_release"><?php echo date('d/m/Y') ?></span>
        </div>
        <div class="col-12 text-justify" style="padding-top: 150px; background-image:url('./app_images/school_images/square_logo.jpg);">
            <!-- character certificate -->
            <p class="character_certificate" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that <span class="stud_name bol-text">Pratik Raj Yadav</span> s/o <span class="father_name bol-text">Mr. Rajesh Yadav</span> is a bonafide student of our institution from <span class="bol-text admission_date">11/04/2010</span> to <span class="bol-text last_date">19/01/2021</span>. He passed the Examination of (yeat) <span class="bol-text exam_year">2020</span>. In class <span class="bol-text last_class">10<sup>th</sup></span> as a regular candidate from this school.</p>
            <p class="character_certificate" style="display:none">His conduct and behaviour were <span class="character_type"></span>. </p>

            <!-- bonafide certificate current student -->
            <p class="bonafide_current" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that <span class="stud_name bol-text">Pratik Raj Yadav</span> s/o <span class="father_name bol-text">Mr. Rajesh Yadav & Mrs. Manju Devi</span> is a bonafide student of class <span class="bol-text last_class">10<sup>th</sup></span> In <span class="bol-text school_name">xyz, public school</span></p>

            <!-- bonafide certificate ex student -->
            <p class="bonafide_ex" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that <span class="stud_name bol-text">Pratik Raj Yadav</span> s/o <span class="father_name bol-text">Mr. Rajesh Yadav & Mrs. Manju Devi</span> was a bonafide student of our institution from <span class="bol-text admission_date">11/04/2010</span> to <span class="bol-text last_date">19/01/2021</span>.<br> He studied from <span class="bol-text start_class">1</span> to <span class="bol-text end_class">8</span> and passed his examination in <span class="bol-text exam_year">2020</span> </p>

            <!-- tution fee certificate -->
            <p class="tution_fee" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that <span class="stud_name bol-text">Pratik Raj Yadav</span> s/o <span class="father_name bol-text">Mr. Rajesh Yadav & Mrs. Manju Devi</span> is a student of class <span class="bol-text start_class">1</span>. He has paid tution fee of Rs. <span class="tution_fee_amt"></span> for the academic session <span class="academic_session"></span>.</p>

            <!-- common line for all certificates -->
            <p id="qr_data">His date of birth as recorded is (in figure) <span class="bol-text date_of_birth">16/01/2005</span> (in words) <span class="bol-text dob_in_words">Sixteen January Two Thousand Five</span>.</p>
        </div>
        <div class="col-4 mar-100">
            <div id="qrcode" style="width:200px;"></div>
        </div>
        <div class="col-8 mar-100 text-right">
            <span class="bol-text princpl">PRINCIPAL</span>
        </div>
    </div>
</div>


<!------ student character ------>
<div class="modal student_character">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Pupil Character</h6>
                <button type="button" class="close close_st_mod" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="model-tebal-in">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <form class="new-added-form aj-new-added-form Fee-collection" action="./CertificateControl_1.php" method="post">
                            <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                <input type="text" class="d-none" autocomplete="off" value="<?php echo $_GET['studentid']; ?>" name="student_id">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2 mt-3 ml-1 row">
                                    <div class="form-group aj-form-group col-xl-10 col-lg-10 col-12">
                                        <label>Student Character</label>
                                        <input type="text" id="student_name" name="student_name" placeholder="" autocomplete="off" required="" class="form-control">
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-1 aj-mb-2">
                                        <button type="submit" name="character_sender" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" id="search_data">Save</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    p {
        line-height: 80px;
        font-size: 30px;
    }

    .bol-text {
        font-weight: bold;
    }

    .tab4 {
        tab-size: 8;
    }

    .mar-100 {
        margin: 100px 0px 0px 0px
    }

    .admission_no,
    .date_of_release,
    .princpl {
        font-size: 30px;
    }
</style>
<?php
require_once './includes/scripts.php';
?>
<script>
    $(document).ready(function() {
        change_header();

        function change_header() {
            var cert_type = "<?php echo $_GET['type'] ?>";

            if (cert_type == 'bonafide_curr') {
                $('.certificate_header').text("Bonafide Certificate");
                $('.bonafide_current').fadeIn();
                $('.character_certificate').remove();
                $('.tution_fee').remove();
                $('.bonafide_ex').remove();
                $('.tution_fee').remove();
                $('.qr_data').remove();
            } else if (cert_type == 'bonafide_ex') {
                $('.certificate_header').text("Bonafide Certificate");
                $('.character_certificate').remove();
                $('.tution_fee').remove();
                $('.bonafide_current').remove();
                $('.bonafide_ex').fadeIn();
                $('.tution_fee').remove();
                $('.qr_data').remove();
            } else if (cert_type == 'character') {
                $('.student_character').fadeIn();
                $('.certificate_header').text("Character Certificate");
                $('.character_certificate').fadeIn();
                $('.tution_fee').remove();
                $('.bonafide_current').remove();
                $('.bonafide_ex').remove();
                $('.tution_fee').remove();
                $('.qr_data').remove();
            } else if (cert_type == 'slc') {
                $('.certificate_header').text("School Leaving Certificate");
            } else if (cert_type == 'tution_fee') {
                $('.certificate_header').text("Tution Fee Certificate");
                $('.tution_fee').fadeIn('slow');
                $('.character_certificate').remove();
                $('.bonafide_current').remove();
                $('.bonafide_ex').remove();
                $('.tution_fee').remove();
                $('.qr_data').remove();
            }
        }

        $('.close_st_mod').click(function(){
            var character_type = $('.character_type').text();
            if(character_type == ''){
                alert("Please Type Character of Pupil");
            }
            else{
                $('.student_character').fadeOut();
            }
        });
    });
</script>
<?php
require_once './includes/closebody.php';

?>