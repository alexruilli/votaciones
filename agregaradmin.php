<?php
require('config\db.php');

$usuario = mysqli_real_escape_string($conexion, $_REQUEST['usuario']);
$contrasena= mysqli_real_escape_string($conexion, $_REQUEST['contrasena']);

$pssencrypted = md5($contrasena);

$sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$pssencrypted')";
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