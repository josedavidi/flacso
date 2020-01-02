<?php
  	include 'conexion.php';

  	$eti = $_GET['eti'];

  	$eliminar = $db->query("DELETE FROM equipo_tareas_informe WHERE eti='$eti'");

  	if($eliminar)
  	{
  		echo "<script>alert('Informe Eliminado');location.href='../informes.php'</script>";
  	}

  	mysqli_close($db);

?>