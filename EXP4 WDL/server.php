<?php 
    session_start();

	$name = "";
	$address = "";
	$id = 0;
	$edit_state = false;

	$db = mysqli_connect('localhost', 'root', '', 'crud');



	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address']; 
		

		$query = "INSERT INTO info (name, address) VALUES ('$name', '$address')"; 
		mysqli_query($db,$query);
		$_SESSION['msg']= "Address Saved";
		header('location: index.php');
	}
  




     if (isset($_POST['edit_state'])) {
           $name = mysql_real_escape_string($_POST['name']);
           $address =mysql_real_escape_string($_POST['address']);
           $id = mysql_real_escape_string($_POST['id']);

       mysqli_query($db,"UPDATE info SET name ='$name', address='$address' WHERE id=$id");
       $_SESSION['msg']="Address Updated";
       header('location:index.php');


}

if (isset($_GET['del'])) {
	$id = $_GET['del'];

	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['msg'] = "Address deleted!"; 
	header('location: index.php');
}


	$results = mysqli_query($db,"SELECT * FROM info");


?>