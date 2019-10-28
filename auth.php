<?php

session_start();
$usuario = $_SESSION['username'];

if(!isset($usuario)){
    header("location: login.php");
}

?>