<?php

session_start();
$cif = $_SESSION['cif'];

if(!isset($cif)){
    header("location: ingreso.php");
}

date_default_timezone_set('America/El_Salvador');
$fecha = date("Y-m-d H:i:s");
$hoy = date('d-m-Y');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/526b5726f8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@2.2.1/bootstrap-4.min.css">
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="candidatosprop.php">Candidatos</a>
      </li>
    </ul>
    <span class="navbar-text" style="padding-right:10px; color:#ffffff;">CIF: <?php echo $cif?> | </span>   
    <a class="navbar-logout" href="config/salir.php" style="color:#fff;"><i class="fas fa-sign-out-alt"></i>Salir</a>
    </div>
    </div>
</nav>
<div class="container">

<div style="height: 20px;"></div>
<h2>Bienvenido a la votaciones de la facultad de ingeniería</h2> 
<div style="height: 20px;"></div>
<?php
require('config\db.php');
$query = "SELECT * FROM estudiantes where cif = '$cif'";
$estudiantes = $conexion->query($query);
$ste = mysqli_fetch_array($estudiantes);

echo "<dl class='row'>
  <dt class='col-sm-3'>Nombre</dt>
  <dd class='col-sm-9'>".$ste["pnombre"]."</dd>

  <dt class='col-sm-3'>Apellido</dt>
  <dd class='col-sm-9'>".$ste["papellido"]."</dd>
  <dl>";

?>
<div style="height: 20px;"></div>
<h3>Fecha: <?php echo $hoy; ?>  </h3> 

<?php 
// validar si se realizo voto
$votovalidar = "SELECT * FROM votos WHERE cifvotante = $cif";
$resultado = $conexion->query($votovalidar);
$vt = $resultado->fetch_assoc();

$estudiantevotando = $vt['cifvotante'];
$votado = $vt['voto'];

if(empty($estudiantevotando)) {


echo "<h3>En esta sección podras realizar el voto por el candidato</h3>
<p class='vform-text text-muted'>
    - Votos no podrán ser cambiado una vez efectuados
</p>
<form action='agregarvoto.php' method='post' id='frm'>
<label for=''>Votar por tu candidato</label>
<select name='idcandidato'>
<option value=''>Seleccionar candidato</option>";


$sql = "SELECT * FROM candidatos";
$result = $conexion->query($sql);

// get candidatos from db
while ($row = $result->fetch_assoc()) {
    $codigomun=$row["idcandidato"];
    $nombre=$row["nombre"];
    $apellido=$row["apellido"];
    $completo= $nombre." ".$apellido;
    echo "<option value='" . $codigomun. "'>" . $completo . "</option>";
}

echo "
</select>
<input type='hidden' name='cif' value='$cif'>
<input type='hidden' name='voto' value='1'>
<input type='hidden' name='fechavoto' value='$fecha'>
<button id='vote' type='submit' name ='votar' class='btn btn-primary'>Votar</button>
</form>";

}

else {
  echo "<div class='alert alert-success' role='alert'>";
  echo "Ya has votado el día ".$vt["fechavoto"].".";
  echo "</div>";
}

?>

</div>
</body>
</html>