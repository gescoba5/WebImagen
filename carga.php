<?php
include("conexion.php");

// Carpeta en el servidor donde se guardan las imagenes
$rutaServidor = 'uploads';

$rutaTemporal = $_FILES['imagen']['tmp_name'];
$tipo         = $_FILES['imagen']['type'];
$imagen       = $_FILES['imagen']['name'];

$prefijo      = substr(md5(uniqid(rand())), 0, 3);
$destino      = $rutaServidor .'/' .$prefijo .'_' .$imagen;

if ($imagen != "") {
	if ($tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg"
		|| $tipo == "image/jpg") {
			move_uploaded_file($rutaTemporal, $destino);
			$clasificacionImagen = $_POST['clasificacion'];
			$con = Conectarse();
			$query = "INSERT INTO carga(ruta, clasificacion) VALUES('$destino'," .
					 "'$clasificacionImagen')";
			if (mysql_query($query, $con)) {
				$q = 1;
			} else {
				$q = 0;
			}
			if ($q == 1) {
				$result = mysql_result($q, 0);
				echo "<br>Imágen $imagen cargada con exito<br>";
			} else
				echo "<br>La imágen $imagen no se pudo cargar<br>";
				mysql_close($con);
	}
	else {
		echo 'Solo se permite cargar imágenes con formato GIF, PNG, JPG o JPEG';
	}
}
?>
