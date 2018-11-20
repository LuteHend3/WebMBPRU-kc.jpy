<?php 

    $conn = mysql_connect("localhost", "root", "")
            or die("ERR: Connection");
   
    // connect to database       
    $db = mysql_select_db("webmbprudb", $conn)
          or die("ERR: Database");

include 'koneksi.php';
$id_objek = $_POST['id_objek'];
$alamat_objek = $_POST['alamat_objek'];
$jumlah = $_POST['jumlah'];
$tipe = $_POST['tipe'];
$lt = $_POST['lt'];
$lb = $_POST['lb'];



$sql = "UPDATE objek_penilaian SET id_objek='$id_objek', alamat_objek='$alamat_objek', jumlah='$jumlah', tipe='$tipe', lt='$lt', lb='$lb' WHERE id_objek='$id_objek'"; 
    // execute query
    $exec = mysql_query($sql, $conn); 



header("location:bddobjek.php?pesan=update");

?>