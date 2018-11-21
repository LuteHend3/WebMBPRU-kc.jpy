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
$id = $_GET['id_karyawan'];
mysqli_query($koneksi,"DELETE FROM karyawan WHERE id_karyawan='$id'")or die(mysqli_error());
header("location:page-admin.php?pesan=hapus");
?>
