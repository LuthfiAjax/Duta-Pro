<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "conn/koneksi.php";
?>
<!-- End -->

<html>
<head>
	<title>Pelaksana</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" href="css/pelaksana.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<!-- Fungsi Waktu Session -->
      <?php
				$timeout = 10; // Set timeout minutes
				$logout_redirect_url = "../index.php"; // Set logout URL

				$timeout = $timeout * 60; // Converts minutes to seconds
				if (isset($_SESSION['start_time'])) {
					$elapsed_time = time() - $_SESSION['start_time'];
					if ($elapsed_time >= $timeout) {
						session_destroy();
						echo "<script>alert('Sesi Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
					}
				}
				$_SESSION['start_time'] = time();
				?>
				<?php } ?>
				<!-- End -->

<body class="bg-primary text-light">
	<div class="container">
		<table class="table"><br>
			<h3 class="text-center"><img class="img-fluid img-thumbnail bg-primary mt-25" src="../logo.png" alt="logo"></h3>
			<h4 align="center">Selamat Datang <?= $_SESSION['nama_admin'];?></h4>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
				
					
					<div class="col-md-6">
						<a class="text-decoration-none text-light" href="pelaksana.php">
						<div class="p-4 bg-info shadow-sm d-flex justify-content-around align-items-center rounded">
							<div>
								<h3 class="fs-2">Pelaksana</h3>
							</div>
						</div>
						</a>
					</div>
					

					<div class="col-md-6">
						<a class="text-decoration-none text-light" href="klien.php">
						<div class="p-4 bg-info shadow-sm d-flex justify-content-around align-items-center rounded">
							<div>
								<h3 class="fs-2">Data Klien</h3>
							</div>
						</div>
						</a>
					</div>

					<div class="col-md-6">
						<a class="text-decoration-none text-light" href="produksi.php">
						<div class="p-4 bg-info shadow-sm d-flex justify-content-around align-items-center rounded">
							<div>
								<h3 class="fs-2">Produksi</h3>
							</div>
						</div>
						</a>
					</div>

					<div class="col-md-6">
						<a class="text-decoration-none text-light" href="validasi.php">
						<div class="p-4 bg-info shadow-sm d-flex justify-content-around align-items-center rounded">
							<div>
								<h3 class="fs-2">Validasi</h3>
							</div>
						</div>
						</a>
					</div>

					<div class="col-md-4">
						<a class="text-decoration-none text-light" href="logout.php">
						<div class="p-2 bg-danger shadow-sm d-flex justify-content-around align-items-center rounded">
							<div>
								<h3 class="fs-2">Logout</h3>
							</div>
						</div>
						</a>
					</div>

				</div>
            </div>
		</table>
	</div>
</body>
</html>