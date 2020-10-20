<html>
    <head>
        <title></title>
        <style>

/*sticky table css testing*/
.view {
  margin: auto;
  width: 600px;
}

.wrapper {
  position: relative;
  overflow: auto;
  border: 1px solid black;
  white-space: nowrap;
}

.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;
}

.first-col {
  /*width: 100%;
  min-width: 100px;
  max-width: 100px;*/
  left: -1px;
}

.second-col {
  width: 150px;
  min-width: 150px;
  max-width: 150px;
  left: 100px;
}

/*end of sticky table css testing*/
        </style>
    </head>
<body>
<?php
//error_reporting(0);
//include 'test.php';
//$globla_qualification=array(
  //  {0=>'Metric',1=>1}
//);



//var_dump($_REQUEST["groupsmsact"]);
/*
foreach($_REQUEST["groupsmsact"] as $element)
    {

        echo $element. '<br>';
    }
*/
//var_dump($_GET['groupsmsact']);
//$name = $_GET['groupsmsact'];
 


//foreach ($name as $color){ 
  //  echo $color."<br />";
//}


?>

<div class="view">
  <div class="wrapper">
    <table class="table">
      <thead>
        <tr>
          <th class="sticky-col first-col">Number</th>
          <th class="sticky-col second-col">First Name</th>
          <th>Last Name</th>
          <th>Employer</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="sticky-col first-col">1</td>
          <td class="sticky-col second-col">Mark</td>
          <td>Ham</td>
          <td>Micro</td>
        </tr>
        <tr>
          <td class="sticky-col first-col">2</td>
          <td class="sticky-col second-col">Jacob</td>
          <td>Smith</td>
          <td>Adob Adob Adob AdobAdob Adob Adob Adob Adob</td>
        </tr>
        <tr>
          <td class="sticky-col first-col">3</td>
          <td class="sticky-col second-col">Larry</td>
          <td>Wen</td>
          <td>Goog Goog Goog GoogGoog Goog Goog Goog Goog Goog</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>