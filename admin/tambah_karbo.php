<?php 
require '../config/connect_karbo.php';


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	

	// cek data berhasil atau tidak
	if( tambah ($_POST) > 0) {
		echo "
			<script>
			alert('Data berhasil ditambahkan, silahkan kembali ke halaman awal')
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data gagal ditambahkan, silahkan kembali ke halaman awal')
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
	<h1>Tambah data</h1>
	<div class="tambah">
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="konten">Konten : </label>
				<input type="text" name="konten" id="konten">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah data</button>
			</li>
		</ul>
</div>
	</form>

</body>
</html>