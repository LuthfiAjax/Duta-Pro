<?php 
	include "../conn/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");

        $nama_klien  = $_POST['nama_klien'];
        $nama_instansi  = $_POST['nama_instansi'];
        $judul_training = $_POST['judul_training'];
        $jenis_training = $_POST['jenis_training'];
        $tgl_training = $_POST['tgl_training'];
        $jml_peserta = $_POST['jml_peserta'];
        $deadline = $_POST['deadline'];
        $produksi = "1";

        $tgl = date("Y-m-d");
        
        // masuk tabel diagnosa
        $add="INSERT INTO data_klien VALUES (NULL,'$nama_klien', '$nama_instansi', '$judul_training', '$jenis_training', '$tgl_training', '$jml_peserta','$tgl', '$deadline','$produksi')";
        $masuk=mysqli_query($koneksi, $add);
        if ($masuk){
            header("location: ../klien.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = '../tambahklien.php'</script>";	
        }
?>