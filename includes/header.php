<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Esel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid py-3">
            <a class="navbar-brand text-white fw-bold" href="#">Admin Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-white" href="/gestion_esel/productos.php">Productos</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link fw-bold text-white" href="/gestion_esel/usuarios.php">Usuarios</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item ">
                        <a class="nav-link fw-bold text-white p-1 d-flex justify-content-center" href="/gestion_esel/usuarios.php">
                            <img src="./img/user.png" class="rounded-circle" width="50" height="50" alt="">
                            <?php
                            if (isset($_SESSION['admin'])) { ?>
                                <strong><?php echo $_SESSION['admin']['nomusu']; ?></strong>
                                <div>
                                    <i>(<?php echo ucfirst($_SESSION['admin']['user_type']); ?>)</i>
                                </div>
                                <a href="index.php?logout='1'" class="btn btn-outline-dark ">Logout</a>
                            <?php } ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>