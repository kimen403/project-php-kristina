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
	<title>Edit Page</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="login-container">
		<h1>Edit Product Details</h1>

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
					<div class="upload-img">
						<div class="img-preview">
							<img src="img/<?= $produkt['image']; ?>" width="260">
						</div>

						<input type="file" name="image" id="image">
					</div>
				</li>
				<li>
					<button type="submit" name="submit">Edit Product!</button>
				</li>
			</ul>

		</form>
	</div>




</body>

</html>