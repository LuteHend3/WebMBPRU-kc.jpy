<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="1") {
  header("location: alertlogin.php");
}
    $conn = mysql_connect("localhost", "root", "")
            or die("ERR: Connection");
   
    // connect to database       
    $db = mysql_select_db("webmbprudb", $conn)
          or die("ERR: Database");
?>



<?php 
include 'koneksi.php';
$id = $_GET['id_tugas'];

    $sql = "DELETE FROM pemberi_tugas WHERE id_tugas='$id'"; 
    // execute query
    $exec = mysqli_query($koneksi,$sql)or die(mysqli_error());


   // $sql1 = "UPDATE bdd SET id_tugas='$id_tugas' WHERE id_tugas='$id_tugas'"; 
    // execute query
   // $exec = mysql_query($sql1, $conn)or die(mysql_error());



header("location:bddtugas.php?pesan=hapus");
?>
