<?php
///////////////////////////////////////////////////////////////
//////////Copyright: Imbibe Infosystem Private limited.////////
//////////Author: Mithun Mukherjee                     ////////
//////////Version:1                                    ////////
//////////Last Updated By: Mithun Mukherjee            ////////
//////////Last Updated on: 18-August-2014              ////////
///////////////////////////////////////////////////////////////   


///////////////////////////////////////////////////////////////////////////////////////////////
//This file is used for creating signout effect for the user and throwing out of frameset./////
///////////////////////////////////////////////////////////////////////////////////////////////




session_start();
include 'dbhandle.php';
if(isset($_SESSION["LOGINID"]))
{
$query= "update user_login set status=0,last_login_time=now() where user_id='" . $_SESSION["LOGINID"] . "'";
mysqli_query($dbhandle,$query);
session_unset();
session_destroy();	
}
/*
echo'<html><head>';

echo '<script type="text/javascript">';		//scripting of doOnClick() function which initiate click event on hyperlink to move to index.php.
echo'    function doOnClick() {';
echo "        document.getElementById('linkid').click();";
        //Should alert('/testlocation');
echo '    }';
echo '</script>';
echo '<a id="linkid" href="index" target="_top"></a>';
echo '</head>';
echo '<body onload="doOnClick()">'; //Onclick function is called during loading of this page by means of breaking frameset page to separate single web page. This is done because only clicking to a hyperlink can make is possible to be out of frameset.
echo '</body>';
echo '</html>';
*/
echo '<meta HTTP-EQUIV="Refresh" content="0; URL=index.php">';
?>
