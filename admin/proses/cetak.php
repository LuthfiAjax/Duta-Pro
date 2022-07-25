<?php 
    include "../conn/koneksi.php";
    $cari = $_GET['kd'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Cetak Dokumen</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<!--   -->
<body onload="print()">
    <table width="100%">
        <tr>
            <td align="center"><img src="print.PNG" width="100%"></td>
        </tr>
    </table>
    <hr>
    <table align="center" class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr align="center" border=1>
                <th scope="col" width="100">ID Produksi </th>
                <th scope="col" width="100">Nama Klien</th>
                <!-- <th scope="col" width="100">Nama Pelaksana</th> -->
                <th scope="col" width="100">Judul Training</th>
                <th scope="col" width="100">Jenis Training</th>
                <th scope="col" width="100">Jumlah Peserta</th>
            </tr>
        </thead>
        <?php 
            $data = mysqli_query($koneksi,"SELECT * FROM cetak where id_produksi='$cari'");
            while($d = mysqli_fetch_array($data)){
                ?>
        <tbody>
            <tr align="center">
                <td>DUTA<?php echo $d['id_produksi']; ?></td>
                <td><?php echo $d['nama_klien']; ?></td>
                <!-- <td><?php echo $d['nama_pelaksana']; ?></td> -->
                <td><?php echo $d['judul_training']; ?></td>
                <td><?php echo $d['jenis_training']; ?></td>
                <td><?php echo $d['jml_peserta']; ?></td>
                
            </tr>
            <table>
                <tr>
                    <th>Tanggal Masuk</th>
                    <th>:</th>
                    <th></th>
                    <td> <?= $d['tgl_masuk']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Ambil</th>
                    <th>:</th>
                    <th></th>
                    <td> <?= $d['deadline']; ?></td>
                </tr>
                <tr>
                    <th>Pelaksana</th>
                    <th>:</th>
                    <th></th>
                    <td> <?= $d['nama_pelaksana']; ?></td>
                </tr>
            </table>
            <?php
                }
            ?>
        </tbody>
    </table>
    <footer>
        <h1>DUTA PRO</h1><br>
        <h5>Training and Consulting</h5><br>
        <p>JaxID</p>
    </footer>
    <style>
        footer {
                display: flex;
                justify-content: center;
                padding: 5px;
                background-color: #45a1ff;
                color: #fff;
            }
    </style>
</body>
</html>