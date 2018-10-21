<?php
session_start();
if (!isset($_SESSION['email'])) {
  die("Anda belum login");
}
if ($_SESSION['id_divisi']!="5") {
  die("Anda bukan Admin");
}
?>

<?php 
include 'koneksi.php';
$id_karyawan = $_POST['id_karyawan'];
$id_divisi = $_POST['id_divisi'];
$nama = $_POST['nama'];
$jk = $_POST['Jenis_kelamin'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$alamat = $_POST['alamat'];
$telp = $_POST['no_telp'];

mysql_query("INSERT INTO karyawan VALUES('$id_karyawan','$id_divisi','$nama','$jk','$email','$pass','$alamat','$telp')");

header("location:page-admin.php?pesan=input");
?>
