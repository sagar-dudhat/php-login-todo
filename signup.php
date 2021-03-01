<?php
if (isset($_GET['msg'] )) {
echo $_GET['msg'];
unset($_GET['msg']);
}


  

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	

	include "connection.php";
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $file = $_FILES['file']['name'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
 // $exists = false;
  $str = "";
  if ($firstname === "" ){ 
    $str = "Please Enter firstname";
  }

  if ($lastname === "" ){ 
    $str = $str . " " . "Please Enter lastname";
  }

  if ($email === "" ){ 
    $str = $str . " " . "Please Enter email";
  }

  if ($str != "") {
    header("Location:signup.php?msg=".$str);
    die();
  }

  if ($password !== $cpassword)  {
    header("Location:signup.php?msg=Password do nat match");
    die();
  }

  $esql = "SELECT * FROM `admin` WHERE `email`='$email' ";
  $rs = $conn->query($esql);

  if (mysqli_num_rows($rs) > 0) {
   
    header("Location:signup.php?msg=Username already exists");
    die();
  }
        
       $sql = "INSERT INTO admin (firstname, lastname, email, file, password) VALUES ('$firstname', '$lastname', '$email', '$file', '$password')"; 
       $rs = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>

</head>
<body>
	<!--<?php
    if($showAlert){
    echo '<strong>Success!</strong> Your Account is now created and you can login. ';
    }
    ?>

     <?php
    if($showError){
    echo ' <strong>Error! </strong>'. $showError.' ';
    }
    ?>-->

<form action="signup.php" style="margin-left: 100px;" method="POST" enctype="multipart/form-data" onsubmit="return checkvalue()" name="regi"><br>
	Firstname : <input type="text" id="firstname" name="firstname">
		<span id="firstnameerror" style="color:red;">*</span> <br><br>
	Lastname : <input type="text" id="lastname" name="lastname">
		<span id="lastnameerror" style="color:red;">*</span> <br><br>
	Email : <input type="email" id="email" name="email">
		<span id="emailerror" style="color:red;">*</span> <br><br>
	<input type="file" name="file" onchange="loadfile(event)" >
	<img id="output" width="100" height="100">
	<br><br>
	Password : <input type="text" id="password" name="password">
		<span id="passworderror" style="color: red">*</span><br><br>
	Confirm Password : <input type="password" id="cpassword" name="cpassword">
		<span id="cpassworderror" style="color: red">*</span><br><br>	
	
	<input type="submit" name="submit"><br><br>
<button><a href="login.php">Log In</a></button><br><br>
<button>  <a href="showtable.php">Show Table</a></button>
</form>
</body>
</html>