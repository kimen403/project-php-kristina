<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$produkt = query("SELECT * FROM produkt");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$produkt = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="login-container">
		<div class="home-header">
			<a href="logout.php" class="btn-logout">Logout</a>
			<a href="tambah.php" class="btn-create">Add Product</a>
		</div>


		<h1>Product List</h1>




		<form action="" method="post" class="search-bar">

			<input type=" text" name="keyword" autofocus placeholder="Enter product keyword.." autocomplete="off">
			<button type="submit" name="cari" class="btn-search">Search!</button>

		</form>

		<br>
		<table border="1" cellpadding="10" cellspacing="0">

			<tr>
				<th>No.</th>
				<th>Id</th>
				<th>NAME</th>
				<th>Photo</th>
				<th>Category</th>
				<th>Price</th>
				<th>Description</th>
				<th>Stock</th>
				<th>Action</th>
			</tr>

			<?php $i = 1; ?>
			<?php foreach ($produkt as $row): ?>
				<tr>
					<td>
						<?= $i; ?>
					</td>
					<td>
						<?= $row["id"]; ?>

					</td>
					<td>
						<?= $row["name"]; ?>
					</td>
					<td>
						<img src="img/<?= $row["image"]; ?>" width="50">
					</td>
					<td>
						<?= $row["category"]; ?>

					</td>
					<td>
						<?= $row["price"]; ?>€
					</td>
					<td>
						<?= $row["description"]; ?>
					</td>
					<td>
						<?= $row["stock"]; ?>
					</td>
					<td>
						<div class="action">
							<a href="ubah.php?id=<?= $row["id"]; ?>" class="btn-edit"><i
									class="fa fa-pencil-square-o"></i></a>

							<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');"
								class="btn-delete"><i class="fa fa-trash-o"></i></a>

					</td>

				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>

		</table>
	</div>
</body>

</html>