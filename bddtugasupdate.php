<?php 
include 'koneksi.php';
$id_tugas = $_POST['id_tugas'];
$nama_bank = $_POST['nama_bank'];
$cabang = $_POST['cabang'];
$alamat_bank = $_POST['alamat_bank'];
$npwp = $_POST['npwp'];
$tipe_bank = $_POST['tipe_bank'];
$badan = $_POST['badan_usaha'];
$jenis_pekerjaan = $_POST['jenis_pekerjaan'];
$orang = $_POST['org_bank'];
$email = $_POST['email'];
$tujuan = $_POST['tujuan_penilaian'];
$jenis_laporan = $_POST['jenis_laporan'];



$sql = "UPDATE pemberi_tugas SET id_tugas='$id_tugas', nama_bank='$nama_bank', cabang='$cabang', alamat_bank='$alamat_bank', npwp='$npwp', tipe_bank='$tipe_bank', badan_usaha='$badan', jenis_pekerjaan='$jenis_pekerjaan', org_bank='$orang', email='$email', tujuan_penilaian='$tujuan', jenis_laporan='$jenis_laporan' WHERE id_tugas='$id_tugas'"; 
    // execute query
    $exec = mysql_query($koneksi, $sql); 

    //$sql1 = "UPDATE bdd SET id_tugas='$id_tugas' WHERE id_tugas='$id_tugas'"; 
    // execute query
   // $exec = mysql_query($sql1, $conn);

header("location:bddtugas.php?pesan=update");

?>