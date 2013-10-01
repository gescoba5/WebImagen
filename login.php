<?php
	include ("conexion.php");

	// Declaracion de variables
	$nickUsuario = $_POST['inpUsuario'];
	$clave       = $_POST['inpClave'];

	$query = "SELECT * FROM usuario WHERE nickname = '".$nickUsuario."' AND
		password = '".$clave."'";

	$q = mysql_query($query);

	try {
		if (mysql_num_rows($q) == 1) {
			session_start();
			$_SESSION["autentica"] = "SIP";
			$_SESSION["usuarioActual"] = mysql_result($q, 0, 1) ." "
				.mysql_result($q, 0, 2);
			
			$result = mysql_result($q, 0);
			header("Location: subir_imagenes.php"); 
		} else {
			echo "<script>alert('Usuario o Password err\u00f3neos');
				window.location.href=\"login.html\"</script>";
		}
	} catch (Exception $error){}
?>