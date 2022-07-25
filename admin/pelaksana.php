<?php
    require "conn/koneksi.php";
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
            <div class="container">
                <a class="btn btn btn-danger" title="Kembali" href="dashboard.php"><i class="fas fa-arrow-circle-left"></i></a>
                <div class="col">
                    <form action="proses/tambahpelaksana.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pelaksana</label>
                            <input type="text" class="form-control" id="nama_pelaksana" name="nama_pelaksana" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Password</label>
                            <input type="text" class="form-control" id="pasword" name="pasword" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="register"></i> Simpan</button>
                        <button type="reset" class="btn btn-warning" name="register"></i> Reset</button>
                    </form>
                </div>
            </div>
            <br>
            <h3>Anggota Pelaksana</h3>
			<thead>
				<tr align="center">
					<th>Nama Pelaksana</th>
					<th>Username</th>
					<th>Password</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
                <?php 
                    $no=0;
                        $data = mysqli_query($koneksi,"SELECT * FROM pelaksana");
                        while($d = mysqli_fetch_array($data)){
                            $no++;
                            ?>
				<tr align="center">
					<td><?= $d['nama_pelaksana']; ?></td>
					<td><?= $d['username']; ?></td>
					<td><?= $d['pasword']; ?></td>
					<td>
                        <a onclick="return confirm ('Yakin hapus <?php echo $d['nama_pelaksana'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Obat" href="proses/hapuspelaksana.php?hal=hapus&kd=<?php echo $d['id_pelaksana'];?>"><span class="fa fa-lg fa-trash"> </span></a>
                    </td>
				</tr>
                <?php
                    }
                ?>
			</tbody>
		</table>
	</div>
</body>
</html>