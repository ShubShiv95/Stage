<?php
/*make a variable named $pageTitle */
$pageTitle = "Transport Vehicle List";
$bodyHeader = "Transport Vehicle List";
require_once './includes/header.php';
require_once './includes/navbar.php';
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row">
            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2  table-responsive">
                  <table class="table table-striped table-inverse">
                    <thead class="thead-inverse">
                      <tr>
                        <th>Sl. No</th>
                        <th>Vehicle No</th>
                        <th>Type</th>
                        <th>Capacity</th>
                        <th>Route</th>
                        <th>Driver</th>
                        <th>IMEI No</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">a</td>
                          <td>a</td>
                          <td>s</td>
                          <td>a</td>
                          <td>s</td>
                          <td>a</td>
                          <td>s</td>
                          <td>a</td>
                        </tr>
                        <tr>
                        <td scope="row">a</td>
                          <td>a</td>
                          <td>s</td>
                          <td>a</td>
                          <td>s</td>
                          <td>a</td>
                          <td>s</td>
                          <td>a</td>
                        </tr>
                      </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once './includes/scripts.php'; ?>
<!--- write own js scrip here --->
<script type="text/javascript">
  $(document).ready(function(){

  });
</script>
<?php
require_once './includes/closebody.php';
?>
