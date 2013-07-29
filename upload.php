<?php

$status = "";
if ($_POST["action"] == "upload") {
    
    // Se obtiene los datos del archivo
    $tamanio = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,3);
   
    if ($archivo != "") {
    	if ($tipo == "image/gif" || $tipo == "image/png" || $tipo == "image/jpeg"
    		|| $tipo == "image/jpg") {
			
			// Se guarda el archivo en la carpeta files
			$destino =  "uploads/" .$prefijo ."_"  .$archivo;
			echo "Se cargó el archivo con éxito";
			if (copy($_FILES['archivo']['tmp_name'], $destino)) {
				$status = "Archivo subido: <b>" .$archivo ."</b>";
        	} else {
            	$status = "Error al subir el archivo";
        	}
		} else {
			$status = "Error: Solo se permiten imágenes GIF, PNG, JPG o JPEG";
		}
	} else {
		$status = "Error al subir archivo";
	}
}

?>
