<?php
include("conexion.php");

// Declaracion de variables
$nickUsuario = $_POST['inpUsuario'];
$clave = $_POST['inpClave'];

$con = Conectarse();

$query = "SELECT * FROM usuario WHERE nickname = '".$nickUsuario."' AND
	password = '".$clave."'";

$q = mysql_query($query, $con);

try {
	if (mysql_result($q, 0)) {
		$result = mysql_result($q, 0);
		header("Location: carga.html"); 
	} else
		echo "Usuario o Clave erroneos";
} catch (Exception $error){}

mysql_close($con);

?>