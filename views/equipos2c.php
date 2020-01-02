<?php
	
	include'../controller/conexion.php';

	$idSistema = $_GET['idSistema'];
	$idSubSistema = $_GET['idSubSistema'];

	$equipos = $db->query("SELECT * FROM equipos WHERE id_sistema=$idSistema AND id_subsistema='$idSubSistema'") or die('error'.mysqli_errno($db));


	$procesos = $db->query("SELECT * FROM procesos WHERE id_sistema=$idSistema AND id_subsistema='$idSubSistema'") or die('error'.mysqli_errno($db));

?>

<select name="equipo" id="equip" class="custom-select">
	<option value="#">Elige el Equipo</option>
	<?php
		while($fila = mysqli_fetch_array($equipos))
		{
			echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
		}
	?>
</select>
<hr>
<button type="button" id="btn_buscarProcesos" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">Buscar Tareas <i class="fas fa-search"></i></button>

<script src="js/buscarProcesosAgendados.js"></script>