<?php
  session_start();
  include'validateAccess.php';
  include'controller/conexion.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include'includes/head.php' ?>
    <title>TAREAS</title>
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
                ORDENES DE TRABAJO
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4 offset-4">
                    <form>
                      <select class="custom-select" name="mes" id="mes">
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
               Esta vista, es para generar los procesos a realizarce en cada equipo segun el mes.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Informe de actividad</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <br>
            <form method="POST" action="controller/storeEquipoTareas.php" enctype="multipart/form-data">
              <div class="form-group">
                <h5><i class="far fa-list-alt"></i> Eliga las tareas realizadas al equipo</h5>
                <div id="showProcesosgendados"></div>
              </div>
              <hr>
              <div class="form-group">
                <label for="fecha"><b>Fecha de registro</b></label>
                <input type="hidden" name="mes" id="month">
                <input type="hidden" name="equipo" id="eq">
                <input type="date" class="form-control" id="fecha" required name="fecha">
              </div>
              <div class="form-group">
                <label for="fecha"><b>Estado del equipo</b></label>
                <select class="custom-select" name="estadoEquipo">
                  <option value="#">Seleccionar</option>
                  <option value="funcionando">Funcionando</option>
                  <option value="mantenimiento">En Mantenimiento</option>
                  <option value="danado">Danado</option>
                </select>
              </div>
              <div class="form-group">
                <label for="foto"><b><i class="fas fa-camera"></i>Adjuntar Imagenes del trabajo</b></label>
                <input type="file" class="form-control" id="foto" required name="foto[]" id="foto" accept="image/*" multiple>
              </div>
              <div class="form-group">
                <label><b>Observaciones:</b></label>
                <textarea name="observacion" class="form-control" placeholder="por favor detalla lo realizado en el equipo"></textarea>
                <hr>
                <small><i class="fas fa-user-tie"></i> Realizado por: <b><?php echo $_SESSION['userActive'] ?></b> </small>
              </div>
            
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-block"><i class="fas fa-cloud-upload-alt"></i> Guardar Cambios</button>
          </div>
            </form>
        </div>
      </div>
    </div>
    <!-- Fin modal -->
    <?php include'includes/scripts.php' ?>
    <script src="js/buscarEquipos2.js"></script>
  </body>
</html>