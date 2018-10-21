<?php
mysql_connect("localhost","root",""); // isi sesuai host anda
mysql_select_db("webmbprudbp"); // nama database yang  saya buat tadi
?>
<?php

	define('db_host','localhost');
	define('db_user','root'); //user database
	define('db_pass',''); //passwd database
	define('db_name','webmbprudb');
	
	mysql_connect(db_host,db_user,db_pass);
	mysql_select_db(db_name);

//fungsi untuk mengkonversi size file
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    $bytes /= pow(1024, $pow); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
	}
	?>