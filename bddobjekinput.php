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
$id_objek = $_POST['id_objek'];
$alamat_objek = $_POST['alamat_objek'];
$jumlah = $_POST['jumlah'];
$tipe = $_POST['tipe'];
$lt = $_POST['lt'];
$lb = $_POST['lb'];


$sql = "INSERT INTO objek_penilaian (id_objek, alamat_objek, jumlah, tipe, lt, lb)
    VALUES('".$id_objek."', '".$alamat_objek."', '".$jumlah."', '".$tipe."', '".$lt."', '".$lb."')"; 
    // execute query
    $exec = mysqli_query($koneksi, $sql); 


header("location:bddobjek.php?pesan=input");
?>
