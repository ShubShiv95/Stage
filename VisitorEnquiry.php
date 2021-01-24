<?php
$pageTitle = "Visitor Enquiry";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<style type="text/css">
    #camContainer {
        width: 600px;
        height: 450px;
    }

    #camContainer video {
        width: 100% !important;
        height: 172 !important;
    }

    #picture_from_cam {
        position: absolute;
        right: 0;
        width: 100% !important;
        text-align: center;
    }

    #picture_from_cam img {
        /*border: solid 1px #000;*/
        max-width: 230px !important;
        height: 174px;
        margin: 0 auto;
    }
</style>
<script>
    function demoFromHTML(visitor) {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#visitor-list')[0];
        specialElementHandlers = {
            '#bypassme': function(element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },
            function(dispose) {
                pdf.save('Test.pdf');
            }, margins
        );
    }
</script>
<form class="new-added-form aj-new-added-form new-aj-new-added-form" action="VisitorEnquiry2.php" method="post">
    <input type="hidden" id="votp" name="votp" placeholder="" value="0" class="form-control">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Visitor Type <span>*</span></label>
                <select class="select2 col-12" id="visitortype" name="visitortype" required>
                    <option value="0">Select Visitor Type</option>
                    <?php
                    $query = 'select * from visitor_type_master where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                    $result = mysqli_query($dbhandle, $query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Eearch Inquiry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Eearch Inquiry Not Saved.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $str = '<option value="' . $row["VT_Id"] . '">' .  $row["Visitor_Type"];

                        echo $str;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Company Name</label>
                <input type="text" id="companyname" name="companyname" placeholder="" class="form-control">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Visitor Name <span>*</span></label>
                <input type="text" id="vname" name="vname" placeholder="" class="form-control" onkeypress="lettersOnly(event);" onkeyup="restrict_textlength('vname','100');" required>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Contact Number</label>
                <input type="text" id="contactno" name="contactno" placeholder="" class="form-control" onkeypress="return isNumberKey(event);" onkeyup="restrict_textlength('contactno','10');">
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Purpose <span>*</span></label>
                <select class="select2 col-12" id="purpose" name="purpose" required>
                    <option value="0">Select Visitor Purpose</option>
                    <?php
                    $query = 'select * from visit_purpose_master where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"];
                    $result = mysqli_query($dbhandle, $query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Eearch Inquiry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Eearch Inquiry Not Saved.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                        $str = '<option value="' . $row["VP_Id"] . '">' . $row["Visitor_Purpose"] . '</option>';
                        echo $str;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Location</label>
                <input type="text" id="location" name="location" placeholder="" class="form-control" onkeypress="lettersOnly(event);" onkeyup="restrict_textlength('vname','100');" required>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Person to Meet <span>*</span></label>
                <input type="text" id="personmeet" name="personmeet" placeholder="" class="form-control" required>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Number of Persons <span>*</span></label>
                <input type="text" id="nperson" name="nperson" placeholder="" class="form-control" onkeypress="return isNumberKey(event);" required>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Note</label>
                <textarea class="textarea aj-form-control" name="note" id="note" cols="10" rows="10" onkeyup="restrict_textlength('note','100');"></textarea>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="box-web-cem" id="camContainer" style="border:unset;"></div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="box-web-cem" id="picture_from_cam" style="border:unset;"></div>
        </div>
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <button type="button" onclick="take_snapshot()" class="btn-fill-lg bg-blue-dark btn-hover-yellow take-snap  valid">Take Snapshot</button>
            <input type="hidden" name="image" class="image-tag">
        </div>

        <div class="col-xl-4 col-lg-4 col-12 text-right aj-mb-2">
            <div class="form-group aj-form-group">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                <button type="button" onclick="showurl();" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
            </div>
        </div>
        <!--/div-->
</form>
<?php

//$getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vtid=vet.visitor_type_id and vpm.vpid=vet.visit_purpose_id and out_time is null or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y') and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";

//Updated by removing condition "or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y')" from the above sql. 
$getVisitorEnquiry_sql = "select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as Visitor_Type,vpm.visitor_purpose as Visitor_Purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vt_id=vet.visitor_type_id and vpm.vp_id=vet.visit_purpose_id and out_time is null  and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
//echo $getVisitorEnquiry_sql;

$getVisitorEnquiry_result = mysqli_query($dbhandle, $getVisitorEnquiry_sql);
$rowcount = $getVisitorEnquiry_result->num_rows;
if (!$getVisitorEnquiry_result) {
    $error_msg = mysqli_error($dbhandle);
    $sql = "";
    $el = new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('View Feedback Note', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
    //$_SESSION["MESSAGE"]="<h1>Database Error: Not able to Fetch Student Enquiry list array. Please try after some time.</h1>";
    //$dbhandle->query("unlock tables");
    //mysqli_rollback($dbhandle);
    //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    //$messsage='Error: Admission Enquiry Not Saved.  Please consult application consultant.';
    // $str_end='</div>';
    //echo $str_start.$messsage.$str_end;
}
?>

<div class="col-lg-12">
    <div class="d-grid-a mt-5">
        <h6 class="text-left"><b>Total Visitors Found:</b> <span>48</span></h6>
        <h6><b>From Date:</b> <span>01-08-2020</span></h6>
        <h6><b>To Date:</b> <span>10-08-2020</span></h6>
        <h6><b>Out Time Not Defined:</b> <span>5</span></h6>
        <h6 class="text-right"><a href="javascript:void(0);"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-print" aria-hidden="true"></i></a></h6>
    </div>
</div>
<div class="Attendance-staff">
    <div class="table-responsive">
        <table class="table" id="visitor-list">
            <thead>
                <tr>
                    <th style="width: 6%;">S No.</th>
                    <th style="width: 15%;">Visitor Name</th>
                    <th style="width: 10%;">Purpose</th>
                    <th style="width: 10%;">Contact No.</th>
                    <th style="width: 10%;">Address</th>
                    <th style="width: 10%;">No Of Person</th>
                    <th style="width: 10%;">Date</th>
                    <th style="width: 10%;">In Time</th>
                    <th style="width: 14%;">Out Time</th>
                    <th style="width: 10%;">Photo</th>
                    <th width="20%">Print</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cnt = 1;
                while ($getVisitorEnquiry_row = $getVisitorEnquiry_result->fetch_assoc()) {

                    //Preparing delimetered data for  Hidden textbox data for pringing purpose
                    $str = 'SLNo.-' . $cnt;
                    $str = $str . ';Visitor Name-' . $getVisitorEnquiry_row["Visitor_Name"];
                    //$str= $str . ';Visitor Type-'. $getVisitorEnquiry_row["visitor_type"];
                    $str = $str . ';Purpose-' . $getVisitorEnquiry_row["Visitor_Purpose"];
                    $str = $str . ';Contact Number-' . $getVisitorEnquiry_row["Contact_No"];
                    $str = $str . ';Address-' . $getVisitorEnquiry_row["Location"];
                    $str = $str . ';Number of Person-' . $getVisitorEnquiry_row["No_Of_Person"];
                    $str = $str . ';Visiging Date-' . $getVisitorEnquiry_row["Date_Of_Visit"];
                    $str = $str . ';In Time-' . $getVisitorEnquiry_row["In_Time"];
                    //End of Delimetered data preparation.    

                    echo '<tr id=id="visitor"' . $cnt . '>
                                <td>' . $cnt . '</td>
                                <td>' . $getVisitorEnquiry_row["Visitor_Name"] .  '</td>
                                <!--td>' . $getVisitorEnquiry_row["Visitor_Type"] .  '</td-->
                                <td>' . $getVisitorEnquiry_row["Visitor_Purpose"] .  '</td>
                                <td>' . $getVisitorEnquiry_row["Contact_No"] .  '</td>
                                <td>' . $getVisitorEnquiry_row["Location"] .  '</td>
                                <td>' . $getVisitorEnquiry_row["No_Of_Person"] .  '</td>
                                <td>' . $getVisitorEnquiry_row["Date_Of_Visit"] .  '</td>
                                <td>' . $getVisitorEnquiry_row["In_Time"] .  '</td>
                                <!--td id="td_outtime' . $cnt . '">' . ($getVisitorEnquiry_row["Out_Time"] != "" ? $getVisitorEnquiry_row["Out_Time"] : '<input type="time" step="1" min=' . "'1:00'" . " max='12:59' " . ' id="outtime' . $cnt . '" name="outtime" class="form-control"> <img src="img/update-icon.png" class="update" alt="update" onClick="outtime(' . "'outtime" . $cnt . "'," . $getVisitorEnquiry_row["VE_Id"] .  ",'td_outtime" . $cnt . "'" . ');">') . ' </td-->
                                <td id="td_outtime' . $cnt . '">' . ($getVisitorEnquiry_row["Out_Time"] != "" ? $getVisitorEnquiry_row["Out_Time"] : '<input type="time" step="1" min=' . "'1:00'" . " max='12:59' " . ' id="outtime' . $cnt . '" name="outtime" class="form-control" style="width:100px;"> <img src="img/update-icon-small.jpg" style="font-size:24px;"  onClick="outtime(' . "'outtime" . $cnt . "'," . $getVisitorEnquiry_row["VE_Id"] .  ",'td_outtime" . $cnt . "'" . ');" />') . ' </td>

                                <td class="text-center"><a href="app_images/visitors/visitor' . $getVisitorEnquiry_row["VE_Id"] . '.png"><img src="app_images/visitors/visitor' . $getVisitorEnquiry_row["VE_Id"] . '.png" alt="visitor" height="40px" width="40px"></a></td>
                                <td>Print <input type="hidden" id="printval' . $cnt . '" value=" ' . $str . '"> </td>
                            </tr>';
                    $cnt++;
                }
                ?>
            </tbody>
        </table>
        <?php
        // May be used in Printing Process if search record count value is required :: The below input control contains total number of records generated in search list above in the table structure.
        echo '<input type="hidden" id="searchlistcount" value="' . $cnt . '">';
        ?>
    </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<script language="JavaScript">
    var data_uri;
    Webcam.set({
        width: 520,
        height: 172,
        image_format: 'jpeg',
        jpeg_quality: 120
    });
    Webcam.attach('#camContainer');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('picture_from_cam').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>
<script>
    function outtime(outtime_control, visitor_id, target_td) //Function used to update visitor outtime in visitor module.
    {
        var outtime = document.getElementById(outtime_control).value;
        var xmlhttp;
        if (outtime == "") {
            alert('Please Provide Outtime.');
            return;
        }
        //alert(outtime);
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(target_td).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "updateOuttime.php?outtime=" + outtime + "&veid=" + visitor_id + "&target_td=" + target_td, true);
        xmlhttp.send();
    }
</script>
<?php require_once './includes/closebody.php'; ?>