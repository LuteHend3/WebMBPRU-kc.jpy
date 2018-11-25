<?php 

include 'koneksi.php';
$id_pen2 = $_POST['id_pen2'];
$no_invoice = $_POST['no_invoice'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_pen2']));
$no_faktur = $_POST['no_faktur'];
$tglf= date("Y-m-d", strtotime($_POST['tgl_faktur']));


mysqli_query($koneksi,"UPDATE penagihan2 SET id_pen2='$id_pen2', no_invoice='$no_invoice', tgl_pen2='$tgl', no_faktur='$no_faktur', tgl_faktur='$tglf' WHERE id_pen2='$id_pen2'");

header("location:uangpen2.php?pesan=update");

?>