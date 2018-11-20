<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: alertlogin.php");
}
if ($_SESSION['id_divisi']!="1") {
  header("location: alertlogin.php");
}

// connect to mysql
    $conn = mysql_connect("localhost", "root", "")
            or die("ERR: Connection");
   
    // connect to database       
    $db = mysql_select_db("webmbprudb", $conn)
          or die("ERR: Database");
?>

<?php 
include 'koneksi.php';
$id_fee = $_POST['id_fee'];
$pro_fee = $_POST['pro_fee'];
$transport = $_POST['transport'];
$fee_bank = $_POST['fee_bank'];
$ppn = $_POST['ppn'];
$fee_luar = $_POST['fee_luar'];
$total = $_POST['total'];


$sql = "INSERT INTO fee (id_fee, pro_fee, transport, fee_bank, ppn, fee_luar, total)
    VALUES('".$id_fee."', '".$pro_fee."', '".$transport."', '".$fee_bank."', '".$ppn."', '".$fee_luar."', '".$total."')"; 
    // execute query
    $exec = mysql_query($sql, $conn); 


header("location:bddfee.php?pesan=input");
?>
