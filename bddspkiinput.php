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
$id_spki = $_POST['id_spki'];
$no_spki = $_POST['no_spki'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_spki']));


mysqli_query($koneksi,"INSERT INTO spki VALUES('$id_spki','$no_spki','$tgl')");

header("location:bddspki.php?pesan=input");
?>
