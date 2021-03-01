<!DOCTYPE html>
<html>

<body>
<form action="update.php" method="POST">
	<?php
		include "connection.php";
		$id = $_GET['id'];
		
		$sql = "SELECT * FROM admin WHERE id='$id' ";	
		$rs = $conn->query($sql);

		$rd = $rs->fetch_assoc();
	?>
	<input type="hidden" name="id" value="<?php echo $rd['id']; ?>">
	Firstname : <input type="text" id="firstname" name="firstname" value="<?php echo $rd['firstname']; ?>" ><br><br>
	Lastname : <input type="text" id="lastname" name="lastname" value="<?php echo $rd['lastname']; ?>" ><br><br>
	Email : <input type="email" id="email" type="text" name="email" value="<?php echo $rd['email']; ?>" ><br><br>
	File : <input type="file" id="file" name="file" value="<?php echo $rd['file']; ?>" ><br><br>
	Password : <input type="text" id="password" name="password" value="<?php echo $rd['password']; ?>" ><br><br>
	<button>Update</button>
</form>
</body>
</html>