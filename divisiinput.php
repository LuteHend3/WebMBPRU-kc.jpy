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
$id_divisi = $_POST['id_divisi'];
$nama_divisi = $_POST['nama_divisi'];

mysqli_query($koneksi,"INSERT INTO divisi VALUES('$id_divisi','$nama_divisi')");

header("location:admindivisi.php?pesan=input");
?>
