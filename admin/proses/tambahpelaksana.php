<?php 
	include "../conn/koneksi.php";

        $nama_pelaksana  = $_POST['nama_pelaksana'];
        $username  = $_POST['username'];
        $pasword = $_POST['pasword'];
        
        // masuk tabel diagnosa
        $add="INSERT INTO pelaksana VALUES (NULL,'$nama_pelaksana', '$username', '$pasword')";
        $masuk=mysqli_query($koneksi, $add);
        if ($masuk){
            header("location: ../pelaksana.php");
        }else{
           echo "<script>alert('Pelaksana Gagal ditambah!'); window.location = '../pelaksana.php'</script>";	
        }
     
?>