<?php
include_once("../template/cabecera.php");
?>

<div class="contenedor-form-crear">

    <h1>Crear Categoría</h1>

    <form action="control.Categorias.php" method="POST" enctype="multipart/form-data">
        <div class="row">
        
            <div class="col l6">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa nombres completos">
                </div>
            </div>
            <div class="col l6">
                <div class="form-group">
                  <label for="">Descripción</label>
                  <textarea class="form-control" name="descripcion" id="" rows="3"></textarea>
                </div>
            </div>

        </div>
  
        <button type="submit" class="btn btn-primary my-3" name="crear-cate">Crear Categoría</button>
    </form>
</div>


<?php
include_once("../template/footer.php");
?>