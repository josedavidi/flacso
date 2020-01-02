<?php
  session_start();
  include'validateAccess.php';
  include'controller/conexion.php';
?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include'includes/head.php' ?>
    <title>REPOSITORIO</title>
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
                REPOSITORIO
              </div>
                  <h7>CRONOGRAMA</h7>
                   <br>
                  <a href="storage/FLACSO_PROGRAMA DE MANTENIMIENTO_2018_FINAL(1).xlsx">CRONOGRAMA 2019-2020</a>
                   <br>
                    <br>
                  <h6>FLACSO MATRIZ</h6>
                    <h7>TORRE 1</h7>
                    <h8>As Built</h8>
                    <a href="storage/Sistema_contraincendios_Torre1.rar">Sistema Contraincendios</a>
                    <a href="storage/Sistema_HVAC_Torre1.rar">Sistema HVAC</a>
                    <a href="storage/Sistema_hidrosanitario_Torre1.rar">Sistema Hidrosanitario</a>
                    <a href="storage/Sistema_electrico_Torre1.rar">Circuitos Electricos</a>
                    <br>
                    <h7>TORRE 2</h7>
                    <h8>As Built</h8>
                    <a href="storage/Sistema_contraincendios_Torre2.rar">Sistema Contraincendios</a>
                    <a href="storage/Sistema_HVAC_Torre2.rar">Sistema HVAC</a>
                    <a href="storage/Sistema_hidrosanitario_Torre2.rar">Sistema Hidrosanitario</a>
                    <br>
                    <h6>FLACSO BIBLIOTECA</h6>
                    <h8>As Built</h8>
                    <a href="storage/Sistema_contraincendios_biblioteca.rar">Sistema Contraincendios</a>
                    <a href="storage/Sistema_HVAC_biblioteca.rar">Sistema HVAC</a>
                    <a href="storage/Sistema_hidrosanitario_biblioteca.rar">
                    Sistema Hidrosanitario</a>
                    <br>
                    <h8>Especificaciones</h8>
                    <a href="storage/Sistema_contraincendios_biblioteca_e.rar">Sistema Contraincendios</a>
                    <a href="storage/Sistema_HVAC_biblioteca_e.rar">Sistema HVAC</a>
                    <a href="storage/Sistema_hidrosanitario_biblioteca_e.rar">
                    Sistema Hidrosanitario</a>
                     <a href="storage/Presupuesto.rar">
                    Presupuesto Referencial</a>
                    <br>
                   
<div class="card-footer text-muted">
               Esta vista, permite descargar los archivos existentes de los Sistemas Electromecánicos.
              </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include'includes/scripts.php' ?>
    <script src="js/buscarEquipos2.js"></script>
  </body>
</html>