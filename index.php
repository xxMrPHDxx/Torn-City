<?php 
	include 'misc/opendb.php';

	session_start();
	if(isset($_SESSION['name'])){
		include "main.php";
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Torn City</title>
	<style type="text/css">
		.wrapper {
			height: -webkit-fill-available;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		form#Login {
			width: 260px;
			display: grid;
			grid-auto-rows: 1fr;
			grid-gap: 6px;
		}

		form#Login > * {
			line-height: 24px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<form id="Login" action="login.php" method="POST">
			<input type="text" name="username" placeholder="Username/Email">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>