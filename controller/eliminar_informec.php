<?php
  	include 'conexion.php';

  	$eti = $_GET['eti'];

  	$eliminar = $db->query("DELETE FROM equipo_tareas_informe_c WHERE eti='$eti'");

  	if($eliminar)
  	{
  		echo "<script>alert('Informe Eliminado');location.href='../informesc.php'</script>";
  	}

  	mysqli_close($db);

?>