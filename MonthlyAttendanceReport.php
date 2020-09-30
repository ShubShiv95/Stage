<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<?php
include 'dbobj.php';
include 'errorLog.php';
include 'security.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Student Attendence</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
         <!-- Header Menu Area Start Here -->
         <?php include ('includes/navbar.php') ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php 
            include 'includes/sidebar.php'; 
            ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Student Attendence</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Attendence</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Student Attendence Search Area Start Here -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title aj-item-title">
                                        <h3>Student Attendence</h3>
                                    </div>
                                </div>
                                <form class="new-added-form aj-new-added-form">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <div class="form-group aj-form-group">
                                                <label>Select Class</label>
                                                <select class="select2">
                                                    <option value="">Select Class</option>
                                                    <option value="1">Nursery</option>
                                                    <option value="2">Play</option>
                                                    <option value="3">One</option>
                                                    <option value="4">Two</option>
                                                    <option value="5">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Select Section</label>
                                                <select class="select2">
                                                    <option value="0">Select Section</option>
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
                                                    <option value="4">D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Select Month</label>
                                                <select class="select2">
                                                    <option value="0">Select Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                                            <div class="form-group aj-form-group">
                                                <label>Select Session</label>
                                                <select class="select2">
                                                    <option value="0">Select Session</option>
                                                    <option value="1">2016-2017</option>
                                                    <option value="2">2017-20108</option>
                                                    <option value="3">2018-2019</option>
                                                    <option value="4">2020-2021</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 aaj-btn-chang">
                                            <button type="submit" class="aj-btn-a btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            <button type="reset" class="aj-btn-a btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Attendence Sheet Of Class One: Section A, April 2019</h3>
                                    </div>
                                   <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" 
                                        data-toggle="dropdown" aria-expanded="false">...</a>
                
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Attendence Area End Here -->
                <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a href="#">PsdBosS</a></div>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
<script type="text/javascript">
    $(function(){
        $("input[type='text']").each(function( index ) {
          if(this.value == 'P' || this.value == 'p'){
            $(this).addClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if(this.value == 'A' || this.value == 'a'){
            $(this).removeClass("atent-p");
            $(this).addClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if(this.value == 'L' || this.value == 'l'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).addClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if(this.value == 'H' || this.value == 'h'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).addClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if(this.value == 'HD' || this.value == 'hd'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).addClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if(this.value == 'S' || this.value == 's'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).addClass("atent-s");
          }
        });
    })
$(document).on("change","input[type='text']",function(){
    if($(this).val() == 'P' || $(this).val() == 'p'){
            $(this).addClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if($(this).val() == 'A' || $(this).val() == 'a'){
            $(this).removeClass("atent-p");
            $(this).addClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if($(this).val() == 'L' || $(this).val() == 'l'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).addClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if($(this).val() == 'H' || $(this).val() == 'h'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).addClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if($(this).val() == 'HD' || $(this).val() == 'hd'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).addClass("atent-hd");
            $(this).removeClass("atent-s");
          }else if($(this).val() == 'S' || $(this).val() == 's'){
            $(this).removeClass("atent-p");
            $(this).removeClass("atent-a");
            $(this).removeClass("atent-l");
            $(this).removeClass("atent-h");
            $(this).removeClass("atent-hd");
            $(this).addClass("atent-s");
          }
})
</script>
</body>

</html>