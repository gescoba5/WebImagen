<?php
include("datos_conexion.php");

// Se elimina las advertencias en la compilacion
ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

// Funcion que permite conectarse a la base de datos
function Conectarse() {
	if (!($link = mysql_connect($GLOBALS['host'], $GLOBALS['usuario']))) {
		echo "Error conectando a la base de datos";
		exit();
	}
	if (!mysql_select_db($GLOBALS['DB'], $link)) {
		echo "Error seleccionando a la base de datos";
		exit();
	}
	return $link;
}

?>