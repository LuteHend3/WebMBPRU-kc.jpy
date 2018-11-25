<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="2") {
  // die("Anda bukan Keuangan");
    header("location: alertlogin.php");
}
?>



<?php 
include 'koneksi.php';
$id = $_GET['id_pen2'];
mysqli_query($koneksi,"DELETE FROM penagihan2 WHERE id_pen2='$id'")or die(mysqli_error());
header("location:uangpen2.php?pesan=hapus");
?>
