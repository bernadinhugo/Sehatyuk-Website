<?php 
require '../config/connect_admin.php';

$id = $_GET["id"];
// query data mahasiswa dari id nya
$ad = query ("SELECT * FROM admin WHERE id = $id")[0];


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
	<input type="hidden" name="id" value="<?= $ad ["id"];?>">
		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" name="username" id="username" required value="<?= $ad ["username"] ?>">
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="text" name="password" id="password" value="<?= $ad ["password"] ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>
		</ul>
</div>
	</form>

</body>
</html>