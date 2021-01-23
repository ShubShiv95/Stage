<?php
$pageTitle = "Add Student Attendance";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<form class="new-added-form aj-new-added-form">
    <div class="row">
        <!--div class="col-xl-4 col-lg-6 col-12 form-group"-->
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Select Class</label>
                <select class="select2 col-12" required name="classid" id="classid" onchange="showsection(this.value)">
                    <!--option value="">Please Select Class *</option-->
                    <option value="0">Please Select Class *</option>
                    <?php
                    $str = '';
                    $query = 'select Class_Id,class_name from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                    $result = $dbhandle->query($query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Attendance Entry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Class list not generated.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . '</option>';
                    }
                    //echo $str;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Select Section</label>
                <select class="select2 col-12" name="secid" id="secid" required>
                    <option value="">Please Select Section *</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Select Period</label>
                <select class="select2 col-12" name="cperiod" id="cperiod" required>
                    <option value="1">Period 1</option>
                    <option value="2">Period 2</option>
                    <option value="3">Period 3</option>
                    <option value="4">Period 4</option>
                    <option value="5">Period 5</option>
                    <option value="6">Period 6</option>
                    <option value="7">Period 7</option>
                    <option value="8">Period 8</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Select Date</label>
                <!--input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php $datetime = new DateTime();
                                                                                                                                                                        echo $datetime->format("d/m/Y"); ?>"-->
                <input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php date_default_timezone_set('Asia/Kolkata');;
                                                                                                                                                                    echo date("d/m/Y"); ?>">
                <i class="far fa-calendar-alt"></i>
            </div>
        </div>

        <div class="col-12 aaj-btn-chang text-right">
            <br>
            <button type="BUTTON" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="return getAttendanceList();">Submit</button>

        </div>
    </div>
</form>
<form class="new-added-form aj-new-added-form" action="StudentAttendanceEntry2.php" method="post">
    <div class="tebal-promotion" id="attendance-list-div">
        <!--Student Attendance List Form Starts Here-->
        <?php

        ?>
        <!--Student Attendance List Form Ends Here-->
    </div>
</form>
<?php require_once './includes/scripts.php' ?>
<script>
    function getAttendanceList() {
        var xmlhttp;
        var classid = document.getElementById("classid").value;
        var secid = document.getElementById("secid").value;
        var adt = document.getElementById("adt").value;
        //alert(adt);
        var cperiod = document.getElementById("cperiod").value;

        if (classid == 0 || secid == 0 || adt == '') {
            alert('Please select proper values for class, section, attendance date and class period.');
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('attendance-list-div').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST", "GetStudentAttendanceList.php?classid=" + classid + "&secid=" + secid + "&adt=" + adt + "&period=" + cperiod, true);
        xmlhttp.send();
    }
</script>
<script type="text/javascript">
    function calc_attendance() {
        var present_count = 0;
        var late_count = 0;
        var halfday_count = 0;
        var abscent_count = 0;
        total_count = document.getElementById("total_count").value;
        for (i = 1; i <= total_count; i++) {
            if (document.getElementById(i + 'present').checked) {
                present_count++;
            } else if (document.getElementById(i + 'late').checked) {
                late_count++;
                present_count++;
            } else if (document.getElementById(i + 'halfday').checked) {
                halfday_count++;
                present_count++;
            } else {
                abscent_count++;
            }
        }
        document.getElementById("presentno").value = present_count;
        document.getElementById("lateno").value = late_count;
        document.getElementById("halfdayno").value = halfday_count;
        document.getElementById("absentno").value = abscent_count;
    }
</script>
<script>
    function showsection(str) {
        var xmlhttp;
        if (str == "") {
            document.getElementById("section").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("secid").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getSectionList.php?classid=" + str, true);
        xmlhttp.send();
    }
</script>
<?php require_once './includes/closebody.php'; ?>