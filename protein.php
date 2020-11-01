<?php 
 
session_start();
require 'config/connect.php';

 // if (isset($_POST["cari"])) {
 // 	$bestseller = cari($_POST["keyword"]);
 // }


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sehat Yuk</title>
	<link rel="stylesheet" href="menu.css">
</head>
<body>

	<div class="container">

	<div class="header">
		<a href="index.php"><img src="pic/mainlogo.png" width="110" height="110"></a>

		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="bestseller.php">BEST SELLER</a></li>
			<li><a href="berita.php">BERITA</a></li>
			<li><a href="kategori.php">KATEGORI</a></li>
			<!-- <li class="login"><a href="#">LOGIN</a></li> -->
		</ul>
		<!-- <form action="" method="post">
		<input type="text" name="keyword" size="30" placeholder="Cari.." autocomplete="off">
		<button type="submit" name="cari">Cari</button>
		<br><br>
		</form> -->
	</div>
	</div>
	<div class="heroimg"></div>

	<div class="konten">
		<div class="menu">
		<ul>
		<?php foreach ($protein as $pro) : ?>
		<li><a href="pilih_protein.php?id=<?php echo $pro ["id"]; ?>"><h3><?php echo $pro['nama'] ?></h3></a>
		<img src="pic\<?php echo $pro ['gambar'] ?>" width="200" height="200">
		<!-- <p><?php echo $pro ['konten'] ?></p> --></li>
		<?php endforeach ?>
		</ul>
	</div>
		<div class="bestseller">
		<a href="bestseller.php"><h3>BEST SELLER</h3></a>
			<ul>
				<?php foreach ($bestseller_utama as $bs) : ?>
				<a href="pilih_best.php?id=<?php echo $bs ["id"]; ?>"><li><img src="pic/<?php echo $bs['gambar'] ?>" width="300" height="300"><span><?php echo $bs['nama'] ?></span></li></a>
				<?php endforeach ?>
			</ul>
		</div>
		<div class="gizi">
			<h3>CARI KEBUTUHAN GIZI ANDA</h3>
			<a href="karbohidrat.PHP"><img src="pic/karbohidrat.png" width="100" height="100"><span>Karbohidrat</span></a>
			<a href="kalori.php"><img src="pic/kalori.png" width="100" height="100"><span>Kalori</span></a>
			<a href="protein.php"><img src="pic/protein.png" width="100" height="100"><span>Protein</span></a>
			<a href="vegetarian.php"><img src="pic/vitamin.png" width="100" height="100"><span>Vegetarian</span></a>
		</div>

		<div class="review">
			<ul>
			<?php foreach ($berita_utama as $br) : ?>
			<li><h3><a href="pilih_berita.php?id=<?php echo $br ["id"]; ?>"><?php echo $br['judul'] ?></a></h3>
			<img src="pic/<?php echo $br['gambar'] ?>" width="150" height="100">
			<!-- <p class="p1"><?php echo $br['konten'] ?></p> --></li>
			
		<?php endforeach ?>
			</ul>
		</div>
	</div>
		<div class="footer">
			<a href="login.php"><span>Admin</span></a>
			<a href="about.php"><span>About</span></a>
			<a href="contact.php"><span>Contact</span></a>
			<a href="report.php"><span>Report</span></a>
		</div>





	
		
	


</body>
</html>