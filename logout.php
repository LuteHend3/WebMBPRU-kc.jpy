<?php
session_start();
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['nama']);
	unset($_SESSION['id_divisi']);
	unset($_SESSION['nama_divisi']);
	session_destroy();
	header("location:index.php");
?>