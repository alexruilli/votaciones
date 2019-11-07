<?php
require("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ver Votos</title>
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
      <li class="nav-item dropdown active">
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
<h3>Todos los votos recibidos</h3>
<table id="tabla" class="table table-condensed table-hover table-striped" width="100%" cellspacing="0">
<thead>
<tr>
<th data-column-id="cifvontante">CIF Votante</th>
<th data-column-id="ncandidato">Nombre Candidato</th>
<th data-column-id="voto">voto</th>
<th data-column-id="fvoto">Fecha Voto</th>
</tr>
</thead>
<tbody>
<?php
                            include ('config\db.php');
                            $sql = $conexion->query("SELECT cifvotante, concat(nombre, ' ', apellido) ncandidato, voto, fechavoto from candidatos inner join votos ON candidatos.idcandidato = votos.idcandidato;");
                            while($data = $sql->fetch_array()) {
                                echo '
                                    <tr>
                                        <td>'.$data['cifvotante'].'</td>
                                        <td>'.$data['ncandidato'].'</td>
                                        <td>'.$data['voto'].'</td>
                                        <td>'.$data['fechavoto'].'</td>
                                    </tr>
                                ';
                            }
                        ?>
</tbody>
</table>
<br>
<h3>Total de votos por candidato</h3>
<?php
require('config\db.php');
$sql = "SELECT concat(nombre, ' ', apellido) ncandidato, count(voto) as totalvotos FROM votos v inner join candidatos c on v.idcandidato = c.idcandidato group by v.idcandidato";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {
    echo "<table class='table'><tr><th>Nombre Candidato</th><th># de votos</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td scope='row'>".$row["ncandidato"]."</td><td scope='row'>".$row["totalvotos"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conexion->close();
?>
</div>  

</body>
</html>