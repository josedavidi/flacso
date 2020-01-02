<?php
	
	include'../controller/conexion.php';

	$idSistema = $_GET['idSistema'];
	$idSubSistema = $_GET['idSubSistema'];

	$equipos = $db->query("SELECT * FROM equiposp WHERE id_sistema=$idSistema AND id_subsistema='$idSubSistema'") or die('error'.mysqli_errno($db));


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
<h5>Procesos</h5>
<select name="procesos[]" id="proces" class="js-example-basic-multiple" multiple="multiple" style="width: 110%">
	<option value="#">Elige los procesos</option>
	<?php
		while($fila = mysqli_fetch_array($procesos))
		{
			echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
		}
	?>
</select>

<script>
	$(document).ready(function() {
	    $('.js-example-basic-multiple').select2();
	});
</script>
<hr>
<button class="btn btn-primary">Guardar Procesos</button>