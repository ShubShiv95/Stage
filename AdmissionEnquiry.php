<?php
$pageTitle  = "Admission Enquiry";
require_once './includes/header.php';
require_once './includes/navbar.php';
include 'AdmissionModel.php';
?>
<form class="new-added-form aj-new-added-form new-aj-new-added-form" id="admissionform" method="post" action="AdmissionEnquiry2.php">
    <input type="hidden" id="votp" name="votp" placeholder="" value="0" class="form-control" required>
    <div class="row">


        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Student Name <span>*</span></label>
                <input type="text" id="sname" name="sname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" required onClick="togglediv();">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Enquirer Name <span>*</span></label>
                <input type="text" id="enqname" name="enqname" placeholder="" class="form-control" required onkeypress="lettersOnly(event);">

            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Enquirer Relation <span>*</span></label>
                <select class="select2 col-12" id="enqrel" name="enqrel" required>
                    <?php
                    $html = '<option value="">Select Option Values *</option>';
                    foreach ($GLOBAL_OTHER_RELATION as $key => $value) {
                        $html = $html . '<option value="' . $key . '">' . $value . '</option>';
                    }
                    echo $html;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Contact Number <span>*</span></label>
                <input id="contactno" name="contactno" placeholder="" class="form-control" maxlength="10" type="number" required autocomplete="off">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Applying For Class <span>*</span></label>
                <select class="select2 col-12" id="classno" name="classno" required>
                    <option value="">Please Select Class *</option>
                    <?php
                    $query = 'select Class_Id,class_name,class_no from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                    $result = mysqli_query($dbhandle, $query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Investment Payment', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row["class_no"] < 11) {
                            $str = $str . '<option value="' . $row["class_name"] . '">' . $row["class_name"] . '</option>';
                        } else {
                            if ($row["class_no"] == 12) {
                                break;
                            }
                            $str = $str . '<option value="' . $row["class_name"] . ' - ' . $GLOBAL_CLASS_STREAM["Science"] . '">' . $row["class_name"] . ' - ' . $GLOBAL_CLASS_STREAM["Science"] . '</option>';
                            $str = $str . '<option value="' . $row["class_name"] . ' - ' . $GLOBAL_CLASS_STREAM["Commerce"] . '">' . $row["class_name"] . ' - ' . $GLOBAL_CLASS_STREAM["Commerce"] . '</option>';
                            $str = $str . '<option value="' . $row["class_name"] . ' - ' . $GLOBAL_CLASS_STREAM["Arts"] . '">' . $row["class_name"] . ' - ' . $GLOBAL_CLASS_STREAM["Arts"] . '</option>';
                        }
                    }
                    echo $str;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Applying for Session <span>*</span></label>
                <select class="select2 col-12" id="session" name="session" required>
                    <option value="">Please Select Session *</option>
                    <option value="2020-2021">2020-2021</option>
                    <option value="2019-2020">2019-2020</option>

                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="form-group aj-form-group">
                <label>Any Sibling <span>*</span></label>
                <select class="select2 col-12" id="anysib" name="anysib" required>
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Select Locality</label>
                <select class="select2 col-12" id="locality" name="locality">
                    <option value="">Please Select Locality</option>
                    <?php
                    $query = 'select locationid,location_name from marketting_location_table where School_Id=' . $_SESSION["SCHOOLID"];
                    $result = mysqli_query($dbhandle, $query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Admission Eqnuiry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate location list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row["locationid"] . '">' . $row["location_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Email ID</label>
                <input type="email" id="email" name="email" placeholder="" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="form-group aj-form-group">
                <label>Lead Source <span>*</span></label>
                <select class="select2 col-12" id="lsource" name="lsource" required>
                    <option value="">Please Select Lead *</option>
                    <?php
                    $query = 'select leadid,lead_source_name from lead_source_table where School_Id=' . $_SESSION["SCHOOLID"];
                    $result = mysqli_query($dbhandle, $query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Admission Eqnuiry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate location list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Admission Enquiry Not Saved.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row["leadid"] . '">' . $row["lead_source_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">

                <label>Follow Up Date <span>*</span></label>
                <input type="text" id="fdate" name="fdate" placeholder="dd/mm/yyyy" class="form-control air-datepicker future-date" autocomplete="off" data-position='bottom right' required>
                <i class="far fa-calendar-alt"></i>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">

                <label>Remarks</label>
                <textarea class="textarea form-control" name="remarks" id="remarks" cols="40" rows="5"></textarea>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <label>Enter OTP</label>
                <input type="text" id="otptoverify" name="otptoverify" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">
                <button type="button" name="otpbtn" id="otpbtn" class="btn-fill-lmd radius-4 text-light bg-true-v btn-hover-bluedark" onclick="generateOtp();">Generate OTP</button><input type="hidden" id="otp" name="otp" />
                <button type="button" name="votpbtn" id="votpbtn" class="btn-fill-lmd radius-4 text-light bg-dark-pastel-green btn-hover-bluedark" onclick="verifyOtp();">Verify OTP</button>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 text-right">
            <button type="button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="frm.submit();">Save</button>
            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
        </div>

        <div class="col-xl-4 col-lg-4 col-12 ">
            <div class="form-group aj-form-group">

                <label id="otpverifymsg">&nbsp;&nbsp;</label>
            </div>
        </div>
    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    var frm = $('#admissionform');

    frm.submit(function(e) {
        //alert(data);
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function(data) {
                //console.log('Submission was successful.');
                //console.log(data);
                //alert(data);
                //$('div#msgreply').html(data);
                //alert(data);
                //$('div#msgreply').html(data);
                $('div#output-message').html(data);

                $('#admissionform').trigger("reset");
            },
            error: function(data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                //$('div#msgreply').html(data);
                //alert(data);

                $('div#output-message').html(data);
            },
        });
    });
</script>
<script>
    function generateOtp() {
        var mobileno = document.getElementById('contactno').value;
        var xmlhttp;
        if (mobileno == "") {
            alert('Please Provide the Contact Numebr.');
            return;
        }
        //document.getElementById('otpverifymsg').innerHTML=' - OTP Sent';
        //alert(outtime);
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('otp').value = xmlhttp.responseText;
                document.getElementById('otpverifymsg').innerHTML = ' OTP Sent - Verify Now';
                //alert('OTP'+ xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "sendOtp.php?mobileno=" + mobileno, true);
        xmlhttp.send();
    }

    function verifyOtp() {

        var otp = document.getElementById('otp').value;
        var verifyingotp = document.getElementById('otptoverify').value;
        //alert('Generated OTP is ' + otp + ' and verifying OTP is ' + verifyingotp)
        if (otp == verifyingotp) {
            //alert("OTP Verified.")
            document.getElementById('votp').value = 1;
            document.getElementById('otpverifymsg').innerHTML = ' - Verified.';
        } else {
            //alert("Invalid OTP.")
            document.getElementById('votp').value = 0;
            document.getElementById('otpverifymsg').value = 'Invalid OTP.';
        }

    }

    function togglediv() {
        var x = document.getElementById("output-message");
        if (x.style.display === "block") {
            x.style.display = "none";
        }
    }
</script>
<?php require_once './includes/closebody.php'; ?>