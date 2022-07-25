<?php
    include("../config/conexion.php");

    if (isset($_GET['codusu'])) {
        $id = $_GET['codusu'];
        $sql = "SELECT * FROM usuario WHERE codusu = $id";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array(($result));
            $UName = $row['nomusu'];
            $ULastname = $row['apeusu'];
            $UEmail = $row['emausu'];
            $UPass = $row['pasusu'];
            $UStatus = $row['estado'];
        }
    }

    if(isset($_POST['updateUsuario'])){
        $id = $_GET['codusu'];
        $NewName = $_POST['nomusu'];
        $NewLastname = $_POST['apeusu'];
        $NewEmail = $_POST['emausu'];
        $NewStatus = $_POST['estado'];
        $NewPass = $_POST['pasusu'];

        $query = "UPDATE usuario set nomusu = '$NewName', apeusu = '$NewLastname', emausu = '$NewEmail',
        estado = '$NewStatus', pasusu = '$NewPass' WHERE codusu = '$id'";
        $result = mysqli_query($con,$query);
        if($result){
            $_SESSION['message']="User updated Succesfully";
            $_SESSION['message_type']="info";
            header("Location: ../usuarios.php");
        }
        else{
            $_SESSION['message']="Error";
            $_SESSION['message_type']="danger";
            header("Location: ../usuarios.php");
        }
    }
?>

<?php include('../includes/header.php') ?>

<div class="container mt-5 p-2">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card bg-dark text-white p-2">
                <div class="card-body">
                    <form action="updateUsuario.php?codusu=<?php echo $_GET['codusu']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nombre de Usuario:</label>
                            <input type="text" name="nomusu" value="<?php echo $UName; ?>" class="form-control" placeholder="Update Name">
                        </div>
                        <div class="form-group">
                            <label for="">Apellido:</label>
                            <input name="apeusu" placeholder="Update Lastname" class="form-control" value="<?php echo $ULastname; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="emausu" placeholder="Update Email" class="form-control" value="<?php echo $UEmail; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Update Status:</label>
                            <select class="form-select" id="estado" name="estado">
                                <option value=1>Activo</option>
                                <option value=0>Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Contraseña</label>
                                <input class="form-control" type="text" id="contraseña" name="pasusu" value="<?php echo $UPass?>">
                        </div>
                        <div class="form-group pt-2">
                            <button class="btn btn-success btn-lg w-100" name="updateUsuario">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>