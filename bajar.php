<?php
include ("conexion.php");

if(isset($_GET['id'])) {
    $id      = $_GET['id'];
    $query   = "SELECT nombre, tipo, tamanio, contenido FROM upload WHERE id = '$id'";
    $result  = mysql_query($query) or die('Error, query failed');
    list($nombre, $tipo, $tamanio, $contenido) = mysql_fetch_array($result);

    header("Content-Disposition: attachment; filename=$nombre");
    header("Content-length: $tamanio");
    header("Content-tipo: $tipo");
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

$query  = "SELECT id, nombre FROM upload";
$result = mysql_query($query) or die('Error, fall&oacute; consulta a la base de datos');

if(mysql_num_rows($result) == 0)
{
    echo "No hay registros en la base de datos <br>";
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
			<option>Animales</option>
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

$clasificacionImagen = $_POST['clasificacion'];

$query  = "SELECT id, nombre FROM upload WHERE clasificacion = '".$clasificacionImagen."'";
$result = mysql_query($query) or die('Error, fall&oacute; consulta a la base de datos');

if(mysql_num_rows($result) == 0)
{
    echo "No hay registros en la base de datos <br>";
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

</body>
</html>