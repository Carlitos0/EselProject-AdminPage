<?php 
    include('../config/conexion.php');

    if(isset($_POST['update'])){
        $cod = $_SESSION['super-admin']['codusu'];
        $nombre = ($_POST['nomusu']);
        $apellido = ($_POST['apeusu']);
        $email = ($_POST['emausu']);
        $pwd = ($_POST['pwd']);
        
        $sql = "UPDATE usuario SET nomusu = '$nombre', apeusu = '$apellido', emausu = '$email', pasusu = '$pwd' WHERE codusu = '$cod'";
        $result = mysqli_query($con,$sql);
        if($result){
            $_SESSION['super-admin']['nomusu'] = $nombre;
            $_SESSION['super-admin']['apeusu'] = $apellido;
            $_SESSION['super-admin']['emausu'] = $email;
            $_SESSION['super-admin']['pasusu'] = $pwd;
            $_SESSION['message']="Se Actualizó su Perfil Correctamente ".$nombre."";
            $_SESSION['message_type']="info";
            header("Location: ../profile.php");
        }
    }
?>