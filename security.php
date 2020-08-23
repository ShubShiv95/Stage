<?php
    
    //Section1A: This restrict direc access to the file without going through login procedure.  
    //This section also restrict moving to the back direction after signout process.
    if(!isset($_SESSION["STATUS"]) or $_SESSION["STATUS"]==0)
    {
        echo '<meta HTTP-EQUIV="Refresh" content="0; URL=signout.php">';
    }
//End of Section1A.

//Section1B: This restrict session to execute script if the session timeout occured.
if(strtotime(date('Y-m-d H:i:s')) > strtotime($_SESSION["INTERVAL"], strtotime($_SESSION["LASTUPDATEON"])))
    {
        echo '<meta HTTP-EQUIV="Refresh" content="0; URL=signout.php">';
    }
else
    {
        $_SESSION["LASTUPDATEON"]=$cur_time=date("Y-m-d H:i:s");
    }	
    

//code for access of page from the hosted web location only.
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
if($link!=$_SESSION["LINK"])
    {

        echo '<meta HTTP-EQUIV="Refresh" content="0; URL=signout.php">';
    }

?>
