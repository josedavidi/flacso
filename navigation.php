<?php 
  if(($_SESSION['rol'])=='admin'){
    $menu='block';
  }
  else if(($_SESSION['rol'])=='tecnico' || ($_SESSION['rol'])=='invitado'){
    $menu='none';
  }

  if(($_SESSION['rol'])=='invitado'){
    $btn_mantenimiento='none';
  }else{
    $btn_mantenimiento='block';
  }
  

 ?>
<nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php"><strong>ROJAS INGENIERIA</strong>/FLACSO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" style="display: <?php echo $menu ?>">
        <a class="nav-link" href="schedule_process.php"><i class="far fa-calendar-plus"></i> Generador de OTs</a>
      </li>
       <li class="nav-item dropdown" style="display: <?php echo $btn_mantenimiento ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimiento
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="tareas.php">Preventivo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="tareasc.php">Correctivo</a>
        </div>

      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Informes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="informes.php">Preventivo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="informesc.php">Correctivo</a>
        </div>
      <li class="nav-item">
        <a class="nav-link" href="repositorio.php"><i class="fab fa-google-drive"></i> Repositorio</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <span style="color: #fff;"><?php echo $_SESSION['userActive'] ?></span> &nbsp;
      <a href="salir.php" class="btn btn-outline-danger my-2 my-sm-0"><i class="fas fa-power-off"></i></a>
    </form>
  </div>
</nav>