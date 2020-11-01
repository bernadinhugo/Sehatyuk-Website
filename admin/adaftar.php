<?php 
session_start();
require '../config/connect_admin.php';
$ad = query ("SELECT * FROM admin");


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sehat Yuk - Admin Panel</title>
	<link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="topbar">
	<a href="admin.php">ADMIN PANEL</a>
</div>

<div class="konten">
	<a href="registrasi.php">Tambah admin</a>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>No</td>
			<td>Aksi</td>
			<td>Username</td>
			<td>Password</td>
		</tr>
	<?php $i=1; ?>
	<?php foreach ($admin as $ad) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="hapus_admin.php?id=<?php echo $ad ["id"];?>">Hapus</a>
			</td>
			<td><?php echo $ad ["username"] ?></td>
			<td><?php echo $ad ["password"] ?></td>
		</tr>
	<?php $i++; ?>
	<?php endforeach ?>
	</table>
</div>

<div class="sidebar">
	<div class="admin"><a href="adaftar.php">Daftar Admin</a></div>
	<div class="bestseller"><a href="abestseller.php">Best Seller</a></div>
	<div class="berita"><a href="aberita.php">Berita</a></div>
	<div class="karbohidrat"><a href="akarbohidrat.php">Karbohidrat</a></div>
	<div class="kalori"><a href="akalori.php">Kalori</a></div>
	<div class="protein"><a href="aprotein.php">Protein</a></div>
	<div class="vegetarian"><a href="avegetarian.php">Vegetarian</a></div>
	<div class="logout"><a href="../logout.php">Logout</a></div>
</div>


</body>
</html>