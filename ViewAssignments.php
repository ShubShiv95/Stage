<?php
session_start();
//$_SESSION["LOGINTYPE"];
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Admission Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <?php include('includes/navbar.php') ?>
        <div class="dashboard-page-one">
            <?php
            include 'includes/sidebar.php';
            ?>
            <div class="dashboard-content-one">
                <div class="breadcrumbs-area">
                    <h3>Eqnuiry</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Follow Up Eqnuiry</li>
                    </ul>
                </div>
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title aj-item-title">
                                <h3 class="mb-4">Assignment Lists</h3><span id="test_data"></span>
                            </div>

                            <form class="new-added-form school-form aj-new-added-form">
                                <div class="row justify-content-center">
                                    <?php
                                    if ($_SESSION["LOGINTYPE"] == 'STUDENT' || $_SESSION["LOGINTYPE"] == 'PARENT') {
                                        echo '<div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Subject <span>*</span></label>
                                                    <select class="select2" required="" id="subjectList">
                                                        <option value="">Select Subject </option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Month</label>
                                                    <select class="select2" required="" id="monthList">
                                                        <option value="0">Select Month </option>
                                                        <option value="1">January </option>
                                                        <option value="2">February </option>
                                                        <option value="3">March </option>
                                                        <option value="4">April </option>
                                                        <option value="5">May </option>
                                                        <option value="6">June </option>
                                                        <option value="7">July </option>
                                                        <option value="8">August </option>
                                                        <option value="9">September </option>
                                                        <option value="10">October </option>
                                                        <option value="11">November </option>
                                                        <option value="12">December </option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2 text-right">
                                            <a href="javascript:void(0);" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" id="searchAssignmentts">Search</a>
                                        </div>';
                                    } else {
                                        echo '                                    
                                        <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Class <span>*</span></label>
                                                <select class="select2" required="" id="classList">
                                                    <option value="">All </option>
                                                    <?php echo $classDropdownValue; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Section </label>
                                                <select class="select2" required="" id="sectionList">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Subject <span>*</span></label>
                                                <select class="select2" required="" id="subjectList">
                                                    <option value="">Select Subject </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-12 aj-mb-2">
                                            <div class="form-group aj-form-group">
                                                <label>Month</label>
                                                <select class="select2" required="" id="monthList">
                                                    <option value="0">Select Month </option>
                                                    <option value="1">January </option>
                                                    <option value="0">Select Month </option>
                                                    <option value="1">January </option>
                                                    <option value="2">February </option>
                                                    <option value="3">March </option>
                                                    <option value="4">April </option>
                                                    <option value="5">May </option>
                                                    <option value="6">June </option>
                                                    <option value="7">July </option>
                                                    <option value="8">August </option>
                                                    <option value="9">September </option>
                                                    <option value="10">October </option>
                                                    <option value="11">November </option>
                                                    <option value="12">December </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-12 aj-mb-2 text-right">
                                            <a href="javascript:void(0);" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark" id="searchAssignmentts">Search</a>
                                        </div>';
                                    }
                                    ?>
                                    <div class="col-xl-10 col-lg-10 col-12 mt-5 assignment-list">
                                        <!--<div class="cart-box-row">
                                            <div class="box-row">
                                                <div class="left-content">
                                                    <h6>NEW SESSION STUDENT LIST</h6>
                                                    <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by Montfort School </span> | <span> Created on 5May2020 </span></p>
                                                </div>
                                                <div class="right-content">
                                                    <ul> 
                                                        <li><a href="javascript:void(0);" class="color-1"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-2"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-3"><i class="fa fa-file" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-4"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-5"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="content-descr">
                                                <a href="javascript:void(0);" add="addin" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                                <div class="content addin">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="cart-box-row">
                                            <div class="box-row">
                                                <div class="left-content">
                                                    <h6>NEW SESSION STUDENT LIST</h6>
                                                    <p class="all-desc"> <span> Class: II</span> | <span> Uploaded by Montfort School </span> | <span> Created on 5May2020 </span></p>
                                                </div>
                                                <div class="right-content">
                                                    <ul>

                                                        <li><a href="javascript:void(0);" class="color-5"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-6"><i class="fa fa-chain-broken" aria-hidden="true"></i></a></li>
                                                        <li><a href="javascript:void(0);" class="color-7"><i class="fa fa-trash" aria-hidden="true"></i></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="content-descr">
                                                <a href="javascript:void(0);" add="addin1" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                                <div class="content addin1">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </div>

                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <footer class="footer-wrap-layout1">
                        <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
                    </footer>
                </div>
            </div>

            <!-- assignment upload start -->
            <div class="modal" id="modelAddAssign" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg border-waarning" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Assignments</h5>
                            <button type="button" class="close-mod" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <form class="new-added-form school-form aj-new-added-form" action="./CreateNewAssignments_1.php" id="upload_assignment_file" method="post" enctype="multipart/form-data">
                                <input type="text" name="assignment_file_sender" value="" class="form-control d-none" autocomplete="off">
                                <input type="text" name="Assignment_id" id="Assignment_id" value="" class="form-control d-none" autocomplete="off">
                                <div class="row justify-content-center">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-9 col-lg-9 col-xl-9 ">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                    <div class="form-group aj-form-group">
                                                        <label> Upload Type<span>*</span></label>
                                                        <select class="select2" required="" name="assignment_type" id="assignment_type">
                                                            <option value="">Select One </option>
                                                            <option value="Link">Link </option>
                                                            <option value="File">File </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                                                    <div class="form-group aj-form-group">
                                                        <label>Attach Assignment</label>
                                                        <input type="text" id="assignment" name="assignment" placeholder="" class="form-control aLink" style="display: block;" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 text-right">
                                                    <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save File </button>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 form_output">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- assignment upload end -->

        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/datepicker.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/myscript.js"></script>
        <script type="text/javascript" src="js/ajax-function.js"></script>

        <script language="JavaScript">
            $(document).on('click', '.hide-cl', function() {

                $(this).addClass('chang-togel');
                $(this).html('<i class="fa fa-chevron-up" aria-hidden="true"></i>');
                var add = $(this).attr('add')
                $('.content').removeClass('active')


                var par = $('.' + add).addClass('active');
            });

            $(document).on('click', '.chang-togel', function() {
                $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
                $('.content').removeClass('active')
                $('.chang-togel').removeClass('chang-togel')
            });

            $(document).ready(function() {

                $('#assignment_type').change(function() {
                    const assignment_type = $(this).val();
                    if (assignment_type == 'File') {
                        $('.aLink').fadeIn('slow');
                        $('.aLink').get(0).type = 'file';
                    } else if (assignment_type == 'Link') {
                        $('.aLink').fadeIn('slow');
                        $('.aLink').get(0).type = 'text';
                    }
                });

                $('#upload_assignment_file').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('.form_output').html(data);
                            load_assignments();
                        }
                    });
                });

                $(document).on('click', '.uploadAssign', function(e) {
                    e.preventDefault();
                    const assignment_id = $(this).attr('id');
                    $('#Assignment_id').val(assignment_id);
                    $('#modelAddAssign').fadeIn();
                });

                $('.close-mod').click(function() {
                    $('#modelAddAssign').fadeOut();
                });

                $(document).on('click', '.deleteAssign', function(e) {
                    e.preventDefault();
                    if (confirm("Are You Sure To Delete?")) {
                        const assignment_id = $(this).attr('id');
                        $.ajax({
                            url: './CreateNewAssignments_1.php',
                            method: 'post',
                            data: {
                                'delAssign': 1,
                                'assignment_id': assignment_id
                            },
                            success: function(data) {
                                //$('#test_data').html(data);
                                alert("Assignment Deleted Successfully!!");
                                load_assignments();
                            }
                        });
                    }
                });

                $(document).on('change', '#classList', function() {
                    let classId = $(this).val();
                    if (classId != "") {
                        $.ajax({
                            url: './CreateNewAssignments_1.php',
                            method: 'get',
                            data: {
                                'getSections': 1,
                                'classId': classId
                            },
                            success: function(data) {
                                $('#sectionList').html(data);
                            }
                        });
                    }
                });


                $('#searchAssignmentts').click(function(e) {
                    e.preventDefault();
                    const userType = '<?php echo $_SESSION["LOGINTYPE"]; ?>';
                    if (userType == 'Student' || userType == 'Parent') {
                        const monthNumber = $('#monthList').val();
                        const subjectId = $('#subjectList').val();
                        if (subjectId == '') {
                            alert("Please Select Subject");
                        } else if (monthNumber == '') {
                            alert("Please Select Month")
                        } else {
                            $.ajax({
                                url: './StudentAssignmentSubmit_1.php',
                                method: 'get',
                                data: {
                                    'filterAssignment': 1,
                                    'monthNumber': monthNumber,
                                    'subjectId': subjectId
                                },
                                success: function(data) {
                                    $('.assignment-list').html(data);
                                }
                            });
                        }
                    } else {
                        const classId = $('#classList').val();
                        const sectionId = $('#sectionList').val();
                        const subjectId = $('#subjectList').val();
                        const monthNumber = $('#monthList').val();
                        if (classId == "") {
                            alert("Please Select Class");
                        } else if (sectionId == "") {
                            alert("Please Select Section");
                        } else if (subjectId == "") {
                            alert("Please Select Subject");
                        } else if (monthNumber == "") {
                            alert("Please Select Month");
                        } else {
                            $('.assignment-list').html('');
                            $.ajax({
                                url: './CreateNewAssignments_1.php',
                                method: 'get',
                                data: {
                                    'filterAssignment': 1,
                                    'classId': classId,
                                    'sectionId': sectionId,
                                    'monthNumber': monthNumber,
                                    'subjectId': subjectId
                                },
                                success: function(data) {
                                    $('.assignment-list').html(data);
                                }
                            });
                        }
                    }

                });

                // redirect user to an external link    
                $(document).on('click','.external_link',function(){
                    const url_link = $(this).attr('id');
                    window.open(url_link);
                });


                /*
                1. to fetch data from class table just copy code from below functions.
                2. keep object id as assignment_class
            */

                getAllClass();

                function getAllClass() {
                    $.ajax({
                        url: './universal_apis.php',
                        type: 'get',
                        data: {
                            'getAllClass': 1
                        },
                        dataType: 'json',
                        success: function(data) {
                            var classData = JSON.parse(JSON.stringify(data));
                            var html = '<option value="">Select</option>';
                            for (let i = 0; i < classData.length; i++) {
                                const classRow = classData[i];
                                html += '<option value="' + classRow.Class_Id + '">' + classRow.Class_Name + '</option>';
                            }
                            $('#classList').html(html);
                        }
                    });
                }

                /*
                    1. to fetch data from subject table just copy code from below functions.
                    2. keep object id as assignment_subject
                */
                getAllSubjects();

                function getAllSubjects() {
                    $.ajax({
                        url: './universal_apis.php',
                        type: 'get',
                        data: {
                            'getAllSubjects': 1
                        },
                        dataType: 'json',
                        success: function(data) {
                            var subjectData = JSON.parse(JSON.stringify(data));
                            var html = '<option value="">Select Subject</option>';
                            for (let i = 0; i < subjectData.length; i++) {
                                const subjectRow = subjectData[i];
                                html += '<option value="' + subjectRow.Subject_Id + '">' + subjectRow.Subject_Name + '</option>';
                            }
                            $('#subjectList').html(html);
                        }
                    });
                }
            });
        </script>
</body>

</html>