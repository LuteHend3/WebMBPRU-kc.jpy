<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="1") {
  header("location: alertlogin.php");
}
?>



<?php 
include 'koneksi.php';
$id = $_GET['id_bdd'];
mysqli_query($koneksi,"DELETE FROM bdd WHERE id_bdd='$id'")or die(mysqli_error());
header("location:page-BDD.php?pesan=hapus");
?>
