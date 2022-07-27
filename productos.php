<?php
include('config/conexion.php');
include('utilities/functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "Debes Logearte Primero";
    header('Location: index.php');
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
<div class="modal" id="modal">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary text-white">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="api/saveProduct.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-around">
                        <div class="col-md-8">
                            <input type="hidden" name="codpro">
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" id="nombre" name="nompro" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion:</label>
                                <textarea id="descripcion" name="despro" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Precio:</label>
                                <input type="number" id="precio" name="prepro" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Estado:</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value=1>Activo</option>
                                    <option value=0>Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Imagen:</label>
                                <input class="form-control" type="file" id="imagen" name="rutimapro">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary btn-block" name="saveProduct">Guardar</button>
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
                <form action="productos.php" method="POST">
                    <h3>Buscador</h3>
                    <label class="my-2 text-uppercase fw-bolder text-primary">Product Name to filter</label>
                    <input type="text" name="box_search" id="box_search" class="form-control bg-light p-2" placeholder="Product Name">
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

        <div id="datos" class="p-2 my-3">
        </div>

        <button class="btn btn-warning btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#modal">Agregar Nuevo Producto</button>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<?php include 'includes/footer.php' ?>