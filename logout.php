<?php
session_start();
	unset($_SESSION['email']);
	unset($_SESSION['id_divisi']);
	session_destroy();
	header("location:index.php");
?>