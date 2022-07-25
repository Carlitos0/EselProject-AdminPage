<?php
include('../config/conexion.php');

if (isset($_POST['saveUsuario'])) {
    $UName = $_POST['nomusu'];
    $ULastName = $_POST['apeusu'];
    $UEmail = $_POST['emausu'];
    $UPassw = $_POST['pasusu'];
    $UStatus = $_POST['estado'];

    $query = "INSERT INTO usuario(nomusu,apeusu,emausu,pasusu,estado) VALUES ('$UName','$ULastName','$UEmail','$UPassw',$UStatus)";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "User Saved Succesfully";
        $_SESSION['message_type'] = "success";
        header("Location: ../usuarios.php");
    }
    else{
        die('Query Failed');
    }
}
