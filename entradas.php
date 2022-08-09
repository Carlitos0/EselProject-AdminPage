<?php
include('config/conexion.php');
include('utilities/functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "Debes Logearte Primero";
    header('Location: login.php');
}
?>
<?php include 'includes/header.php' ?>

<main>
    <div class="container py-4">
        <div class="col-md-15 mx-auto">
            <div class="card p-3 shadow">
                <form action="entradas.php" method="POST">
                    <h3>Buscador</h3>
                    <label class="my-2 text-uppercase fw-bolder text-primary">Entrada Name to filter</label>
                    <input type="text" name="entrada_search" id="entrada_search" class="form-control bg-light p-2" placeholder="Product Name">
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

        <div class="bg-white table-responsive">
            <?php
            $query = 'SELECT * FROM entradas';
            $result = mysqli_query($con, $query);
            $salida = "";
            if ($result->num_rows > 0) {
                $salida .= '<table class="table mt-2 mb-2 table-striped table-bordered  rounded">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">Codigo</th>
                            <th scope="col" class="text-center">Cantidad</th>
                            <th scope="col" class="text-center">fecha</th>
                            <th scope="col" class="text-center">Codigo Producto</th>
                            <th scope="col" class="text-center">Control</th>
                        </tr>   
                    </thead>
                    <tbody class="text-center">';
                while ($fila = $result->fetch_assoc()) {
                    $salida .= '<tr>
                    <td class="p-3">' . $fila["codent"] . '</td>
                    <td>' . $fila["cantidad"] . '</td>
                    <td>' . $fila["fecha"] . '</td> 
                    <td>' . $fila["codpro"] . '</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="./api/updateProduct.php?codpro=' . $fila["codent"] . '" class="btn border-0 icon_control"><i class="fa-solid fa-circle-info text-info"></i></a>   
                        </div>
                    </td>
                </tr>';
                }
                $salida .= "</tbody></table>";
            } else {
                $salida = ' <div class="container d-flex flex-column text-center justify-content-center align-items-center">
                                <i class="fas fa-sad-tear display-4 mb-2"></i>
                                <h3>NO HAY DATOS </h3>
                            </div>';
            }
            echo $salida;
            ?>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<?php include 'includes/footer.php' ?>