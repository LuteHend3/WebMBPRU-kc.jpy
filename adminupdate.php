<?php 

include 'koneksi.php';
$id_karyawan = $_POST['id_karyawan'];
$id_divisi = $_POST['id_divisi'];
$nama = $_POST['nama'];
$jk = $_POST['Jenis_kelamin'];
$email = $_POST['email'];
$pass = md5($_POST['password']);
$alamat = $_POST['alamat'];
$telp = $_POST['no_telp'];

mysql_query("UPDATE karyawan SET id_divisi='$id_divisi', nama='$nama', Jenis_kelamin='$jk', email='$email', password='$pass', alamat='$alamat', no_telp='$telp' WHERE id_karyawan='$id_karyawan'");

header("location:page-admin.php?pesan=update");

?>