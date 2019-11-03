<?php
require("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Agregar Estudiantes</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/526b5726f8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@2.2.1/bootstrap-4.min.css">
  </head>
<body>
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"><img src="img/logow.png" width="50" height="30" class="d-inline-block align-top" alt="">Sistema Votacion</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
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
      <li class="nav-item dropdown active">
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
        </div>
      </li>     
    </ul>
    <span class="navbar-text" style="padding-right:10px; color:#ffffff;">Usuario: <?php echo $usuario?> | </span>   
    <a class="navbar-logout" href="config/logout.php" style="color:#fff;"><i class="fas fa-sign-out-alt"></i>Salir</a>
    </div>
</nav>
<br>
<div class="container">
<form id="frm" method="POST">
    <div class="row">

        <div class="col-md form-group">
          <label for="">CIF</label>
          <input type="text" name="cif" id="" class="form-control" placeholder="" aria-describedby="helpId" required minlength="10" maxlength="11" pattern="[0-9]{10,11}" title="Escribir CIF sin guiones para alumnos antiguos">
          <small id="helpId" class="text-muted">Campo es obligatorio</small>
        </div>

     </div>
      <div class="row">
        <div class="col-md form-group">
          <label for="">Primer Nombre</label>
          <input type="text" name="pnombre" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
          <small id="helpId" class="text-muted">Campo es obligatorio</small>
        </div>
        <div class="col-md form-group">
        <label for="">Segundo Nombre</label>
        <input type="text" name="snombre" id="" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Campo no es obligatorio</small>
        </div>       
    </div>
    <div class="row">
    <div class="col-md form-group">
          <label for="">Primer Apellido</label>
          <input type="text" name="papellido" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
          <small id="helpId" class="text-muted">Campo es obligatorio</small>
        </div>
        <div class="col-md form-group">
          <label for="">Segundo Apellido</label>
          <input type="text" name="sapellido" id="" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Campo no es obligatorio</small>
        </div>           
    </div>
    <input type="submit" class="btn btn-primary" name="guardar" id="save" value="Guardar">
    <input type="reset" class="btn btn-danger" value="Limpiar">
    </form>
    <div style='height: 20px;'></div>
    <script>
    $(function(){
            $("#save").click(function(e){
              e.preventDefault();
              var datos = $("#frm").serialize(); 
              $.ajax({
              type: "POST", 
              url: "agregarestudiante.php",
              data: datos, 
              success: function(data){ Swal.fire('Mensaje', data, 'success'); $("#frm")[0].reset(); }, 
              error: function(data) { Swal.fire('Mensaje', data, 'error') }
              });
          });
    });

    </script>
</div>  
</body>
</html>
