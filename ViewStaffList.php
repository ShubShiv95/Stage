<?php
$pageTitle = "View Staff List";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form">
    <div class="row ">
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <div class="form-group aj-form-group">
                    <label>Search by ID <span>*</span></label>
                    <input type="text" placeholder="" class="form-control searchById">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <div class="form-group aj-form-group">
                    <label>Search by Name</label>
                    <input type="text" placeholder="" class="form-control searchByName">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <div class="form-group aj-form-group">
                    <label>Search by Phone</label>
                    <input type="text" placeholder="" class="form-control searchByPhone">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2">
            <div class="text-right">
            </div>
        </div>

    </div>
</form>
<div class="item-title aj-item-title bg-warning mt-3">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-4 p-2 ml-2"></h3>
        </div>
        <div class="col-md-6 pt-2 pb-2">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <button class="btn btn-sm btn-danger pdf_export"><i class="fas fa-file-pdf fa-2x p-1"></i></button>

                    <button class="btn btn-sm btn-success excel_export"><i class="fas fa-file-excel fa-2x p-1"></i></button>

                    <button class="btn btn-sm btn-primary" onclick="window.print();"><i class="fas fa-print fa-2x p-1"></i></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Attendance-staff  mt-5 aj-scroll-Attendance-staff">
    <div class="table-responsive" id="showStaffData">
    </div>
</div>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        var toLowerCase = "";
        load_staff_data();

        function load_staff_data() {
            $.ajax({
                type: 'get',
                url: './ViewStaffList_1.php',
                data: {
                    'getStaffList': 1
                },
                success: function(data) {
                    $('#showStaffData').html(data);
                }
            });
        }

        function search_staff_data(id, name, phone) {
            $('#showStaffData').html('');
            $.ajax({
                type: 'post',
                url: './ViewStaffList_1.php',
                data: {
                    'searchStaffData': 1,
                    'id': id,
                    'name': name,
                    'phone': phone
                },
                success: function(data) {
                    $('#showStaffData').html(data);
                }
            });
        }

        $('.searchById').keyup(function() {
            var empId = $(this).val();
            var empName = $('#searchByName').val();
            var empPhone = $('#searchByPhone').val();
            if (empId != "") {
                empName = "";
                empPhone = "";
                search_staff_data(empId, empName, empPhone);
            } else {
                load_staff_data();
            }
        });
        $('.searchByName').keyup(function() {
            var empName = $(this).val();
            var empId = $('#searchById').val();
            var empPhone = $('#searchByPhone').val();
            if (empName !== "") {
                empPhone = "";
                empId == ""
                search_staff_data(empId, empName, empPhone);
            } else {
                load_staff_data();
            }
        });
        $('.searchByPhone').keyup(function() {
            var empPhone = $(this).val();
            var empName = $('#searchByName').val();
            var empId = $('#searchById').val();
            if (empPhone !== "") {
                empName = "";
                empId == ""
                search_staff_data(empId, empName, empPhone);
            } else {
                load_staff_data();
            }
        });

        $(".excel_export").click(function(e) {
            let file = new Blob([$('#showStaffData').html()], {
                type: "application/vnd.ms-excel"
            });
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "staff_data.xls"
            }).appendTo("body").get(0).click();
            e.preventDefault();
        });

        var doc = new jsPDF('l');
        var specialElementHandlers = {
            '#showStaffData': function(element, renderer) {
                return true;
            }
        };
        $('.pdf_export').click(function() {
            doc.fromHTML($('#showStaffData').html(), 5, 5, {
                'width': 2500,
                'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });

    });
</script>
<?php
require_once './includes/closebody.php'; ?>