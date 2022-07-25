<?php 
	include "../conn/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");

        $klien  = $_POST['klien'];
        $pelaksana  = $_POST['pelaksana'];
        $status  = "Pending";
        
        // masuk tabel diagnosa
        $add="INSERT INTO produksi VALUES (NULL,'$pelaksana', '$klien', '$status')";
        $masuk=mysqli_query($koneksi, $add);
        if ($masuk){
            header("location: ../produksi.php");
        }else{
           echo "<script>alert('Gagal memproses data'); window.location = '../produksi.php'</script>";	
        }

        // update status klien
        $sql="UPDATE data_klien SET produksi ='2' WHERE id_klien = '$klien'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../produksi.php");
        }else{
            echo "<script>alert('Status Klien Gagal Terubah'); window.location = '../produksi.php'</script>";	
        }
?>