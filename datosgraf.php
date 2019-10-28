<?php

require('config\db.php');
$sql = "SELECT cifvotante, concat(nombre, ' ', apellido) ncandidato, voto from candidatos inner join votos ON candidatos.idcandidato = votos.idcandidato";
$result = $conexion->query($sql);

$datos = array();
foreach($result as $row){
    $datos[] = $row;
}

$result->close();
$conexion->close();

print json_encode($datos); 

?>