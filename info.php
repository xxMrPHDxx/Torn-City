<?php 
	header("Content-Type: application/json");
	if(isset($_POST['userid'])){
		$mysql = mysqli_connect("localhost","root","minecraft12345","mysql");

		$userid = $mysql->real_escape_string($_POST['userid']);
		$result = $mysql->query("SELECT energy,maxenergy,nerve,maxnerve,happy,maxhappy,life,maxlife FROM TORN_USERS WHERE userid='".$userid."';");

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