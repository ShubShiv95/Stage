
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
                  
                        <label>Select Date</label>
                            <!--input type="text" id="adt" name="adt" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php $datetime = new DateTime(); echo $datetime->format("d/m/Y");?>"-->
                            <input type="text" id="dcrd" name="dcrd" required="" placeholder="dd/mm/yyyy" class="form-control air-datepicker" data-position='bottom right' value="<?php  date_default_timezone_set('Asia/Kolkata');; echo date("d/m/Y");?>">
                            <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group admission_class" >
                    <button type="submit" id="fetchResult" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
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


    var specialElementHandler={"#editor":function(element,rendererer){
        return true;
    }};

    $("#pdf").click(function(){
        var doc=new jsPDF();
        doc.fromHTML({$("#target").html(),15,15})

    });
});
</script>
<script type="text/javascript">
    $('#fetchResult').click('.sibling-bs', function() {
        callbackend();
        $('.tebal-promotion').fadeIn('slow');
    });
</script>

<script type="text/javascript">
    var frm = $('#searchAddForm');

    $("#fetchResult").click(function(event) {
        event.preventDefault();
        callbackend();
    });

    function callbackend() {

        $session = $('#schoolSession').val();
        $class = $('#schoolClass').val();
        $student_id = $('#student_id').val();
        var search_by = $('.search_by').val();
        if (search_by == 1) {
            $student_id = '';
        } else if (search_by == 2) {
            $class = '';
        }

        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tablehere").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "./DailyCollectionReport_1.php?school_id=1", true);
        xmlhttp.send();
    }

    get_class();

    function get_class() {
        var url = "./universal_apis.php?getAllClass=1";
        html_data = '<option value="">SELECT Class</option>';
        $.getJSON(url, function(response) {
            $.each(response, function(key, value) {
                html_data += '<option value="' + value.Class_Id + '">' + value.Class_Name + '</option>';
            });
            $('.class_name').html(html_data);
        });
    }
    $('.search_by').change(function() {
        var search_by = $(this).val();
        if (search_by == 1) {
            $('.admission_class').fadeIn(1000);
            $('.admission_id').hide();
        } else if (search_by == 2) {
            $('.admission_class').hide();
            $('.admission_id').fadeIn(1000);
        }
    });
</script>
<?php require_once './includes/closebody.php'; ?>