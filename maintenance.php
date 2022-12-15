<?php
include 'conn.php';
include 'session.php';

if(isset($_POST['add'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];

	$insert = "insert into info_tbl (firstName,lastName) values ('$fname','$lname')";
	
	if($conn->query($insert)== TRUE){

			echo "Berhasil Menambahkan Data";
			header('location:maintenance.php');
	}else{

		echo "Kesalahan" . $conn->connect_error;
		header('location:maintenance.php');
	}
	$insert->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			Data Siswa
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
				<form action="result.php" method="get" ecntype="multipart/data-form">
						<table align="center">
							<tr>
								<td>Search: <input type="text" name="query"><input type="submit" value="Search" name="search"></td>
							</tr>
						</table>
				</form>
				<form action="maintenance.php" method="POST">
				<table align="center">
					<tr>
						<td>Nama Depan: <input type="text" name="fname" value="" required></td>
						</tr>
						<tr>
							<td>Nama Belakang: <input type="text" name="lname"  required></td>
						</tr>
						<tr>
							<td><input type="submit" name="add" value="Tambahkan"></td>
						</tr>
				</table>
			</form>
				<br>
				<table align="center" border="1" cellspacing="0" width="500">
					<tr>
					<th>Nama Depan</th>
					<th>Nama Belakang</th>
					<th>Edit</th>
					</tr>
					<?php
					$sql = "SELECT * FROM info_tbl";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td align="center"><?php echo $row['firstName'];?></td>
							<td align="center"><?php echo $row['lastName'];?></td>
							<td align="center"><a href="edit.php?infoID=<?php echo md5($row['infoID']);?>">Edit
							</a>/<a href="delete.php?infoID=<?php echo md5($row['infoID']);?>">Hapus</a></td>
						</tr>
						<?php
							}	
						}else{
							echo "<center><p> Data Kosong</p></center>";
						}
				
				$conn->close();
				?>
				</table>
			</div>
		</div>
		</body>

</html>