<?php
$pageTitle = "Create New Assignment";
require_once './includes/header.php';
include_once './includes/navbar.php';
include_once 'AdmissionModel.php';
if ($_SESSION["LOGINTYPE"] == 'STUDENT' || $_SESSION["LOGINTYPE"] == 'PARENT') {
    echo '<script>alert("You Donot Have Rights To Access This Page"); window.location.href="./dashboard.php"</script>';
}
?>
<form class="new-added-form school-form aj-new-added-form" action="./CreateNewAssignments_1.php" id="create_assignment" method="post">
    <input type="text" name="assignment_sender" value="" class="form-control d-none" autocomplete="off">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-9 col-xl-9 ">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group">
                        <label> Assignments Type<span>*</span></label>
                        <select class="select2 col-12" required="" name="assignment_type">
                            <option value="">Select One </option>
                            <option value="">All </option>
                            <option value="Assignment">Assignment </option>
                            <option value="Project">Project </option>
                            <option value="Home Work">Home Work</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group">
                        <label>Class <span>*</span></label>
                        <select class="select2 col-12" required="" name="assignment_class" id="assignment_class">
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group">
                        <label>Topic</label>
                        <input type="text" id="sname" name="sname" placeholder="" class="form-control" required="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group">
                        <label class="mb-1">Section Name</label>
                        <div class="box-scroll">
                            <div class="radio secList" style="display: none;">
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" checked="" value="1"> A</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="2"> B</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="3"> C</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="4"> D</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="5"> E</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="6"> F</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="7"> G</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="8"> H</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="9"> I</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="10"> J</span>
                                <span><input type="checkbox" class="gaurdian-bs" name="Present[]" value="11"> K</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group">
                        <label>Description </label>
                        <textarea style="height: 100%;" class="textarea form-control" name="description" id="description" cols="40" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group">
                        <label>Subject Name</label>
                        <select class="select2 col-12" required="" name="assignment_subject" id="assignment_subject">
                            <option value="">Select One </option>
                        </select>
                    </div>
                    <div class="form-group aj-form-group">
                        <label>Reference Type</label>
                        <select class="select2 col-12" required="" name="reference_type">
                            <option value="">Select One </option>
                            <option value="Teacher">Teacher </option>
                            <option value="Student">Student </option>
                            <option value="Others">Others </option>
                        </select>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group">
                        <label>Is Submissable</label>
                        <select class="select2 col-12" required="" name="submissible" id="depar_Category">
                            <option value="0">Select One </option>
                            <option value="Yes">Yes </option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-12 aj-mb-2 mb-4 mt-2">
                    <div class="form-group aj-form-group submission_field" style="display:none">
                        <label id="lab_sub">Date of Submission <span>*</span></label>
                        <input type="text" name="date_of_submision" id="date_of_submision" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 text-right">
                    <a href="javascript:void(0);" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</a>
                    <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create Assignments </button>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2 form_output">

                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
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

    $('#depar_Category').change(function() {
        const isSubmissible = $(this).val();
        if (isSubmissible == 'Yes') {
            $('.submission_field').fadeIn('slow');
        } else {
            $('.submission_field').fadeOut('slow');
        }
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
                $('#assignment_class').html(html);
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
                $('#assignment_subject').html(html);
            }
        });
    }


    $('#create_assignment').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(data) {
                $('.form_output').html(data);
            }
        });
    });

    $(document).on('change', '#assignment_class', function() {
        let classId = $(this).val();
        if (classId != "") {
            $.ajax({
                url: './CreateNewAssignments_1.php',
                method: 'get',
                data: {
                    'getSection': 1,
                    'classId': classId
                },
                success: function(data) {
                    $('.secList').fadeIn('slow');
                    $('.secList').html(data);
                }
            });
        }
    });
</script>
<?php require_once './includes/closebody.php'; ?>