<?php $pageTitle  = "Absent Student List";
require_once './includes/header.php';

require_once './includes/navbar.php';
?>
<form class="new-added-form school-form aj-new-added-form">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-12 aj-mb-2">
            <div class="tebal-promotion">
                <h5 class="text-center">List of Absent Students</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Roll No. </th>
                                <th>Srudent Name </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4</td>
                                <td>K.G. Student 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="atten-chack">
                    <div class="chack">

                        <label class=""><input type="checkbox" class=""> Send Absentees SMS</label>
                    </div>
                    <div class="chack">
                        <label class="form-check-label"><input type="checkbox" class="form-check-input"> Send Absentees What's app</label>
                    </div>
                </div>
                <div class="new-added-form aj-new-added-form">
                    <div class="aaj-btn-chang-cbtn">
                        <a class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark mb-3" href="StudentAttendanceEntry.php">Edit Attendance </a>
                        <button type="submit" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Post Attendance </button>
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
<?php require_once './includes/closebody.php'; ?>