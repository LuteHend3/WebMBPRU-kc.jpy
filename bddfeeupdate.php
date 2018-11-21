<?php 
include 'koneksi.php';
$id_fee = $_POST['id_fee'];
$pro_fee = $_POST['pro_fee'];
$transport = $_POST['transport'];
$fee_bank = $_POST['fee_bank'];
$ppn = $_POST['ppn'];
$fee_luar = $_POST['fee_luar'];
$total = $_POST['total'];



$sql = "UPDATE fee SET id_fee='$id_fee', pro_fee='$pro_fee', transport='$transport', fee_bank='$fee_bank', ppn='$ppn', fee_luar='$fee_luar', total='$total' WHERE id_fee='$id_fee'"; 
    // execute query
    $exec = mysqli_query($koneksi, $sql); 



header("location:bddfee.php?pesan=update");

?>