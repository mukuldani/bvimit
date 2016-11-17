<?php

		require("constants.php");

		$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
		if(!$connection){
			die('Could not connect' .mysql_error());
		}

		if(!mysqli_select_db($connection, DB_NAME)){
			die('Could not connect to database' .mysql_error());
		}
?>
