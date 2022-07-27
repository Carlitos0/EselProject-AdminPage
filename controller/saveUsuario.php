<?php
include('../config/conexion.php');
include('../utilities/functions.php');
if (isset($_POST['saveUsuario'])) {
    $UName = e($_POST['nomusu']);
    $ULastName = e($_POST['apeusu']);
    $UEmail = e($_POST['emausu']);
    $UPassw = e($_POST['pasusu']);
    $UStatus = e($_POST['estado']);


    $correo = "SELECT * FROM usuario WHERE emausu='$UEmail'";
    $SeRepite = $con->query($correo);
    $fila = mysqli_num_rows($SeRepite);


    if ($fila == 0) {
        if (isset($_POST['user_type'])) {
            $UType = e($_POST['user_type']);
            $query = "INSERT INTO usuario(nomusu,apeusu,emausu,pasusu,estado,user_type) VALUES ('$UName','$ULastName','$UEmail','$UPassw',$UStatus,'$UType')";
            $result = $con->query($query) or die;
            $logged_admin_id = mysqli_insert_id($con);
            $_SESSION['admin'] = getUserById($logged_admin_id);
            $_SESSION['message'] = "User Saved Succesfully";
            $_SESSION['message_type'] = "success";
            header("Location: ../usuarios.php");
        }
    } else {
        $_SESSION['message'] = "Creación de usuario inválida: El correo ya está en uso";
        $_SESSION['message_type'] = "danger";
        header("Location: ../usuarios.php");
    }
}
