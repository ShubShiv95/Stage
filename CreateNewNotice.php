<?php
$pageTitle = "Create Notice";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form" enctype="multipart/form-data">
    <div class="row">
        <div class="main-form-data-communication col-xl-6 col-lg-6 col-12">
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label>Notice Title *</label>
                <input type="text" id="noticetitle" name="noticetitle" placeholder="" class="form-control" required>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label>&nbsp;</label>
                <select class="select2 col-12" id="noticeclass" name="noticeclass" required>
                    <option value="">Select Class *</option>
                    <option value="Play School">Play School</option>
                    <option value="Nursery">Nursery</option>
                    <option value="LKG">LKG</option>
                    <option value="UKG">UKG</option>
                </select>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label>&nbsp;</label>
                <select class="select2 col-12" id="noticesection" name="noticesection" required>
                    <option value="">Select Section *</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <div class="tabular-section-detail new-notice comm-message">
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input checkAll">
                                            <label class="form-check-label">Select Individuals</label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Test 2 Nursery</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Test 1 Nursery</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Test 2 Play School</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Test 1 Play School</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Test 2 Class I</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Test 2 Class II</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="snap-area-visitor col-xl-6 col-lg-6 col-12 comm-messaage-send-section">
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label>Notice Details *</label>
                <textarea class="textarea form-control" name="noticedetail" id="noticedetail" cols="10" rows="10" onkeyup="restrict_textlength('messagedetail','300');" required></textarea>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group">
                <label>Attach File: PDF,JPG,JPEG,PNG upto 1MB</label>
                <input type="file" id="noticefile" name="noticefile" placeholder="" class="form-control">
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group count-row" id="noticetype">
                <input type="checkbox" id="noticewhatsapp" name="messageas[]" value="Also Send As WhatsApp" class=""><span>Also Send As WhatsApp</span>
            </div>
            <div class="col-xl-12 col-lg-12 col-12 form-group count-row" id="noticebtn">

                <button type="submit" id="createnotie" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create Notice</button>
            </div>
        </div>
    </div>
</form>

<?php require_once './includes/scripts.php'; ?>
<?php require_once './includes/closebody.php'; ?>