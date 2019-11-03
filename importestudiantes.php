<?php
require("auth.php");
require('config/db.php');

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT INTO estudiantes (pnombre, snombre, papellido, sapellido, cif)
                          values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "')";
            $result = mysqli_query($conexion, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "Estudiantes Importados correctamente";
            } else {
                $type = "error";
                $message = "Hubo un problema importando datos del CSV";
            }
        }
    }
}
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
  <h3>Importar Estudiante</h3>
  <br>
  <p>Esta sección permite importar archivos de CSV para ingresar estudiantes de forma masiva.</p>
<form class="form-horizontal" action="" method="post" name="uploadCSV"
    enctype="multipart/form-data">
    <div class="col-md form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="file" id="file" accept=".csv">
            <label class="custom-file-label" for="customFile">Elegir Archivo</label>
          </div>
        </div>
        <button type="submit" id="submit" name="import" class="btn btn-primary">Importa</button>
    <div id="labelError"></div>
</form>
    <div style='height: 20px;'></div>
    <script type="text/javascript">
      $(document).ready(
      function() {
        $("#frmCSVImport").on(
        "submit",
        function() {

          $("#response").attr("class", "");
          $("#response").html("");
          var fileType = ".csv";
          var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+("
              + fileType + ")$");
          if (!regex.test($("#file").val().toLowerCase())) {
            $("#response").addClass("error");
            $("#response").addClass("display-block");
            $("#response").html(
                "Invalid File. Upload : <b>" + fileType
                    + "</b> Files.");
            return false;
          }
          return true;
        });
      });
    </script>
    <?php
    $sqlSelect = "SELECT * FROM estudiantes";
    $result = mysqli_query($conexion, $sqlSelect);
                
    if (mysqli_num_rows($result) > 0) {
    ?>
    <h4>Registro de Estudiantes ingresados</h4>
    <table id='userTable' class="table table-condensed table-hover table-striped" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>CIF</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
            </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['idestudiantes']; ?></td>
                <td><?php  echo $row['cif']; ?></td>
                <td><?php  echo $row['pnombre']; ?></td>
                <td><?php  echo $row['snombre']; ?></td>
                <td><?php  echo $row['papellido']; ?></td>
                <td><?php  echo $row['sapellido']; ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <?php } ?>    
</div>  
</body>
</html>

