<?php
require('config\db.php');

$cif = mysqli_real_escape_string($conexion, $_REQUEST['cif']);
$idcandidato = mysqli_real_escape_string($conexion, $_REQUEST['idcandidato']);
$voto = mysqli_real_escape_string($conexion, $_REQUEST['voto']);
$fechavoto = mysqli_real_escape_string($conexion, $_REQUEST['fechavoto']);
$votoano = DATE("Y");

$sql = "INSERT INTO votos (cifvotante, idcandidato, voto, fechavoto, votoano) VALUES ('$cif', '$idcandidato', '$voto', '$fechavoto', '$votoano')";
if(mysqli_query($conexion, $sql)){

    header("location: main.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>