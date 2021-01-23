<?php
/*make a variable named $pageTitle */
$pageTitle = "Transport  Structure";
$bodyHeader = "Transport Structure";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<style>
    /* Ensure that the demo table scrolls */
    th,
    td {
        white-space: nowrap;
    }

    td {
        color: #000;
    }

    div.dataTables_wrapper {
        width: 90%;
        margin: 0 auto;
        border: 1px;
    }
</style>

<form action="./FeeControl_1.php" method="post" id="cluster_form">
    <div class="row justify-content-center mb-4 new-added-form school-form aj-new-added-form">
        <input type="text" name="transport_cluster_sender" class="d-none" autocomplete="off">
        <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Fee Group Name <span>*</span></label>
                <select class="select2 fee_cluster" id="fee_cluster_name" name="fee_cluster_name" required>
                    <option value="">-- SELECT Group --</option>
                </select>
                <p class="mt-2 font-size-14 line-height-14 f_msg">Example : Tuition Fee Or Admission Fee Or Computer Fee , etc</p>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-12">
            <div class="form-group aj-form-group">
                <label>Session *</label>
                <select class="select2" id="f_academic_session" name="f_academic_session" required>
                    <option value="">-- SELECT Session --</option>
                    <?php
                    /*$_SESSION["STARTYEAR"] = 2020;
                                                $_SESSION["ENDYEAR"] = 2021;*/
                    $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                    $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365 * 2));
                    echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                    <option value="' . $next_session . '">' . $next_session . '</option>';
                    ?>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <div class="load_cluster_ui border border-primary" style="height: 50vh; overflow-x: auto;"></div>
            <table class="stripe row-border order-column "></table>
        </div>
        <div class="col-12 text-right mt-3">
            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" name="submit">Save</button>
        </div>
        <div class="col-12 form_output"></div>
</form>
<div class="col-lg-12 col-md-12 col-12 row cluster_view pt-4" style="overflow: auto;">
</div>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: true
        });
    });
    $(document).ready(function() {
        $('#example1').DataTable({
            scrollY: 300,
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: true
        });
        $(document).on('submit', '#cluster_form', function(event) {
            event.preventDefault();
            const cluster_name = $('#fee_cluster_name').val();
            var cluster_session = $('#f_academic_session').val();
            $.post($(this).attr('action'), $('form#cluster_form').serialize(), function(data) {
                $('.form_output').html(data);
                //$('#cluster_form')[0].reset();   
                show_fees_templt(cluster_name, cluster_session)
            }, );
        });
        get_clusters();

        function get_clusters() {
            const url = "./universal_apis.php?get_all_clusters=1&group_type=Transport";
            var html_data = '';
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    html_data += '<option value="' + value.FG_Id + '">' + value.FG_Name + '</option>';
                });
                $('.fee_cluster').append(html_data);
            });
        }

        $(document).on('change', '#f_academic_session', function() {
            const cluster_name = $('#fee_cluster_name').val();
            var cluster_session = $('#f_academic_session').val();
            var data = {
                'check_existing_fee': 1,
                'cluster_name': cluster_name,
                'cluster_session': cluster_session
            };
            if (cluster_name == '') {
                alert('Please Type Fee Cluster Name');
            } else if (cluster_session == '') {
                alert("Please Select Session")
            } else {
                $.post('./FeeControl_1.php', data, function(data) {
                    $('.f_msg').html(data);
                    show_fees_templt(cluster_name, cluster_session);
                });
            }
        });

        function show_fees_templt(cluster_name, cluster_session) {
            data = {
                'get_clust_details': 1,
                'cluster_name': cluster_name,
                'cluster_session': cluster_session,
                structure_type: 'structure_type'
            };
            $.get('./FeeControl_1.php', data, function(response) {
                $('.cluster_view').html(response);
            });
        }

        // load fee cluster ui 
        load_cluster_form();

        function load_cluster_form() {
            var fee_f_data = {
                'get_cluster_form': 1,
                'structure_type': 'Transport'
            };
            $.get('./FeeControl_1.php', fee_f_data, function(response_fee) {
                $('.load_cluster_ui').html(response_fee);
            });
        }

        $(document).on('blur', '.fee_amount', function() {
            load_count_month_wise();
            var fee_head = $(this).attr('fee_head');
            var inst_id = $(this).attr('inst_id');
            var fee_amt = $(this).val();
            var total_installments = $('#total_installments').text();
            var total_heads = $('#total_heads').text();
            var month_wise_fee = 0;
            var head_wise_fee = 0;
            console.log(fee_head + ', ' + inst_id);
            for (let i = 0; i < total_installments; i++) {
                var fee_amount = $('#i' + fee_head + i).val();
                month_wise_fee = parseInt(month_wise_fee) + parseInt(fee_amount);
            }
            $('#total' + fee_head).text(month_wise_fee);
            for (let j = 0; j < total_heads; j++) {
                var head_fee_amount = $('#i' + j + inst_id).val();
                head_wise_fee = parseInt(head_wise_fee) + parseInt(head_fee_amount);
            }
            $('#fh_total' + inst_id).text(head_wise_fee);
        });

        function load_count_month_wise() {
            const url_months = "./universal_apis.php?get_all_months=1";
            const url_fee_heads = "./universal_apis.php?get_all_fee_heads=1";
            var month_wise_total = 0;
            $.getJSON(url_months, function(response) {
                var total_intalllments = response.length;
                $.getJSON(url_fee_heads, function(response_head) {
                    var total_fee_heads = response_head.length;
                    for (let i = 0; i < total_intalllments; i++) {
                        for (let j = 0; j < total_fee_heads; j++) {
                            var fee_amount = $('#i' + j + i).val();
                            // counting g_total
                            month_wise_total = parseInt(fee_amount) + parseInt(month_wise_total);
                            // grand total
                            $('#g_total').text(month_wise_total);
                        }
                    }
                });

            });
        }
    });
</script>
<?php
require_once './includes/closebody.php';
?>