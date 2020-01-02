<?php
	$server = 'localhost'; // Este queda como predeterminado
	$user = 'root';  // Debemos ingresar el usuario que creamos para la base de datos
	$pass= ''; // Ingresar la contraseña del usuario
	$db = 'flacso'; //Nombre del hosting
$db=mysqli_connect($server,$user,$pass,$db) or die('Error en el Servidor'.mysqli_errno($db));
?>
