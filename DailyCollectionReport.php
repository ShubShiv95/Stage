<?php
$pageTitle  = "Daily Collection Report";
require_once './includes/header.php';
include 'dbobj.php';
?>
<form class="new-added-form school-form aj-new-added-form" id="searchAddForm" name="searchAddForm">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <div class="brouser-image ">
                <!--h5 class="text-center">Search Admission</h5-->
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 d-print-none">
                    <div class="form-group aj-form-group">

                        <label>From Date</label>
                        <!--input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php $datetime = new DateTime();
                                                                                                                                                                                echo $datetime->format("d/m/Y"); ?>"-->
                        <input type="text" id="fdate" name="fdate" required="" placeholder="dd-mm-yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php date_default_timezone_set('Asia/Kolkata');;
                                                                                                                                                                                echo date("d/m/Y"); ?>">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 d-print-none">
                    <div class="form-group aj-form-group">

                        <label>To Date</label>
                        <!--input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php $datetime = new DateTime();echo $datetime->format("d/m/Y"); ?>"-->
                        <input type="text" id="tdate" name="tdate" required="" placeholder="dd-mm-yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php date_default_timezone_set('Asia/Kolkata');echo date("d/m/Y"); ?>">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group admission_class d-print-none">
                        <button type="button" id="fetchResult" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                    </div>
                </div>
            </div>
        </div>
</form>
<div class="col-xl-6 col-lg-3 col-12 aj-mb-2 offset-xl-3 offset-lg-3 text-right download_pdf d-print-none">
    <button class="btn btn-warning save_pdf"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></button>
    <button class="btn btn-warning" onclick="window.print()"><i class="fa fa-print fa-2x" aria-hidden="true"></i></button>
</div>
<div class="col-12 mt-4 p-3" id="tablehere" style="overflow-y: scroll;"></div>
<style>
    table.fee_coll_tbl tr td {
        font-size: 13px;
    }
    @media print{@page {size: landscape}}
    /*#tablehere{
    background-image: url(./app_images/school_images/logo.jpeg);
    background-repeat: no-repeat;
    background-size: contain;
    opacity: 0.3;
}*/
</style>
<?php require_once './includes/scripts.php';  ?>
<script>
    $(document).ready(function() {
        $('.download_pdf').hide();
        $(document).on('click', '#fetchResult', function(ev) {
            ev.preventDefault();
            let fdate = $('#fdate').val();
            let tdate = $('#tdate').val();
            const loginid = "<?php echo $_SESSION['LOGINID']; ?>";

            form_data = {
                'fdate': fdate,
                'tdate': tdate,
                'loginid': loginid
            };
            $.get('./DailyCollectionReport_1.php', form_data, function(response) {
                $('#tablehere').html(response);
                $('.download_pdf').show();
            });

            $(document).on('click', '.save_pdf', function(evs) {
                evs.preventDefault();
                let pdf_text = $('#tablehere').text();
                var options = {
                    background: '#fff',
                    autoSize: true,
                    fontSize: 9
                };
                var pdf = new jsPDF('l', 'pt', 'a4');
                pdf.setFontSize(9);
                pdf.addHTML($("#tablehere"), 0, 0, options, function() {
                    pdf.setFont("helvetica");
                    pdf.setFontType("bold");
                    pdf.setFontSize(5);
                    pdf.save('dcr.pdf');
                });

            });
        });
    });
</script>
<?php require_once './includes/closebody.php';  ?>