<?php
	include ("conexion.php");

	ini_set('display_errors', 'off');
	ini_set('display_startup_errors', 'off');
	error_reporting(0);
	
	@session_start();
	
	if(isset($_POST['upload'])) {
		@session_start();
		$imagen 		     = $_FILES['imagen']['name'];
		$carpetaTemporal     = $_FILES['imagen']['tmp_name'];
		$tamanio 		     = $_FILES['imagen']['size'];
		$tipo 			     = $_FILES['imagen']['type'];
		
		$clasificacionImagen = $_POST['clasificacion'];
		
		$fp 	   = fopen($carpetaTemporal, 'rb');
		$contenido = fread($fp, $tamanio);
		$contenido = addslashes($contenido);
		fclose($fp);
		   
		if(!get_magic_quotes_gpc())
		{
			$imagen = addslashes($imagen);
		}
		
		if ($imagen != "") {
			if ($tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/jpg") {
				if ($tamanio < 83886080) {
					if ($clasificacionImagen != -1) {
						$query = "INSERT INTO upload ( nombre, tipo, tamanio, contenido, clasificacion) ".
								 "VALUES ('$imagen', '$tipo', '$tamanio', '$contenido', '$clasificacionImagen')";

						mysql_query($query) or die ('Error, Fall&oacute; el query');
						
						echo "<script>alert('La imagen $imagen fue cargada con \u00e9xito');
							window.location.href=\"subir_imagenes.php\"</script>";
					} else {
						echo "<script>alert('Por favor elija una clasificaci\u00f3n para la imagen');
							window.location.href=\"subir_imagenes.php\"</script>";
					}
				} else {
					echo "<script>alert('Solo se permite cargar im\u00e1genes con un tama\u00f1o menor a 8MB');
						window.location.href=\"subir_imagenes.php\"</script>";
				}
			} else {
				echo "<script>alert('Solo se permite cargar im\u00e1genes con formato GIF, PNG, JPG o JPEG');
					window.location.href=\"subir_imagenes.php\"</script>";
			}
		} else {
			echo "<script>alert('Por favor elija una imagen');
				window.location.href=\"subir_imagenes.php\"</script>";
		}
	}
?>