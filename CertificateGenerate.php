<?php
$pageTitle = "Generate Certirficate";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<div class="container-fluid">
    <div class="row new-added-form school-form aj-new-added-form">
        <div class="col-4">
            <div class="form-group aj-form-group">
                <label>Class <span>*</span></label>
                <select class="select2 col-12" name="s_class" id="s_class">
                    <option value="">Select Class</option>
                    <?php
                    $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                    $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365));
                    echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                <option value="' . $next_session . '">' . $next_session . '</option>';
                    ?>
                </select>
            </div>
        </div>
       <!------ <div class="col-3">
             space for section 
        </div>------->
        <div class="col-4">
            <div class="form-group aj-form-group">
                <label>Year <span>*</span></label>
                <select class="select2 col-12" name="f_class" id="school_session" name="schoolSession">
                    <option value="">-- SELECT Year --</option>
                    <?php
                    $current_session = $_SESSION["STARTYEAR"] . '-' . $_SESSION["ENDYEAR"];
                    $next_session = $_SESSION["ENDYEAR"] . '-' . date('Y', strtotime($_SESSION["ENDYEAR"]) + (3600 * 24 * 365));
                    echo '<option value="' . $current_session . '">' . $current_session . '</option>
                                <option value="' . $next_session . '">' . $next_session . '</option>';
                    ?>
                </select>
            </div>
        </div>
        <div class="col-4 aj-mb-2"> 
            <button type="button" id="fetch_result" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Search </button>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-md-12 mt-4 table-responsive">
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>Sl</th>
                    <th>Student Id</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Father's Name</th>
                    <!--<th>Details</th>-->
                    <th>Certificate</th>
                </tr>
                </thead>
                <tbody class="show_student_data new-added-form school-form aj-new-added-form">
                </tbody>
        </table>
    </div>
</div>
<!-- details modal -->
<div class="modal student_details">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Student's Detail</h6>
                <button type="button" class="close close_st_mod" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="model-tebal-in">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                            <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2 mt-3 ml-1 row student_data table-responsive">
                                    <table class="table table-striped table-inverse ">
                                            <tr>
                                                <th>Name</th><td>Rakesh Kumar</td>
                                                <th>Class / Roll</th><td>5(A)/15</td>
                                            </tr>
                                            <tr>                                            
                                                <th>DOB</th><td>15/10/2000</td>
                                                <th>Father Name</th><td>Gyan Prakash</td>
                                            </tr>
                                    </table>
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
    .modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<?php
require_once './includes/scripts.php';
?>
<script>
    $(document).ready(function() {
        get_all_class();
        function get_all_class() {
            var cls_html = '';
            cls_html += '<option value="">Select Class</option>';
            const class_url = './universal_apis.php?getAllClass=1';
            $.getJSON(class_url, function(response_class) {
                $.each(response_class,function(key, class_val){
                    cls_html += `<option value="${class_val.Class_Id}">${class_val.Class_Name}</option>`;
                });
                $('#s_class').html(cls_html);
            });
        }
    });

    $(document).on('click','#fetch_result',function(event){
        event.preventDefault();
        let class_id = $('#s_class').val();
        let school_session = $('#school_session').val();
        const school_id = "<?php echo $_SESSION['SCHOOLID']; ?>";
        if (class_id =='') {
            alert("Please Select Class");
        }
        if (school_session=='') {
            alert("Please Select Year");
        }
        if (class_id !='' && school_session !='') {
            const result_url = `./CertificateControl_1.php?get_student_by_class_session=1&school=${school_id}&session=${school_session}&class=${class_id}`;
            let stud_html = ``; let i=0;
            $.getJSON(result_url, function(studs_data){
                $.each(studs_data, function(key, stud_data){
                    stud_html += `<tr>
                                    <td scope="row">${++i}</td>
                                    <td>${stud_data.stud_id}</td>
                                    <td>${stud_data.stud_name}</td>
                                    <td>${stud_data.dob}</td>
                                    <td>${stud_data.f_name}</td>
                                    <!--<td><a href="#" id="${stud_data.stud_id}" class="btn btn-primary see_details"><i class="fa fa-eye" aria-hidden="true"></i></a></td>-->
                                    <td> <div class="row">   <div class="form-group col-9 aj-form-group">  <select class="select2 col-12 form-group aj-form-group " name="f_class" id="cert_type${i}" name="schoolSession">
                                        <option value="">SELECT Certificate</option>                 
                                        <option value="bonafide_curr">Bonafide (Current)</option>
                                        <option value="bonafide_ex">Bonafide (Ex)</option>
                                        <option value="character">Character</option>
                                        <option value="slc">SLC</option>
                                        <option value="tc">TC</option>
                                        <option value="tution_fee">Tution Fee</option>
                                    </select></div>
                                    <div class="col-3">
                                    <button type="button" class="btn btn-warning btn_print" id="${stud_data.stud_id}" btn_no="${i}"><i class="fa fa-print fa-2x" aria-hidden="true"></i></button></div>
                                    </div>
                                    </td>
                                </tr>`;
                });
                $('.show_student_data').html(stud_html);
            });
        }
    });

    $(document).on('click','.btn_print',function(){
        let student_id = $(this).attr('id');
        let serial_no = $(this).attr('btn_no');
        let certificate_type = $('#cert_type'+serial_no+'').val();
        if (certificate_type == '') {
            alert("Please Select Certificate Of Serial No "+serial_no+"");
        }
        else{
            window.open("./Certificate.php?type="+certificate_type+"&studentid="+student_id+"");
        }
    });
    $(document).on('click','.see_details',function(event){
        event.preventDefault();
        let student_id = $(this).attr('id');
        //$('.student_data').html('');
        $('.student_details').fadeIn();
    });
    $('.close_st_mod').click(function(){
        $('.student_details').fadeOut();
    });
</script>
<?php require_once './includes/closebody.php'; ?>
