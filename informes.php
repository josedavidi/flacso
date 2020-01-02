<?php
  session_start();
  include 'validateAccess.php';
  include 'controller/conexion.php';

?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include'includes/head.php' ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <title>ROJAS INGENIERIA</title>
  </head>
  <body>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <?php include('navigation.php'); ?>
          </div>
        </div>
      </div>
    </section>
    <br>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-5">
                    <h5>Informes Preventivos</h5>
                  </div>
                  <div class="col-sm-3">
                    <form action="reportsByDates.php" method="POST">
                      <select class="custom-select" name="contrato">
                        <option>Eliga el Contrato</option>
                        <option value="1">Sistema Contra Incendios & Hidrosanitarios</option>
                        <option value="2">Ventilacion y Aire Acondicionado</option>
                      </select>
                  </div>
                  <div class="col-sm-1">
                      <select class="custom-select" name="ano">
                        <option>Año</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                      </select>
                  </div>
                  <div class="col-sm-1">
                      <select class="custom-select" name="mes">
                        <option>Mes</option>
                        <?php
                          $meses = $db->query("SELECT * FROM meses");

                          while($fila_mes = mysqli_fetch_array($meses))
                          {
                            echo "<option value=".$fila_mes['id'].">".$fila_mes['nombre']."</option>";
                          }
                        ?>
                      </select>
                  </div>
                  <div class="col-sm-2">
                      <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> Informe General</button>
                    </form>
                  </div>
                  
                </div>
              </div>
              <div class="card-body">
                <table id="myTable" class="display">
                  <thead>
                    <tr>
                      <th>ETI</th>
                      <th>ID</th>
                      <th>MES</th>
                      <th>EQUIPO</th>
                      <th>FOTO</th>
                      <th><i class="fas fa-exclamation-triangle"></i> ESTADO</th>
                      <th>RESP.</th>
                      <th>FECHA</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $eti = $db->query("SELECT DISTINCT equipo_tareas.eti, equipo_tareas_informe.id as eti_id, equipo_tareas_informe.eti as idEti, meses.nombre as mes_nombre, equiposp.nombre as equipo_nombre, equiposp.foto as equipo_foto, equipo_tareas_informe.estado as eti_estado, usuarios.nombres as user_name, usuarios.apellidos as user_lastname, equipo_tareas_informe.fecha as eti_fecha  FROM equipo_tareas_informe INNER JOIN meses ON equipo_tareas_informe.mes_id = meses.id INNER JOIN equipo_tareas ON equipo_tareas_informe.eti = equipo_tareas.eti INNER JOIN equiposp ON equipo_tareas.equipo_id = equiposp.id INNER JOIN usuarios ON equipo_tareas_informe.user_id = usuarios.id ")or die('error'.mysqli_errno($db));

                      while($fila = mysqli_fetch_array($eti))
                      {

                        if($_SESSION['rol']=='admin')
                        {
                            $rol = 'block';
                        }

                        if($_SESSION['rol']=='tecnico'){
                            $rol = 'none';
                        }

                        echo "<tr>
                                <td>".$fila['idEti']."</td>
                                <td style='display:none'>".$fila['equipo_foto']."</td>
                                <td>".$fila['eti_id']."</td>
                                <td>".$fila['mes_nombre']."</td>
                                <td>".$fila['equipo_nombre']."</td>
                                <td><img width='50' src='".str_replace('../', '', $fila['equipo_foto'])."'></td>
                                <td>".$fila['eti_estado']."</td>
                                <td>".$fila['user_name']." ".$fila['user_lastname']."</td>
                                <td>".$fila['eti_fecha']."</td>
                                <td><button data-toggle='modal' data-target='#exampleModal' class='btn btn-info btn_showInfomrme'><i class='far fa-file-alt'></i></button></td>
                                <td><a style='display:".$rol."' onclick='return confirm()' href='controller/eliminar_informe.php?eti=".$fila['idEti']."'>Eliminar</a></td>
                              </tr>";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include'includes/scripts.php' ?>
    <script src="js/detallesInforme.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del Informe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="generarInformePdf.php" method="POST">
          <div id="shoInforme"></div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-danger"><i class="fas fa-download"></i> Descargar Informe</button>
        </form>
      </div>
    </div>
  </div>
</div>
 <script>
   $(document).ready( function () {
        $('#myTable').DataTable();
    } );
 </script>
  </body>
</html>