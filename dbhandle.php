<?php

			//@ $dbhandle = mysqli_connect('localhost','easyschool_admin','easyschool_admin','easyschool'); // mysqli('hostname','databasse_user','database_user_password','database name')
			//--@ $dbhandle = mysqli_connect('localhost','solvethe_stage','stage@2020','solvethe_stage'); // mysqli('hostname','databasse_user','database_user_password','database name')
			//@ $dbhandle = mysqli_connect('localhost','solvethe_easyschool_admin','easyschool_admin','solvethe_eschool'); // mysqli('hostname','databasse_user','database_user_password','database name')
			
			//used in stage.solvethemess.in cloud.
			//@ $dbhandle = mysqli_connect('localhost','solvethe_smserp_admin','smserp@admin','solvethe_smserp'); // mysqli('hostname','databasse_user','database_user_password','database name')
			
			//Used in localhost
			@ $dbhandle = new mysqli('localhost','smserp_admin','smserp@admin','smserp'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin
			//@ $dbhandle = new mysqli('localhost','solvethe_stage','stage@2020','solvethe_stage'); 

			//used in demo.swiftcampus.com cloud.
			//@ $dbhandle = new mysqli('localhost','solvethe_smserp_admin','smserp@admin','solvethe_swiftcampus'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin
			
			//used in dev.solvethemess.in cloud.
			//@ $dbhandle = new mysqli('localhost','solvethe_smserp_admin','smserp@admin','solvethe_dev'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin
		
			//used in dev.solvethemess.in cloud.
			//@ $dbhandle = new mysqli('localhost','solvethe_abcpaathshala','AbcPaathshala','solvethe_abcpaathshala'); // mysqli('hostname','databasse_user','database_user_password','database name') easyschool_admin/easyschool@admin

		
			
			if(mysqli_connect_errno())
			{
				$_SESSION['MESSAGE']='<center>Error:Could not connect to database. Please try again later.</center>';
				//echo '<meta HTTP-EQUIV="Refresh" content="0; URL=message.php">';
				echo "1Internal Server Error: Please try after some time.";
				//exit;
			}
			

?>
