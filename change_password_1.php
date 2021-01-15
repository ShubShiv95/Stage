<?php
session_start();
include_once 'dbobj.php';
include_once 'errorLog.php';
include_once 'security.php';
require_once 'sequenceGenerator.php';
/*********** change password **********/
if (isset($_REQUEST['password_sender'])) {
    if (empty($_REQUEST['password_sender'])) {
        mysqli_autocommit($dbhandle, false);        
      $query_check = "SELECT * FROM `login_table` WHERE `LOGIN_ID` = ?";
      $query_check_prep = $dbhandle->prepare($query_check);
      $query_check_prep->bind_param('s',$_SESSION["LOGINID"]);
      $query_check_prep->execute();
      $result_set = $query_check_prep->get_result();
      $user_row = $result_set->fetch_assoc();
      if (sha1($_REQUEST['current_password']) !=$user_row['PASSWORD']) {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning !</strong> Password Not Matched With Previous Password
        </div>';
      }
      elseif (sha1($_REQUEST['re_password']) ==$user_row['PASSWORD']) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning !</strong> Password is Same As Previous. Choose Another.
      </div>';
      }
      else
      {
          if ($_REQUEST['new_password'] !=$_REQUEST['re_password']) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Warning !</strong> New Password Didnot Matched With Re-Password
            </div>';
          }
          else
          {
              // update new password
              $new_pwd = sha1($_REQUEST['re_password']);
              $query_update = "UPDATE login_table SET PASSWORD = ? WHERE LOGIN_ID = ?";
              $query_update_prep = $dbhandle->prepare($query_update);
              $query_update_prep->bind_param("ss",$new_pwd,$_SESSION["LOGINID"]);
              if ($query_update_prep->execute()) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success !</strong> New Password Has Been Updated. Login Again
                </div><script>   window.setTimeout(function(){
                    window.location.href="signout.php"
                },2000);</script>';

              }
              else
              {
                $error_msg = $query_update_prep->error;
                $el = new LogMessage();
                $sql = $query_update;
                //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                $el->write_log_message('Update Password ', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                //$_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                mysqli_rollback($dbhandle);
                $statusMsg = 'Error: Assignment Task Creation Error.  Please consult application consultant.';
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Alert !</strong> '.$statusMsg.'
                </div>';
                die;
              }
          }
      }
      mysqli_commit($dbhandle);
    }
}


?>


<script>
  $(".alert").alert();
</script>