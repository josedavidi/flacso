<?php
	
	include'../controller/conexion.php';
	$idSistema = $_GET['idSistema'];
	$subSistemas = $db->query("SELECT * FROM subsistemas WHERE id_sistema=$idSistema") or die('error'.mysqli_errno($db));

?>

<select name="subsistema" id="subsistem" class="custom-select">
	<option value="#">Elige el Subsistema</option>
	<?php
		while($fila = mysqli_fetch_array($subSistemas))
		{
			echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
		}
	?>
</select>