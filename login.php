<?php
	include 'misc/opendb.php';
	session_start();
	if (isset($_POST['submit']) && $_POST['submit'] == "Login") {
		if(isset($_POST['username']) && isset($_POST['password'])){
			$submit = $_POST['submit'];
			$username = $mysql->real_escape_string($_POST['username']);
			$password = $mysql->real_escape_string($_POST['password']);

			// Search for the current user
			$result = $mysql->query("SELECT * FROM USERS WHERE name='$username' OR email='$username';");
			if($result){
				$row = $result->fetch_assoc();

				// User found! Check the password
				$hashedpwd = hash('sha256',$password);
				if($row['password'] == $hashedpwd){
					$_SESSION['userid'] = $row['userid'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['money'] = $row['money'];
					$_SESSION['level'] = $row['level'];
					$_SESSION['points'] = $row['points'];
					$_SESSION['merits'] = $row['merits'];

					$_SESSION['energy'] = $row['energy'];
					$_SESSION['maxenergy'] = $row['maxenergy'];

					$_SESSION['nerve'] = $row['nerve'];
					$_SESSION['maxnerve'] = $row['maxnerve'];
					
					$_SESSION['happy'] = $row['happy'];
					$_SESSION['maxhappy'] = $row['maxhappy'];
					
					$_SESSION['life'] = $row['life'];
					$_SESSION['maxlife'] = $row['maxlife'];

					echo "Success!";
					header("Location: index.php");
				}else{
					$_SESSION['error'] = "Password Incorrect!";
					header("Location: index.php");
				}
			}else{
				$_SESSION['error'] = "Username/Email Not Found!";
				header("Location: index.php");
			}
		}
	}
?>