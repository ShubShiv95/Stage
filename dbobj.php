<?php


		@ $dbhandle = new mysqli('localhost','easyschool_admin','easyschool_admin','easyschool'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin
		//@ $dbhandle = new mysqli('localhost','solvethe_easyschool_admin','easyschool_admin','solvethe_eschool'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin


		if(mysqli_connect_errno())
		{
			$_SESSION['MESSAGE']='<center>Error:Could not connect to database. Please try again later.</center>';
			//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';
			echo "Internal Server Error: Please try after some time.";
			exit;
		}
	
	

	




?>