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
$id_bdd = $_POST['id_bdd'];
$id_fee = $_POST['id_fee'];
$id_surat = $_POST['id_surat'];
$id_tugas = $_POST['id_tugas'];
$id_objek = $_POST['id_objek'];

mysqli_query($koneksi,"INSERT INTO bdd VALUES('$id_bdd','$id_surat','$id_tugas','$id_objek','$id_fee')");

header("location:page-BDD.php?pesan=input");
?>
