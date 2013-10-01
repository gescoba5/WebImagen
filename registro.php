<?php
	include ("conexion.php");

	ini_set('display_errors', 'off');
	ini_set('display_startup_errors', 'off');
	error_reporting(0);

	// Declaracion de variables
	$nomUsuario  = $_POST['inpNombre'];
	$apellido    = $_POST['inpApellido'];
	$email       = $_POST['inpEmail'];
	$nickname    = $_POST['inpNickname'];
	$clave       = $_POST['inpClave'];

	$queryUsuario = "SELECT * FROM usuario WHERE nickname = '".$nickname."'";
	
	if (!$queryUsuario) {
		$query = "INSERT INTO usuario (nombre, apellido, email, nickname, password)" .
				 "VALUES('$nomUsuario', '$apellido', '$email', '$nickname', '$clave')";
	} else {
		echo "<script>alert('El nombre de usuario ya existe, por favor elija otro');
			window.location.href=\"registro.html\"</script>";
	}

	if (mysql_query($query)) {
		$q = 1;
	} else {
		$q = 0;
	}

	if ($q == 1) {
		$result = mysql_result($q, 0);
		echo "<script>alert('Registro completado exitosamente');
			window.location.href=\"index.html\"</script>";
	} else {
		echo "<script>alert('El usuario no pudo ser registrado en la base de datos, intente de nuevo');
			window.location.href=\"registro.html\"</script>";
	}
?>