<?php
$pageTitle = "Fee Concession";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form consession_form" action="./FeeControl_1.php" method="post">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <div class="">
                <!--h5 class="text-center">Student Attendence Message</h5-->
                <div class="row justify-content-center mb-4">
                    <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                        <input type="text" name="consession_sender" id="" class="d-none" autocomplete="off">
                        <div class="form-group aj-form-group">
                            <label>Concession Category Name</label>
                            <input type="text" name="consession_name" placeholder="" class="form-control">
                            <p class="mt-2 font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="form-group aj-form-group">
                            <label>Session *</label>
                            <select class="select2" name="consession_session">
                                <option value="">-- SELECT Session --</option>
                                <?php
                                $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                                $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365 * 2));
                                echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                                <option value="' . $next_session . '">' . $next_session . '</option>';
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="Attendance-staff  aj-scroll-Attendance-staff">
                            <div class="table-responsive">
                                <table class="table display ">
                                    <thead>
                                        <tr>
                                            <th style="width: 60%;">Fee Name </th>
                                            <th style="width: 40%;">Concession %</th>
                                        </tr>
                                    </thead>
                                    <tbody class="top-position-ss load_dyn_data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12 col-12 text-right mt-3">
                        <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                    </div>
                    <div class="col-12 form_output"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 load_consessions table-responsive">
        <table class="table" style="height: 30vh;">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Fee Head</th>
                    <th>Discount</th>
                </tr>
            </thead>
            <tbody class="table_head">
            </tbody>
        </table>
    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {
        load_fee_heads();

        function load_fee_heads() {
            var html_data = '';
            const url = "./universal_apis.php?get_all_fee_heads=1";
            var html_data = '';
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    html_data += '<tr><td style="width: 60%;"><input type="text" class="form-control d-none" value="' + value.Fee_Head_Id + '" name="fee_head_id[]">' + value.Fee_Head_Name + '</td><td style="width: 40%;"><div class="form-group aj-form-group"> <input type="text" name="consession[]" value="0" placeholder="" class="form-control consession_value" id="cons_' + value.Fee_Head_Id + ',' + value.Fee_Head_Name + '"></div></td></tr>';
                });
                $('.load_dyn_data').append(html_data);
            });
        }
        $(document).on('submit', '.consession_form', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(data) {
                    $('.form_output').html(data);
                    $('.consession_form')[0].reset();
                    window.setTimeout(function() {
                        $('.form_output').html('')
                    }, 3000);
                    load_consessions();
                }
            });
        });
        $(document).on('blur', '.consession_value', function() {
            var consession_value = $(this).val();
            var div_id = $(this).attr('id');
            var div_names = div_id.split(',');
            if (consession_value > 100 || consession_value < 0) {
                $('.form_output').html('<p class="text-danger">Consession Should Between 0 To 100 to Fee Named :- ' + div_names[1] + '</p>');
                $(this).val(0);
            }
        });
        load_consessions();

        function load_consessions() {
            const url = './FeeControl_1.php?get_all_consessions=1';
            var html_data = '';
            $.getJSON(url, function(response) {
                $.each(response, function(key, value) {
                    html_data += '<tr><td>' + value.Concession_Name + '</td><td>' + value.Fee_Head_Name + '</td><td>' + value.Concession_Percent + '%</td><td><button class="btn btn-danger delete_consession" id="' + value.Concession_Detail_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                });
                $('.table_head').html(html_data);
            })
        }
        $(document).on('click', '.delete_consession', function(event) {
            event.preventDefault();
            var cons_id = $(this).attr('id');
            if (confirm("Are You Sure To Delete?")) {
                $.ajax({
                    url: './FeeControl_1.php',
                    type: 'post',
                    data: {
                        'delete_consession': 1,
                        'cons_id': cons_id
                    },
                    success: function(data) {
                        $('.form_output').html(data);
                        $('.consession_form')[0].reset();
                        window.setTimeout(function() {
                            $('.form_output').html('')
                        }, 3000);
                        load_consessions();
                    }
                });
            }
        });
    });
</script>
<?php require_once './includes/closebody.php'; ?>