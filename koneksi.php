
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

	<?php
date_default_timezone_set('Asia/Jakarta');
 
$sekarang = new DateTime();
$menit = $sekarang -> getOffset() / 60;
 
$tanda = ($menit < 0 ? -1 : 1);
$menit = abs($menit);
$jam = floor($menit / 60);
$menit -= $jam * 60;
 
$offset = sprintf('%+d:%02d', $tanda * $jam, $menit);


mysql_query("SET time_zone = '$offset'")
?>