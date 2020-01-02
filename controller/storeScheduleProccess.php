<?php
		
	include'conexion.php';

	 $age = $_POST['age'];
	 $mes = $_POST['mes'];
	 $equipo = $_POST['equipo'];
	 $procesos = $_POST['procesos'];

	
	foreach ($procesos as $pro) {
		$validate = $db->query("SELECT * FROM agenda_procesos WHERE equipo_id='$equipo' AND mes_id='$mes' AND proceso_id='$pro'")or die("error".mysqli_errno($db));

		if(mysqli_num_rows($validate)>0)
		{
			echo "<script>alert('Agenda re[etida');location.href='../schedule_process.php'</script>";
			return false;
		}
	}

	 

	 foreach($procesos as $procesos)
	 {
	 	$storeAgendaProcesos = $db->query("INSERT INTO agenda_procesos VALUES(0,'$equipo','$mes','$procesos','$age')");
	 }

	 
	 echo "<script>alert('Los procesos han sido agendados');location.href='../schedule_process.php'</script>";

	 mysqli_close($db);

?>