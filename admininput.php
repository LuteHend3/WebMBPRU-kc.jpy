<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="5") {
  header("location: alertlogin.php");
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

mysqli_query($koneksi,"INSERT INTO karyawan VALUES('$id_karyawan','$id_divisi','$nama','$jk','$email','$pass','$alamat','$telp')");

header("location:page-admin.php?pesan=input");
?>
