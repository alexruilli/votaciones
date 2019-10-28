<?php

require 'db.php';
session_start();

$usuario = $_POST['Usuario'];
$password = $_POST['Password'];

$query = "SELECT COUNT(*) as contar from usuarios where usuario = '$usuario' and password = '$password'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);

if($array['contar'] > 0){
    $_SESSION['username'] = $usuario;
    header("location: ../administracion.php");
} else {
    echo '<script type="text/javascript">'; 
    echo 'alert("Usuario o Contraseña invalido");'; 
    echo 'window.location.href = "../login.php";';
    echo '</script>';
}

?>