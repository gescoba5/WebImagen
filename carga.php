<?php
include("conexion.php");

// Carpeta en el servidor donde se guardan las imagenes
$rutaServidor = 'uploads';

$rutaTemporal = $_FILES['imagen']['tmp_name'];
$nomImagen    = $_FILES['imagen']['name'];

$rutaFinal    = $rutaServidor.'/'.$nomImagen;

move_uploaded_file($rutaTemporal, $rutaFinal);

$clasificacionImagen = $_POST['clasificacion'];

$con = Conectarse();

$query = "INSERT INTO carga(ruta, clasificacion) VALUES('$rutaFinal', '$clasificacionImagen')";

if (mysql_query($query, $con))$q = 1;
else $q = 0;

if ($q == 1) {
	$result = mysql_result($q, 0);
	echo "<br>Imágen $nomImagen cargada con exito<br>";
} else
	echo "<br>La imágen $nomImagen no se pudo cargar<br>";

mysql_close($con);

?>
