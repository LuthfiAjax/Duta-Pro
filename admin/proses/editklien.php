<?php 
include "../conn/koneksi.php";

    $id_klien  = $_POST['id_klien'];
    $nama_klien  = $_POST['nama_klien'];
    $nama_instansi  = $_POST['nama_instansi'];
    $judul_training = $_POST['judul_training'];
    $jenis_training = $_POST['jenis_training'];
    $tgl_training = $_POST['tgl_training'];
    $jml_peserta = $_POST['jml_peserta'];
    $deadline = $_POST['deadline'];
    
    // update Klien
    $sql="UPDATE data_klien SET 
            nama_klien ='$nama_klien',
            nama_instansi ='$nama_instansi', 
            judul_training ='$judul_training', 
            jenis_training ='$jenis_training', 
            tgl_training ='$tgl_training',  
            jml_peserta ='$jml_peserta',
            deadline ='$deadline'
        WHERE id_klien = '$id_klien'";

    $update=mysqli_query($koneksi, $sql);
    if ($update){
        header("location: ../klien.php");
    }else{
        echo "<script>alert('Data Klien gagal diubah!'); window.location = '../editklien.php'</script>";	
    }