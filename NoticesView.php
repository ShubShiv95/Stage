<?php
$pageTitle = "View Notices And Circular";
$bodyHeader = "View Notice/Circular";
require_once './includes/header.php';
require_once './includes/navbar.php';
include 'dbobj.php';
//include 'errorLog.php';
include 'security.php';

if ($_SESSION["LOGINTYPE"] != 'STUDENT') {
    echo '<div class="container-fluid new-added-form aj-new-added-form new-aj-new-added-form">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-12">
            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2">
                <div class="form-group aj-form-group submission_field">
                    <label id="lab_sub">Date From <span>*</span></label>
                    <input type="text" name="date_of_submision" id="date_from" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-12">
            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2">
                <div class="form-group aj-form-group submission_field">
                    <label id="lab_sub">Date To <span>*</span></label>
                    <input type="text" name="date_of_submision" id="date_to" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2">
                <div class="form-group aj-form-group">
                    <label> Notice To</label>
                    <select class="select2 col-12" id="notice_to" name="notice_to">
                        <option value="All">All</option>
                        <option value="ClassId" data-select2-id="Students">Students</option>
                        <option value="DepartmentId" data-select2-id="Staff">Staff</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group aj-form-group text-right">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark search_notices">Search</button>
            </div>
        </div>
    </div>
</div>';
} else {
    echo '<div class="container-fluid new-added-form aj-new-added-form new-aj-new-added-form">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2">
                <div class="form-group aj-form-group submission_field">
                    <label id="lab_sub">Date From <span>*</span></label>
                    <input type="text" name="date_of_submision" id="date_from" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 mb-4 mt-2">
                <div class="form-group aj-form-group submission_field">
                    <label id="lab_sub">Date To <span>*</span></label>
                    <input type="text" name="date_of_submision" id="date_to" placeholder="DD/MM/YYYY" class="form-control air-datepicker" data-position="bottom right" autocomplete="off">
                    <i class="far fa-calendar-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group aj-form-group text-right">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark search_notices">Search</button>
            </div>
        </div>
    </div>
</div>';
}
?>
<div class="container new-added-form school-form aj-new-added-form notice_data"></div>


<?php
require_once './includes/scripts.php';
?>
<script src="js/myscript.js"></script>
<script type="text/javascript">
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
        $('.search_notices').click(function(event) {
            event.preventDefault();
            const date_from = $('#date_from').val();
            const date_to = $('#date_to').val();
            const notice_to = $('#notice_to').val();
            $.ajax({
                url: './Notice_1.php',
                type: 'get',
                data: {
                    'getAllNotices': 1,
                    'date_from': date_from,
                    'date_to': date_to,
                    'notice_to': notice_to
                },
                dataType: 'json',
                success: function(response) {
                    notice_data = JSON.parse(JSON.stringify(response));
                    var notice_html = '<div class="col-xl-10 col-lg-10 col-12 mt-5 assignment-list">';
                    for (let i = 0; i < notice_data.length; i++) {
                        const new_notice_el = notice_data[i];
                        notice_html += '<div class="cart-box-row"><div class="box-row"><div class="left-content"><h6>' + new_notice_el.Notice_Title + '</h6><p class="all-desc"> <span>Created By ' + new_notice_el.Updated_By + ' </span> | <span> Created on ' + new_notice_el.Updated_On + ' </span></p></div><div class="right-content">';
                        if(new_notice_el.Filename != 'NULL'){
                            notice_html +='<ul><li><a href="./' + new_notice_el.Filepath+'/'+new_notice_el.Filename + '" target="_blank" class="color-3"><i class="fa fa-file" aria-hidden="true"></i></a></li></ul>';
                        }
                        notice_html +='</div></div><div class="content-descr"><a href="javascript:void(0);" add="addin'+i+'" class="color-8 hide-cl"><i class="fa fa-chevron-down" aria-hidden="true"></i></a><div class="content addin'+i+'">' + new_notice_el.Notice_Description + '</div></div></div>';
                    }
                    notice_html += '</div>';
                    $('.notice_data').html(notice_html);
                }
            });
        });
    });
</script>
<?php
require_once './includes/closebody.php';
?>