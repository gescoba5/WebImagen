<?php
include("conexion_login.php");

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
		header("Location: subir.php"); 
	} else
		echo "Usuario o Clave err&oacute;neos";
} catch (Exception $error){}

mysql_close($con);

?>