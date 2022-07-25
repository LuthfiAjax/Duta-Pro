<?php 
	include "../conn/koneksi.php";
    $id_produksi = $_GET['kd'];
    $warna = "success";

        // update status klien
        $sql="UPDATE produksi SET warna ='$warna' WHERE id_produksi = '$id_produksi'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../validasi.php");
        }else{
            echo "<script>alert('ACC GAGAL!'); window.location = '../validasi.php'</script>";	
        }
?>