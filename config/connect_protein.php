<?php
//KONEKSI KEDATA BASE
	global $koneksi;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$nama_db = "web";

	$koneksi = mysqli_connect($servername,$username,$password,$nama_db);
	if(!$koneksi){
		die ("koneksi Gagal".mysqli_connect_error());
	}

	function query ($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}

	//query
	$admin = $koneksi->query ("SELECT * FROM admin");
	$berita = $koneksi->query ("SELECT * FROM berita");
	$bestseller = $koneksi->query("SELECT * FROM bestseller");
	$karbohidrat = $koneksi->query("SELECT * FROM karbohidrat");
	$protein = $koneksi->query("SELECT * FROM protein");
	$kalori = $koneksi->query("SELECT * FROM kalori");
	$vegetarian = $koneksi->query("SELECT * FROM vegetarian");

	function cari ($keyword) {
	global $koneksi;
	$bestseller = "SELECT * FROM bestseller
				WHERE
				nama LIKE '%$keyword%' OR
				konten LIKE '%$keyword%' OR
			";
				return $koneksi->query ($bestseller);
}

function upload () {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek apakah gambar tidak ada di upload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar dahulu');
				</script>";
				return false;
	}

	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower (end($ekstensiGambar));

	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('bukan file gambar');
				</script>";
				return false;
	}

	// cek ukuran gambar terlalu besar
	if ($ukuranFile > 100000) {
		echo "<script>
				alert('Gambar terlau besar');
				</script>";
				return false;
	}

	// gambar siap diupload
	move_uploaded_file($tmpName, '../pic/'. $namaFile);
	return $namaFile;
}





// Protein

function tambah ($data) {
	//ambil data dari tiap elemen dalam form
	global $koneksi;
	$nama = htmlspecialchars($data["nama"]);
	$konten = htmlspecialchars($data["konten"]);

	//upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO protein
				VALUES
				('','$nama','$konten','$gambar')
				";

				mysqli_query($koneksi, $query);

				return mysqli_affected_rows($koneksi);
}

function hapus ($id) {
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM protein WHERE id=$id");

return mysqli_affected_rows($koneksi);
}


function ubah ($data) {
	global $koneksi;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$konten = htmlspecialchars($data["konten"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "UPDATE protein SET
				nama = '$nama',
				konten = '$konten',
				gambar = '$gambar'

				WHERE id=$id
				";

				mysqli_query($koneksi, $query);

				return mysqli_affected_rows($koneksi);

}

?> 