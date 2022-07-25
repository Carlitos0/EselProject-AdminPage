<?php 
    include ("../config/conexion.php");
    
    if(isset($_GET['codusu'])){
        $UCod = $_GET['codusu'];
        $query = "DELETE FROM usuario WHERE codusu = $UCod";
        $result = mysqli_query($con,$query);
        if(!$result){
            die('Query Failed');
        }
        $_SESSION['message'] = 'User Removed Succesfully';
        $_SESSION['message_type'] = 'info';
        header("Location: ../usuarios.php");
    }
    else{
        $_SESSION['message'] = 'No se pudo eliminar el Usuario, no se encontro el codigo';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../usuarios.php");
        echo 'failed';
    }
    
?>