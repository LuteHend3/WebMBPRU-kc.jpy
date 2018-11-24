<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="1") {
 // die("Anda bukan Business Development Dept. (BDD)");
    header("location: alertlogin.php");
}
?>

<?php 
include 'koneksi.php';
$id_surat_tugas = $_POST['id_surat_tugas'];
$no_surat = $_POST['no_surat'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_surat']));
$surveyor = $_POST['surveyor'];


mysqli_query($koneksi,"INSERT INTO surat_tugas VALUES('$id_surat_tugas','$no_surat','$tgl','$surveyor')");

header("location:bddsrttugas.php?pesan=input");
?>
