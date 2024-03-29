<?php
require("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ver Estudiantes</title>
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
<h3>Ver Estudiantes Activos</h3>
<hr>
<button onclick="location.reload();" class="btn btn-outline-primary"><i class="fas fa-sync"></i></button>
<span>Puede actualizar pulsando el botón </span>
<hr>

<table id="tabla" class="table table-condensed table-hover table-striped" width="100%" cellspacing="0">
<thead>
<tr>
<th data-column-id="pnombre">Primer Nombre</th>
<th data-column-id="snombre">Segundo Nombre</th>
<th data-column-id="papellido">Primer Apellido</th>
<th data-column-id="sapellido">Segundo Apellido</th>
<th data-column-id="cif" date-type="numeric">CIF</th>
<th data-column-id="acciones">Acciones</th>
</tr>
</thead>
<tbody>
<?php
                            include ('config\db.php');
                            $sql = $conexion->query('SELECT * FROM estudiantes');
                            while($data = $sql->fetch_array()) {
                                echo '
                                    <tr>
                                        <td>'.$data['pnombre'].'</td>
                                        <td>'.$data['snombre'].'</td>
                                        <td>'.$data['papellido'].'</td>
                                        <td>'.$data['sapellido'].'</td>
                                        <td>'.$data['cif'].'</td>
                                        <td>
                                        <button id="remove" class="btn btn-danger remove" data-id="'.$data['idestudiantes'].'"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
</tbody>
</table>
</div>  
<script>

$(document).on('click', '.remove', function(){
		var id = $(this).data('id');
 
		swal.fire({
		  	title: '¿Esta seguro?',
		  	text: "¡No podra deshacer esta acción!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Si, Eliminarlo!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: 'borrarestudiante.php?action=delete',
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
             swal.fire('Borrado!', response.message, response.status);
			    })
			    .fail(function(){
			     	swal.fire('Oops...', 'Algo salio mala!', 'error');
			    });
		  	}
 
		})
 
	});
</script>
</body>
</html>