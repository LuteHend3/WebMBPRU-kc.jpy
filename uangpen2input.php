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
$id_pen2 = $_POST['id_pen2'];
$no_invoice = $_POST['no_invoice'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_pen2']));
$no_faktur = $_POST['no_faktur'];
$tglf= date("Y-m-d", strtotime($_POST['tgl_faktur']));

mysqli_query($koneksi,"INSERT INTO penagihan2 VALUES('$id_pen2','$no_invoice','$tgl','$no_faktur','$tglf')");

header("location:uangpen2.php?pesan=input");
?>
