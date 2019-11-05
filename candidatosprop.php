<?php

session_start();
$cif = $_SESSION['cif'];

if(!isset($cif)){
    header("location: ingreso.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Votaciones</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/526b5726f8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/ajax.js"></script>
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
      <li class="nav-item">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="candidatosprop.php">Candidatos</a>
      </li>
    </ul>
    <span class="navbar-text" style="padding-right:10px; color:#ffffff;">CIF: <?php echo $cif?> | </span>   
    <a class="navbar-logout" href="config/salir.php" style="color:#fff;"><i class="fas fa-sign-out-alt"></i>Salir</a>
    </div>
    </div>
</nav>
<div class="container">
  <br>
  <h4>Candidatos de la FIUEES</h4>
  <br>
<table id="tabla" class="table table-condensed table-hover table-striped" width="100%" cellspacing="0">
<thead>
<tr>
<th data-column-id="foto">Foto</th>
<th data-column-id="pnombre">Nombre</th>
<th data-column-id="snombre">Apellido</th>
<th data-column-id="papellido">Propuesta</th>
<th data-column-id="sapellido">Descripción</th>
</tr>
</thead>
<tbody>
<?php
                            include ('config\db.php');
                            $sql = $conexion->query('SELECT * FROM candidatos');
                            while($data = $sql->fetch_array()) {
                              $foto = '<img src="fotos/'.$data['foto'].'" height="120" width="120">';
                                echo '
                                    <tr>
                                        <td>'.$foto.'</td>
                                        <td>'.$data['nombre'].'</td>
                                        <td>'.$data['apellido'].'</td>
                                        <td>'.$data['propuesta'].'</td>
                                        <td>'.$data['descripcion'].'</td>
                                    </tr>
                                ';
                            }
                        ?>
</tbody>
</table>
</div>  
</body>
</html>