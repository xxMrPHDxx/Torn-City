<?php 
	if(isset($_GET['ID'])){
		$mysql = mysqli_connect("localhost","root","minecraft12345","mysql");
		$userid = $mysql->real_escape_string($_GET['ID']);
		// Thats all for now! I'm too sleepy. Thanks for watching ^_^
	}else{
		die("TODO: Fix later!");
	}
?>