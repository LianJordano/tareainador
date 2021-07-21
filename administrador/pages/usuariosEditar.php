<?php
include_once("../template/cabecera.php");
require_once("../../config/database.php");
$id=$_GET["id"];
$sql = "SELECT * FROM usuarios WHERE usuario_id=$id";
$usuario = mysqli_query($conexion,$sql);
$usuario = mysqli_fetch_assoc($usuario);
?>

<div class="contenedor-form-crear">

    <form action="control.Usuarios.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col l6">

                <input type="hidden" name="aidi" value="<?=$id?>">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa nombres completos" value="<?=$usuario["usuario_nombre"]?>">
                </div>
            </div>
            <div class="col l6">
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Ingresa apellidos completos" value="<?=$usuario["usuario_apellidos"]?>">
                </div>
            </div>

        </div>
        <div class="col l12">
            <div class="form-group">
                <label for="">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo electrionico" value="<?=$usuario["usuario_correo"]?>">
            </div>
        </div>
        <div class="col l12">
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña segura" value="<?=$usuario["usuario_password"]?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3" name="editar-usu">Editar Usuario</button>
    </form>
</div>


<?php

include_once("../template/footer.php");
?>