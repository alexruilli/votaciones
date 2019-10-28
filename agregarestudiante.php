<?php
require('config\db.php');

$cif = mysqli_real_escape_string($conexion, $_REQUEST['cif']);
$pnombre= mysqli_real_escape_string($conexion, $_REQUEST['pnombre']);
$snombre = mysqli_real_escape_string($conexion, $_REQUEST['snombre']);
$papellido = mysqli_real_escape_string($conexion, $_REQUEST['papellido']);
$sapellido = mysqli_real_escape_string($conexion, $_REQUEST['sapellido']);

$sql = "INSERT INTO estudiantes (pnombre, snombre, papellido, sapellido, cif) VALUES ('$pnombre', '$snombre', '$papellido', '$sapellido', '$cif')";
$result = $conexion->query($sql);
/*
if(mysqli_query($conexion, $sql)){

    echo "Mensaje: Datos agregados exitosamente"; 

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
}
*/

if($sql){
    echo "Datos agregados exitosamente"; 
}
else{
    echo "Datos no agregados exitosamente"; 
}

?>