<?php
session_start();
include "connection.php";

if (isset($_POST['login']) )
{
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	 //echo $sql;
	$rs = $conn->query($sql);

	if ($rd = $rs->fetch_assoc() ) 
	{
		echo $rd['id'];
		print_r($rd);
		//exit;
		$_SESSION['admin'] = $rd['firstname'] . ' ' . $rd['lastname'] . "jayyyy";
		$_SESSION['email'] = $rd['email'];

		 header("Location:welcome.php");
	}
	else{
		header("Location:login.php");	
	}
}
?>