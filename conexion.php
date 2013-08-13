<?php
include ("datos_conexion.php");

$connection = mysql_connect("$host", "$usuario", "$password") or die ("Error conectando a la base de datos");

$db = mysql_select_db("$DB", $connection) or die ("Error seleccionando la base de datos");

?>