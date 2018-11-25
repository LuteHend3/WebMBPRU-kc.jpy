<?php 

include 'koneksi.php';
$id_pen1 = $_POST['id_pen1'];
$no_kwitansi = $_POST['no_kwitansi'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_pen1']));


mysqli_query($koneksi,"UPDATE penagihan1 SET id_pen1='$id_pen1', no_kwitansi='$no_kwitansi', tgl_pen1='$tgl' WHERE id_pen1='$id_pen1'");

header("location:uangpen1.php?pesan=update");

?>