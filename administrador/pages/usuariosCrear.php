<?php
include_once("../template/cabecera.php");
?>

<div class="contenedor-form-crear">

    <h1>Crear Usuario</h1>
    <?php if (isset($_SESSION["errores"]["error-nombre"])) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION["errores"]["error-nombre"] ?>
                </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["errores"]["error-apellidos"])) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION["errores"]["error-apellidos"] ?>
                </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["errores"]["error-correo"])) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION["errores"]["error-correo"] ?>
                </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["errores"]["error-password"])) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION["errores"]["error-password"] ?>
                </div>
    <?php endif; ?>

    <form action="control.Usuarios.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?php if (isset($_SESSION["registro"]) && $_SESSION["registro"] != null) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION["registro"]["exito"] ?>
                </div>
            <?php endif; ?>

            <div class="col l6">
           
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa nombres completos">
                </div>
            </div>
            <div class="col l6">
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Ingresa apellidos completos">
                </div>
            </div>

        </div>
        <div class="col l12">
            <div class="form-group">
                <label for="">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo electrionico">
            </div>
        </div>
        <div class="col l12">
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña segura">
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3" name="crear-usu">Crear Usuario</button>
    </form>
</div>


<?php

if(isset($_SESSION["registro"])){
killSession("registro");
}
if(isset($_SESSION["errores"])){
    killSession("errores");
}

include_once("../template/footer.php");
?>