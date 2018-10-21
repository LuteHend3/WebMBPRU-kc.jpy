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
$id = $_GET['id_karyawan'];
mysql_query("DELETE FROM karyawan WHERE id_karyawan='$id'")or die(mysql_error());
header("location:page-admin.php?pesan=hapus");
?>
