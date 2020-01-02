<?php

  require_once __DIR__ . '/vendor/autoload.php';

  include 'controller/conexion.php';

    // $month = $_POST['mes'];
    // $year = $_POST['ano'];
    // $sistem = $_POST['contrato'];

    $month =1;
    $year = 2020;
    $sistem = 1;

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

    $reportsByDates = $db->query("SELECT equipo_tareas_informe.age as ano, meses.nombre as mes, sistemas.nombre as contrato FROM equipo_tareas_informe INNER JOIN equipo_tareas ON equipo_tareas_informe.eti = equipo_tareas.eti INNER JOIN equiposp ON equipo_tareas.equipo_id = equiposp.id INNER JOIN sistemas ON equiposp.id_sistema=sistemas.id  INNER JOIN meses ON equipo_tareas_informe.mes_id = meses.id WHERE mes_id = '$month' AND age='$year'") or die('error'.mysqli_errno($db));

    //$equipo_fotos = $db->query("SELECT * FROM equipo_fotos ");

    while($datos = mysqli_fetch_array($reportsByDates))
    {
        echo 'Año: '.$datos['ano'].' Mes: '.$datos['mes'].' Contrato: '.$datos['contrato'].'<br>';
    }

    // $result = 'informe';

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf->WriteHTML($result);
    // $mpdf->Output();
  ?>
