<?php
session_start();
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';

if (isset($_REQUEST['getStaffList'])) {
  $data = array();

  $queryStaff = "SELECT * FROM staff_master_table";

  $queryStaffPrepare = $dbhandle->prepare($queryStaff);
  $queryStaffPrepare->execute();
  $resultSet = $queryStaffPrepare->get_result();

  echo '<table class="table display data-table text-nowrap data-table">
          <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Contact No</th>
            <th>Category</th>
            <th>DOB</th>
            <th>Qualification</th>
          </tr>
      ';

        while ($row = $resultSet->fetch_assoc())
        {
          echo '<tr>
                <td>'.$row['Staff_Name'].'</td>
                <td>'.$row['Gender'].'</td>
                <td>'.$row['Contact_No'].'</td>
                <td>'.$row['Category'].'</td>
                <td>'.$row['DOB'].'</td>
                <td>'.$row['Qualification'].'</td>
          </tr>';
        }
        echo '</table>';
}

if (isset($_REQUEST['searchStaffData'])) {

  if (!empty($_REQUEST['id'])) {
    $id = "%".$_REQUEST['id']."%";
    $query = "SELECT * FROM staff_master_table WHERE `Staff_Id` LIKE ?";
    $queryPrepare = $dbhandle->prepare($query);
    $queryPrepare->bind_param("s",$id);
  }
  if (!empty($_REQUEST['name'])) {
    $name = "%".$_REQUEST['name']."%";
    $query = "SELECT * FROM staff_master_table WHERE `Staff_Name` LIKE ?";
    $queryPrepare = $dbhandle->prepare($query);
    $queryPrepare->bind_param("s",$name);
  }
  if (!empty($_REQUEST['phone'])) {
    $phone = "%".$_REQUEST['phone']."%";
    $query = "SELECT * FROM staff_master_table WHERE `Contact_No` LIKE ?";
    $queryPrepare = $dbhandle->prepare($query);
    $queryPrepare->bind_param("s",$phone);
  }

  $queryExec = $queryPrepare->execute();
  $queryRes = $queryPrepare->get_result();

  if ($queryRes->num_rows >0) {

    echo '<table class="table display data-table text-nowrap data-table">
            <tr>
              <th>Name</th>
              <th>Gender</th>
              <th>Contact No</th>
              <th>Category</th>
              <th>DOB</th>
              <th>Qualification</th>
            </tr>
        ';

          while ($row = $queryRes->fetch_assoc())
          {
            echo '<tr>
                  <td>'.$row['Staff_Name'].'</td>
                  <td>'.$row['Gender'].'</td>
                  <td>'.$row['Contact_No'].'</td>
                  <td>'.$row['Category'].'</td>
                  <td>'.$row['DOB'].'</td>
                  <td>'.$row['Qualification'].'</td>
            </tr>';
          }
          echo '</table>';

  }else{
      echo '<h4 class="text-danger">No Record Found. Try Again!!!</h4>';
  }

}

?>
