<?php 
require '../config/connect_vege.php';

$id = $_GET["id"];
// query data mahasiswa dari id nya
$veg = query ("SELECT * FROM vegetarian WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	

	// cek data berhasil atau tidak
	if( ubah ($_POST) > 0) {
		echo "
			<script>
			alert('Data berhasil diubah, silahkan kembali ke halaman awal')
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data gagal diubah, silahkan kembali ke halaman awal')
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data</title>
	<link rel="stylesheet" href="form.css">
</head>
<body>
	<h1>Ubah data</h1>
	<div class="ubah">
	<form action="" method="post">
	<input type="hidden" name="id" value="<?= $veg ["id"];?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $veg ["nama"] ?>">
			</li>
			<li>
				<label for="konten">Konten : </label>
				<input type="text" name="konten" id="konten" value="<?= $veg ["konten"] ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="text" name="gambar" id="gambar" value="<?= $veg ["gambar"] ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>
		</ul>
</div>
	</form>

</body>
</html>