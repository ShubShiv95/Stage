<?php
$pageTitle = "Attendance Summery Report";
require_once './includes/header.php';
include_once './includes/navbar.php';
include_once 'AdmissionModel.php';
?>
<form class="new-added-form school-form aj-new-added-form">
    <div class="tebal-promotion">
        <h5 class="text-center mb-0">The ABC PAATHSHALA</h5>
        <p class="text-center">BARI CO-OPERATIVE, BOKARO STEEL CITY, JHARKHAND</p>
        <div class="table-responsive">
            <table class="table table-striped table-bordered attendence-Montfort">
                <thead>
                    <tr>
                        <th rowspan="2" class="color-00">Class</th>
                        <th colspan="3" class="color-01">Strenth</th>
                        <th colspan="3" class="color-02">Present</th>
                        <th colspan="3" class="color-03">Absent</th>
                    </tr>
                    <tr>
                        <th>Boys</th>
                        <th>Girls</th>
                        <th>Total</th>
                        <th>Boys</th>
                        <th>Girls</th>
                        <th>Total</th>
                        <th>Boys</th>
                        <th>Girls</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="color-00">I-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">I-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">II-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">II-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">III-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">III-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">IV-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">IV-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">V-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">V-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">VI-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">VI-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">VII-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">VII-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">VIII-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">VIII-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">LX-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">LX-B</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td class="color-00">X-A</td>
                        <td>23</td>
                        <td>16</td>
                        <td>39</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                        <td>--</td>
                        <td>--</td>
                        <td>0</td>
                    </tr>

                </tbody>
            </table>
        </div>


    </div>

</form>
<?php require_once './includes/scripts.php'; ?>
<?php require_once './includes/closebody.php'; ?>

