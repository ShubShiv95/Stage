<?php
$pageTitle = "Fee Head";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" action="./FeeControl_1.php" method="post" id="fee_header_form">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-12 aj-mb-2 form_output">
        </div>
        <div class="col-xl-10 col-lg-10 col-12 aj-mb-2">
            <div class="">
                <input type="text" name="fee_head_sender" class="d-none" autocomplete="off">
                <div class="row  mb-4">
                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Fee Name <span>*</span></label>
                            <input type="text" name="fee_name" placeholder="" class="form-control">
                            <p class="mt-2 font-size-14 line-height-14">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Fee Print Label <span>*</span></label>
                            <input type="text" name="fee_print_label" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="form-group aj-form-group">
                            <label>Select Fee Type</label>
                            <select class="select2" name="fee_type_choosen">
                                <option value="0">-- Select Fee Type --</option>
                                <option value="Regular">Regular</option>
                                <option value="Transport">Transport</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-12">
                        <div class="form-group aj-form-group text-center">
                            <div class="row ml-3">
                                <h6>
                                    <div class="radio mr-5">
                                        <span><input type="checkbox" class="sibling-bs" name="ref_fee_amt" checked="" value="1"> <b>Refundable Fee Amount</b></span>
                                    </div>
                                </h6>
                                <h6>
                                    <div class="radio">
                                        <span><input type="checkbox" class="sibling-bs" name="tax_benefit" value="1"> <b>Include In Tax Benifit Certificate</b></span>
                                    </div>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-12 mb-5">

                    </div>
                    <div class="col-lg-12 col-xl-12 col-12 text-right mb-5">
                        <button type="submit" name="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit</button>
                    </div>
</form>
<div class="col-xl-12 col-lg-12 col-12">
    <div class="">
        <div class="table-responsive">
            <table class="table table-striped table-inverse text-center">
                <thead class="thead-inverse">
                    <tr>
                        <th>Available Fee Heads. </th>
                        <th>Print Label</th>
                        <th>Fee Type </th>
                        <th>Refundable </th>
                        <th>Tax Benifit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="fee_head_data">
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {

        $(document).on('submit', '#fee_header_form', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'post',
                data: $(this).serialize(),
                success: function(data) {
                    $('.form_output').html(data);
                    load_fee_head();
                    /* window.setTimeout(function() {
                         $('.form_output').html('');
                     }, 5000);*/
                    //$('#fee_header_form')[0].reset();
                }
            });
        });
        load_fee_head();

        function load_fee_head() {
            const fee_head_url = "./FeeControl_1.php?getall_feehead=1";
            $.getJSON(fee_head_url, function(data) {
                html_data = '';
                $.each(data, function(key, value) {
                    if (value.Refundable == 0) {
                        Refundables = '<button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>';
                    } else {
                        Refundables = '<button type="button" class="btn btn-success"><i class="fas fa-check"></i></i></button>';
                    }
                    if (value.Tax_Benifit == 0) {
                        Tax_Benifits = '<button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>';
                    } else {
                        Tax_Benifits = '<button type="button" class="btn btn-success"><i class="fas fa-check"></i></i></button>';
                    }
                    html_data += '<tr><td >' + value.Fee_Head_Name + '</td><td >' + value.Fee_Print_Lable + '</td><td >' + value.Fee_Type + '</td><td >' + Refundables + '</td><td >' + Tax_Benifits + '</td><td ><button type="button" class="btn btn-danger delete_feehead_data" id="' + value.Fee_Head_Id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
                });
                $('.fee_head_data').html(html_data);
            });
        }
        $(document).on('click', '.delete_feehead_data', function(event) {
            event.preventDefault();
            if (confirm("Are You Sure to Delete This Fee Head?")) {
                const fee_head_id = $(this).attr('id');
                $.ajax({
                    url: './FeeControl_1.php',
                    type: 'post',
                    data: {
                        'delete_fee_head': 1,
                        'fee_head_id': fee_head_id
                    },
                    success: function(data) {
                        $('.form_output').html(data);
                        load_fee_head();
                        window.setTimeout(function() {
                            $('.form_output').html('');
                        }, 3000)
                    }
                });
            }
        });
    });
</script>
<?php require_once './includes/closebody.php'; ?>