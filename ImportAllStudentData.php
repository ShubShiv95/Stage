<?php
$pageTitle = "Import All Student Data";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form" enctype="multipart/form-data" id="fileInputForm" name="fileInputForm" method="POST" action="">


    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <div class="brouser-image ">
                <h6>Supported Browser:

                    <div class="image">
                        <img src="img/aj-img/Firefox.png">
                        <img src="img/aj-img/chrome1.png">
                    </div>
                </h6>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                    <!-- <div class="form-group aj-form-group">
                                                <label>School Name <span>*</span></label>
                                                <select class="select2" name="f_class" required>
                                                    <option value="">Please Select School Name</option>
                                                    <option value="1">The ABC PAATHSHALA</option>
                                                </select>
                                            </div> -->
                    <div class="form-group text-center">
                        <label>Download Excel Format</label>
                        <br>
                        <a href="./app_images/Student_Bulk_Import_Sample.csv" download><img src="img/aj-img/excel.png" width="80"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">

                    <div class="form-group">
                        <label>Import Excel</label>
                        <input type="file" name="file" id="file" placeholder="" class="form-control" accept=".csv" required="">
                    </div>
                </div>
                <!-- <div class="row justify-content-center">
                                                <div class="form-group aj-form-group text-center mt-2">
                                                    <div class="row-chang">
                                                    <span class="mt-2">Import Type:</span>
                                                        <div class="radio">
                                                        <span><input type="radio" class="sibling-bs" name="sibling" checked> Add New </span>
                                                        </div>
                                                        <div class="radio">
                                                        <span><input type="radio" class="sibling-bs" name="sibling" > Overwright Existing</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
            </div>
            <div class="aaj-btn-chang-cbtn">
                <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" name="importBtn" id="importBtn">Import </button>
                <button type="reset" class="aj-btn-a1 btn-fill-lg bg-blue-dark btn-hover-yellow" onClick="window.location.reload(true)">Reset</button>
            </div>
        </div>

    </div>


</form>

<div class="tebal-promotion" style="overflow-x: scroll;overflow-y: scroll; height:500px">
    <div id="dynamicContent" name="dynamicContent"> </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#importBtn").click(function() {
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file', files);

            $.ajax({
                url: 'ImportAllStudentData_2.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    document.getElementById("dynamicContent").innerHTML = response;
                },
            });
        });
    });
</script>
<?php require_once './includes/closebody.php'; ?>