<?php
session_start();


include 'db_connect.php';

$username = mysql_escape_string($_POST['username']);
$password = mysql_escape_string($_POST['password']);

$query = "SELECT * FROM Finance_Users WHERE username = '$username' AND password = '$password'";

$result = $mysqli->query($query);
$row = $result->fetch_array();

if($row[0] > 0) {
    $_SESSION["sess_user"] = $username;
	echo "Login";
} else {
    echo "Failed";
}

//echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';

?>