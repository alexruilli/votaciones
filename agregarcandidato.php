<?php
require('config\db.php');
require('helpers/helpers.php'); 
require('models/candidato.php');

$candidato = new candidato;

if( is_uploaded_file($_FILES['customFile']['tmp_name'] )){
    if($candidato->imagen($_FILES['customFile'], null)){
        if($candidato->saveFile($_FILES['customFile'], $candidato->getRoot(), $candidato->getImage() )){
            $cif = mysqli_real_escape_string($conexion, $_REQUEST['cif']);
            $nombre= mysqli_real_escape_string($conexion, $_REQUEST['nombre']);
            $apellido = mysqli_real_escape_string($conexion, $_REQUEST['apellido']);
            $descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
            $propuesta = mysqli_real_escape_string($conexion, $_REQUEST['propuesta']);
            $foto = $candidato->getImage();
            $sql = "INSERT INTO candidatos (nombre, apellido, descripcion, propuesta, cif, foto) VALUES ('$nombre', '$apellido', '$descripcion', '$propuesta', '$cif','$foto')";
            if(mysqli_query($conexion, $sql)){

                header("location: vercandidatos.php");
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
            }

            mysqli_close($conexion);
        }
        else{
            print 'no se guardo el archivo';
        }
    }
    else{
        print 'Fallo al ingresar datos ';
        echo '<br>';
        echo '<a href="candidatos.php">volver</a>';
    }
}
else{
    print 'fallo';
}

?>