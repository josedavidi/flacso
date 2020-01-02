<?php
  session_start();
  include 'controller/conexion.php';
  include'validateAccess.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include'includes/head.php' ?>
    <title>GENERADOR DE OTS</title>
  </head>
  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php include('navigation.php'); ?>
          </div>
        </div>
      </div>
    </section>
    <br>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card text-center">
              <div class="card-header">
                GENERADOR DE ORDENES DE TRABAJO
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4 offset-4">
                    <form action="controller/storeScheduleProccess.php" method="POST">
                      <select class="custom-select" name="age">
                        <option>Seleccionar Periodo</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                      </select>
                      <select class="custom-select" name="mes">
                        <option>Seleccionar Mes</option>
                        <?php
                          $meses = $db->query("SELECT * FROM meses");
                          while($fila = mysqli_fetch_array($meses))
                          {
                            echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
                          }
                        ?>
                      </select>
                      <select class="custom-select" name="sistema" id="sistem">
                        <option>Seleccionar Sistema</option>
                        <?php
                          $sistemas = $db->query("SELECT * FROM sistemas");
                          while($fila = mysqli_fetch_array($sistemas))
                          {
                            echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
                          }
                        ?>
                      </select>
                      <div id="showSubsistems"></div>
                      <div id="showEquipments"></div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
               Esta vista, genera los procesos a realizarce en cada equipo segun el mes.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="js/buscarEquipos.js"></script>
    <?php include'includes/scripts.php' ?>
  </body>
</html>