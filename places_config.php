<?php
$db = new Mysqli("localhost", "root", "", "bonvoyage"); 
if ($db->connect_errno){
	die('Connect Error: ' . $db->connect_errno);
}
?>