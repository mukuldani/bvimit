<?php
	session_start();
	include("functions.php");
	function logged_in(){
		return isset($_SESSION["currentUserId"]);
	}

	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to("index.php");
		}
	}
?>
