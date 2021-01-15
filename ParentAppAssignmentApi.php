<?php
include './dbhandle.php';
include 'errorLog.php';
if (isset($_REQUEST['assignment_parent'])) {

    /*************** assignment for Parent *****************/
    if ($_REQUEST['assignment'] == 'parent_view') {
        /*
        variable needed
        1. sectionId = section id
        2. subjectId = subject id
        3. monthNumber = number of month
        4. start_year = year of asignment
        5. Login Type = PARENT | STUDENT
        http://stage.swiftcampus.com/ParentAppAssignmentApi.php?assignment=parent_view&LOGINTYPE=PARENT&sectionId=3&start_year=2020&monthNumber=11 
    
        ///// response ////
        {
          "status": "200",
          "type": "Success",
          "message": "Assignment Fetched Successfully.",
          "assignment_data": [
              {
                  "task_id": 8,
                  "task_name": "Teacher APP Testing aPI",
                  "updated_by": "Admin",
                  "updated_on": "2021-01-06 12:23:25",
                  "last_date": "2021-02-15",
                  "file_type": null,
                  "file_link": null,
              },
              {
                  "task_id": 5,
                  "task_name": "Teacher APP Testing aPI",
                  "updated_by": "Admin",
                  "updated_on": "2021-01-06 12:07:19",
                  "last_date": "2021-02-12",
                  "file_type": null,
                  "file_link": null,
              }
          ]
        }
        */
        $sectionId = $_REQUEST['sectionId'];
        $subjectId = $_REQUEST['subjectId'];
        $monthNum = $_REQUEST['monthNumber'];
        $currYear = $_REQUEST["start_year"];
    
        $sqlQuery = "SELECT tmt.* FROM task_master_table tmt, task_allocation_list_table talt WHERE tmt.Task_Id = talt.Task_Id AND tmt.Enabled = 1 AND talt.Allocated_Reff_Id = ? AND tmt.Subject_Id = ? AND MONTH(tmt.Last_Submissable_Date) = ? AND YEAR(tmt.Last_Submissable_Date) = ? ORDER BY tmt.Task_Id DESC";
        $sqlQueryprepare = $dbhandle->prepare($sqlQuery);
    
        $sqlQueryprepare->bind_param("iiii", $sectionId, $subjectId, $monthNum, $currYear);
    
        $sqlQueryprepare->execute();
    
        $resultset = $sqlQueryprepare->get_result();
    
        if ($resultset->num_rows > 0) {
          $i = 1;
          $data = array(
            "status"    =>  "200",
            "type"      =>  "Success",
            "message"   =>  "Assignment Fetched Successfully.",
            "assignment_data" =>  array()
          );
          while ($row = $resultset->fetch_assoc()) {
            $queryAssignmnetFile = "select * from task_file_upload where Enabled = 1 AND Task_Id = ?";
            $queryAssignmnetFilePrepare = $dbhandle->prepare($queryAssignmnetFile);
            $queryAssignmnetFilePrepare->bind_param("i", $row['Task_Id']);
            $queryAssignmnetFilePrepare->execute();
            $queryAssignmnetFileResult = $queryAssignmnetFilePrepare->get_result();
            $row_file = $queryAssignmnetFileResult->fetch_assoc();
            $data["assignment_data"][] = array(
              "task_id"     =>  $row['Task_Id'],
              "task_name"   =>  $row['Task_Name'],
              "updated_by"  =>  $row['Updated_By'],
              "updated_on"  =>  $row['Updated_On'],
              "last_date"   =>  $row['Last_Submissable_Date'],
              "file_type"   =>  $row_file['Upload_Type'],
              "file_link"   =>  $row_file['Upload_Name']
            );
          }
        } else {
          $data = array(
            "status"    =>  "500",
            "type"      =>  "Database Error",
            "message"   =>  "No Record Found."
          );
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
      }
}
