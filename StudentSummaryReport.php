<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
$pageTitle = "Student Information";
require_once './includes/header.php';
?>
<!-- Tab Area Start Here -->
<div class="card ui-tab-card">
    <div class="card-body">
        <div class="heading-layout1 mg-b-25">
            <div class="item-title">
                <h3>Student Information.</h3>
            </div>
        </div>
        <div class="basic-tab">
            <ul class="nav nav-tabs" role="tablist">
                <?php if ($_SESSION["LOGINTYPE"] != "STUDENT") {
                    echo
                        '<li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Search Student</a>
                </li>';
                } ?>

                <li class="nav-item">
                    <a class="nav-link nav_sec" data-toggle="tab" href="#tab2" role="tab" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-selected="true">Attendence</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-selected="false">Fees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Academic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">Exam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab7" role="tab" aria-selected="false">Library</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab8" role="tab" aria-selected="false">Discipline</a>
                </li>
            </ul>
            <div class="tab-content">
                <?php if ($_SESSION["LOGINTYPE"] != "STUDENT") {
                    echo  '<div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <div class="studet-360-form">
                        <h3 class="text-center">Student Information</h3>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="image">
                                    <img src="img/avtar.png" class="pro-image main_img">
                                </div>
                            </div>
                            <div class="col-lg-9 content-fild">
                                <div class="row new-added-form school-form aj-new-added-form">
                                    <div class="col-xl-5 col-lg-5 col-3 row aj-mb-2">
                                        <div class="form-group aj-form-group col-lg-12 col-12">
                                            <label>Search By</label>
                                            <select class="select2 col-xl-12 col-lg-12 col-12" id="search_type">
                                                <option value="1">Student Id</option>
                                                <option value="2">Name</option>
                                                <option value="3">Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-8 aj-mb-2">
                                        <div class="form-group aj-form-group">
                                            <label class="data_label">Search Data <span>*</span> </label>
                                            <input type="text" name="student_data" placeholder="" class="form-control data_field">
                                            <div class="form-group aj-form-group col-lg-12 col-12 class_div" style="display: none;">
                                                <label>Select Class</label>
                                                <select class="select2 col-xl-12 col-lg-12 col-12 class_list" id="class_data">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-1 col-1 aj-mb-2">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" id="search_data">Search</button>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-12 pt-3 list_population">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Father Name</th>
                                                        <th>DOB</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="append_stud_data">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
                <div class="tab-pane fade show" id="tab2" role="tabpanel">
                    <div class="studet-360-form">
                        <h3 class="text-center">Student Information</h3>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="image">
                                    <img src="img/avtar.png" class="pro-image back_img">
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="content-fild row">
                                    <div class="fild-row left col-6">
                                        <div class="name">First Name : <span class="content first_name">Ajay</span></div>
                                    </div>
                                    <div class="fild-row right col-6">
                                        <div class="name">Last Name : <span class="content last_name">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Class : <span class="content class">Ajay</span></div>
                                    </div>
                                    <div class="fild-row right col-6">
                                        <div class="name">Section : <span class="content section">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Roll : <span class="content roll">Ajay</span></div>
                                    </div>
                                    <div class="fild-row right col-6">
                                        <div class="name">Gender : <span class="content gender">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Father Name : <span class="content father_name">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Mother Name : <span class="content mother_name">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Date Of Birth : <span class="content dob">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Father Occupation : <span class="content father_occupation">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Religion : <span class="content religion">Ajay</span></div>
                                    </div>
                                    <div class="fild-row left col-6">
                                        <div class="name">Email : <span class="content email">Ajay</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- attendance system starts -->
                <div class="tab-pane fade" id="tab3" role="tabpanel">
                    <div class="studet-360-form">
                        <div class="row">
                            <div class="col-8 col-xl-8 col-8-xxxl offset-xl-2 offset-lg-2">
                                <div class="card dashboard-card-four pd-b-20">
                                    <div class="card-body">
                                        <div class="heading-layout1">
                                            <div class="item-title">
                                                <h3>Student Attendance</h3>
                                            </div>
                                            <!-- 
                                                I think it is extra elements of another page || commented by : meraj 
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="calender-wrap">
                                            <div id="fc-calender" class="fc-calender"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- attendance system Ends -->
                <div class="tab-pane fade" id="tab4" role="tabpanel">
                    <div class="studet-360-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content-fild">
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">First Name :</div>
                                            <div class="content">Ajay</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Last Name :</div>
                                            <div class="content">Kushwah</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Class :</div>
                                            <div class="content">3</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Section :</div>
                                            <div class="content">A</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Roll :</div>
                                            <div class="content">#2909</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Gender :</div>
                                            <div class="content">Male</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Father Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Mother Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Date Of Birth :</div>
                                            <div class="content">January 31, 1990</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Father Occupation :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Religion :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Email :</div>
                                            <div class="content">test@gmail.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab5" role="tabpanel">
                    <div class="studet-360-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content-fild">
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">First Name :</div>
                                            <div class="content">Ajay</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Last Name :</div>
                                            <div class="content">Kushwah</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Class :</div>
                                            <div class="content">3</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Section :</div>
                                            <div class="content">A</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Roll :</div>
                                            <div class="content">#2909</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Gender :</div>
                                            <div class="content">Male</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Father Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Mother Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Date Of Birth :</div>
                                            <div class="content">January 31, 1990</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Father Occupation :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Religion :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Email :</div>
                                            <div class="content">test@gmail.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab6" role="tabpanel">
                    <div class="studet-360-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content-fild">
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">First Name :</div>
                                            <div class="content">Ajay</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Last Name :</div>
                                            <div class="content">Kushwah</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Class :</div>
                                            <div class="content">3</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Section :</div>
                                            <div class="content">A</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Roll :</div>
                                            <div class="content">#2909</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Gender :</div>
                                            <div class="content">Male</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Father Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Mother Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Date Of Birth :</div>
                                            <div class="content">January 31, 1990</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Father Occupation :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Religion :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Email :</div>
                                            <div class="content">test@gmail.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab7" role="tabpanel">
                    <div class="studet-360-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content-fild">
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">First Name :</div>
                                            <div class="content">Ajay</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Last Name :</div>
                                            <div class="content">Kushwah</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Class :</div>
                                            <div class="content">3</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Section :</div>
                                            <div class="content">A</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Roll :</div>
                                            <div class="content">#2909</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Gender :</div>
                                            <div class="content">Male</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Father Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Mother Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Date Of Birth :</div>
                                            <div class="content">January 31, 1990</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Father Occupation :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Religion :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Email :</div>
                                            <div class="content">test@gmail.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab8" role="tabpanel">
                    <div class="studet-360-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content-fild">
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">First Name :</div>
                                            <div class="content">Ajay</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Last Name :</div>
                                            <div class="content">Kushwah</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Class :</div>
                                            <div class="content">3</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Section :</div>
                                            <div class="content">A</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Roll :</div>
                                            <div class="content">#2909</div>
                                        </div>
                                        <div class="fild-row right">
                                            <div class="name pl-5">Gender :</div>
                                            <div class="content">Male</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Father Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Mother Name :</div>
                                            <div class="content">---</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Date Of Birth :</div>
                                            <div class="content">January 31, 1990</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Father Occupation :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-2">
                                        <div class="fild-row left">
                                            <div class="name">Religion :</div>
                                            <div class="content">Banker</div>
                                        </div>
                                    </div>
                                    <div class="min-row color-1">
                                        <div class="fild-row left">
                                            <div class="name">Email :</div>
                                            <div class="content">test@gmail.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .content,
    .name {
        font-weight: bold;
    }
    .fc-basicWeek-button, .fc-month-button, .fc-basicDay-button{
        display: none;
    }
    .fc-day-number{
        font-size: 2.5rem!important; 
    }
    .fc-sun .fc-day-number{
    color: #ff9800 !important;
    }
</style>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {
        var dates = $('.fc-past').text();
        console.log(dates);
        // get all classes through API
        const url = "./universal_apis.php?getAllClass=1";
        var html_class_d = '<option value="">Please Select Class</option>';
        $.getJSON(url, function(data) {
            $.each(data, function(key, value) {
                html_class_d += '<option value="' + value.Class_Id + '">' + value.Class_Name + '</option>';
            });
            $('.class_list').append(html_class_d);
        });

        // change search type
        $('#search_type').change(function() {
            var search_type = $(this).val();
            if (search_type == '3') {
                $('.data_label').fadeOut();
                $('.data_field').fadeOut();
                $('.class_div').fadeIn('slow');
            } else {
                $('.data_label').fadeIn('slow');
                $('.data_field').fadeIn('slow');
                $('.class_div').fadeOut();
            }
        });

        // get data on click
        $('#search_data').click(function(event) {
            event.preventDefault();
            var search_type = $('#search_type').val();
            var data_field = $('.data_field').val();
            var class_id = $('.class_list').val();
            if (search_type == '3') {
                stud_data = class_id;
            } else {
                stud_data = data_field;
            }
            const url = "./universal_apis.php?get_stud_details_by_name=1&search_type=" + search_type + "&stud_data=" + stud_data + "";
            var html_table = '';
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    html_table += '<tr><td>' + value.First_Name + ' ' + value.Last_Name + '</td><td>' + value.Father_Name + '</td><td>' + value.DOB + '</td><td><button class="btn btn-warning load_student_data" id="' + value.Student_Id + '"><i class="fas fa-binoculars fa-2x"></i></button></td></tr>';
                });
                $('.append_stud_data').html(html_table);
            });
        });

        // load student data on search
        $(document).on('click', '.load_student_data', function(event) {
            event.preventDefault();
            var stud_data_id = $(this).attr('id');
            load_student_data(stud_data_id);
        });

        // check if student is logged in show data automatically
        const login_type = "<?php echo $_SESSION["LOGINTYPE"]; ?>";
        const login_id = "<?php echo $_SESSION["USERID"]; ?>";
        if (login_type == 'STUDENT' && login_id != '') {
            $('.nav_sec').addClass('active');
            $('#tab2').addClass('active');
            load_student_data(login_id);
        }

        // function to load student data 
        function load_student_data(student_id) {
            var url = "./universal_apis.php?get_stud_details_by_name=1&search_type=1&stud_data=" + student_id + "";
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    $('.first_name').text(value.First_Name);
                    $('.last_name').text(value.Last_Name);
                    $('.class').text(value.Class_Name);
                    $('.section').text(value.Section);
                    $('.roll').text(value.Roll_No);
                    $('.gender').text(value.Gender);
                    $('.father_name').text(value.Father_Name);
                    $('.mother_name').text(value.Mother_Name);
                    $('.dob').text(value.DOB);
                    $('.father_occupation').text(value.Father_Occupation);
                    $('.religion').text(value.Religion);
                    $('.email').text(value.Email_Id);
                    if (value.Student_Image != null) {
                        url = './app_images/AdmissionDocuments/' + value.Admission_Id + '_AdmissionDocs/' + value.Student_Image;
                        $('.main_img').attr('src', url);
                        $('.back_img').attr('src', url);
                    }
                });
            });
        }
    });
</script>
<?php require_once './includes/closebody.php'; ?>