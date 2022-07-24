<?php
    include ('../config/conexion.php');

    if(isset($_POST['saveProduct'])){
        $PrName =  $_POST['nompro'];
        $PrDescription =  $_POST['despro'];
        $PrPrice =  $_POST['prepro'];
        $PrStatus =  $_POST['estado'];
        $PrRutImage = date('YmdHis').'.jpg';
        /* $image = $_FILES['rutimapro']; */

        /* if(empty($_FILES['rutimapro'])){
            echo "no se carga la imagen";
        }
        else{
            echo "la imagen llego";
            echo "nombre de la img:".$_FILES['rutimapro']['tmp_name'].'';
        } */
        $query = "INSERT INTO producto(nompro,despro,prepro,estado,rutimapro) VALUES ('$PrName','$PrDescription',$PrPrice,$PrStatus,'$PrRutImage')";
        $result = mysqli_query($con,$query);
        if($result){
            if(move_uploaded_file($_FILES['rutimapro']['tmp_name'],"../../Proyecto-Certificador\images\productos/".$PrRutImage)){
                $_SESSION['message']="Product Saved Succesfully";
                $_SESSION['message_type']="success";
                header("Location: ../productos.php");
            }   
        }else{
            die('Query Failed');
        }
    }
?>