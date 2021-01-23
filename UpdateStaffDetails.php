<?php
/*make a variable named $pageTitle */
$pageTitle = "Update Staff Details";
$bodyHeader = "Update Staff Details";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>

<form class="new-added-form school-form aj-new-added-form">

    <div class="row ">
        <div class="col-xl-5 col-lg-5 col-12 aj-mb-2">
            <div class="form-group aj-form-group">
                <label>Role <span>*</span></label>
                <select class="select2" name="depar_Category">
                    <option value="">Bro. Satheesh K. Don</option>
                    <option value="">Bro. Satheesh K. Don</option>
                    <option value="">Bro. Satheesh K. Don</option>
                    <option value="">Bro. Satheesh K. Don</option>
                    <option value="">Bro. Satheesh K. Don</option>
                    <option value="">Bro. Satheesh K. Don</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 aj-mb-2 text-left">
            <!-- <button type="submit" id="opne-form-Promotion" class="aj-btn-a1 btn-fill-lg btn-gradient-dark btn-hover-bluedark">Submit </button> -->
            <a href="javascript:void(0);" class="aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Get Data </a>
            <a href="javascript:void(0);" class=" ml-3 aj-btn-a1 btn-fill-lg btn-gradient-dark  btn-hover-bluedark">Export</a>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 aj-mb-2 mb-5">

            <div class="form-group aj-form-group">
                <label>Filter Search </label>
                <input type="text" name="desi_designation" placeholder="Staff Name/Login Id" class="form-control">
            </div>

        </div>
    </div>

    <br>
    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2 ">

        <div class="Attendance-staff aj-scroll-Attendance-staff">
            <div class="table-responsive">
                <table class="table table-bordered sticky-header table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25%;">Name </th>
                            <th style="width: 15%;">Mobile No. </th>
                            <th style="width: 15%;">Login Id</th>
                            <th style="width: 10%;">Role</th>
                            <th style="width: 25%;">Father Name</th>
                            <th style="width: 10%;">Edit</th>
                        </tr>
                    </thead>
                    <tbody class="top-position-ss">
                        <?php
                        $sqlstaffdetails = 'select Staff_Id, Staff_Name, Contact_No, Login_Id, Role, Fathers_Or_Husband_Name, Enabled from staff_master_table where School_Id="' . $schoolId . '" order by Staff_Id';
                        $resultstaffdetails = mysqli_query($dbhandle, $sqlstaffdetails);
                        while ($row = mysqli_fetch_assoc($resultstaffdetails)) {
                        ?>
                            <tr>
                                <td style="width: 25%;"><?php echo $row["Staff_Name"]; ?></td>
                                <td style="width: 15%;"><?php echo $row["Contact_No"]; ?></td>
                                <td style="width: 15%;"><?php echo $row["Login_Id"]; ?></td>
                                <td style="width: 10%;"><?php echo $row["Role"]; ?></td>
                                <td style="width: 25%;"><?php echo $row["Fathers_Or_Husband_Name"]; ?></td>
                                <td style="text-align: center; width: 10%;">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="flaticon-more-button-of-three-dots"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="EditStaff.php?staffid=<?php echo $row["Staff_Id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Family Detail</a>
                                            <a class="dropdown-item" href="./AddStaffDocument.php?staff_id=<?php echo $row["Staff_Id"]; ?>&staff_name=<?php echo $row["Staff_Name"]; ?>"><i class="fa fa-upload" aria-hidden="true"></i> Document Upload</a>
                                            <?php if ($row["Enabled"] == 1) { ?>
                                                <a class="dropdown-item" href="DeactivateStaff2.php?staffid=<?php echo $row["Staff_Id"]; ?>" onclick="return confirm('sure to Deactivate ?')"><i style="color: red" class="fa fa-ban" aria-hidden="true"></i>Deactivate</a>
                                            <?php } else { ?>
                                                <a class="dropdown-item" href="ActivateStaff2.php?staffid=<?php echo $row["Staff_Id"]; ?>" onclick="return confirm('sure to Activate ?')"><i style="color: green" class="fa fa-ban" aria-hidden="true"></i>Activate</a>
                                            <?php } ?>
                                            <a class="dropdown-item" href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Massage</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
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
<?php
require_once './includes/closebody.php';
?>