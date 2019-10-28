<?php

require 'config\db.php';
session_start();

$cif = $_POST['cif'];

$query = "SELECT COUNT(*) as contar from estudiantes where cif = '$cif'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);

if($array['contar'] > 0){
    $_SESSION['cif'] = $cif;
    $_SESSION['idestudiantes'] = $idestudiante;
    header("location: main.php");
} 
else{
    header("location: index.php");
}
?>