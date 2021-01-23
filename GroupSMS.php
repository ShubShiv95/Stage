<?php
$pageTitle = "Group SMS";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form aj-new-added-form new-aj-new-added-form" id="groupSmsForm" action="GroupSMS2.php" method="post">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Message To <span>*</span></label>
                        <select class="select2" id="L1-Select" name="user_type" required onChange="GrpMsgGroupList(this.value);">
                            <option value="0">Select Type</option>
                            <?php
                            $query = 'select * from message_user_group_table where enabled=1' . ' and group_select_enabled=1 and School_Id=' . $_SESSION["SCHOOLID"];
                            $result = mysqli_query($dbhandle, $query);
                            if (!$result) {
                                //var_dump($getStudentCount_result);
                                $error_msg = mysqli_error($dbhandle);
                                $el = new LogMessage();
                                $sql = $query;
                                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                                $el->write_log_message('Individual Message ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                                $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to Fetch user type value from user_type_master_table. Please try after some time.</h1>";
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
                                $str = '<option value="' . $row["User_Type_Id"] . '">' .  $row["User_Type"];
                                echo $str;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label></label>
                        <select class="select2" id="L2-Select" name="L2-Select" required onChange="Grp_Communication_Call2('L1-Select',this.value,'Select-level4-subdiv1');">
                        </select>
                    </div>
                </div>
            </div>
            <div class="Individuals-cug" id="main-div">
                <div class="Attendance-staff aj-scroll-Attendance-staff  ">
                    <div class="table-responsive" id="Select-level4-subdiv1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="pt-3 pb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input checkAll">
                                            <label class="form-check-label text-white">Select Group</label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss2">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 ">
            <div class="form-group aj-form-group">
                <label>Title *</label>
                <input type="text" id="messagetitle" name="messagetitle" placeholder="" class="form-control">
            </div>
            <div class="form-group aj-form-group">
                <label>Compose Message</label>
                <textarea type="text" rows="6" name="composemsg" required="" placeholder="" class="aj-form-control"> </textarea>
            </div>
            <div class="d-grid-ain" id="PrintCount-div">
                <h6><b>Character Count: </b><span>0</span></h6>
                <h6><b>Sms Count: </b><span>0</span></h6>
            </div>
            <div class="d-grid-ain0">
                <h6><b>Message Balance: </b><span><?php echo $_SESSION["SMSBALANCE"]; ?></span></h6>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12">
                    <h6><b>Message Sending Date</b></h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="form-group aj-form-group">
                        <div class="form-group aj-form-group">
                            <label>Select Date</label>
                            <input type="text" id="messagedate" name="messagedate" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="form-group aj-form-group">
                        <label>In Time</label>
                        <input type="time" id="messagetime" name="messagetime" placeholder="" class=" form-control">
                    </div>
                </div>
            </div>
            <div class="d-grid-ain0">
                <h6><b>Message As </b></h6>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="row">
                    <h6>
                        <div class="radio mr-5">
                            <span><input type="checkbox" class="sibling-bs" id="smsmessage" name="smsmessage" value="1"> <b>SMS</b></span>
                        </div>
                    </h6>
                    <h6>
                        <div class="radio">
                            <span><input type="checkbox" class="sibling-bs" id="whatsappmessage" name="whatsappmessage" value="1"> <b>What's App</b> </span>
                        </div>
                    </h6>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 text-right aj-mb-2">
                <div class="form-group aj-form-group">
                    <button type="submit" id="sendmessage" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create/Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once './includes/scripts.php';
?>
<script>
    window.onload = function() {
        $("#unknownNo-div").hide();
    };
    // });
</script>
<script>
    $('#L1-Select').on('change', function() {
        var demovalue = $(this).val();
        if (demovalue == 1) {
            $("#Select-level2-div").show();
            //$('#Select-level4-subdiv1').show();
            $('#main-div').show();

        } else if (demovalue == 2) {
            $("#Select-level2-div").show();
            //$('#Select-level4-subdiv1').show();
            $('#main-div').show();
        } else if (demovalue == 3) {
            $("#Select-level2-div").show();
            //$('#Select-level4-subdiv1').show();
            $('#main-div').show();
        } else {
            $("#Select-level2-div").hide();
            $('#Select-level4-subdiv1').empty();
            //$('#main-div').hide();
        }


    });
</script>

<script type="text/javascript">
    var frm = $('#groupSmsForm');

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
                alert(data);
            },
            error: function(data) {
                //console.log('An error occurred.');
                //console.log(data);
                alert(data);
                //$('div#msgreply').html(data);

            },
        });
    });
</script>
<?php require_once './includes/closebody.php'; ?>