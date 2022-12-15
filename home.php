<?php
include 'session.php';
$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			This is Sample
		</title>
		</head>
	<body bgcolor="lightgreen">
		<div id="body">
			<div id="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="maintenance.php">Data Siswa</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			</div>

			<div id="content">
			
			<h1>Welcome <?php echo $username;?></h1>
				<h3 style="color:black;"><?php echo "Today is".  "  ". date("l") . " - " . date("d/M/y") . ""?>&nbsp;</h3>
				
				<hr style="border:1px solid black;" >
				
				

			</div>

		
		</div>
		</body>

</html>