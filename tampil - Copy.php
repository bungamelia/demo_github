<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tampil Buku</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Tampil Buku</h2>
	<a href= 'index.php'>Tambah Buku</a><br><br>
	<form method="POST" class="form-group row">
		<table border='1'>
			<tr>
				<td>ID Buku</td>
				<td>Judul Buku</td>
				<td>Penerbit Buku</td>
				<td>Tahun Buku</td>
				<td>Aksi</td>
			</tr>
			<?php
				require("dbconfig.php");
				$query = "SELECT * FROM buku";
				$crud->tampilBuku($query);
			?>
		</table>
	</form>
</body>
</html>

<?php
	include_once 'dbconfig.php';
	
	if(isset($_GET['delete'])){
		$del = $crud->hapusBuku($_GET['delete']);
		header("Location: tampil.php"); 
	}
?>