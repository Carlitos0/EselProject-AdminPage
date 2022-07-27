<?php 
    include("./config/conexion.php");
    include("./utilities/functions.php");
    if (isLoggedIn()) {
        echo "<script>
                    setTimeout(function(){
                        location.href = 'productos.php';
                    },1200);
                    </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Inicio</title>
    <style>
        body {
            background-image: url('img/fondo.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container pt-5">
        <div class="col-10 col-md-7 col-sm-10 col-lg-4 pt-5 mx-auto">
            <div class="container p-2 mt-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_color'] ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['message']);
                } ?>
            </div>
            <div class="container p-2 mt-2">
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-danger ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['msg'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['msg']);
                } ?>
            </div>
            <div class="card">
                <div class="card-header text-center bg-success">
                    <h3 class="text-white fw-bolder text-uppercase">Ingreso</h3>
                </div>
                <div class="card body p-4">
                    <form action="index.php" method="POST">
                        <div class="form-group ">
                            <input type="email" placeholder="Ingrese su correo" name="emausu" class="form-control p-2">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" placeholder="Contraseña" name="pasusu" class="form-control p-2">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary text-white w-100 btn-lg" name="ingresar">INGRESAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>