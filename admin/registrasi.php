<?php 
require '../config/connect.php';

if (isset($_POST["register"])) {
	
	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			</script>";
	} else {
		echo mysqli_error($conn);
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Admin</title>
	<link rel="stylesheet" href="form.css">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
	<h1>Registrasi Admin</h1>

<div class="tambah">
<form action="" method="post">
	
	<ul>
		<li>
			<label for="username">username : </label>
			<input type="text" name="username" id="username">
		</li>
	
		<li>
			<label for="password">password : </label>
			<input type="password" name="password" id="password">
		</li>

		<li>
			<label for="password2">Konfirmasi passowrd : </label>
			<input type="password" name="password2" id="password2">
		</li>

		<li>
			<button type="submit" name="register">Register</button>
		</li>
	</ul>
</div>
</form>

</body>
</html>