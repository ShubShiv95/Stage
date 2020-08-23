<?php

			//@ $dbhandle = mysqli_connect('localhost','easyschool_admin','easyschool_admin','easyschool'); // mysqli('hostname','databasse_user','database_user_password','database name')
			//@ $dbhandle = mysqli_connect('localhost','solvethe_easyschool_admin','easyschool_admin','solvethe_eschool'); // mysqli('hostname','databasse_user','database_user_password','database name')
			
			//used in stage.solvethemess.in cloud.
			//@ $dbhandle = mysqli_connect('localhost','solvethe_smserp_admin','smserp@admin','solvethe_smserp'); // mysqli('hostname','databasse_user','database_user_password','database name')
			
			//Used in localhost
			@ $dbhandle = new mysqli('localhost','smserp_admin','smserp@admin','smserp'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin

			if(mysqli_connect_errno())
			{
				$_SESSION['MESSAGE']='<center>Error:Could not connect to database. Please try again later.</center>';
				//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';
				echo "Internal Server Error: Please try after some time.";
				//exit;
			}
			

?>
