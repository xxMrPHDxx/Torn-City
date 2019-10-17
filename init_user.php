<?php
	if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['password'])){
		include_once 'misc/opendb.php';
		$name = $mysql->real_escape_string($_GET['name']);
		$email = $mysql->real_escape_string($_GET['email']);
		$password = hash('sha256', $mysql->real_escape_string($_GET['password']));
		$sql = "INSERT INTO USERS (name,email,password,money,level,points,merits,energy,maxenergy,nerve,maxnerve,happy,maxhappy,life,maxlife,gender) VALUES ('$name','$email','$password',10000,20,10,1,50,100,10,15,150,200,240,250,\"M\");";
		$mysql->query("DELETE FROM USERS;");
		$result = $mysql->query($sql);
		if($result) die("User $name added successfully!");
		else die($mysql->error);
	}else die("Opss.. nothing here!");
?>