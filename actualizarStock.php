<?php
include('./config/conexion.php');
include('./utilities/functions.php');
?>


<?php include('./includes/header.php') ?>

<?php
    if(isset($_POST['updateStock'])){
        $cod = e($_POST['codpro']);
        $cantidad = e($_POST['cantidad']);
        $nuevaCantidad = 0;
        $cantidadFinal = $nuevaCantidad + $cantidad;
        if(isset($_POST['nuevaCantidad'])){ 
            $nuevaCantidad = e($_POST['nuevaCantidad']);
            $cantidadFinal = $nuevaCantidad + $cantidad;
            $sql = "UPDATE producto SET cantidad = '$cantidadFinal' WHERE codpro = '$cod'";
        }
        $sql = "UPDATE producto SET cantidad = '$cantidadFinal' WHERE codpro = '$cod'";
        $result = mysqli_query($con,$sql);
        if($result){
            $_SESSION['cod_pro'] = ''.$cod.'';
            $_SESSION['mmss'] = "Se Actualizó el stock del producto con Codigo ---> ".$_SESSION['cod_pro']."";
            $_SESSION['mmss_type'] = "success";
        }
    }
?>

<div class="container p-2 mt-4">
    <?php if (isset($_SESSION['mmss'])) { ?>
        <div class="alert alert-<?= $_SESSION['mmss_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['mmss']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['mmss']);
    } ?>
</div>

<div class="container my-4 p-3">
    <?php
    $sql = "SELECT * FROM producto";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $salida = "";
        while ($fila = $result->fetch_assoc()) {
            $salida .=
                '<div class="col-md-6 mx-auto">
                    <div class="card my-3">
                        <div class="card-header bg-indigo text-white fw-bolder text-uppercase">' . $fila['nompro'] . '</div>
                        <div class="card-body">
                            <form action="actualizarStock.php" method="POST">
                                <div class="form-group flex-column d-flex flex-sm-row">
                                    <div class="form-group">
                                        <label>Codigo Producto</label>
                                        <input type="text" readOnly class="form-control" name="codpro" id="codpro" value="' . $fila["codpro"] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Cantidad / Stock</label>
                                        <input type="text" readOnly class="form-control" name="cantidad" value="' . $fila["cantidad"] . '">
                                    </div>
                                    <div class="form-group">
                                        <label>Nueva Cantidad</label>
                                        <input type="number" min=0 class="form-control" name="nuevaCantidad" id="nuevaCantidad">
                                    </div>
                                    <div class="form-group d-flex align-items-end mt-2 justify-content-center">
                                        <button type="submit" class="btn btn-dark w-100 ms-1" name="updateStock">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    }

    echo $salida;
    ?>
</div>







<?php include('./includes/footer.php') ?>