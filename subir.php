<!DOCTYPE html>
<html>
<head>
<title>Carga de Im&aacute;genes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
<link rel="stylesheet" href="css/estilos_login.css">
<link rel="stylesheet" href="css/estilos_botones.css">
</head>

<body>

<?php
include ("conexion.php");

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

if(isset($_POST['upload'])) {
	$imagen 		  = $_FILES['imagen']['name'];
    $carpetaTemporal  = $_FILES['imagen']['tmp_name'];
    $tamanio 		  = $_FILES['imagen']['size'];
    $tipo 			  = $_FILES['imagen']['type'];
        
    $fp 	   = fopen($carpetaTemporal, 'r');
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp);
       
    if(!get_magic_quotes_gpc())
    {
    	$imagen = addslashes($imagen);
    }
	
	if ($imagen != "") {
		if ($tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg"
		|| $tipo == "image/jpg") {
			$clasificacionImagen = $_POST['clasificacion'];
			
			$query = "INSERT INTO upload (nombre, tipo, tamanio, contenido, clasificacion) ".
					 "VALUES ('$imagen', '$tipo', '$tamanio', '$contenido', '$clasificacionImagen')";

			mysql_query($query) or die ('Error, query failed');
			
			echo "<script type=''>alert('La imágen $imagen fue cargada con éxito');</script>";
		} else {
			echo "<script type=''>alert('Solo se permite cargar imágenes con formato GIF, PNG, JPG o JPEG');</script>";
		}
	} else {
		echo "<script type=''>alert('Por favor elija una imágen');</script>";
	}
}        
?>

	<form class="login" action="" method="post" enctype="multipart/form-data" name="uploadform">
		<p>
			<label for="login">Im&aacute;gen:</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
			<input name="imagen" type="file" id="login">
		</p>
		
		<p>
            <label for="login">Clasificaci&oacute;n:</label>&nbsp;&nbsp;&nbsp;
            <select name="clasificacion" id="login">
                <option>Deportes</option>
                <option>Carros</option>
                <option>Motos</option>
                <option>Animales</option>
                <option>Paisajes</option>
                <option>Infantiles</option>
                <option>Comidas</option>
                <option>Videojuegos</option>
                <option>Sin clasificaci&oacute;n</option>
            </select>
        </p>
		
		<section class="container2">
			<input name="upload" type="submit" id="upload" class="button blue" value="Cargar Im&aacute;gen">
		</section>
	</form>
</body>
</html>