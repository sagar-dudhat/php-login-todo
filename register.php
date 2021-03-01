<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
include "connection.php";

if (isset($_POST['admin']) )
{
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	 //echo $sql;
	$rs = $conn->query($sql);

	$rd = $rs->fetch_assoc();
		echo $rd['id'];
		print_r($rd);
		//exit;
		$_SESSION['admin'] = $rd['lastname'] . ' ' . $rd['lastname'];
		$_SESSION['email'] = $rd['email'];
}

?>
	<script type="text/javascript">
		function loadfile(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		}
		function checkvalue(){
			var flag = 0;
			var x = document.regi.firstname.value;
			var y = document.regi.lastname.value;
			var a = document.regi.email.value;
			var b = document.regi.password.value;
			var c = document.regi.cpassword.value;
			if (x === "") {
				document.getElementById('firstnameerror').innerHTML = "Please Enter firstname";
				flag = 1;
			}else{
				document.getElementById('firstnameerror').innerHTML = "";
				flag = 0;
			}
			if (y === "") {
				document.getElementById('lastnameerror').innerHTML = "Please Enter lastname";
				flag = 1;
			}else{
				document.getElementById('lastnameerror').innerHTML = "";
				flag = 0;
			}
			if (a === "") {
				document.getElementById('emailerror').innerHTML = "Please Enter Email Address";
				flag = 1;
			}
			else{
				if (a === ("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/")) {
					document.getElementById('emailerror').innerHTML = "Please Enter Proper Email Formate";
					flag = 1;
					
					if (a === <?php $rd['email'] ?>) {
						<?php echo "Enter the unique Email Id"; ?>
					} 
				}
				else{
					document.getElementById('emailerror').innerHTML = "";
					flag = 0;
				}
			}

			
			if (b === "") {
				document.getElementById('passworderror').innerHTML = "Please Enter Password";
				flag = 1;
					if (c === "") {
						document.getElementById('cpassworderror').innerHTML = "Please Enter Confirm Password";
					flag = 1;
					}
			}
			else if ( b != c) {
					alert("Password Not Match.");
					return false;
				}
				else{
					document.getElementById('passworderror').innerHTML = "";
					flag = 0;
					document.getElementById('cpassworderror').innerHTML = "";
					flag = 0;	
				}
			
			if (flag == 1) {
				return false;
			}		
		}
	</script> 
</head>
<body>
<form action="insert.php" style="margin-left: 100px;" method="POST" enctype="multipart/form-data" onsubmit="return checkvalue()" name="regi">
	Firstname : <input type="text" id="firstname" name="firstname">
		<span id="firstnameerror" style="color:red;">*</span> <br><br>
	Lastname : <input type="text" id="lastname" name="lastname">
		<span id="lastnameerror" style="color:red;">*</span> <br><br>
	Email : <input type="email" id="email" name="email">
		<span id="emailerror" style="color:red;">*</span> <br><br>
	<input type="file" name="file" onchange="loadfile(event)">
	<img id="output" width="100" height="100">
	<br><br>
	Password : <input type="text" id="password" name="password">
		<span id="passworderror" style="color: red">*</span><br><br>
	Confirm Password : <input type="password" id="cpassword" name="cpassword">
		<span id="cpassworderror" style="color: red">*</span><br><br>	
	
	<input type="submit" name="submit">

</form>
</body>
</html>