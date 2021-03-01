<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<script type="text/javascript">
		function checkvalue(){
			var flag = 0;

			var a = document.regi.email.value;
			var b = document.regi.password.value;
			if (a === "") {
				document.getElementById('emailerror').innerHTML = "Please Enter Email Address";
				flag = 1;
			}
			else{
				if (a === ("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/")) {
					document.getElementById('emailerror').innerHTML = "Please Enter Proper Email Formate";
					flag = 1;
				}
				else{
					document.getElementById('emailerror').innerHTML = "";
					flag = 0;
				}
			}

			if (b === "") {
				document.getElementById('passworderror').innerHTML = "Please Enter Password";
				flag = 1;
			}
			else{
				document.getElementById('passworderror').innerHTML = "";
				flag = 0;
			}

			if (flag == 1) {
				return false;
			}		
		}
	</script>
</head>
<!-- <?php
if($_GET['msg']){
echo $_GET['msg'];	
} 
 ?> -->
<body style="margin-top: 200px; margin-left:100px;" >
	
	<form action="checklogin.php" method="POST" onsubmit="return checkvalue()" name="regi">
		Email : <input type="email" id="email" name="email">
		<span id="emailerror" style="color:red;">*</span> <br><br>
		Password : <input type="password" id="password" name="password">
		<span id="passworderror" style="color: red">*</span><br><br>
		<button name="login">Log In</button><br><br>
		<button><a href="signup.php" name="sign">Sign Up</a></button>
	</form>
</body>
</html>
<!--
			else if(b != $_GET['password'] ) {
				<?php echo "Please enter valid pass.";
				?>
			}-->