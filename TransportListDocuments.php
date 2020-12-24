<?php
session_start();
/*make a variable named $pageTitle */
$pageTitle = "Transport List Vehicle Document";
$bodyHeader = $pageTitle;
require_once './includes/header.php';
include 'dbobj.php';
//include 'errorLog.php';
include 'security.php';
?>
<!-- start your UI here -->
<div class="col-md-12">
  <div class="card height-auto">
    <div class="card-body">
      <div class="heading-layout1">
        <div class="new-added-form school-form aj-new-added-form">
          <div class="row">
            <div class="col-xl-12 col-lg-12 mt-2 col-12 aj-mb-2">
                  <div class="row assignment-list table-responsive">
                      <table class="table table-striped table-inverse">
                        <thead class="thead-inverse">
                          <tr>
                            <th>Vehicle No</th>
                            <th>Document Name</th>
                            <th>Valid Till</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td scope="row"></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                      </table>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-wrap-layout1">
      <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
    </footer>
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
