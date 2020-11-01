<?php 
require 'config/connect.php';

$id = $_GET ["id"];
$result = mysqli_query ($koneksi, "SELECT * FROM karbohidrat WHERE id = $id");


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
		<div class="detail">
		<?php  
		while ($row = mysqli_fetch_assoc ($result))
		{
			$id = $row ['id'];
			$nama = $row ['nama'];
			$gambar = $row ['gambar'];
			$konten = $row ['konten'];

			echo ('<h3>'.$nama.'</h3>');
			echo ("<br>");
			echo '<img src="pic/'.$gambar.'"width="300" height="300"/>';
			echo ("<br>");
			echo ("<br>");
			echo ("<br>");
			echo ('<p>'.$konten.'</p>');
			echo ('<form action="" method="post" enctype="multipart/form-data">
					<ul>
						<li>
							<label for="jumlah">Jumlah : </label>
							<input type="text" name="jumlah" id="jumlah">
						</li>
						<li>
							<button type="submit" name="submit">Pesan</button>
						</li>
					</ul>
					</form>');
		}
		?>
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