<?php
$pageTitle = "Syllabus Class";
require_once './includes/header.php';
require_once './includes/navbar.php';
$lid = $_SESSION["LOGINID"];
$schoolId = $_SESSION["SCHOOLID"];
?>

<form class="new-added-form school-form aj-new-added-form" id="designationform" method="post" action="./SyllabusClass_1.php" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-12 aj-mb-2">
            <div class="box-sedow">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <div class="form-group aj-form-group">
                            <label>Select Class <span>*</span></label>
                            <select class="select2 col-12" required="" name="assignment_class" id="assignment_class">

                            </select>
                        </div>
                        <div class="form-group aj-form-group">
                            <label>Select Subject</label>
                            <select class="select2 col-12" required="" name="assignment_subject" id="assignment_subject">
                                <option value="">Select One </option>
                            </select>
                        </div>
                        <!-- <div class="form-group aj-form-group">
                                                    <label>Select  Teacher <span>*</span></label>
                                                    <select class="select2" name="desi_department" required>
                                                        <option value="">Select  Teacher</option>
													
                                                    </select>
                                                    
                                                </div> -->
                        <div class="form-group aj-form-group">
                            <label class="ml-4">Select Syllabus(PDF Files only)</label>
                            <input type="file" name="class_routine_file" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="aaj-btn-chang-cbtn text-right">
                    <button type="submit" name="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button>
                    <!-- <a  href="javascript:void(0);"  class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Submit </a>-->
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Edit </th>
                                    <th>Class </th>
                                    <th>Subject</th>
                                    <th>View Syllabus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqldesc = "SELECT cst.Class_Syllabus_Id,cmt.Class_Name,smt.Subject_Name ,cst.filename from class_syllabus_table cst ,class_master_table cmt, subject_master_table smt where cst.subject_id=smt.subject_id and cst.class_id=cmt.class_id order by cst.Class_Syllabus_Id desc";
                                $resultdesc = mysqli_query($dbhandle, $sqldesc);
                                while ($row = mysqli_fetch_assoc($resultdesc)) {

                                ?>
                                    <tr>
                                        <td><a href="EditSyllabusClass.php?Class_Syllabus_Id=<?php echo $row['Class_Syllabus_Id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></i></a></td>
                                        <td><?php echo $row["Class_Name"]; ?></td>
                                        <td><?php echo $row["Subject_Name"]; ?></td>
                                        <td> <a href="./app_images/Syllabus_class/<?php echo $row["filename"]; ?>" target="_blank">Click to View</a> </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once './includes/scripts.php'; ?>
<script type="text/javascript">
    $('#opne-form-Promotion').click('.sibling-bs', function() {
        $('.tebal-promotion').slideToggle('slow');
    })
</script>
<?php
unset($_SESSION['successmsg']);
?>
<script>
    function showsection(str) {
        var xmlhttp;
        if (str == "") {
            document.getElementById("section").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("secid").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getSectionList.php?classid=" + str, true);
        xmlhttp.send();
    }
</script>
<script>
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
</script>
<?php require_once './includes/closebody.php'; ?>