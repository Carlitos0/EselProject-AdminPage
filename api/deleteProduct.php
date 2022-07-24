<?php 
    include ("../config/conexion.php");
    
    if(isset($_GET['codpro'])){
        $PRCod = $_GET['codpro'];
        $query = "DELETE FROM producto WHERE codpro = $PRCod";
        $result = mysqli_query($con,$query);
        if(!$result){
            die('Query Failed');
        }
        $_SESSION['message'] = 'Product Removed Succesfully';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../productos.php");
    }
    else{
        $_SESSION['message'] = 'No se pudo eliminar el Producto, no se encontro el codigo';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../productos.php");
        echo 'failed';
    }
    
?>