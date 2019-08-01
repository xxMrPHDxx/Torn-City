<?php 
	header("Content-Type: application/json");
	if(isset($_POST['id'])){
		$mysql = mysqli_connect("localhost","root","minecraft12345","torn");

		$userid = $mysql->real_escape_string($_POST['id']);
		$result = $mysql->query("SELECT energy,maxenergy,nerve,maxnerve,happy,maxhappy,life,maxlife FROM USERS WHERE id='".$userid."';");

		$row = $result->fetch_assoc();

		if(!$row){
			echo "{".
				"\"status\": 900,".
				"\"message\": \"Username not found!\"".
			"}";
			exit();
		}

		$len = sizeof($row);
		$i = 0;

		echo "{\n";
		foreach ($row as $prop => $value) {
			if(is_numeric($value)){
				echo "\t\"$prop\" : $value";
			}else{
				echo "\t\"$prop\" : \"$value\"";
			}

			if($i != $len - 1){
				echo ",";
			}
			echo "\n";
			$i += 1;
		}
		echo "}";
	} else {
		echo "{".
			"\"status\": 901,".
			"\"message\": \"Invalid response\"".
		"}";
	}
?>