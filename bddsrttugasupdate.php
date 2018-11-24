<?php 

include 'koneksi.php';
$id_surat_tugas = $_POST['id_surat_tugas'];
$no_surat = $_POST['no_surat'];
$tgl= date("Y-m-d", strtotime($_POST['tgl_surat']));
$surveyor = $_POST['surveyor'];


mysqli_query($koneksi,"UPDATE surat_tugas SET id_surat_tugas='$id_surat_tugas', no_surat='$no_surat', tgl_surat='$tgl', surveyor='$surveyor' WHERE id_surat_tugas='$id_surat_tugas'");

header("location:bddsrttugas.php?pesan=update");

?>