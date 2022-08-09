<?php
include("../config/conexion.php");

if (isset($_GET['codpro'])) {
    $id = $_GET['codpro'];
    $sql = "SELECT * FROM producto WHERE codpro = $id";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array(($result));
        $PrName = $row['nompro'];
        $PrDescription = $row['despro'];
        $PrPrice = $row['prepro'];
        $PrCantidad = $row['cantidad'];
        $PrStatus = $row['estado'];
        $PrImage = $row['rutimapro'];
    }
}

if (isset($_POST['updateProduct'])) {
    $id = $_GET['codpro'];
    $NewName = $_POST['nompro'];
    $NewDesp = $_POST['despro'];
    $NewPrice = $_POST['prepro'];
    $NewCantidad = $_POST['cantidad'];
    $NewStatus = $_POST['estado'];
    $NewRuta = date('YmdHis') . '.jpg';

    $query = "UPDATE producto set nompro = '$NewName', despro = '$NewDesp', prepro = '$NewPrice',
        estado = '$NewStatus', rutimapro = '$NewRuta', cantidad = '$NewCantidad'  WHERE codpro = '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (move_uploaded_file($_FILES['rutimapro']['tmp_name'], "../../Proyecto-Certificador\images\productos/" . $NewRuta)) {
            $_SESSION['message'] = "Product updated Succesfully";
            $_SESSION['message_type'] = "success";
            header("Location: ../productos.php");
        } else {
            $_SESSION['message'] = "No se pudo actualizar la imagen";
            $_SESSION['message_type'] = "info";
            header("Location: ../productos.php");
        }
    } else {
        $_SESSION['message'] = "Error";
        $_SESSION['message_type'] = "danger";
        header("Location: ../productos.php");
    }
}
?>

<?php include('../includes/header.php') ?>

<div class="container mt-5 p-2">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card bg-dark text-white p-2">
                <div class="card-body">
                    <form action="updateProduct.php?codpro=<?php echo $_GET['codpro']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="nompro" value="<?php echo $PrName; ?>" class="form-control" placeholder="Update Name">
                        </div>
                        <div class="form-group">
                            <label for="">Descripcion:</label>
                            <textarea name="despro" rows="5" placeholder="Update Description" class="form-control"><?php echo $PrDescription; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Precio:</label>
                            <input type="number" name="prepro" placeholder="Update Price" class="form-control" value="<?php echo $PrPrice; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Cantidad:</label>
                            <div class="d-flex justify-content-between">
                                <input type="number" name="cantidad" placeholder="Update Cantidad" class="form-control w-50" disabled value="<?php echo $PrCantidad; ?>">
                                <a href="../actualizarStock.php" class="btn btn-info">Actualizar Stock</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Update Status:</label>
                            <select class="form-select" id="estado" name="estado">
                                <option value=1>Activo</option>
                                <option value=0>Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Imagen:</label>
                            <input class="form-control" type="file" id="imagen" name="rutimapro">
                        </div>
                        <div class="form-group pt-2">
                            <button class="btn btn-success btn-lg w-100" name="updateProduct">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>