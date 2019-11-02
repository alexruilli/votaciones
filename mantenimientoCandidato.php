<?php 
    if( isset($_POST['_method']) || isset($_POST['id'])){
        if($_POST['_method'] == 'PUT'){
            print 'vas a actualizar';   
        }
        else if($_POST['_method'] == 'DELETE'){
            print 'vas a eliminar';   
        }
        else{
            print 'metodo no existente';
        }
    }
    else{
        print 'method not defined';
    }
?>