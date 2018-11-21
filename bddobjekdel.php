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
$id = $_GET['id_objek'];
mysqli_query($koneksi,"DELETE FROM objek_penilaian WHERE id_objek='$id'")or die(mysqli_error());
header("location:bddobjek.php?pesan=hapus");
?>
