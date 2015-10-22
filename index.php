<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Book</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Tambah Buku</h2>
	<a href= 'tampil.php'>Tampil Buku</a><br><br>
	<form action="index.php" method="POST" class="form-group row">
		<table>
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="judul" required="required"><br></td>
			</tr>
			<tr>
				<td>Penerbit Buku</td>
				<td><input type="text" name="penerbit_buku" required="required"><br></td>
			</tr>
			<tr>
				<td>Tahun Buku</td>
				<td><input type="text" name="tahun" required="required"><br><br></td>
			</tr>
		</table>
		<input type="submit" name="simpan" value="Tambah Buku" class="btn btn-success"><br><br>
		<input type="reset" value="Reset" class="btn btn-warning">
	</form>
</body>
</html>

<?php
	include_once 'dbconfig.php';
	
	if(isset($_POST['simpan'])){
		$judul = $_POST['judul'];
		$penerbit_buku = $_POST['penerbit_buku'];
		$tahun = $_POST['tahun'];
		 
		if($crud->tambahBuku($judul,$penerbit_buku,$tahun)){
			header("Location: tampil.php");
		}
		else{
			echo "fail";
		}
	}
?>