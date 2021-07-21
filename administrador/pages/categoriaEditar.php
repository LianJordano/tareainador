<?php
include_once("../template/cabecera.php");
require_once("../../config/database.php");
$id=$_GET["id"];
$sql = "SELECT * FROM categorias WHERE categoria_id=$id";
$categoria = mysqli_query($conexion,$sql);
$categoria = mysqli_fetch_assoc($categoria);
?>

<div class="contenedor-form-crear">

    <form action="control.Categorias.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col l6">

                <input type="hidden" name="aidi" value="<?=$id?>">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa nombres completos" value="<?=$categoria["categoria_nombre"]?>">
                </div>
            </div>
            <div class="col l6">
                <div class="form-group">
                  <label for="">Descripción</label>
                  <textarea class="form-control" name="descripcion" id="" rows="3"><?=$categoria["categoria_descripcion"]?></textarea>
                </div>
            </div>
        <button type="submit" class="btn btn-primary my-3" name="editar-cate">Editar categoria</button>
    </form>
</div>


<?php

include_once("../template/footer.php");
?>