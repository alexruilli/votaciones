<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inicia sesión</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/estilos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/526b5726f8.js" crossorigin="anonymous"></script>
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
        body { background-image: url(img/voto.jpg); background-size: cover;}
        .btn-primary { background-color: #012693; border-color: #012693;} 
    </style>
</head>

<body>


<form class="form-signin" action="validar.php" method="POST">
        <div class="text-center mb-4">
            <!-- <img class="mb-4" src="images/logo.jpg"> -->
            <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
        </div>

        <div class="form-label-group">
            <input type="text" class="form-control" id="cif" name="cif" placeholder="Escribir su carnet de estudiante" data-toggle="tooltip" data-placement="top" title="Escribir CIF sin guiones para alumnos antiguos" required minlength="10" maxlength="11" pattern="[0-9]{10,11}">
            <label for="cif">CIF</label>
        </div>
        <div class="text-center mb-4">
            <button class="btn btn-primary"type="submit">Ingresar</button>
        </div>
        <div class="text-center mb-4">
        <span>Eres administrador? </span><a href="login.php">Haz click aquí</a>
        </div>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
    </form>



</body>

</html>
