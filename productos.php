<?php
    include('config/conexion.php');
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
                    <label class="my-2 text-uppercase fw-bolder text-primary">Product to filter</label>
                    <input type="text" name="buscar" id="" class="form-control bg-light p-2" placeholder="Product Name">
                    <button type="submit" class="btn btn-outline-primary btn-lg mt-3" name="btnBuscar">Buscar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container p-2 mt-4">
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); }?>
        </div>
        <table class="table mt-2 mb-4 table-dark table-striped table-responsive-lg rounded">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Codigo</th>
                    <th scope="col" class="text-center">Producto / Maquinaria</th>
                    <th scope="col" class="text-center">Descripcion</th>
                    <th scope="col" class="text-center">Precio</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Control</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $filtro = "";
                if(isset($_POST['btnBuscar'])){
                    if($_POST["buscar"] == ""){
                        $filtro = "";
                    }
                    else{
                        $filtro = $_POST["buscar"];
                    }
                }
                $sql = "Select * from producto WHERE nompro LIKE '%$filtro%'";
                $resultado = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($resultado)) {?>
                        <tr>
                            <td><?php echo $row['codpro']?></td>
                            <td><?php echo $row['nompro']?></td>
                            <td><?php echo $row['despro']?></td> 
                            <td><?php echo $row['prepro']?></td>
                            <td><?php echo $row['estado']?></td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="api/updateProduct.php?codpro=<?php echo $row['codpro'] ?>" class="btn"><i class="fa-solid fa-pen text-info"></i></a>   
                                    <a href="api/deleteProduct.php?codpro=<?php echo $row['codpro'] ?>" class="btn"><i class="fa-solid fa-trash-can text-danger"></i></a>
                                </div>
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
        <button class="btn btn-warning btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#modal">Agregar Nuevo Producto</button>
    </div>
</main>


<?php include 'includes/footer.php' ?>