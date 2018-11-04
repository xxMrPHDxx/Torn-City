<?php
	$mysql = mysqli_connect("localhost","root","minecraft12345","mysql");

	session_start();
	$result = $mysql->query("SELECT userid,name,money,level,points,merits,energy,maxenergy,nerve,maxnerve,happy,maxhappy,life,maxlife FROM TORN_USERS;");
	$row = $result->fetch_assoc();
	$SESSION['userid'] = $row['userid'];
	$SESSION['name'] = $row['name'];
	$SESSION['money'] = $row['money'];
	$SESSION['level'] = $row['level'];
	$SESSION['points'] = $row['points'];
	$SESSION['merits'] = $row['merits'];

	$SESSION['energy'] = $row['energy'];
	$SESSION['maxenergy'] = $row['maxenergy'];

	$SESSION['nerve'] = $row['nerve'];
	$SESSION['maxnerve'] = $row['maxnerve'];
	
	$SESSION['happy'] = $row['happy'];
	$SESSION['maxhappy'] = $row['maxhappy'];
	
	$SESSION['life'] = $row['life'];
	$SESSION['maxlife'] = $row['maxlife'];