<?php
$pageTitle = "Import Student Single Data";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<div class="basic-tab">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Download Excel</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-selected="false">Import Data</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
            <form class="new-added-form school-form aj-new-added-form" id="fileInputForm" name="fileInputForm" method="POST" action="ImportStudentSingleData_2.php">
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
                                                            <select class="select2" name="f_class">
                                                                <option value="3">ABC PAATHSALA</option>
                                                            </select>
                                                        </div> -->
                                <div class="form-group text-center">
                                    <label>Download Excel Format</label>
                                    <br>
                                    <a href="#" id="add-product-save-link"><img src="img/aj-img/excel.png" width="80"></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
                                <div class="form-group aj-form-group">
                                    <label>Student Column Name<span>*</span></label>
                                    <select class="select2 col-12" name="colName" id="colName">
                                        <?php
                                        $string = "";
                                        foreach ($GLOBAL_SINGLE_BULK_ENTRY_DROPDOWN as $x => $x_value) {
                                            $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                        }
                                        echo $string;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel">
            <form class="new-added-form school-form aj-new-added-form" enctype="multipart/form-data" id="fileInputForm2" name="fileInputForm2" method="POST" action="">
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
                                                        <label>Student Column Name<span>*</span></label>
                                                        <select class="select2" name="colName2" id="colName2">
                                                            <?php
                                                            $string = "";
                                                            foreach ($GLOBAL_SINGLE_BULK_ENTRY_DROPDOWN as $x => $x_value) {
                                                                $string =  '<option value="' . $x . '">' . $x_value . '</option>' . $string;
                                                            }
                                                            echo $string;
                                                            ?>                                                          
                                                        </select>
                                                    </div> -->
                                <div class="form-group">
                                    <label>Import Excel</label>
                                    <input type="file" name="file" id="file" name="s_l_name" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="aaj-btn-chang-cbtn">
                            <button type="button" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" name="importBtn" id="importBtn">Import</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="tebal-promotion">
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
                url: 'ImportStudentSingleData_3.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    document.getElementById("dynamicContent").innerHTML = response;
                },
            });
        });
        $('#add-product-save-link').click(function() {
            $('#fileInputForm').submit();
        });
    });
</script>
<?php require_once './includes/closebody.php'; ?>