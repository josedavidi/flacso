<?php

	require_once __DIR__ . '/vendor/autoload.php';

	include'controller/conexion.php';

	$eti = $_POST['eti'];

	$informe = $db->query("SELECT equipo_tareas_informe_c.eti as eti_id,equipo_tareas_informe_c.fecha as eti_fecha, meses.nombre as mes_nombre, equipos.nombre as equipo_nombre, equipos.foto as equipo_foto, equipo_tareas_informe_c.estado as eti_estado, usuarios.nombres as user_name, usuarios.apellidos as user_lastname,equipo_tareas_informe_c.observacion as eti_desc   FROM equipo_tareas_informe_c INNER JOIN meses ON equipo_tareas_informe_c.mes_id = meses.id INNER JOIN equipo_tareas_c ON equipo_tareas_informe_c.eti=equipo_tareas_c.eti INNER JOIN equipos ON equipo_tareas_c.equipo_id=equipos.id INNER JOIN usuarios ON equipo_tareas_informe_c.user_id=usuarios.id  WHERE equipo_tareas_informe_c.eti='$eti'")or die('error'.mysqli_errno($db));

	$dataInforme = mysqli_fetch_array($informe);

	$fotos = $db->query("SELECT * FROM equipo_fotos WHERE eti='$eti'")or die('error'.mysqli_errno($db));


	$contenido = "<table style='font-size:23px; font-family:helvetica' cellspacing='0' cellpadding='6' width='100%'>
	<tr>
		<td colspan='2' align='center'>
			<img width='200' src='images/logo.png'>
		</td>
	</tr>
	<tr>
		<td colspan='2'><h1 style='color:red'>INFORME #ETI ".$dataInforme['eti_id']."</h1></td>
	</tr>
	<tr>
		<td colspan='2'><br></td>
	</tr>
	<tr style='background:#EFEDF1;'>
		<td colspan='2' align='center' style='padding:20px;'>
			<img width='390' src='".str_replace('../','', $dataInforme['equipo_foto'])."'>
			<br>
		</td>
	</tr>
	<tr>
		<td><br></td>
		<td><br></td>
	</tr>
	<tr>
		<td style='font-weight:bold'>Fecha de realizacion:</td>
		<td>".$dataInforme['eti_fecha']."</td>
	</tr>
	<tr>
		<td style='font-weight:bold'>Mes:</td>
		<td>".$dataInforme['mes_nombre']."</td>
	</tr>
	<tr>
		<td style='font-weight:bold'>Equipo:</td>
		<td>".$dataInforme['equipo_nombre']."</td>
	</tr>
	<tr>
		<td style='font-weight:bold'>Estado:</td>
		<td>".$dataInforme['eti_estado']."</td>
	</tr>
	<tr>
		
		<td>";
		
	$contenido.="
		</td>
	</tr>
	<tr>
		<td style='font-weight:bold'>Observaciones:</td>
		<td>".$dataInforme['eti_desc']."</td>
	</tr>

	<tr style='background:#EFEDF1;'>
	<td style='padding:25px' colspan='2' align='center'>";
	while($fila = mysqli_fetch_array($fotos))
	{
		$contenido.= "<img style='border:9px solid black; margin:10px;' width='450' src='".str_replace('../', '', $fila['nombre'])."'>";
	}
	$contenido.="</td></tr>
	<tr>
		<td align='center' colspan='2'>
			".$dataInforme['user_name']." ".$dataInforme['user_lastname']."
			<br>
			<b>Responsable</b>
		</td>
	</tr></table>";

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($contenido);
	$mpdf->Output();

?>

