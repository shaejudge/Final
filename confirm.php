<?php 
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "judges-db", "6rmoErrYBdGgdSmP", "judges-db");
	
	error_reporting(E_ALL);
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	
	$sql = "INSERT INTO Finance_Users(username, password) VALUES (?, ?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ss", $username, $password);
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmt->execute();
	
	
	
	$stmt->close();
	$mysqli->close();
?>