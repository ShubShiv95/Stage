<?php
$pageTitle = "Followup Note";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<?php
$aeid = $_REQUEST["aeid"];
$query = "select date_format(aet.followup_date,'%d %M %Y') as Followup_Date,aet.*,mlt.location_name as location_name,lst.lead_source_name as lead_source_name from admission_enquiry_table aet,marketting_location_table mlt, lead_source_table lst where AEID=" . $_REQUEST["aeid"] . ' and mlt.locationid=aet.locality_id and lst.leadid=aet.lead_id';
//echo $query;
$result = mysqli_query($dbhandle, $query);
if (!$result) {
    $error_msg = mysqli_error($dbhandle);
    $sql = "";
    $el = new LogMessage();
    //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
    $el->write_log_message('Admission Eqnuiry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
    $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to Fetch Student Enquiry list array. Please try after some time.</h1>";
    $dbhandle->query("unlock tables");
    mysqli_rollback($dbhandle);
    $str_start = '<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
    $messsage = 'Error: Admission Enquiry Not Saved.  Please consult application consultant.';
    $str_end = '</div>';
    echo $str_start . $messsage . $str_end;
}
$result_row = $result->fetch_assoc();
?>


<div class="new-added-form aj-new-added-form new-aj-new-added-form">
    <div class="row ">
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Student Name :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["STUDENT_NAME"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Enquirer Relation :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["ENQUIRER_RELATION"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Email Id :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["EMAIL_ID"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Applying For Class :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["Class"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Lead Scurce :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["lead_source_name"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Any Sibling :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["SIBLING"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Remarks :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["REMARKS"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Enquirer Name :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["ENQUIRER_NAME"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Contact Number :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5> <?php echo $result_row["MOBILE_NO"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Locality :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5> <?php echo $result_row["location_name"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Applying For Session :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["SESSION"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Follow Up Date :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["Followup_Date"]; ?></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><b>Enquiry Status :</b></h5>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="detial-content-in-note">
                <h5><?php echo $result_row["ENQUIRY_STATUS"]; ?></h5>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12">
            <hr>
            <div class="row justify-content-center ">
                <div class="col-lg-9 col-xl-9 mt-5 box-bac-chang-aj">
                    <?php
                    $getFeedbackNote_sql = "select *,date_format(note_date,'%a %D %M %Y') as note_date from admission_followup_note where aeid=$aeid order by noteid asc";
                    $getFeedbackNote_result = mysqli_query($dbhandle, $getFeedbackNote_sql);
                    if (!$getFeedbackNote_result) {
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
                    while ($getFeedbackNote_row = $getFeedbackNote_result->fetch_assoc()) {
                        echo '  
                                                                        <div class="row">
                                                                            <div class="col-xl-2 col-lg-2 col-12 aj-mb-2 ">
                                                                                <div class="detial-content-in-note">
                                                                                    <h5><b>Created By:</b></h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                                                                <div class="detial-content-in-note">
                                                                                    <h5>' . $_SESSION["NAME"] . '</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-2 col-lg-2 col-12 aj-mb-2">
                                                                                <div class="detial-content-in-note text-right">
                                                                                    <h5><b>Created On:</b></h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-4 col-12 aj-mb-2 text-right">
                                                                                <div class="detial-content-in-note">
                                                                                    <h5> ' . $getFeedbackNote_row["note_date"] . '</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-xl-12 col-12">
                                                                                <div class="box-text-mag ">
                                                                                    <h6>' . $getFeedbackNote_row["NOTE"] . '</h6>
                                                                                </div>  
                                                                            </div>
                                                                        </div><hr>';
                    }
                    ?>
                </div>
            </div>


            <div class="row justify-content-center ">
                <div class="col-lg-9 col-xl-9 mt-5 box-bac-chang-aj">
                    <form class="new-added-form aj-new-added-form new-aj-new-added-form" action="FollowupNote2.php" method="post">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <label>Enter Followup Note </label>
                                    <textarea type="text" rows="4" name="feedbacknote" required="" placeholder="" class="aj-form-control" id="feedbacknote" name="feedbacknote"> </textarea>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <label>Next Followup Date <span>*</span></label>
                                    <input type="text" id="followupdate" name="followupdate" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <div class="form-group aj-form-group">
                                        <label>Select Status</label>
                                        <select class="select2" id="enqstatus" name="enqstatus">
                                            <option value="ALL">All</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="PROCESSING">Work in Progress</option>
                                            <option value="CONVERTED">Accured</option>
                                            <option value="CLOSED">Closed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-12 text-right aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <input type="hidden" name="aeid" value="<?php echo  $aeid; ?>" />
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update Note</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once './includes/scripts.php';
require_once './includes/closebody.php'; ?>