<?php
  
  session_start();

  if(!empty($_SESSION['userActive']))
  {
    header('location:home.php');
  }

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rojas Ingenieria</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
      
    <form class="form-signin" action="controller/LoginValidate.php" method="POST">
      <i class="fas fa-cog fa-3x fa-spin"></i>
         <img src="images/login/rojasing.jpg" width="85px" height="85px"><br>
     <h6 class="text-center">ROJAS INGENIERIA</h6>
      
    
  <br>

       <img src="images/login/flacso.png" width="75px" height="75px">
             
    </center>
    <br>
      <h5 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h5>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" class="form-control" placeholder="Email" required autofocus name="correo">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" class="form-control" placeholder="Password" required name="clave">
     
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
  </form>

  </body>
</html>