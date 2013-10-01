<?php
	include ("conexion.php");

	if (isset($_GET['id'])) {
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
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Im&aacute;genes Cargadas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
		<link rel="stylesheet" href="css/estilos_botones.css">
		<link rel="stylesheet" href="css/estilos_combos.css">
		<link rel="stylesheet" href="css/estilos_subir.css">
		<script type="text/javascript" src="js/modernizr.custom.63321.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.dropdown.js"></script>
		<script type="text/javascript" src="js/funcion.dropdown.js"></script>
	</head>

	<body>
		<div class="header">
			<h1>Centro de carga de im&aacute;genes</h1>
			<div class="usuario">
				<a href="login.html">Iniciar sesi&oacute;n</a>&nbsp;
				<a href="registro.html">Registrarse</a>&nbsp;
				<a href="subir_imagenes.php">Subir im&aacute;genes</a>&nbsp;&nbsp;
			</div>
		</div>
		
		<h2 style="color: #FFFFFF">Im&aacute;genes cargadas</h2>
		
<?php
	include ("conexion.php");

	$clasificacionImagen = isset($_POST['clasificacion']);

	$query  = "SELECT id, nombre, clasificacion FROM upload";
	$result = mysql_query($query) or die('Error, fall&oacute; consulta a la base de datos');

	if (mysql_num_rows($result) == 0) {
		echo '<font color="white"> No hay registros en la base de datos </font> <br>';
	} else {
		while (list($id, $nombre, $clasificacionImagen) = mysql_fetch_array($result)) {
?>
		<section class="imagenes">
			<div class="blur">
				<div class="shadow">
					<div class="content">
						<img src="download.php?id=<?php echo $id;?>" width="200" height="200"><br>
						<font color="black"> <?php echo $clasificacionImagen;?> </font><br>
						<a href="download.php?id=<?php echo $id;?>"> <?php echo $nombre;?>,</a>
					</div>
				</div>
			</div>
		</section>
<?php
		}
	}
?>

<!--   --- Fin todas las imágenes ---- -->

<!-- Muestra las imágenes filtradas
-------------------------------------- -->

		<form class="login" method="post" enctype="multipart/form-data">
			<section class="main clearfix">
				<label for="login" style="margin-top: 37px;">Filtrar im&aacute;genes</label>
				<div class="fleft">
					<select id="cd-dropdown" class="cd-select" name="clasificacion">
						<option value="-1" selected>Elija una Clasificaci&oacute;n</option>
						<option class="icon-bear">Animales</option>
						<option class="icon-cars">Carros</option>
						<option class="icon-rocket">Deportes</option>
						<option class="icon-sun">Paisajes</option>
						<option class="icon-finder">Personas</option>
						<option class="icon-clock">Sin clasificaci&oacute;n</option>
					</select>
					<input type="submit" class="button blue" value="Filtrar"
						style="margin-top: 20px; float: right;">
				</div>
			</section>
		</form>

<?php
	include ("conexion.php");

	$clasificacionImagen = isset($_POST['clasificacion'])?$_POST['clasificacion']:NULL;

	$query  = "SELECT id, nombre FROM upload WHERE clasificacion = '".$clasificacionImagen."'";
	$result = mysql_query($query) or die('Error, fall&oacute; consulta a la base de datos');

	if (mysql_num_rows($result) != 0) {
		echo $clasificacionImagen;
		while (list($id, $nombre) = mysql_fetch_array($result)) {
?>
		<section class="imagenes">
			<div class="blur">
				<div class="shadow">
					<div class="content">
						<img src="download.php?id=<?php echo $id;?>" width="200" height="200"><br>
						<a href="download.php?id=<?php echo $id;?>"> <?php echo $nombre;?>,</a>
					</div>
				</div>
			</div>
		</section>
<?php
		}
	}
?>
<!--   --- Fin de las imágenes filtradas ---- -->
	</body>
</html>