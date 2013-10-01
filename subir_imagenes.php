<?php include ("seguridad.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Carga de Im&aacute;genes</title>
		<link rel="stylesheet" href="css/estilos_botones.css">
		<link rel="stylesheet" href="css/estilos_combos.css">
		<link rel="stylesheet" href="css/estilos_subir.css">
		<link rel="stylesheet" href="css/estilos_nav.css">
		<script type="text/javascript" src="js/modernizr.custom.63321.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.dropdown.js"></script>
		<script type="text/javascript" src="js/funcion.dropdown.js"></script>
	</head>
	
	<body>
		<div class="header">
			<h1>Centro de carga de im&aacute;genes</h1>
			<div class="usuario">
				<strong style="color: #FFFFFF"> <?php echo $_SESSION["usuarioActual"];?> </strong>&nbsp;
				<a href="logout.php">Salir</a>&nbsp;&nbsp;
			</div>
		</div>
		
		<div>
			<h2 style="color: #FFFFFF">Bienvenido al sistema <strong><?php echo $_SESSION["usuarioActual"];?> </strong></h2><br>
		</div>
		
		<section class="containerNav">
			<nav>
				<ul class="nav">
					<li><a href="index.html" class="nav-icon"><span class="iconNav-home">Home</span></a></li>
					<li class="active"><a href="subir_imagenes.php">Subir im&aacute;genes</a></li>
					<li><a href="bajar_imagenes.php">Descargar im&aacute;genes</a></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</nav>
		</section>
		
		<form style="top: 280px;" class="login" action="upload.php" method="post" enctype="multipart/form-data">
			
			<section class="container3">
				<p>
					<label for="login">Imagen:</label>
					<input type="hidden" name="MAX_FILE_SIZE" value="83886080">
					<input name="imagen" type="file">
				</p>
			</section>
				
			<section class="main clearfix">
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
				</div>
			</section>
			
			<section class="container2">
				<input name="upload" type="submit" id="upload" class="button blue" value="Cargar Imagen">
			</section>
		</form>
	</body>
</html>