<?php
	include_once 'dbconfig.php';
	
	if(isset($_POST['update'])){
		$id_buku = $_GET['edit'];
		$judul = $_POST['judul'];
		$penerbit_buku = $_POST['penerbit_buku'];
		$tahun = $_POST['tahun'];
		 
		if($crud->updateBuku($id_buku,$judul,$penerbit_buku,$tahun)){
			header("Location: tampil.php");
		}
		else{
			echo "fail";
		}
	}
	
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		extract($crud->getID($id)); 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit Book</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<h2>Edit Buku</h2>
	<form method="POST" class="form-group row">
		<table>
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" name="judul" value="<?php echo $judul; ?>" required="required"><br></td>
			</tr>
			<tr>
				<td>Penerbit Buku</td>
				<td><input type="text" name="penerbit_buku" value="<?php echo $penerbit_buku; ?>" required="required"><br></td>
			</tr>
			<tr>
				<td>Tahun Buku</td>
				<td><input type="text" name="tahun" value="<?php echo $tahun; ?>" required="required"><br></td>
			</tr>
		</table>
		<input type="submit" name="update" value="Simpan"><br><br>
	</form>
</body>
</html>