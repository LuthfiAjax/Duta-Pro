<?php
    require "conn/koneksi.php";
	error_reporting(0);
 ?>

<html>
<head>
	<title>Pelaksana</title>
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
                        <a class="btn btn-info mb-3 text-light" href="tambahklien.php"><i class="fa fa-plus-square "></i> Tambah Klien</a>
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
            <h3 align="center">Data Klien</h3>
			<thead>
				<tr align="center">
					<th width="8">No. </th>
					<th>Nama</th>
					<th>Instansi</th>
					<th>Judul Training</th>
					<th>Jenis Training</th>
					<th width="100">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no=0;
					if($cari != ''){
						$data = mysqli_query($koneksi,"SELECT * FROM data_klien
						WHERE nama_klien LIKE '%".$cari."%' OR nama_instansi LIKE '%".$cari."%' OR judul_training LIKE '%".$cari."%' OR jenis_training LIKE '%".$cari."%' ORDER BY id_klien DESC");
					}else{
						$data = mysqli_query($koneksi,"SELECT * FROM data_klien ORDER BY id_klien DESC");
					}
					
					if(mysqli_num_rows($data)){
					while($d = mysqli_fetch_array($data)){
						$no++;
						?>
				<tr align="center">
					<td><?= $no; ?></td>
					<td><?= $d['nama_klien']; ?></td>
					<td><?= $d['nama_instansi']; ?></td>
					<td><?= $d['judul_training']; ?></td>
					<td><?= $d['jenis_training']; ?></td>
					<td>
                        <a onclick="return confirm ('Yakin hapus <?php echo $d['nama_klien'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Obat" href="proses/hapusklien.php?hal=hapus&kd=<?php echo $d['id_klien'];?>"><span class="fa fa-lg fa-trash"> </span></a>
                        <a onclick="return confirm ('Yakin Edit <?php echo $d['nama_klien'];?>.?');" class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-toggle="tooltip" title="Edit Obat" href="editklien.php?hal=edit&kd=<?php echo $d['id_klien'];?>"><span class="fa fa-lg fa-edit"> </span></a>
                    </td>
				</tr>
				<?php
					}}else{
						echo '<tr><td colspan="6" align="center" style="color: red">Data Klien yang dicari Tidak ditemukan <span style="color: black">klik cari untuk menampilkan semua data<span></td></tr>';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>