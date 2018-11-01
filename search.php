<?php
	if(isset($_GET['cat']) && isset($_GET['value'])){
		$category = $_GET['cat'];
		$value = $_GET['value'];

		$mysql = mysqli_connect("localhost","root","minecraft12345","mysql");
		$sql = "SELECT name FROM TORN_USERS WHERE ".$category." LIKE \"%".$value."%\";";
		$result = $mysql->query($sql);

		if(!$result){
			die("Unknown command : ".$sql);
		}

		echo "<table>";
		while(($row = $result->fetch_row()) != null){
			echo "<tr>";
			for($i=0;$i<sizeof($row);$i++){
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}else{
		die("Opss! Shouldn't reach here!");
	}
?>