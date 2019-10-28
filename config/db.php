<?php

    $host = "localhost"; //Colocar el nombre de tu host
    $usuario = "root"; //Colocar el nombre de tu usuario del database
    $clave = ""; //Colocar la contraseña de la cuenta asociada a la base de datos
    $db = "votaciones"; //Colocar el nombre de la carpeta donde se encuentra tu proyecto

$conexion = mysqli_connect($host, $usuario, $clave, $db);

/* if ($conexion) {
    echo "¡Tu conexión a la base de datos funciona!";
} else {
    echo "Houston, ¡tenemos un problema!";
} */

?>
