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

$sql = "INSERT INTO pemberi_tugas (id_tugas, nama_bank, cabang, alamat_bank, npwp, tipe_bank, badan_usaha, jenis_pekerjaan, org_bank, email, tujuan_penilaian, jenis_laporan)
    VALUES('".$id_tugas."', '".$nama_bank."', '".$cabang."', '".$alamat_bank."', '".$npwp."', '".$tipe_bank."', '".$badan."', '".$jenis_pekerjaan."', '".$orang."', '".$email."', '".$tujuan."', '".$jenis_laporan."')"; 
    // execute query
    $exec = mysql_query($sql, $conn); 

//$sql1 = "INSERT INTO bdd (id_tugas)
   // VALUES('".$id_tugas."')"; 
    // execute query
   // $exec = mysql_query($sql1, $conn); 

header("location:bddtugas.php?pesan=input");
?>
