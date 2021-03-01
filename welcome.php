<?php
	session_start();
	if (isset($_SESSION['admin']) ) {
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align:center">

<h1>Welcome to my site <?php echo $_SESSION['admin']; ?> </h1>
<p>This is some information about user...</p>
<table style="text-align:center; margin-left:25%;"; border="1px"; width="50%"; method="GET";>
	<th>Id</th>
	<th>firstname</th>
	<th>lastname</th>
	<th>email</th>
	<th>file path</th>
	<!--<th>Password</th>
	<th>Insert</th> -->
	<th>Delete</th>
	<th>Update</th>
	<?php
		include 'connection.php';
		
		$sql = "SELECT * FROM admin";

		$rs = $conn->query($sql);

		while ($rd = mysqli_fetch_assoc($rs)) {

	?>
			<tr>
				<td><?php echo $rd['id']; ?></td>
				<td><?php echo $rd['firstname']; ?></td>
				<td><?php echo $rd['lastname']; ?></td>
				<td><?php echo $rd['email']; ?></td>
				<td><?php echo $rd['file']; ?></td>
				<!--<td><?php echo $rd['password']; ?></td>
				<td><a href="insert.php?id=<?php echo $rd['id']; ?>">Insert</a></td> -->
				<td><a href="delete.php?id=<?php echo $rd['id']; ?>">Delete</a></td>
				<td><a href="edit.php?id=<?php echo $rd['id']; ?>">Edit</a></td>
			</tr>			
		<?php
	}
	?>

</table><br>
<button><a href="logout.php">logout</a></button><br><br>
</body>
</html>
<?php
	}
	else{
		header("Location:login.php?msg = 'login required' ");
	}
?>