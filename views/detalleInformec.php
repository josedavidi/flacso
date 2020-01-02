<?php
  
  include '../controller/conexion.php';
  $eti = $_GET['eti'];
  $picture = $_GET['foto'];
   //$eti =3916;
  $informe = $db->query("SELECT eti, observacion FROM equipo_tareas_informe_c WHERE eti ='$eti' ") or die('error'.mysqli_errno($db));
  $verInforme = mysqli_fetch_array($informe);

 

  $galeria = $db->query("SELECT * FROM equipo_fotos WHERE eti='$eti'")or die('error'.mysqli_errno($db));
  
?>


<div class="card">
  <!-- inicia galeria -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo  str_replace('../', '', $picture) ?>" class="d-block w-100" alt="...">
    </div>
    <?php
      while($fila = mysqli_fetch_array($galeria))
      {
        echo '
          <div class="carousel-item">
            <img src="'.str_replace('../','', $fila["nombre"]).'" class="d-block w-100" alt="...">
          </div>
        ';
      }
    ?>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!-- termina galeria -->
  <div class="card-body">
    <h5 class="card-title">Observacion</h5>
    <input type="hidden" name="eti" value="<?php echo $eti ?>">
    <p class="card-text"><?php echo $verInforme['observacion'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
   
 
  </ul>
</div>