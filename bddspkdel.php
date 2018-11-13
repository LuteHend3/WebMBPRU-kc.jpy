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
$id = $_GET['id_spk'];
mysql_query("DELETE FROM spk WHERE id_spk='$id'")or die(mysql_error());
header("location:bddspk.php?pesan=hapus");
?>
