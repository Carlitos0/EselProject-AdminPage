<?php
include('config/conexion.php');
include('utilities/functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "Debes Logearte Primero";
    header('Location: login.php');
}
/* if(isLoggedIn()){
    $_SESSION['message'] = "Debe cerrar sesion";
    $_SESSION['message_type'] = "danger";
} */
/* else{
    $_SESSION['message'] = "Debes cerrar sesion primero";
    header('Location: productos.php');
} */
?>
<?php include 'includes/header.php' ?>
<?php include 'includes/footer.php' ?>