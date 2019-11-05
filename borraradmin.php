<?php
	//connection
	require("config/db.php");
 
	if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
 
 
	if($action == 'delete'){
		$id = $_POST['id'];
		$output = array();
		$sql = "DELETE FROM usuarios WHERE idusuarios = '$id'";
		if($conexion->query($sql)){
			$output['status'] = 'success';
			$output['message'] = 'Usuario ha sido eliminado';
		}
		else{
			$output['status'] = 'error';
			$output['message'] = 'No se ha podido eliminar el usuario';
		}
 
		echo json_encode($output);
 
	}
 
?>