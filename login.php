<?php
include ("admin/conn/koneksi.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.php?error1');

} else if (empty($username)) {
	header('location:index.php?error=2');
	
} else if (empty($password)) {
	header('location:index.php?error=3');
	
}

$q = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['nama_admin'] = $row['nama_admin']; 
	header('location:admin/dashboard.php');
}else {
	echo "<script>alert('Username atau Password Salah, Periksa Kembali!'); window.location = 'index.php'</script>";
}
?>