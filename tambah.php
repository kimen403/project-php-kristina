<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil di tambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah data mahasiswa</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>Tambah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="name" id="name">
			</li>
			<li>
				<label for="price">Price :</label>
				<input type="number" name="price" id="price">
			</li>
			<li>
				<label for="stock">Stock :</label>
				<input type="number" name="stock" id="stock">
			</li>
			<li>
				<label for="category">Category :</label>
				<input type="text" name="category" id="category">
			</li>
			<li>
				<label for="description">Description :</label>
				<input type="text" name="description" id="description">
			</li>
			<li>
				<label for="image">image :</label>
				<input type="file" name="image" id="image">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>
	</form>




</body>

</html>