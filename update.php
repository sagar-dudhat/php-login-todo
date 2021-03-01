<?php
	include "connection.php";
	
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$file = $_POST['file'];
	$password = $_POST['password'];

	$sql = "UPDATE admin SET firstname='$firstname', lastname='$lastname', email='$email', file='$file', password='$password' WHERE id='$id' ";

	if ($conn->query($sql) === TRUE) {
			header("Location:showtable.php");
		}
		else
		{
			echo "Error : " . $conn->error;
		}

?>