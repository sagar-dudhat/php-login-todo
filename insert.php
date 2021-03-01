<?php
session_start();
include "connection.php";

if (isset($_POST['submit']) ) {

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$file = $_FILES['file']['name'];
	$password = md5($_POST['password']);


	$sql = "INSERT INTO admin (firstname, lastname, email, file, password) VALUES ('$firstname', '$lastname', '$email', '$file', '$password')";
	echo $sql;

	if ($conn->query($sql) === TRUE) {
		$_SESSION['admin'] = $password;
		header("Location:showtable.php");
	}
	else{
		echo "error..." . $conn->error;
	}
}

?>
<?php
	$path = "image/".$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $path);
	//echo $path;
?>