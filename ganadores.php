<?php
include('config/db.php');
if($_POST['id']){
	$id=$_POST['id'];
	if($id==0){
		echo "Seleccione el año que quiere ver el ganador";
		}else{
			$sql = mysqli_query($conexion,"SELECT concat(nombre, ' ', apellido) ncandidato, count(voto) as totalvotos, votoano 
            from votos inner join candidatos ON candidatos.idcandidato = votos.idcandidato WHERE votoano = '$id' LIMIT 1;");
			while($row = mysqli_fetch_array($sql)){
                echo '<h4 class="alert-heading">Resultados!</h4>                ';
				echo '<p>El ganador del año <strong>'.$row["votoano"].'</strong> es <strong>'.$row["ncandidato"].'</strong> con un total del votos de: <strong>'.$row["totalvotos"].'</strong></p>';
				}
			}
		}
?>