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
$id = $_GET['id_spki'];
mysql_query("DELETE FROM spki WHERE id_spki='$id'")or die(mysql_error());
header("location:bddspki.php?pesan=hapus");
?>
