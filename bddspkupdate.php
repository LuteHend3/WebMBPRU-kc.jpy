<?php 

include 'koneksi.php';
$id_spk = $_POST['id_spk'];
$no_spk = $_POST['no_spk'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_spk']));


mysqli_query($koneksi,"UPDATE spk SET id_spk='$id_spk', no_spk='$no_spk', tgl_spk='$tgl' WHERE id_spk='$id_spk'");

header("location:bddspk.php?pesan=update");

?>