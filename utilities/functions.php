<?php 
    include('./config/conexion.php');
    /* session_start(); */

    function isLoggedIn(){
        if(isset($_SESSION['super-admin'])){
            return true;
        }
        else{
            return false;
        }
    }

   /*  function showAndHide(){
        if(isset($_SESSION['admin']))
    } */

    function getUserById($id){
        global $con;
        $query = "SELECT * FROM usuario WHERE codusu=" . $id;
        $result = mysqli_query($con, $query);
        
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    
    // escape string
    function e($val){
        global $con;
        return mysqli_real_escape_string($con, trim($val));
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['super-admin']);
        header("Location: login.php");
    }

    if(isset($_POST['ingresar'])){
        login();
    }

    function login(){
        global $con, $UEmail;

        $UEmail = e($_POST['emausu']);
        $password = e($_POST['pasusu']);

        if(!empty($UEmail) and !empty($password)){
            $query = "SELECT * FROM usuario WHERE emausu = '$UEmail' AND pasusu = '$password' LIMIT 1";
            $rstl = mysqli_query($con,$query);

            if(mysqli_num_rows($rstl)==1){
                $logged_in_user = mysqli_fetch_assoc($rstl);
                if($logged_in_user['user_type'] == 'super-admin' or $logged_in_user['user_type'] == 'admin'){
                    $_SESSION['super-admin'] = $logged_in_user;
                    $_SESSION['message'] = "Verficacion correcta: Está logeado";
                    $_SESSION['message_color']  = "success";
                    echo "<script>
                    setTimeout(function(){
                        location.href = 'productos.php';
                    },1200);
                    </script>";
                    /* header("Location: productos.php"); */
                }else{
                    $_SESSION['message'] = "Esta no es una cuenta de Administrador";
                    $_SESSION['message_color']  = "danger";
                    echo "<script>
                    setTimeout(function(){
                        location.href = 'index.php';
                    },3000);
                    </script>";
                }
            }
            else{
                $_SESSION['message'] = "Datos inválidos";
                $_SESSION['message_color']  = "danger";
            }
        }
        else{
            $_SESSION['message'] = "Los campos deben estar completos";
            $_SESSION['message_color']  = "danger";
            /* echo "<script>
                    setTimeout(function(){
                        location.href = 'index.php';
                    },5000);
                    </script>"; */
        }
    }
?>