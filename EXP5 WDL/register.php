<?php
 session_start();

 $db = mysqli_connect("localhost","root","","authentication");

  if (isset($_POST['register'])) {
  	 
  	 $username =$_POST['username'];
  	 $email = $_POST['email'];
  	 $password = $_POST['password'];
  	 $password2 =$_POST['password2'];


  	  if ($password == $password2) {
  	 	
  	 	$password = md5($password);
  	 

  	 	$sql = "INSERT INTO users(username,email,password) VALUES('$username', '$email', '$password')";
  	 	mysqli_query($db,$sql);
  	 	$_SESSION['message'] = "You Are Now Logged IN";
  	 	$_SESSION['username'] =$username;
  	 	header("location:home.php");
  	  }else{
         $_SESSION['message'] = "The two Password Do Not Match";
    }    }
 
?>



<!DOCTYPE html>
<html> 
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>REGISTER</h1>

	<?php
    if (isset($_SESSION['message'])) {
       echo "<div id='error_msg'>". $_SESSION['message']. "</div>";
       unset($_SESSION['message']);
    	
    }
    ?>
		<form method="post" action="register.php">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" class="textInput"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="email" class="textInput"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" class="textInput"></td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type="password" name="password2" class="textInput"></td>
				</tr>
				
			
			</table>
			<button type="submit" name="register" class="register_btn" value="register" >Register</button>	
		</form>
			<p>
			Already A Member? <a href="login.php">Sign in</a>
		    </p>

</body>
</html>