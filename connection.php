<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fbpage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("login.php");
}
?>