<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/gestion_esel/css/estilos_propios.css">    
    <title>Admin Esel</title>
</head>

<body>
    <header class="container-fluid bg-dark">
        <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row ">
            <section class="d-flex align-items-center ms-0 ms-md-5">
                <a href="/gestion_esel/index.php"><img src="/gestion_esel/img/esel_img.png" class="img-fluid size-img" alt=""></a>
            </section>
            <section class="d-flex align-items-center">
                <a class="fw-bold text-white p-1 text-decoration-none" href="/gestion_esel/profile.php">
                    <?php
                    if (isset($_SESSION['super-admin'])) { ?>
                        <div class="me-0 me-md-5">
                            <img src="/gestion_esel/img/user.png" class="rounded-circle" width="50" height="50" alt="">
                            <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong><?php echo $_SESSION['super-admin']['nomusu']; ?></strong>
                                <div>
                                    <i>(<?php echo ucfirst($_SESSION['super-admin']['user_type']); ?>)</i>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a href="login.php?logout='1'" class="dropdown-item">Logout</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </a>
            </section>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid py-2 px-3 px-sm-5">
            <a class="navbar-brand fw-bold" href="/gestion_esel/index.php">Admin Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="/gestion_esel/productos.php">Productos</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link fw-bold" href="/gestion_esel/usuarios.php">Usuarios</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link fw-bold" href="/gestion_esel/entradas.php">Entradas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>