<?php
	//connection
	require("config/db.php");
 
	if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
 
 
	if($action == 'delete'){
		$id = $_POST['id'];
		$output = array();
		$sql = "DELETE FROM estudiantes WHERE idestudiantes = '$id'";
		if($conexion->query($sql)){
			$output['status'] = 'success';
			$output['message'] = 'Estudiante ha sido eliminado';
		}
		else{
			$output['status'] = 'error';
			$output['message'] = 'No se ha podido eliminar el estudiante';
		}
 
		echo json_encode($output);
 
	}
 
?>