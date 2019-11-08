<?php
  require("auth.php");
  require('config/db.php');

  $sql = $conexion->query('SELECT * FROM candidatos WHERE idcandidato='.$_POST['id']);
  $data = $sql->fetch_array();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Agregar Candidato</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/custom.css" rel="stylesheet">    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
  <script src="https://kit.fontawesome.com/526b5726f8.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  </head>
<body>
    <nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"> <img src="img/logow.png" width="50" height="30" class="d-inline-block align-top" alt="">Sistema Votacion</a>
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
          Estudiantes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="verestudiantes.php">Ver</a>
          <a class="dropdown-item" href="estudiantes.php">Agregar</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
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
</nav>
<br>
<div class="container">
  <h4>Editar el candidato</h4>
  <p>actualice los datos del candidato</p>
  <hr>
<form method="POST" action="mantenimientoCandidato.php" enctype="multipart/form-data">
    <input class="" type="hidden" name="_method" value="PUT">
    <input class="" value="<?php print $data['idcandidato']; ?>" type="hidden" name="id">
    <div class="row">
        <div class="col-md form-group">
          <label for="">CIF</label>
          <input type="text" name="cif" value="<?php print $data['cif']; ?>" id="" class="form-control" placeholder="CIF sin guiones" aria-describedby="helpId" required minlength="10" maxlength="11" pattern="[0-9]{10,11}" title="Escribir CIF sin guiones para alumnos antiguos">
          <small id="helpId" class="text-muted">Campo es obligatorio</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md form-group">
          <label for="">Nombre</label>
          <input type="text" name="nombre" id="" value="<?php print $data['nombre'] ?>" class="form-control" placeholder="" aria-describedby="helpId" required>
          <small id="helpId" class="text-muted">Campo es obligatorio</small>
        </div>
        <div class="col-md form-group">
          <label for="">Apellido</label>
          <input type="text" name="apellido" id="" value="<?php print $data['apellido'] ?>" class="form-control" placeholder="" aria-describedby="helpId" required>
          <small id="helpId" class="text-muted">Campo es obligatorio</small>
        </div>      
    </div>
    <div class="row">
      <div class="col-md form-group">
          <div class="md">
            <img src="fotos/<?php print $data['foto']; ?>" alt="" height="200">
          </div>
          <div class="custom-file w-25 p-1">
            <input type="hidden" name="foto"  value="<?php print $data['foto']; ?>" >
            <input type="file" class="custom-file-input" id="customFile" name="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md form-group">
      <label for="descripcion">Descripción</label>
      <textarea class="form-control" name="descripcion" id="" rows="3"><?php print $data['descripcion']; ?></textarea>
      </div>        
    </div>
    <div class="row">
    <div class="col-md form-group">
    <label for="Propuesta">Propuesta</label>
    <textarea class="form-control" name="propuesta" id="propuesta" rows="3"><?php print $data['propuesta']; ?></textarea>
    <script>CKEDITOR.replace( 'propuesta' );</script>
    </div>        
    </div>
    <button type="submit" class="btn btn-primary" name="guardar">Actualizar</button>
    <input type="reset" class="btn btn-danger" value="Limpiar">
    </form>
  <div style='height: 20px'></div> 
</div>  
<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/functions.js"></script>
  
</body>
</html>
