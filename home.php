<?php
  session_start();
  include('validateAccess.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <?php include'includes/head.php' ?>
    <title>ROJAS INGENIERIA</title>
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
    <?php include'includes/scripts.php' ?>
    <div class="container">
      <div class="row">
             
              <div class="col-sm-12" style="margin-top: 4%">
                 <center>
    <img src="images/login/rojasing.jpg" width="75px" height="75px">
     <h6 class="text-center">ROJAS INGENIERIA</h6>
      
    </center>
        <center><img src="images/login/flacso.png" width="75px" height="75px"></center>
        <h3 class="center">Resumen</h3>
        <p style="text-align: justify;">Esta página Web permite una gestión y planificación del mantenimiento de los sistemas electromecánicos (Contraincendios, Ventilación y Aire Acondicionado, Hidrosanitario) los cuales tiene a su responsabilidad la empresa Rojas Ingeniería. <br><br>
        El sistema cuenta con un inventario de los equipos, un cronograma establecido al inicio del contrato y un repositorio de toda la información técnica existente, la página web permite al personal de Rojas Ingeniería registrar los trabajos de mantenimiento correctivo, así como preventivo, incluir fotografías en los registros, agregar novedades o sugerencias a los equipos. Por otra parte, el personal de Flacso tendrá acceso a revisar informes y al repositorio digital. Ver Figura 1. <br><br>
        Además, tiene la capacidad de operarse mediante dispositivos de bolsillo como son tabletas o smartphones con una interfaz sencilla para su uso. <br>

        </p>
        <a>Acceso al manual de usuario:</a>
        <a href="storage/manual.pdf">Man_usuario_aplicacion_web.pdf</a>
        <br><br>

       <center>
    <img src="images/login/diagrama.jpg" width="700px" height="330px">
    </div>
    </div>  
    </center> 
  </body>
</html>