<?php
 session_start();

 $db = mysqli_connect("localhost","root","","authentication");

  if (isset($_POST['login'])) {
  	   
  	 $username = $_POST['username'];
  	 $password = $_POST['password'];

    $password = md5($password);
    $sql = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
    $result= mysqli_query($db,$sql);

    if (mysqli_num_rows($result) ==1) {
    	$_SESSION['message'] = "you are logged in";
    	$_SESSION['username'] = $username;
    	header ("location:home.php");
}else{
	$_SESSION['message']= "username/password incorrect";
}

}
?>



<!DOCTYPE html>
<html> 
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>LOGIN</h1>
    <?php
    if (isset($_SESSION['message'])) {
       echo "<div id='error_msg'>". $_SESSION['message']. "</div>";
       unset($_SESSION['message']);
    	
    }
    ?>
		<form method="post" action="login.php">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" class="textInput"></td>
				</tr>
				
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" class="textInput"></td>
				</tr>
				
				
			
			</table>
			<button type="submit" name="login" class="login_btn" value="Login">Login</button>	
		</form>
			<p>
			Not A Member? <a href="register.php">Sign up</a>
		    </p>

</body>
</html>