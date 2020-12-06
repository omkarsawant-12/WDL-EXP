<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registered</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>You Are Registered <?php echo $_SESSION['username'];  ?></h1>

    </div>
    <?php
    if (isset($_SESSION['message'])) {
       echo "<div id='error_msg'>". $_SESSION['message']. "</div>";
       unset($_SESSION['message']);
    	
    }
    ?>

    <div><h2>Welcome <?php echo $_SESSION['username'];  ?></h2></div>
    <div><a href="logout.php"><button>LOGOUT</button></a></div>
</body>
</html>