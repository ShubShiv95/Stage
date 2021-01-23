
<?php
$pageTitle  = "Admission Search";
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
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                  
                        <label>From Date</label>
                            <!--input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php $datetime = new DateTime(); echo $datetime->format("d/m/Y");?>"-->
                            <input type="text" id="fdate" name="fdate" required="" placeholder="dd-mm-yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php  date_default_timezone_set('Asia/Kolkata');; echo date("d/m/Y");?>">
                            <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                  
                        <label>To Date</label>
                            <!--input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php $datetime = new DateTime(); echo $datetime->format("d/m/Y");?>"-->
                            <input type="text" id="tdate" name="tdate" required="" placeholder="dd-mm-yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php  date_default_timezone_set('Asia/Kolkata');; echo date("d/m/Y");?>">
                            <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group admission_class" >
                    <button type="button" id="fetchResult" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    
                </div>
            </div>
        </div>
</form>
<div class="col-12 mt-4" id="tablehere"></div>
<?php require_once './includes/scripts.php';  ?>
<script>
$(document).ready(function(){
$(document).on('click','#fetchResult',function(ev){
    ev.preventDefault();
    let fdate = $('#fdate').val();
    let tdate = $('#tdate').val();
    const loginid = "<?php echo $_SESSION['LOGINID']; ?>";

    form_data = {'fdate':fdate,'tdate':tdate,'loginid':loginid};
    $.get('./DailyCollectionReport_1.php',form_data,function(response){
        $('#tablehere').html(response);
    });
});
});
</script>
<?php require_once './includes/closebody.php';  ?>