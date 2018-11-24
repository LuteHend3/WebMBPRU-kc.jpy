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
$id_surat = $_POST['id_surat'];
$id_spk = $_POST['id_spk'];
$id_spki = $_POST['id_spki'];
$id_surat_tugas = $_POST['id_surat_tugas'];
$id_opp = $_POST['id_opp'];

mysqli_query($koneksi,"INSERT INTO surat VALUES('$id_surat','$id_spk','$id_spki','$id_surat_tugas','$id_opp')");

header("location:bddsurat.php?pesan=input");
?>
