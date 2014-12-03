<?php
$conn = @ mysql_connect("localhost", "root", "") or die("Connect error!");
mysql_select_db("bonVoyage", $conn);
mysql_query("set names 'utf8'");
session_start(); 
?>
<?php
error_reporting(0);
?>