<?php
//set the database connection variables

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbDatabase = "";

//connet to the database

$db = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("I cannot connect to the database because: " . mysql_error());
mysql_select_db("$dbDatabase", $db) or die ("I cannot select the database '$dbname' because: " . mysql_error());
?>