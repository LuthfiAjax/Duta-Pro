<?php 
    include "conn/koneksi.php";
	error_reporting(0);
?>

<html>
<head>
	<title>Validasi</title>
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

            <div class="container text-center">
                <div class="row">
                    <div class="col-auto me-auto">
                        <h3>Validasi Data</h3>
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
					<th>Tanggal Masuk</th>
					<th>Tanggal Ambil</th>
					<th>Status</th>
					<th width="50">ACC</th>
					<th width="50">Resi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=0;
					if($cari != ''){
						$data = mysqli_query($koneksi,"SELECT * FROM validasi
						WHERE nama_klien LIKE '%".$cari."%' OR nama_pelaksana LIKE '%".$cari."%' OR tgl_masuk LIKE '%".$cari."%' OR deadline LIKE '%".$cari."%' OR status LIKE '%".$cari."%'  ORDER BY id_produksi DESC");
					}else{
						$data = mysqli_query($koneksi,"SELECT * FROM validasi ORDER BY id_produksi DESC");
					}
					
					if(mysqli_num_rows($data)){
					while($d = mysqli_fetch_array($data)){
						$no++;
						?>
				<tr align="center">
					<td><?= $no; ?></td>
					<td><?= $d['nama_klien']; ?></td>
					<td><?= $d['nama_pelaksana']; ?></td>
					<td><?= $d['tgl_masuk']; ?></td>
					<td><?= $d['deadline']; ?></td>
					<td><?= $d['status']; ?></td>
					<td>
                        <a onclick="return confirm ('ACC pesanan <?= $d['nama_klien'];?> sudah <?= $d['status'];?>');" class="btn btn-sm btn-<?= $d['warna'];?> tooltips" data-placement="bottom" data-toggle="tooltip" title="ACC Selesai" href="proses/validasiacc.php?hal=edit&kd=<?php echo $d['id_produksi'];?>"><span class="fas fa-check"> </span></a>
                    </td>
					<td>
                        <a onclick="return confirm ('Cetak Bukti pesanan <?= $d['nama_klien'];?>.?');" class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-toggle="tooltip" title="Cetak Bukti" target="_blank" href="proses/cetak.php?hal=edit&kd=<?php echo $d['id_produksi'];?>"><span class="fas fa-align-justify"> </span></a>
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