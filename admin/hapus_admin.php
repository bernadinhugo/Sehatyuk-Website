<?php 
require '../config/connect_admin.php';

$id = $_GET ["id"];

if ( hapus ($id)>0) {
	echo "
			<script>
			alert('Data berhasil dihapus, silahkan kembali ke halaman awal')
			</script>
		";
} else {
	echo "
			<script>
			alert('Data gagal diubah, silahkan kembali ke halaman awal')
			</script>
		";
}

 ?>