<?php
include("conexion_login.php");

// Declaracion de variables
$nomUsuario = $_POST['inpNombre'];
$apellido = $_POST['inpApellido'];
$nickUsuario = $_POST['inpUsuario'];
$clave = $_POST['inpClave'];

$con = Conectarse();

if ($nomUsuario != "" || $apellido != "" || $nickUsuario != "" || $clave != "") {

	$query = "INSERT INTO usuario (nombre, apellido, nickname, password)" .
			 "VALUES('$nomUsuario', '$apellido', '$nickUsuario', '$clave')";
} else {
	echo "Debe de llenar todos los campos para registrarse <br>";
}

if (mysql_query($query, $con))$q = 1;
else $q = 0;

if ($q == 1) {
	$result = mysql_result($q, 0);
	echo "Datos guardados correctamente";
	header("Location: index.html");
} else
	echo "El usuario no se pudo registrar en la base de datos";

mysql_close($con);

?>
