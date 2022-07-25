<?php 
    include "conn/koneksi.php";
?>

<!-- Fungsi Menampilkan Data dari Database -->
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM data_klien WHERE id_klien='$_GET[kd]'");
        $d  = mysqli_fetch_array($query);
        ?>
<!-- End -->	

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
		<table class="table"><br>
			<h3 class="text-center"><img class="img-fluid img-thumbnail bg-primary mt-25" src="../logo.png" alt="logo"></h3>
            <div class="container">
                <a class="btn btn btn-danger" title="Kembali" href="klien.php"><i class="fas fa-arrow-circle-left"></i></a>
                <div class="col">
                    <form action="proses/editklien.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="nama_klien" value="<?= $d['id_klien']; ?>" name="id_klien" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Nama Klien</label>
                            <input type="text" class="form-control" id="nama_klien" value="<?= $d['nama_klien']; ?>" name="nama_klien" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Nama Instansi</label>
                            <input type="text" class="form-control" id="nama_instansi" value="<?= $d['nama_instansi']; ?>"  name="nama_instansi" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Judul Training</label>
                            <input type="text" class="form-control" id="judul_training" value="<?= $d['judul_training']; ?>"  name="judul_training" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Jenis Training</label>
                            <input type="text" class="form-control" id="jenis_training" value="<?= $d['jenis_training']; ?>"  name="jenis_training" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tanggal Training</label>
                            <input type="date" class="form-control" id="tgl_training" value="<?= $d['tgl_training']; ?>"  name="tgl_training" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Jumlah Peserta</label>
                            <input type="number" class="form-control" id="jml_peserta" value="<?= $d['jml_peserta']; ?>"  name="jml_peserta" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Deadline</label>
                            <input type="date" class="form-control" id="deadline" value="<?= $d['deadline']; ?>"  name="deadline" required>
                        </div>
                        <button type="submit" class="btn btn-warning" name="register"></i> Update</button>
                    </form>
                </div>
            </div>
            <br>
		</table>
	</div>
</body>
</html>