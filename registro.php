<?php
include ("conexion.php");

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

// Declaracion de variables
$nomUsuario = $_POST['inpNombre'];
$apellido = $_POST['inpApellido'];
$nickUsuario = $_POST['inpUsuario'];
$clave = $_POST['inpClave'];

$query = "INSERT INTO usuario (nombre, apellido, nickname, password)" .
		 "VALUES('$nomUsuario', '$apellido', '$nickUsuario', '$clave')";

if (mysql_query($query)) {
	$q = 1;
} else {
	$q = 0;
}

if ($q == 1) {
	$result = mysql_result($q, 0);
	echo "<script type=''>alert('Registro completado exitosamente');</script>";
	echo '<a href="index.html"> Ir al Inicio</a>';
} else {
	echo "<script type=''>alert('El usuario no se pudo registrar en la base de datos');</script>";
}

?>