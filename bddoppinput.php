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
$id_opp = $_POST['id_opp'];
$no_opp = $_POST['no_opp'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_opp']));


mysqli_query($koneksi,"INSERT INTO opp VALUES('$id_opp','$no_opp','$tgl')");

header("location:bddopp.php?pesan=input");
?>
