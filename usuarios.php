<?php
include('config/conexion.php');
include('utilities/functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "Debes Logearte Primero";
    header('Location: login.php');
}
?>
<?php include 'includes/header.php' ?>
<div class="modal" id="modal">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary text-white">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/saveUsuario.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-around">
                        <div class="col-md-8">
                            <input type="hidden" name="codusu">
                            <div class="form-group">
                                <label for="">Nombre de Usuario:</label>
                                <input type="text" id="nomusu" name="nomusu" class="form-control" placeholder="User name">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos:</label>
                                <input id="apeusu" name="apeusu" class="form-control" placeholder="Surname">
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" id="emausu" name="emausu" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">Estado:</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value=1>Activo</option>
                                    <option value=0>Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tipo de Usuario:</label>
                                <select class="form-select" id="user_type" name="user_type">
                                    <option value='admin'>Admin</option>
                                    <option value='cliente'>Cliente</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Tipo de Usuario</label>
                                <input type="text" id="user_type" name="user_type" class="form-control" placeholder="user_type">
                            </div> -->
                            <div class="form-group">
                                <label for="">Contraseña Para el Usuario:</label>
                                <input class="form-control" type="password" id="pasusu" name="pasusu" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary btn-block" name="saveUsuario">Grabar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger " data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<main>
    <div class="container py-4">
        <div class="col-md-15 mx-auto">
            <div class="card p-3 shadow">
                <form action="usuarios.php" method="POST">
                    <h3>Buscador</h3>
                    <label class="my-2 text-uppercase fw-bolder text-primary">User Name to filter</label>
                    <input type="text" name="user_search" id="user_search" class="form-control bg-light p-2" placeholder="User Name">
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container p-2 mt-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['message']);
            } ?>
        </div>

        <button class="btn btn-primary btn-lg ms-2" data-bs-toggle="modal" data-bs-target="#modal">Grabar Nuevo Usuario</button>
        <div class="bg-white table-responsive">
            <div id="datosUser" class="p-2 my-2">
            </div>
        </div>

    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<?php include 'includes/footer.php' ?>