<?php
$pageTitle = "Student Attendance MEssage";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" action="StudentAttendanceMsgPost.php" method="post">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <div class="tebal-promotion">
                <!--h5 class="text-center">Student Attendence Message</h5-->
                <div class="row justify-content-center mb-4">
                    <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Select Date </label>
                            <input type="text" name="daa" id="doa" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right'>
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-12">
                        <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark" onclick="return getPenAttendMsgList();">Get Attendence</button>
                    </div>
                </div>
                <div class="row justify-content-center mb-4" id="div-AttendanceStatus">

                </div>

            </div>
        </div>

    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script>
    function getPenAttendMsgList() {
        var xmlhttp;
        var doa = document.getElementById("doa").value;
        if (doa == "") {
            document.getElementById("doa").innerHTML = "";

            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("div-AttendanceStatus").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getPendingAttendanceSMSList.php?doa=" + doa, true);
        xmlhttp.send();
    }
</script>
<?php require_once './includes/closebody.php'; ?>