<?php
	header("Content-Type: application/json");
	if(isset($_POST['userid']) && isset($_POST['type'])){
		$mysql = mysqli_connect("localhost","root","minecraft12345","torn");
		$userid = $mysql->real_escape_string($_POST['userid']);
		$type = $mysql->real_escape_string($_POST['type']);
		
		$json = "{";

		$sql = "SELECT * FROM ITEM_TYPE WHERE type='$type';";
		$result = $mysql->query($sql);

		$error = true;
		if($result){
			$type_id = $result->fetch_assoc()['id'];
		}
			
		$sql = "SELECT * FROM ITEMS WHERE id IN (SELECT item_id FROM INVENTORY WHERE user_id=$userid);";
		$result = $mysql->query($sql);
		if($result){
			$json .= '"result": "success"';
			$items = '';
			while(($row = $result->fetch_assoc()) != null){
				$name = $row['name'];
				$id = $row['type_id'];
				if($type == "all" || $id == $type_id){
					$items .= '"'.$name.'", ';
				}
			}
			$json .= ', "items": ['.substr($items, 0, -2).']';
			$error = false;
		}

		// This is the failed state
		if($error) $json .= '"result": "error", "items": [], "message": "nothing found!"';

		// $result = $mysql->query($sql);
		// if($result){
		// 	while(($row = $result->fetch_assoc()) != null){
		// 		$name = $row['name'];
		// 		echo "<li class='item-list'><img src='./images/items/katana.png'></img><div>$name</div></li>";
		// 	}
		// }

		echo $json."}";
	}else{
		echo `{ "result": "error", "items": [], message": "not clue what just happened!" }`;
	}
?>