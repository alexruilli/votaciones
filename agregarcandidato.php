<?php
require('config\db.php');

$cif = mysqli_real_escape_string($conexion, $_REQUEST['cif']);
$nombre= mysqli_real_escape_string($conexion, $_REQUEST['nombre']);
$apellido = mysqli_real_escape_string($conexion, $_REQUEST['apellido']);
$descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
$propuesta = mysqli_real_escape_string($conexion, $_REQUEST['propuesta']);

$sql = "INSERT INTO candidatos (nombre, apellido, descripcion, propuesta, cif) VALUES ('$nombre', '$apellido', '$descripcion', '$propuesta', '$cif')";
if(mysqli_query($conexion, $sql)){

    header("location: candidatos.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>