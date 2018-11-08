<?php 
	include "misc/opendb.php";

	echo hash('sha256', "password");

	$error = "";
	$message = "";
	if(isset($_POST['submit']) && isset($_POST['username']) && 
		isset($_POST['email']) && isset($_POST['password']) &&
		isset($_POST['rpassword'])){
		$submit = $_POST['submit'];
		$username = $mysql->real_escape_string($_POST['username']);
		$email = $mysql->real_escape_string($_POST['email']);
		$password = $mysql->real_escape_string($_POST['password']);
		$rpassword = $mysql->real_escape_string($_POST['rpassword']);

		// Check for stuff
		// Username must be 4 characters or more!
		if(strlen($username) < 4) {
			$error = "Username must have at least 4 characters!";
		}
		// Email is really an email!
		else if(strpos($email, "@") == null){
			$error = "Please enter a valid email!";
		}
		// Password must match with the Repeat Password!
		else if($password != $rpassword){
			$error = "Password unmatched!";
		}else{
			$result = $mysql->query("SELECT * FROM USERS WHERE name='$username' OR email='$email';");
			if($result->num_rows > 0) $error = "Username / Email already exists!"; // Username/Email already exists!
			else{
				$hashedpass = hash('sha256', $password);

				$result = $mysql->query("INSERT INTO USERS (name,email,password) VALUES ('$username','$email','$hashedpass');");
				if ($result) {
					$message = "Successfully Registered!";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Torn | Register</title>
	<style type="text/css">
		.wrapper {
			height: -webkit-fill-available;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		form#Register {
			width: 380px;
			display: grid;
			grid-auto-rows: 30px;
			grid-gap: 6px;
		}

		form#Register > * {
			line-height: 24px;
			text-align: center;
    		justify-self: center;
		}

		form#Register > input {
			width: 80%;
		}

		span#Error, span#Message {
			font-weight: 700;
			font-size: 20px;
		}

		span#Error {
			color: red;
		}

		span#Message {
			color: green;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<form id="Register" action="" method="POST">
			<span id="Error"><?php 
				echo $error;
			?></span>
			<span id="Message"><?php 
				echo $message;
			?></span>
			<input type="text" name="username" placeholder="Username">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="rpassword" placeholder="Repeat Password">
			<input type="submit" name="submit" value="Register">
		</form>
	</div>
</body>
</html>