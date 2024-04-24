<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libreria_mafe";

try {
	$conn = new PDO ("mysql:host=$servername;dbname=$dbname;charset=utf8",$username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "Conexión OK";
	
} catch (Exception $e) {
	echo "Conexión Falló".$e->getmessage();
}

?>