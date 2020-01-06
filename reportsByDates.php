<?php

  require_once __DIR__ . '/vendor/autoload.php';

  include 'controller/conexion.php';

    $month = $_POST['mes'];
    $year = $_POST['ano'];
    $sistem = $_POST['contrato'];

    $sistem = 2;

    if($sistem == 1)
    {
      $contrato_a = 1;
      $contrato_b = 3;
    }
    else if($sistem == 2)
    {
      $contrato_a = 2;
    }

    $reportsByDates = $db->query("SELECT DISTINCT('equipo_tareas.eti'), equipo_tareas_informe.age as ano, meses.nombre as mes, sistemas.nombre as contrato, equiposp.nombre as equipo_nombre, equipo_tareas_informe.observacion as equipo_observacion, equipo_tareas_informe.estado as equipo_estado, equipo_fotos.nombre as equipo_foto  FROM equipo_tareas_informe INNER JOIN equipo_tareas ON equipo_tareas_informe.eti = equipo_tareas.eti INNER JOIN equiposp ON equipo_tareas.equipo_id = equiposp.id INNER JOIN sistemas ON equiposp.id_sistema=sistemas.id  INNER JOIN meses ON equipo_tareas_informe.mes_id = meses.id INNER JOIN equipo_fotos ON equipo_fotos.eti = equipo_tareas_informe.eti WHERE mes_id = '$month' AND age='$year'") or die('error'.mysqli_errno($db));


    $result = "<table border='0' width='800'>
                <tr><td colspan='3' align='center'><h1><strong>Informe General</strong></h1></td></tr><tr><td colspan='3'><br></td></tr>";
              
                while($datos = mysqli_fetch_array($reportsByDates))
                {
                   $result.= "<tr><td colspan='3' align='center'><img width='500' src='".str_replace('../', '', $datos['equipo_foto'])."'></td></tr><tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='2'>Año</td><td>".$datos['ano']."</td></tr><tr><td colspan='2'>Mes</td><td>".$datos['mes']."</td></tr><tr><td colspan='2'>Contrato</td><td>".$datos['contrato']."</td></tr><tr><td colspan='2'>Equipo</td><td>".$datos['equipo_nombre']."</td></tr><tr><td colspan='2'>Estado</td><td>".$datos['equipo_estado']."</td></tr><tr><td colspan='2'>Observacion</td><td>".$datos['equipo_observacion']."</td></tr><tr><td colspan='3'>&nbsp;<hr></td></tr>";
                    
                }

    $result.= '</table>'; 

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($result);
    $mpdf->Output();
  ?>
