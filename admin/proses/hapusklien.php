<?php
include "../conn/koneksi.php";
$klien = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM data_klien WHERE id_klien='$klien'");
if ($query){
	echo "<script>alert('Klien Berhasil dihapus!'); window.location = '../klien.php'</script>";	
} else {
	echo "<script>alert('Klien Gagal dihapus!'); window.location = '../klien.php'</script>";	
}
?>