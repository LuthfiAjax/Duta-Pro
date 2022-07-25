<?php 
	include "../conn/koneksi.php";
    $id_produksi = $_GET['kd'];
    $status = "SELESAI";

        // update status klien
        $sql="UPDATE produksi SET status ='$status' WHERE id_produksi = '$id_produksi'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../produksi.php");
        }else{
            echo "<script>alert('Status Klien Gagal Terubah'); window.location = '../produksi.php'</script>";	
        }
?>