<?php
	
	require'conexion.php';
	session_start();

	
	$equipo = $_POST['equipo'];
	$user = $_SESSION['user_id'];
	$mes = $_POST['mes'];
	$date = $_POST['fecha'];
	$estado = $_POST['estadoEquipo'];
	

	$detalle = $_POST['observacion'];
	$age = date('Y');
	$create_at = date("d/m/y H:i a");
	$eti = rand(1,10000);
	

	for($i=0; $i<count($_FILES['foto']['name']); $i++)
		{
			$dir_subida = "../images/equipos/";
			$archivo_subido = $dir_subida.basename($_FILES['foto']['name'][$i]);
			move_uploaded_file($_FILES['foto']['tmp_name'][$i], $archivo_subido);

			$save_images = $db->query("INSERT INTO equipo_fotos VALUES(0,'$archivo_subido',$eti)") or die('error'.mysqli_errno($db));
		}
		

	$saveInforme = $db->query("INSERT INTO equipo_tareas_informe_c VALUES(0,'$user','$date','$mes','$estado','$detalle','$age','$eti','$create_at')")or die('error'.mysqli_errno($db));


	
		$saveTareas = $db->query("INSERT INTO equipo_tareas_c VALUES(0,'$equipo',$eti)")or die('error'.mysqli_errno($db));
	

	if($saveInforme)
	{
		echo "<script>alert('Tareas registradas exitosamente');location.href='../tareasc.php'</script>";
		;
	}

	$userData = $db->query("SELECT * FROM usuarios WHERE id ='$user'")or die('error'.mysqli_errno($db));

	$userInfo = mysqli_fetch_array($userData);



	$para      = 'proyectos@rojasingenieria.ec';
	$titulo    = 'Informe de Actividades';
	$mensaje   = 'Informe Correctivo: El tecnico '.$userInfo["nombres"].' '.$userInfo["apellidos"].' ha realizado trabajos  ';
	// foreach ($tareas as $tarea) {
	// 	$procesos = $db->query("SELECT * FROM procesos WHERE id ='$tarea'")or die('errorTarea'.mysqli_errno($db));

	// 	while($filaTarea=mysqli_fetch_array($procesos)){
	// 		$mensaje.= $filaTarea['nombre'].' - ';
	// 	}	
	// }

	$buscar_equipo = $db->query("SELECT * FROM equipos WHERE id ='$equipo'")or die('errorEquipos'.mysqli_errno($db));
	$equipoInfo = mysqli_fetch_array($buscar_equipo);

	 $mensaje.='en el equipo '.$equipoInfo['nombre'];

	 $cabeceras = 'From: info@rojasingenieria.ec' . "\r\n" .
	     'Reply-To: info@rojasingenieria.ec' . "\r\n" .
	     'X-Mailer: PHP/' . phpversion();

	 mail($para, $titulo, $mensaje, $cabeceras);

	mysqli_close($db);
	

?>