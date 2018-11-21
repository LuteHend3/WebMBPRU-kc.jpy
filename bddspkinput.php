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
$id_spk = $_POST['id_spk'];
$no_spk = $_POST['no_spk'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_spk']));


mysqli_query($koneksi,"INSERT INTO spk VALUES('$id_spk','$no_spk','$tgl')");

header("location:bddspk.php?pesan=input");
?>
