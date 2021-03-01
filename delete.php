<?php
	include 'connection.php';
	$id = $_GET['id'];

	$sql = "DELETE FROM admin WHERE id='$id' ";
	if ($conn->query($sql) === TRUE) {
		header("Location:showtable.php");
	}
?>