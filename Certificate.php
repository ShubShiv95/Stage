<?php
$pageTitle = "Create Certirficate";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center pb-4 mt-4" style="margin-top: 120px; border-bottom:2px double black;">
            <img src="./app_images/school_images/logo.jpeg" alt="" class="w-100">
            <h4>Affiliated by : CBSE 1014/2008</h4>
            <h4>Bokaro, Sector-4, Bloack-A, Bokaro Steel City, Bokaro, Jharkhand</h4>
            <h4>Phone : +91-9821012458</h4>
        </div>
        <div class="col-12 text-center text-uppercase" style="margin-top: 110px;">
            <h2 style="font-weight: bold;">Character Certifiate</h2>
        </div>
        <div class="col-6" style="margin-top: 40px;">
            <span style="border-bottom: 1px dotted black;"> No :</span>
            <span style="border-bottom: 1px dotted black;" class="admission_no"> 123/2021</span>
        </div>
        <div class="col-6 text-right" style="margin-top: 40px;">
            <span style="border-bottom: 1px dotted black;">Date : </span>
            <span style="border-bottom: 1px dotted black;" class="date_of_release">11/01/2021</span>
        </div>
        <div class="col-12 text-justify" style="padding-top: 150px; background-image:url('./app_images/school_images/square_logo.jpg)">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that <span class="stud_name bol-text">Pratik Raj Yadav</span> s/o <span class="father_name bol-text">Mr. Rajesh Yadav</span> is a bonafide student of our institution from <span class="bol-text admission_date">11/04/2010</span> to <span class="bol-text last_date">19/01/2021</span>. He passed the Examination of (yeat) <span class="bol-text exam_year">2020</span>. In class <span class="bol-text last_class">10<sup>th</sup></span> as a regular candidate from this school.</p>
            <p>His conduct and behaviour were good. </p>
            <p>His date of birth as recorded is (in figure) <span class="bol-text date_of_birth">16/01/2005</span> (in words) <span class="bol-text dob_in_words">Sixteen January Two Thousand Five</span>.</p>
        </div>
        <div class="col-12 text-right" style="margin:100px 0px 0px 0px;">
            <span class="bol-text">PRINCIPAL</span>
        </div>
    </div>
</div>
<style>
    p{
        line-height: 40px;
    }
    .bol-text{
        font-weight: bold;
    }
    .tab4{
        tab-size: 8;
    }
</style>
<?php
require_once './includes/scripts.php';
?>
<script>
    $(document).ready(function() {

    });
</script>
<?php
require_once './includes/closebody.php';

?>