<?php

session_start();
$usuario = $_SESSION['username'];

if(!isset($usuario)){
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Administración</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/526b5726f8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>body{background-image: url('img/voto.jpg'); background-size:cover;}</style>
  </head>
<body>

    <div class="principal">
    <nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"><img src="img/logow.png" width="50" height="30" class="d-inline-block align-top" alt="">Sistema Votacion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="administracion.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administradores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="veradmin.php">Ver</a>
          <a class="dropdown-item" href="administradores.php">Agregar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Estudiantes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="verestudiantes.php">Ver</a>
          <a class="dropdown-item" href="estudiantes.php">Agregar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Candidatos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="vercandidatos.php">Ver</a>
          <a class="dropdown-item" href="candidatos.php">Agregar</a>
        </div>
      </li>  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Resultados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="vervotos.php">Ver Votos</a>
          <a class="dropdown-item" href="verestadisticas.php">Ver Estadisticas</a>
          <a class="dropdown-item" href="historico.php">Ver Historial</a>
        </div>
      </li>     
    </ul>
    <span class="navbar-text" style="padding-right:10px; color:#ffffff;">Usuario: <?php echo $usuario?> | </span>   
    <a class="navbar-logout" href="config/logout.php" style="color:#fff;"><i class="fas fa-sign-out-alt"></i>Salir</a>
    </div>
    </div>
</nav>
</body>
</html>