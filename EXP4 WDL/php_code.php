<?php 
	$name = "";
	$address = "";
	$id = 0;

	$db = mysqli_connect('localhost', 'root', '', 'crud');



	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		
		header('location: index.php');
	}
?>