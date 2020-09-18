<?php
error_reporting(0);
//var_dump($_REQUEST["groupsmsact"]);
/*
foreach($_REQUEST["groupsmsact"] as $element)
    {

        echo $element. '<br>';
    }
*/
var_dump($_GET['groupsmsact']);
$name = $_GET['groupsmsact'];
 


foreach ($name as $color){ 
    echo $color."<br />";
}


?>