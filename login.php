<?php
include ("conexion.php");

// Declaracion de variables
$nickUsuario = $_POST['inpUsuario'];
$clave = $_POST['inpClave'];

$query = "SELECT * FROM usuario WHERE nickname = '".$nickUsuario."' AND
	password = '".$clave."'";

$q = mysql_query($query);

try {
	if (mysql_num_rows($q) !== 0) {
		$result = mysql_result($q, 0);
		header("Location: subir.php"); 
	} else {
		echo "<script type=''>alert('Usuario o clave erroneos');</script>";
		echo '<a href="login.html"> Intente nuevamente</a>';
	}
} catch (Exception $error){}

?>