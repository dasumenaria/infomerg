<?php 
date_default_timezone_set('asia/kolkata');
ini_set('max_execution_time', 200000);

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'wwwshant_ntd';

$con = mysql_connect($dbHost, $dbUser, $dbPass) or die('Error Connecting to MySQL DataBase' .mysql_error());
mysql_select_db($dbName,$con);
?>

 