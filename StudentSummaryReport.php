<?php
$pageTitle = "Student Information";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<!-- Tab Area Start Here -->


<ul class="nav nav-pills">
    <?php
    if ($_SESSION["LOGINTYPE"] != "STUDENT") {
        echo '<li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#home">Serach Student</a>
        </li>';
    }
    ?>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu2">Attendance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu3">Fee</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">Academic</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu5">Exam</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu6">Library</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu7">Dicipline</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane container active" id="home">
        <?php
        if ($_SESSION["LOGINTYPE"] != "STUDENT") {
            echo '                
      <div class="row">
          <div class="col-lg-3 mt-5">
              <div class="image">
                  <img src="img/avtar.png" class="pro-image main_img w-75">
              </div>
          </div>
          <div class="col-lg-9 mt-5 content-fild">
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
                                      <th>Stud. Id</th>
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
      </div>';
        }
        ?>
    </div>
    <div class="tab-pane container fade" id="menu1">
        <div class="row">
            <div class="col-lg-3 text-center">
                <div class="image">
                    <img src="img/avtar.png" class="pro-image back_img w-50">
                </div>
            </div>
            <div class="col-lg-9" style="height: 40vh; overflow:scroll;">
                <div class="content-fild row">
                    <div class="fild-row left col-12 mt-3 border">
                        <div class="name">Name : <span class="content first_name">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Date Of Birth : <span class="content dob">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Class : <span class="content class">Ajay</span></div>
                    </div>
                    <div class="fild-row right col-6 mt-3 border">
                        <div class="name">Section : <span class="content section">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Roll : <span class="content roll">Ajay</span></div>
                    </div>
                    <div class="fild-row right col-6 mt-3 border">
                        <div class="name">Gender : <span class="content gender">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Religion : <span class="content religion">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Category : <span class="content category">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Discount Category : <span class="content dis_category">Ajay</span></div>
                    </div>

                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Session : <span class="content session">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Session Start : <span class="content session_st">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Session End : <span class="content session_en">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Mother Tongue : <span class="content mother_tongue">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Locality : <span class="content locality">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">AADHAR : <span class="content aadhar">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Blood Group : <span class="content b_group">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Nationality : <span class="content nationality">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Comm. Add. : <span class="content com_add">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Res. Add. : <span class="content res_add">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-12 mt-3 border" style="background-color: #ffae01!important;">
                        <div class="name">Father Name : <span class="content father_name">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Father Occupation : <span class="content father_occupation">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Father Qualification : <span class="content father_qualification">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Father Contact : <span class="content father_contact">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Father Email : <span class="content father_email">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-12 mt-3 border">
                        <div class="name">Father Add : <span class="content father_add">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-12 mt-3 border" style="background-color: #ffae01!important;">
                        <div class="name">Mother Name : <span class="content mother_name">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Mother Occupation : <span class="content mother_occupation">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Mother Qualification : <span class="content mother_qualification">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Mother Contact : <span class="content mother_contact">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-6 mt-3 border">
                        <div class="name">Mother Email : <span class="content mother_email">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-12 mt-3 border">
                        <div class="name">Mother Add : <span class="content mother_add">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-4 mt-3 border">
                        <div class="name">SMS Contact : <span class="content sms_contact">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-4 mt-3 border">
                        <div class="name">Whatsapp Contact : <span class="content whatsapp_contact">Ajay</span></div>
                    </div>
                    <div class="fild-row left col-4 mt-3 border">
                        <div class="name">Email : <span class="content email_add">Ajay</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane container fade" id="menu2">
        <div class="cotainer">
            <dic class="col-lg-6 offset-lg-3">
                <div class="atttendence-chart-wrap">
                    <canvas id="atttendence-line-chart" width="600" height="300"></canvas>
                </div>
            </dic>
        </div>
    </div>
    <div class="tab-pane container fade" id="menu3">
        <div class="col-12  table-responsive pt-3">
            <table class="table table-striped table-inverse text-center">
                <thead class="thead-inverse fee_months">
                    <tr>
                        <th>Apr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                    </tr>
                </thead>
                <tbody class="show_fee_data">
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade" id="menu4"></div>
    <div class="tab-pane container fade" id="menu5"></div>
    <div class="tab-pane container fade" id="menu6"></div>
    <div class="tab-pane container fade" id="menu7"></div>
</div>
</div>
<style>
    .content,
    .name {
        font-weight: bold;
    }

    .fc-basicWeek-button,
    .fc-month-button,
    .fc-basicDay-button {
        display: none;
    }

    .fc-day-number {
        font-size: 2.5rem !important;
    }

    .fc-sun .fc-day-number {
        color: #ff9800 !important;
    }
</style>
<?php require_once './includes/scripts.php'; ?>
<script>
    $(document).ready(function() {
        var dates = $('.fc-past').text();
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
                    if (value.Middle_Name == null) {
                        var name_studs = value.First_Name + ' ' + value.Last_Name;
                    } else {
                        var name_studs = value.First_Name + ' ' + value.Middle_Name + ' ' + value.Last_Name;
                    }
                    html_table += '<tr><td>' + value.Student_Id + '</td><td>' + name_studs + '</td><td>' + value.Father_Name + '</td><td>' + value.DOB + '</td><td><button class="btn btn-warning load_student_data" id="' + value.Student_Id + '"><i class="fas fa-binoculars fa-2x"></i></button></td></tr>';
                });
                $('.append_stud_data').html(html_table);
            });
        });

        // load student data on search
        $(document).on('click', '.load_student_data', function(event) {
            event.preventDefault();
            var stud_data_id = $(this).attr('id');
            load_student_data(stud_data_id);
            show_attendence(stud_data_id);
            show_fee_details(stud_data_id);
        });

        // check if student is logged in show data automatically
        const login_type = "<?php echo $_SESSION["LOGINTYPE"]; ?>";
        const login_id = "<?php echo $_SESSION["USERID"]; ?>";
        if (login_type == 'STUDENT' && login_id != '') {
            $('.nav_sec').addClass('active');
            $('#tab2').addClass('active');
            load_student_data(login_id);
            show_attendence(login_id);
            show_fee_details(login_id);
        }

        // function to load student data 
        function load_student_data(student_id) {
            var url = "./universal_apis.php?get_stud_details_by_name=1&search_type=1&stud_data=" + student_id + "";
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    if (value.Middle_Name == null) {
                        var name_studs = value.First_Name + ' ' + value.Last_Name + ' (' + value.Student_Id + ')';
                    } else {
                        var name_studs = value.First_Name + ' ' + value.Middle_Name + ' ' + value.Last_Name + ' (' + value.Student_Id + ')';
                    }
                    $('.first_name').text(name_studs);
                    $('.class').text(value.Class_Name);
                    $('.section').text(value.Section);
                    if (value.Roll_No == null) {
                        roll_no = 'N.A.';
                    } else {
                        roll_no = value.Roll_No;
                    }
                    $('.roll').text(roll_no);
                    $('.gender').text(value.Gender);
                    $('.father_name').text(value.Father_Name);
                    $('.mother_name').text(value.Mother_Name);
                    $('.dis_category').text(value.Discount_Category);
                    $('.dob').text(value.DOB);
                    $('.father_occupation').text(value.Father_Occupation);
                    $('.religion').text(value.Religion);
                    $('.email').text(value.Email_Id);
                    $('.session').text(value.Session);
                    $('.session_st').text(value.Session_Start_Year);
                    $('.session_en').text(value.Session_End_Year);
                    $('.tongue').text(value.Mother_Tongue);
                    $('.tongue').text(value.Mother_Tongue);
                    $('.locality').text(value.Locality);
                    $('.aadhar').text(value.Aadhar_No);
                    $('.b_group').text(value.Blood_Group);
                    $('.nationality').text(value.Nationality);
                    $('.com_add').text(value.Comm_Address + ', ' + value.Comm_Add_Country + ', ' + value.Comm_Add_State + ', ' + value.Comm_Add_City_Dist + ', ' + value.Comm_Add_Pincode + ', Contact :' + value.Comm_Add_ContactNo);
                    $('.res_add').text(value.Resid_Address + ', ' + value.Resid_Add_Country + ', ' + value.Resid_Add_State + ', ' + value.Resid_Add_City_Dist + ', ' + value.Resid_Add_Pincode + ', Contact :' + value.Resid_Add_ContactNo);
                    $('.father_name').text(value.Father_Name);
                    $('.father_occupation').text(value.Father_Occupation);
                    $('.father_qualification').text(value.Father_Qualification);
                    $('.father_add').text(value.Father_Org_Name + ', ' + value.Father_Org_Add + ', ' + value.Father_City + ', ' + value.Father_State + ', ' + value.Father_Country + ', ' + value.Father_Pincode);
                    $('.father_email').text(value.Father_Email);
                    $('.father_contact').text(value.Father_Contact_No);
                    $('.mother_name').text(value.Mother_Name);
                    $('.mother_occupation').text(value.Mother_Occupation);
                    $('.mother_qualification').text(value.Mother_Qualification);
                    $('.mother_add').text(value.Mother_Org_Name + ', ' + value.Mother_Org_Add + ', ' + value.Mother_City + ', ' + value.Mother_State + ', ' + value.Mother_Country + ', ' + value.Mother_Pincode);
                    $('.father_email').text(value.Mother_Email);
                    $('.father_contact').text(value.Mother_Contact_No);
                    $('.sms_contact').text(value.SMS_Contact_No);
                    $('.whatsapp_contact').text(value.Whatsapp_Contact_No);
                    $('.email_add').text(value.Email_Id);
                    if (value.Student_Image != null) {
                        url = './app_images/AdmissionDocuments/' + value.Admission_Id + '_AdmissionDocs/' + value.Student_Image;
                        $('.main_img').attr('src', url);
                        $('.back_img').attr('src', url);
                    }
                });
            });
        }

        /********* attendence **********/
        function show_attendence(student_id) {
            var bar_level = [];
            bar_data = [];
            var url_attedence = "./universal_app_api2.php?Parameter=StudYearlyAttendance&StudentId=" + student_id + "";
            $.getJSON(url_attedence, function(att_response) {
                $.each(att_response.month, function(key, value) {
                    bar_level.push(value.month_name);
                    bar_data.push(value.attendance_percent);
                });
                show_chart(bar_level, bar_data);
            });
        }

        function show_chart(bar_level, bar_data) {
            var ctx = document.getElementById('atttendence-line-chart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: bar_level,
                    datasets: [{
                        label: '# Start Month',
                        data: bar_data,
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        // load student fee details
        function show_fee_details(student_id) {
            // const fee_url ="./FeeCollectionAPI.php?Parameter=ViewFeeSummary&studentid=156/2018&ac_type=SchoolBusFee&school_id=1&session=2020-2021";
            var school_id = "<?php echo $_SESSION['SCHOOLID'] ?>";
            var stud_session = "<?php echo $_SESSION['SESSION'] ?>";
            const fee_url = "./FeeCollectionAPI.php?Parameter=ViewFeeSummary&studentid=" + student_id + "&ac_type=SchoolBusFee&school_id=" + school_id + "&session=" + stud_session + "";
            var html_fee_row = '';
            $.getJSON(fee_url, function(fee_response) {
                html_fee_row += `<tr>`;
                $.each(fee_response.School_Fee, function(key, value_det) {
                    if (value_det.Pay_Status == "Paid") {
                        active_class = 'text-success';
                    } else {
                        active_class = 'text-danger';
                    }
                    html_fee_row += `<td><span class="${active_class}">${value_det.Fee_Amount}<span></td>`;
                });
                html_fee_row += `</tr>`;
                html_fee_row += `<tr>`;
                $.each(fee_response.Bus_Fee, function(key, b_value_det) {
                    if (b_value_det.Pay_Status == "Paid") {
                        active_class = 'text-success';
                    } else {
                        active_class = 'text-danger';
                    }
                    html_fee_row += `<td><span class="${active_class}">${b_value_det.Fee_Amount}<span></td>`;
                });
                html_fee_row += `</tr>`;
                html_fee_row += `<tr>`;
                var link = '';
                $.each(fee_response.School_Fee, function(key, value_det_rec) {
                    if (value_det_rec.Receipt == 0) {
                        link = 'N.A.';
                    } else {
                        link = `<a href="./FeeReceiptPrint.php?receipt_id=${value_det_rec.Receipt}&schoolid=${school_id}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Receipt</a>`;
                    }
                    html_fee_row += `<td class="text-center">${link}</td>`;
                });
                html_fee_row += `</tr>`;
                html_fee_row += `<tr><th colspan="6"><span class="text-success">Green=Paid</span></th><th colspan="6"><span class="text-danger">Red=Unpaid</span></th></tr>
                `;
                $('.show_fee_data').html(html_fee_row);
            });
        }
    });
</script>
<?php require_once './includes/closebody.php'; ?>