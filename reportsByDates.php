<?php

  require_once __DIR__ . '/vendor/autoload.php';

  include 'controller/conexion.php';

    $month = $_POST['mes'];
    $year = $_POST['ano'];
    $sistem = $_POST['contrato'];

    $reportsByDates = $db->query("SELECT mes, age, observacion, estado, fecha, FROM equipo_tareas_informe WHERE mes = '$eti'");

    $result = 'informe';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($result);
    $mpdf->Output();
  ?>
