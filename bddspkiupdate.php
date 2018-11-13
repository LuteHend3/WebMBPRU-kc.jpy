<?php 

include 'koneksi.php';
$id_spki = $_POST['id_spki'];
$no_spki = $_POST['no_spki'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_spki']));


mysql_query("UPDATE spki SET id_spki='$id_spki', no_spki='$no_spki', tgl_spki='$tgl' WHERE id_spki='$id_spki'");

header("location:bddspki.php?pesan=update");

?>