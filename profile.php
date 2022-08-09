<?php
include('./config/conexion.php');
include('./utilities/functions.php');
?>

<?php 
    include('./includes/header.php');
?>

<div class="container py-5">
    <div class="col-10 col-md-4  mx-auto">
        <div class="container p-2 mt-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['message']);
            } ?>
        </div>

        <div class="card ">
            <div class="car-header">
                <h3 class="text-center"> Perfil: <span class="fw-bolder text-uppercase"><?php echo '' . $_SESSION['super-admin']['nomusu'] . '' ?></span></h3>
            </div>
            <div class="card-body">
                <form action="./controller/updatePerfil.php" method="POST">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" readonly name="nomusu" value='<?php echo $_SESSION['super-admin']['nomusu'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" readonly name="apeusu" value='<?php echo $_SESSION['super-admin']['apeusu'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" readonly name="emausu" value='<?php echo $_SESSION['super-admin']['emausu'] ?>'>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Contraseña</label>
                        <div class="d-flex">
                            <input type="password" readonly class="form-control border-right-0 rounded-start" name="pwd" id="pws" value='<?php echo $_SESSION['super-admin']['pasusu'] ?>'>
                            <button type="button" class="btn border-0" onclick="verOcultarPws()"><i class="fa-solid fa-eye"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mb-1 mb-sm-0" name="update">Actualizar</button>
                    <input type="button" class="btn btn-primary" id="boton" onclick="habilitarInputs()" value="Habilitar Edición">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function habilitarInputs() {
        let cajas = document.getElementsByTagName('input');
        let btn = document.getElementById('boton').value;
        for (let i = 0; i < cajas.length; i++) {
            if (cajas[i].readOnly) {
                cajas[i].readOnly = false;
                cajas[0].focus();
            } else {
                cajas[i].readOnly = true;
            }
        }
        if (btn == 'Habilitar') {
            btn = 'Deshabilitar'
        } else {
            btn = 'Habilitar'
        }
    }

    function verOcultarPws() {
        const pws = document.getElementById('pws');
        if (pws.type == 'password') {
            pws.type = 'text';
        } else {
            pws.type = 'password';
        }
    }
</script>
<?php include('./includes/footer.php') ?>