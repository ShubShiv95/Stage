<?php
$pageTitle = "Visitor Search";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
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
<form class="new-added-form aj-new-added-form new-aj-new-added-form" action="VisitorSearch2.php" method="post" id="FrmVisitorSearch">
    <div class="row">

        <!--/div-->

        <?php

        //$getVisitorEnquiry_sql="select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vtid=vet.visitor_type_id and vpm.vpid=vet.visit_purpose_id and out_time is null or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y') and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";

        //Updated by removing condition "or date_format(vet.created_on,'%d-%m-%y')=date_format(now(),'%d-%m-%y')" from the above sql. 
        $getVisitorEnquiry_sql = "select vet.*,date_format(vet.created_on,'%d-%m-%Y') as createdon,vtm.visitor_type as visitor_type,vpm.visitor_purpose as visit_purpose from visitor_enquiry_table vet, visitor_type_master vtm, visit_purpose_master vpm where vtm.vt_id=vet.visitor_type_id and vpm.vp_id=vet.visit_purpose_id and out_time is null  and vet.school_id=" . $_SESSION["SCHOOLID"] . " order by date_of_visit desc";
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

        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Visitor Type <span>*</span></label>
                <select class="select2 col-12" id="visitortype" name="visitortype">
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
                        $str = '<option value="' . $row["VT_Id"] . '">Class ' . $row["Visitor_Type"];
                        echo $str;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Purpose <span>*</span></label>
                <select class="select2 col-12" id="visitpurpose" name="visitpurpose">
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
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>From Date <span>*</span></label>
                <input type="text" autocomplete="off" id="fromdate" name="fromdate" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                <i class="far fa-calendar-alt"></i>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <div class="form-group aj-form-group">
                    <label>To Date <span>*</span></label>
                    <input type="text" autocomplete="off" id="todate" name="todate" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 text-right">
            <div class="form-group aj-form-group">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Search</button>
            </div>
        </div>
    </div>
</form>
<div class="col-lg-12">
    <div class="d-grid-a mt-5">
        <h6 class="text-left"><b>Total Visitors Found:</b> <span></span></h6>
        <h6><b>From Date:</b> <span></span></h6>
        <h6><b>To Date:</b> <span></span></h6>
        <h6><b>Out Time Not Defined:</b> <span>5</span></h6>
        <h6 class="text-right"><a href="javascript:void(0);"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><a href="javascript:void(0);"><i class="fa fa-print" aria-hidden="true"></i></a></h6>
    </div>
</div>
<div class="Attendance-staff" id="search-result-div">
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

        </table>
        <?php
        // May be used in Printing Process if search record count value is required :: The below input control contains total number of records generated in search list above in the table structure.
        //echo '<input type="hidden" id="searchlistcount" value="' . $cnt . '">'; 
        ?>
    </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    var frm = $('#FrmVisitorSearch');

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
                $('div#search-result-div').html(data);
                //alert(data);
                //$('#admissionform').trigger("reset");
            },
            error: function(data) {
                //console.log('An error occurred.');
                //console.log(data);
                //alert(data);
                //$('div#msgreply').html(data);
                alert(data);
            },
        });
    });
</script>
<?php require_once './includes/closebody.php'; ?>