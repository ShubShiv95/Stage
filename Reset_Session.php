<?php
session_start();
$_SESSION["SESSION"]=$_REQUEST["sessionid"];
echo '<meta HTTP-EQUIV="Refresh" content="0; URL=dashboard.php">';
exit;
?>