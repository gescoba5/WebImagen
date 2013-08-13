<?php
include ("conexion.php");

if(isset($_GET['id'])) {
    $id      = $_GET['id'];
    $query   = "SELECT nombre, tipo, tamanio, contenido, clasificacion FROM upload WHERE id = '$id'";
    $result  = mysql_query($query) or die('Error, query failed');
    list($nombre, $tipo, $tamanio, $contenido, $clasificacionImagen) = mysql_fetch_array($result);

    header("Content-Disposition: attachment; filename=$nombre");
    header("Content-length: $tamanio");
    header("Content-type: $tipo");
    header("Content-type: $clasificacionImagen");
    echo $contenido;

    exit;
}

?>

<!-- Muestra todas las imagenes en pantalla
------------------------------------------- -->
<!DOCTYPE html>
<html>
<head>
<title>Archivos Cargados</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
<link rel="stylesheet" href="css/estilos_login.css">
<link rel="stylesheet" href="css/estilos_botones.css">
</head>

<body>

<?php
include ("conexion.php");

$clasificacionImagen = isset($_POST['clasificacion']);

$query  = "SELECT id, nombre, clasificacion FROM upload";
$result = mysql_query($query) or die('Error, fall&oacute; consulta a la base de datos');

if(mysql_num_rows($result) == 0)
{
    echo '<font color="white"> No hay registros en la base de datos </font> <br>';
}
else
{
    while(list($id, $nombre, $clasificacionImagen) = mysql_fetch_array($result))
    {
?>
	<img src="download.php?id=<?php echo $id;?>" width="200" height="300"> <br>
	<font color="white"> <?php echo $clasificacionImagen;?> </font>  <br>
	<a href="download.php?id=<?php echo $id;?>"> <?php echo $nombre;?>,</a> <br> <br>
<?php
    }
}
?>

<!--   --- Fin todas las imagenes ---- -->

<!-- Muestra las imagenes filtradas
-------------------------------------- -->

<form style="top: 150px; left: 100px" class="login" action="" method="post" enctype="multipart/form-data" name="uploadform">
	<p>
		<label for="login">Filtrar</label><br><br>
	</p>
	
	<p>
		<label for="login">Clasificaci&oacute;n:</label>&nbsp;&nbsp;&nbsp;
		<select name="clasificacion" id="login">
			<option>--------</option>
			<option>Deportes</option>
			<option>Carros</option>
			<option>Motos</option>
			<option>Personas</option>
			<option>Animales</option>
			<option>Plantas</option>
			<option>Paisajes</option>
			<option>Infantiles</option>
			<option>Comidas</option>
			<option>Videojuegos</option>
			<option>Sin clasificaci&oacute;n</option>
		</select>
	</p>
	
	<section class="container2">
		<input name="upload" type="submit" id="upload" class="button blue" value="Filtrar">
	</section>
</form>

<?php
include ("conexion.php");

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

$clasificacionImagen = isset($_POST['clasificacion'])?$_POST['clasificacion']:NULL;

$query  = "SELECT id, nombre FROM upload WHERE clasificacion = '".$clasificacionImagen."'";
$result = mysql_query($query) or die('Error, fall&oacute; consulta a la base de datos');

if(mysql_num_rows($result) == 0)
{
    echo '<font color="white"> No ha elegido ning&uacute;n filtro de clasificaci&oacute;n de im&aacute;genes </font> <br>';
} 
else
{
    while(list($id, $nombre) = mysql_fetch_array($result))
    {
?>	
	<img src="download.php?id=<?php echo $id;?>" width="200" height="300"> <br>
	<a href="download.php?id=<?php echo $id;?>"> <?php echo $nombre;?>,</a> <br> <br>
<?php
    }
}
?>
<br> <br> <br> <br>
</body>
</html>