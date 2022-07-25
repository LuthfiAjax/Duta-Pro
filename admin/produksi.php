<?php 
    include "conn/koneksi.php";
	error_reporting(0);
    $klien = mysqli_query($koneksi, "SELECT * FROM data_klien WHERE produksi=1");
    $pelaksana = mysqli_query($koneksi, "SELECT * FROM pelaksana");
?>

<html>
<head>
	<title>Produksi</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" href="css/pelaksana.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body class="bg-primary text-light">
	<div class="container">
        
		<table class="table table-light"><br>
			<h3 class="text-center"><img class="img-fluid img-thumbnail bg-primary mt-25" src="../logo.png" alt="logo"></h3>
            <a class="btn btn btn-danger" title="Kembali" href="dashboard.php"><i class="fas fa-arrow-circle-left"></i></a>
            <br><br>
			<div class="col">
				<form action="proses/tambahproduksi.php" method="POST">
					<div class="mb-3">
						<label for="nama" class="form-label">Nama Pelaksana</label>
						<select class="form-select" aria-label="Default select example" name="pelaksana" id="pelaksana" required>
							<option disabled selected> --Pilih Pelaksana-- </option>
							<?php while($row = mysqli_fetch_array($pelaksana)) { ?>
							<option value="<?=$row['id_pelaksana']?>"><?=$row['nama_pelaksana']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="nama" class="form-label">Nama Klien  </label>
						<select class="form-select" aria-label="Default select example" name="klien" id="klien" required>
							<option disabled selected> --Pilih Klien-- </option>
							<?php while($row = mysqli_fetch_array($klien)) { ?>
							<option value="<?=$row['id_klien']?>"><?=$row['nama_klien']?></option>
							<?php } ?>
						</select>
					</div>
					<button type="submit" class="btn btn-sm btn-success" name="register">Jalankan <i class="fas fa-arrow-right"></i></button>
				</form>
			</div>
			<br>


            <div class="container text-center">
                <div class="row">
                    <div class="col-auto me-auto">
                        <h3>Data Produksi</h3>
                    </div>
                    <div class="col-auto">
                        <form class="example text-right" method="POST" action="" style="margin:0px;max-width:300px">
                            <input type="text" placeholder="Search" name="cari">
                            <button type="submit"><i class="fa fa-search"></i> cari</button>
                        </form>
						<?php 
                            $cari = $_POST['cari'];
                        ?>
                    </div>
                </div>
            </div>
			<thead>
				<tr align="center">
					<th width="8">No. </th>
					<th>Klien</th>
					<th>Pelaksana</th>
					<th>Judul Training</th>
					<th>Tanggal Ambil</th>
					<th>Status</th>
					<th width="130">Proses</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=0;
					if($cari != ''){
						$data = mysqli_query($koneksi,"SELECT * FROM produksi INNER JOIN data_klien ON produksi.`id_klien`=data_klien.`id_klien` INNER JOIN pelaksana ON produksi.`id_pelaksana`=pelaksana.`id_pelaksana`
						WHERE nama_klien LIKE '%".$cari."%' OR nama_pelaksana LIKE '%".$cari."%' OR tgl_masuk LIKE '%".$cari."%' OR deadline LIKE '%".$cari."%' OR status LIKE '%".$cari."%' ORDER BY id_produksi DESC");
					}else{
						$data = mysqli_query($koneksi,"SELECT * FROM produksi INNER JOIN data_klien ON produksi.`id_klien`=data_klien.`id_klien`
						INNER JOIN pelaksana ON produksi.`id_pelaksana`=pelaksana.`id_pelaksana` ORDER BY id_produksi DESC");
					}
					
					if(mysqli_num_rows($data)){
					while($d = mysqli_fetch_array($data)){
						$no++;
						?>
				<tr align="center">
					<td><?= $no; ?></td>
					<td><?= $d['nama_klien']; ?></td>
					<td><?= $d['nama_pelaksana']; ?></td>
					<td><?= $d['judul_training']; ?></td>
					<td><?= $d['deadline']; ?></td>
					<td><b><?= $d['status']; ?></b></td>
					<td>
                        <a onclick="return confirm ('Pesanan <?php echo $d['nama_klien'];?> akan di Proses');" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Proses" href="proses/produksiproses.php?hal=edit&kd=<?php echo $d['id_produksi'];?>"><span class="fas fa-hourglass-start"> </span></a>
                        <a onclick="return confirm ('Yakin Sudah Menyelesaikan Produksi dari <?php echo $d['nama_klien'];?>.?');" class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-toggle="tooltip" title="Selesai" href="proses/produksiselesai.php?hal=edit&kd=<?php echo $d['id_produksi'];?>"><span class="fas fa-check"> </span></a>
                        <a onclick="return confirm ('Pesanan <?php echo $d['nama_klien'];?> akan dibatalkan');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Batal" href="proses/produksibatal.php?hal=edit&kd=<?php echo $d['id_produksi'];?>"><span class="fas fa-Ban"> </span></a>
                    </td>
				</tr>
				<?php
					}}else{
						echo '<tr><td colspan="8" align="center" style="color: red">Data yang dicari Tidak ditemukan <span style="color: black">klik cari untuk menampilkan semua data<span></td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>