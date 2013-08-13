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
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
    echo "Database is empty <br>";
} 
else
{
    while(list($id, $nombre) = mysql_fetch_array($result))
    {
?>
	<a href="download.php?id=<?=$id;?>"><?=$name;?></a> <br>
<?php        
    }
}
?>
</body>
</html>