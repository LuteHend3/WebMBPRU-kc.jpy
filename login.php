<?php
session_start();
include"koneksi.php";
$email=$_POST['email'];
$password=md5($_POST['password']);
$op=$_GET['op'];
if($op=="in"){
	$sql=mysql_query("SELECT * FROM karyawan JOIN divisi ON karyawan.id_divisi = divisi.id_divisi WHERE email='$email'AND password='$password'");
		if(mysql_num_rows($sql)==1){//jika berhasil akan bernilai 1
		$qry=mysql_fetch_array($sql);
		$_SESSION['email']=$qry['email'];
		$_SESSION['password']=$qry['password'];
		$_SESSION['nama']=$qry['nama'];
		$_SESSION['id_divisi']=$qry['id_divisi'];
		$_SESSION['nama_divisi']=$qry['nama_divisi'];
		
		if($qry['id_divisi']=="1"){
			header("location:page-BDD.php");
			}
			else if($qry['id_divisi']=="2"){
			header("location:page-keuangan.php");
		}
		else if($qry['id_divisi']=="3"){
			header("location:page-adminis.php");
		}
		else if($qry['id_divisi']=="4"){
			header("location:page-teknik.php");
		}
		else if($qry['id_divisi']=="5"){
			header("location:page-admin.php");
		}
	}else{
		?>
		<script language="JavaScript">
		alert('Email atau password tidak sesuai. silahkan diulang kembali!!');
		document.location='index.php';
		</script>
		<?php
	}
}else if($op=="out"){
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['nama']);
	unset($_SESSION['id_divisi']);
	unset($_SESSION['nama_divisi']);
	header("location:index.php");
}
?>
