<?php
include "../conn/koneksi.php";
$id_pelaksana = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM pelaksana WHERE id_pelaksana='$id_pelaksana'");
if ($query){
	echo "<script>alert('Pelaksana Berhasil dihapus!'); window.location = '../pelaksana.php'</script>";	
} else {
	echo "<script>alert('Pelaksana Gagal dihapus!'); window.location = '../pelaksana.php'</script>";	
}
?>