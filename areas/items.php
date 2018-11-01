<table id="Items">
<?php 
	if(isset($SESSION['name'])){
		$mysql = mysqli_connect("localhost","root","minecraft12345","torn");
		$result = $mysql->query("SELECT * FROM ITEMS;");

		if(!$result) die("Oppsss!");

		$ishead = true;
		while(($row = $result->fetch_assoc()) != null){
			echo "<tr>";
			foreach ($row as $prop => $value) {
				if($prop === "id") continue;
				if($ishead){
					echo "<td>".$prop."</td>";
				}
			}
			$ishead = false;
			echo "</tr>";
			echo "<tr>";
			foreach ($row as $prop => $value) {
				if($prop === "id") continue;
				echo "<td>".$value."</td>";
			}
			echo "</tr>";
		}
	}else{
		header("Location: index.php");
	}
?>
</table>