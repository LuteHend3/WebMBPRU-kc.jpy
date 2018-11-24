<?php 

include 'koneksi.php';
$id_opp = $_POST['id_opp'];
$no_opp = $_POST['no_opp'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_opp']));


mysqli_query($koneksi,"UPDATE opp SET id_opp='$id_opp', no_opp='$no_opp', tgl_opp='$tgl' WHERE id_opp='$id_opp'");

header("location:bddopp.php?pesan=update");

?>