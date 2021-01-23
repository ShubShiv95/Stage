<?php
$pageTitle = "Monthly Attendance Report";
require_once './includes/header.php';
include_once './includes/navbar.php';
?>
<form class="new-added-form aj-new-added-form">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <div class="form-group aj-form-group">
                <label>Select Class</label>
                <select class="select2 col-12" required name="classid" id="classid" onchange="showsection(this.value)">
                    <!--option value="">Please Select Class *</option-->
                    <option value="0">Please Select Class *</option>
                    <?php
                    $str = '';
                    $query = 'select Class_Id,Class_Name from class_master_table where enabled=1' . ' and School_Id=' . $_SESSION["SCHOOLID"] . " and class_no!=0 order by class_no";
                    $result = $dbhandle->query($query);
                    if (!$result) {
                        //var_dump($getStudentCount_result);
                        $error_msg = mysqli_error($dbhandle);
                        $el = new LogMessage();
                        $sql = $query;
                        //$el->write_log_message('Module Name','Error Message','SQL','File','User Name');
                        $el->write_log_message('Student Attendance Entry', $error_msg, $sql, __FILE__, $_SESSION['LOGINID']);
                        $_SESSION["MESSAGE"] = "<h1>Database Error: Not able to generate account list array. Please try after some time.</h1>";
                        $dbhandle->query("unlock tables");
                        mysqli_rollback($dbhandle);
                        //$str_start='<div class="alert icon-alart bg-pink2" role="alert"><i class="fas fa-times bg-pink3"></i>';
                        $messsage = 'Error: Class list not generated.  Please consult application consultant.';
                        //$str_end='</div>';
                        //echo $str_start.$messsage.$str_end;
                        //echo "";
                        //echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';						
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["Class_Id"] . '">Class ' . $row["class_name"] . '</option>';
                    }
                    //echo $str;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <div class="form-group aj-form-group">
                <label>Select Section</label>
                <select class="select2 col-12" name="secid" id="secid" required>
                    <option value="">Please Select Section *</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <div class="form-group aj-form-group">
                <label>Select Period</label>
                <select class="select2 col-12" name="period" id="period" required>
                    <option value="1">Period 1</option>
                    <option value="2">Period 2</option>
                    <option value="3">Period 3</option>
                    <option value="4">Period 4</option>
                    <option value="5">Period 5</option>
                    <option value="6">Period 6</option>
                    <option value="7">Period 7</option>
                    <option value="8">Period 8</option>
                </select>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12 form-group">
            <div class="form-group aj-form-group">
                <label>Select Month</label>
                <select class="select2 col-12" name="month" id="month" required>
                    <option value="0">Select Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">Sepetember</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>
        <div class="col-12 aaj-btn-chang">
            <button type="button" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onClick="getMonthlyReport();">View</button>
            <button type="button" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
        </div>
    </div>
</form>

<div class="col-12">
    <div class="card">
        <div class="card-body" id="div-AttendanceMonthlyReport">
            <!--div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Attendence Sheet Of Class One: Section A, April 2019</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table bs-table table-striped table-bordered text-nowrap tebal-form-in">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Students</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                                <th>11</th>
                                                <th>12</th>
                                                <th>13</th>
                                                <th>14</th>
                                                <th>15</th>
                                                <th>16</th>
                                                <th>17</th>
                                                <th>18</th>
                                                <th>19</th>
                                                <th>20</th>
                                                <th>21</th>
                                                <th>22</th>
                                                <th>23</th>
                                                <th>24</th>
                                                <th>25</th>
                                                <th>26</th>
                                                <th>27</th>
                                                <th>28</th>
                                                <th>29</th>
                                                <th>30</th>
                                                <th>31</th>
                                                <th>P NO.</th>
                                                <th>A NO.</th>
                                                <th>%</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tebal-form-ina">
                                            <form>
                                            <tr>
                                                <td class="text-left">Michele Johnson</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Richi Akon</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Amanda Kherr</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Michele Johnson</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Richi Akon</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Amanda Kherr</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Michele Johnson</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Richi Akon</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Amanda Kherr</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Michele Johnson</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Richi Akon</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Amanda Kherr</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Michele Johnson</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Richi Akon</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Amanda Kherr</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Michele Johnson</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Richi Akon</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Amanda Kherr</td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-a" minlength="2" maxlength="2" value="A"></td>
                                                <td><input type="text" name="Present" class="atent-l" minlength="2" maxlength="2" value="L"></td>
                                                <td><input type="text" name="absent" class="atent-h" minlength="2" maxlength="2" value="H"></td>
                                                <td><input type="text" name="Present" class="atent-hd" minlength="2" maxlength="2" value="HD"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="Present" class="atent-p" minlength="2" maxlength="2" value="P"></td>
                                                <td><input type="text" name="off" class="atent-s" minlength="2" maxlength="2" value="S"></td>
                                                <td>23</td>
                                                <td>22</td>
                                                <td>70%</td>
                                        </form>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="35">
                                                    <h6 class="mar-bott">Legends at the bottom is missing.</h6>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan="35">
                                                    <ul class="color-chang">
                                                        <li class="atent-as"><span class="atent-s">S</span><b>Sunday</b></li>
                                                        <li class="atent-ap"><span class="atent-p">P</span><b>Present</b></li>
                                                        <li class="atent-aa"><span class="atent-a">A</span><b>Absent</b></li>
                                                        <li class="atent-ah"><span class="atent-h">H</span><b>Holiday</b></li>
                                                        <li class="atent-al"><span class="atent-l">L</span><b>Late</b></li>
                                                        <li class="atent-ahd"><span class="atent-hd">HD</span><b>Half Day</b></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div-->
        </div>
    </div>
</div>
<?php require_once './includes/scripts.php'; ?>

<script type="text/javascript">
    $(function() {
        $("input[type='text']").each(function(index) {
            if (this.value == 'P' || this.value == 'p') {
                $(this).addClass("atent-p");
                $(this).removeClass("atent-a");
                $(this).removeClass("atent-l");
                $(this).removeClass("atent-h");
                $(this).removeClass("atent-hd");
                $(this).removeClass("atent-s");
            } else if (this.value == 'A' || this.value == 'a') {
                $(this).removeClass("atent-p");
                $(this).addClass("atent-a");
                $(this).removeClass("atent-l");
                $(this).removeClass("atent-h");
                $(this).removeClass("atent-hd");
                $(this).removeClass("atent-s");
            } else if (this.value == 'L' || this.value == 'l') {
                $(this).removeClass("atent-p");
                $(this).removeClass("atent-a");
                $(this).addClass("atent-l");
                $(this).removeClass("atent-h");
                $(this).removeClass("atent-hd");
                $(this).removeClass("atent-s");
            } else if (this.value == 'H' || this.value == 'h') {
                $(this).removeClass("atent-p");
                $(this).removeClass("atent-a");
                $(this).removeClass("atent-l");
                $(this).addClass("atent-h");
                $(this).removeClass("atent-hd");
                $(this).removeClass("atent-s");
            } else if (this.value == 'HD' || this.value == 'hd') {
                $(this).removeClass("atent-p");
                $(this).removeClass("atent-a");
                $(this).removeClass("atent-l");
                $(this).removeClass("atent-h");
                $(this).addClass("atent-hd");
                $(this).removeClass("atent-s");
            } else if (this.value == 'S' || this.value == 's') {
                $(this).removeClass("atent-p");
                $(this).removeClass("atent-a");
                $(this).removeClass("atent-l");
                $(this).removeClass("atent-h");
                $(this).removeClass("atent-hd");
                $(this).addClass("atent-s");
            }
        });
    })
    $(document).on("change", "input[type='text']", function() {
        if ($(this).val() == 'P' || $(this).val() == 'p') {
            $(this).addClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
        } else if ($(this).val() == 'A' || $(this).val() == 'a') {
            $(this).removeClass("atent-p");
            $(this).addClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
        } else if ($(this).val() == 'L' || $(this).val() == 'l') {
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).addClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
        } else if ($(this).val() == 'H' || $(this).val() == 'h') {
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).addClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
        } else if ($(this).val() == 'HD' || $(this).val() == 'hd') {
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).addClass("atent-hd");
            $(this).removeClass("atent-s");
        } else if ($(this).val() == 'S' || $(this).val() == 's') {
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).addClass("atent-s");
        }
    })
</script>
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
    function getMonthlyReport() {
        var xmlhttp;
        var classid = document.getElementById("classid").value;
        var secid = document.getElementById("secid").value;
        var month = document.getElementById("month").value;
        var period = document.getElementById("period").value;
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("div-AttendanceMonthlyReport").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST", "getMonthlyAttendanceReport.php?classid=" + classid + "&secid=" + secid + "&period=" + period + "&month=" + month, true);
        xmlhttp.send();
    }
</script>
<?php require_once './includes/closebody.php'; ?>