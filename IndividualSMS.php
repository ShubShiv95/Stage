<?php
$pageTitle = "Indiidual SMS";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form aj-new-added-form new-aj-new-added-form" method="post" action="IndividualSMS2.php" id="indMsgForm">
    <div class="row" id="Select-level1-div">
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Message To <span>*</span></label>
                <select class="select2 col-12" id="L1-Select" name="user_type" required onChange="Communication_Call1(this.value);">
                    <option value="0" selected="selected">Select User Type</option>

                    <?php
                    $query = 'select * from message_user_group_table where enabled=1' . ' and individual_select_enabled=1 and School_Id=' . $_SESSION["SCHOOLID"];
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
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2" id="Select-level2-div">
            <div class="form-group aj-form-group">
                <label></label>
                <select class="select2 col-12" id="L2-Select" name="L2-Select" required onChange="Communication_Call2('L1-Select',this.value,'L3-Select','Select-level4-subdiv1');">
                    <option value="0" selected="selected">Select Option</option>
                </select>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2" id="Select-level3-div">
            <div class="form-group aj-form-group">
                <label></label>
                <select class="select2 col-12" id="L3-Select" name="L3-Select" onChange="getStuNumList(this.value);" required>
                    <option value="0" selected="selected">Select Option</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mt-4">
            <div class="form-group aj-form-group" id="unknownNo-div">
                <label>Enter 10 digit Mobile Numbers separated with semicolon ( ; ) <span>*</span></label>
                <textarea type="text" rows="4" placeholder="" class="aj-form-control" name="unknownno" id="unknownno" cols="10" rows="4" onkeyup="restrict_textlength('messagedetail','300');"> </textarea>
            </div>
            <div class="Individuals-cug">
                <div class="Attendance-staff aj-scroll-Attendance-staff">
                    <div class="table-responsive" id="Select-level4-subdiv1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="pt-3 pb-3">
                                        <div class="" style="text-align:center;">
                                            <label class="check-label text-white">Select Individuals</label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="top-position-ss3">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mt-4">
            <div class="form-group aj-form-group">
                <label>Title *</label>
                <input type="text" name="messagetitle" id="messagetitle" name="messagetitle" placeholder="" class="form-control" required>
            </div>

            <div class="form-group aj-form-group">
                <label>Compose Message</label>
                <textarea type="text" rows="6" name="composemsg" id="composemsg" onkeyup="restrict_textlength('composemsg','480');return smsLength('composemsg');" required placeholder="" class="aj-form-control"></textarea>
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
                            <span><input type="radio" class="sibling-bs" id="message-type1" name="message-type" value="SMS" checked="checked"> <b>SMS</b></span>
                        </div>
                    </h6>
                    <h6>
                        <div class="radio">
                            <span><input type="radio" class="sibling-bs" id="message-type2" name="message-type" value="Whatsapp"> <b>What's App</b> </span>
                        </div>
                    </h6>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-12 text-right aj-mb-2">
                <div class="form-group aj-form-group">
                    <button type="submit" id="sendmessage" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create/Send</button>
                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                </div>
            </div>
        </div>
    </div>



</form>

<?php require_once './includes/scripts.php'; ?>
<script>
    window.onload = function() {
        //$("#unknownNo-div").hide();
    };
    // });
</script>
<script>
    $('#L1-Select').on('change', function() {
        var demovalue = $(this).val();
        if (demovalue == 1) {
            //$("#Select-level2-div").show();
            // $("#Select-level3-div").show();
            //$('#Select-level4-subdiv1').show();
            // $('#unknownNo-div').hide();
            //$("#L3-Select").data("default-value",$("#L3-Select").val());
            //$("#L3-Select").data("default-value",$("#L3-Select").val());
            $('#L3-Select').prop('selectedIndex', 0);
            $('#L2-Select').attr('disabled', false);
            $('#L3-Select').attr('disabled', false);
            $("#L2-Select").prop('required', true);
            $("#L3-Select").prop('required', true);

            $("#unknownNo-div").hide();
            $("#Select-level4-subdiv1").show();


        } else if (demovalue == 2) {
            // $("#Select-level3-div").hide();            
            //$('#unknownNo-div').hide();
            // $('#Select-level4-subdiv1').show();
            //$("#L3-Select").val($("#L3-Select").data("default-value"));

            //$("#L3-Select").data("default-value",$("#L3-Select").val());
            //$('#L3-Select').prop('selectedIndex',0);
            //$('#L3-Select').val( $('#L3-Select').prop('selectedIndex',0));
            // $('#L3-Select').val('');
            $('#L2-Select').attr('disabled', false);
            $('#L3-Select').attr('disabled', true);
            $("#L2-Select").prop('required', true);
            $("#L3-Select").prop('required', false);

            $("#unknownNo-div").hide();
            $("#Select-level4-subdiv1").show();


        } else {
            // $("#Select-level2-div").hide();
            // $("#Select-level3-div").hide();
            // $('#unknownNo-div').show();
            // $('#Select-level4-subdiv1').hide();
            //$("#L3-Select").val($("#L3-Select").data("default-value"));
            //$("#L3-Select").data("default-value",$("#L3-Select").val());
            //$('#L3-Select').prop('selectedIndex',0);
            $("#L2-Select").prop('required', false);
            $("#L3-Select").prop('required', false);
            $('#L2-Select').attr('disabled', true);
            $('#L3-Select').attr('disabled', true);
            $("#unknownNo-div").show();
            $("#Select-level4-subdiv1").hide();




        }

        //$('#L3-Select').val("");
    });
</script>
<script type="text/javascript">
    var frm = $('#indMsgForm');

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
                $('#indMsgForm').trigger("reset");
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