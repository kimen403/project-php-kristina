<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$produkt = query("SELECT * FROM produkt WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Ubah data mahasiswa</title>
</head>

<body>
	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $produkt["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $produkt["image"]; ?>">
		<ul>
			<li>
				<label for="name">Name : </label>
				<input type="text" name="name" id="name" value="<?= $produkt["name"]; ?>">
			</li>
			<li>
				<label for="price">Price :</label>
				<input type="text" name="price" id="price" value="<?= $produkt["price"]; ?>">
			</li>
			<li>
				<label for="stock">Stock :</label>
				<input type="text" name="stock" id="stock" value="<?= $produkt["stock"]; ?>">
			</li>
			<li>
				<label for="category">Category :</label>
				<input type="text" name="category" id="category" value="<?= $produkt["category"]; ?>">
			</li>
			<li>
				<label for="image">Image :</label> <br>
				<img src="img/<?= $produkt['image']; ?>" width="40"> <br>
				<input type="file" name="image" id="image">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>

	</form>




</body>

</html>