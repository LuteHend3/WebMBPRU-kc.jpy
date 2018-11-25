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
$id_pen1 = $_POST['id_pen1'];
$no_kwitansi = $_POST['no_kwitansi'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_pen1']));


mysqli_query($koneksi,"INSERT INTO penagihan1 VALUES('$id_pen1','$no_kwitansi','$tgl')");

header("location:uangpen1.php?pesan=input");
?>
