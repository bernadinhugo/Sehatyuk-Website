<?php 

session_start();
require 'config/connect.php';
// cek cookie

if (isset($_COOKIE['id']) && isset ($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($koneksi, "SELECT username FROM admin WHERE id=$id");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
	$_SESSION['login'] = true;
}
}

// if (isset($_COOKIE['login'])) {
// 	if ($_COOKIE['login'] == 'true') {
// 		$_SESSION['login'] == true;
// 	}
// }

if (isset($_SESSION["login"]) ) {
	header ("Location: admin/admin.php");
	exit;
}



if ( isset($_POST["login"])) {

	$username = $_POST ["username"];
	$password = $_POST ["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'" );

	// cek username

	if (mysqli_num_rows($result) === 1) {
		
		//cek password
		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me

			if (isset($_POST['remember'])) {
				//buat cookie
				setcookie('id',$row['id'], time()+60);
				setcookie('key',hash('sha256', $row['username']),time()+60);
				// setcookie('login','true', time()+60);
			}


			header ("Location: admin/admin.php");
			exit;
		}
	}

	$error = true;

}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
	<h1>Sehat Yuk - Login Admin</h1>
	<link rel="stylesheet" href="login.css">

	<?php if (isset($error)) : ?>
		<p style="color: red; font-style: italic;">Username / Password salah!</p>
	<?php endif; ?>
	
	<div class="login">
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>	
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">Remember Me</label>
			</li>
			<li>
				<button type="submit" name="login">Login</button>
			</li>
		</ul>
	</div>
	</form>
</body>
</html>