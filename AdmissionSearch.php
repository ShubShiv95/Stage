
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
                        <label>School Session <span>*</span></label>
                        <select class="select2 col-12" name="f_class" id="schoolSession" name="schoolSession">
                            <option value="">-- SELECT Session --</option>
                            <?php
                            $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                            $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365));
                            echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                                                <option value="' . $next_session . '">' . $next_session . '</option>';
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group">
                        <label>Search By <span>*</span></label>
                        <select class="select2 col-12 search_by" name="search_by" id="search_by" name="schoolSession">
                            <option value="0">Select Search By</option>
                            <option value="1">Class</option>
                            <option value="2">Admission Id</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <div class="form-group aj-form-group admission_id" style="display: none;">
                        <label>Admission Id<span>*</span></label>
                        <input type="text" name="student_id" id="student_id" placeholder="" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group aj-form-group admission_class" style="display: none;">
                        <label>School Class <span>*</span></label>
                        <select class="select2 class_name" name="f_class" id="schoolClass" name="schoolClass">
                        </select>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
                    <button type="submit" id="fetchResult" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                </div>
            </div>
        </div>
</form>
<div class="col-12 mt-4" id="tablehere"></div>
<?php require_once './includes/scripts.php';  ?>
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
        xmlhttp.open("GET", "./AdmissionSearchController.php?class=" + $class + "&session=" + $session + "&admission_id=" + $student_id, true);
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