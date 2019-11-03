<?php 

    require('config\db.php');
    require('helpers/helpers.php'); 
    require('models/candidato.php');
    
    $candidato = new candidato;
    
    if( isset($_POST['_method']) || isset($_POST['id'])){
        if($_POST['_method'] == 'PUT'){

            if (is_uploaded_file($_FILES['customFile']['tmp_name'])) {
                if ($candidato->imagen($_FILES['customFile'], $_POST['foto'])) {
                    $file = true;
                } else {
                    print $candidato->getImageError();
                    print 'algo ocurrio mal';
                    $file = false;
                }
            } 
            else{
                if ($candidato->imagen(null, $_POST['foto'])) {
                    $file = true;
                } else {
                    print $product->getImageError();
                    $file = false;
                }
            }

            if($file){  
                if ($candidato->saveFile($_FILES['customFile'], $candidato->getRoot(), $candidato->getImage())) {
                    $id =$_POST['id'];
                    $cif = mysqli_real_escape_string($conexion, $_REQUEST['cif']);
                    $nombre= mysqli_real_escape_string($conexion, $_REQUEST['nombre']);
                    $apellido = mysqli_real_escape_string($conexion, $_REQUEST['apellido']);
                    $descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
                    $propuesta = mysqli_real_escape_string($conexion, $_REQUEST['propuesta']);
    
                    $foto = $candidato->getImage();
                    
                    $sql = "UPDATE candidatos SET cif='$cif', nombre='$nombre', apellido='$apellido', descripcion='$descripcion', propuesta='$propuesta', foto='$foto' WHERE idcandidato='$id'";
                    if(mysqli_query($conexion, $sql)){
    
                        header("location: vercandidatos.php");
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
                    }
                    
                }
                
            }
            else{
                print 'Fallo algo con la foto';
            }
            

            
        }
        else if($_POST['_method'] == 'DELETE'){
            $id = $_POST['id'];
            $sql = "DELETE FROM candidatos WHERE idcandidato='$id'";
            if(mysqli_query($conexion, $sql)){
                if ($candidato->deleteFile($candidato->getRoot(), $_POST['foto'])) {
                    header("location: vercandidatos.php");
                }
                else{
                    print 'no se pudo eliminar la foto';
                }
                
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
            }
        }
        else{
            print 'metodo no existente';
        }
    }
    else{
        print 'method not defined';
    }
?>