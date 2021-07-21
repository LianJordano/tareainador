<?php
include_once("../template/cabecera.php");
include_once("../../config/database.php");

$sqlca = "SELECT categoria_id,categoria_nombre from categorias";
$sqlus = "SELECT usuario_id,usuario_nombre,usuario_apellidos from usuarios";
$categorias = mysqli_query($conexion,$sqlca);
$usuarios = mysqli_query($conexion,$sqlus);


?>

<div class="contenedor-form-crear">

    <h1>Crear tarea</h1>
    <form action="control.Tareas.php" method="POST" enctype="multipart/form-data">
        <div class="row">
        
            <div class="col l6">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresa titulo para la tarea">
                </div>
            </div>
            <div class="col l6">
                <div class="form-group">
                  <label for="">Descripción</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group">
              <label for="categoria">Categoria</label>
              <select class="form-control" name="categoria" id="categoria">
                    <?php while($categoria = mysqli_fetch_assoc($categorias)): ?>
                    <option value="<?=$categoria["categoria_id"]?>"><?=$categoria["categoria_nombre"]?></option>
                    <?php endwhile; ?>

              </select>
            </div>

            <div class="form-group col l6" >
              <label for="">Fecha Inicio</label>
              <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col l6" >
              <label for="">Fecha fin</label>
              <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" aria-describedby="helpId" placeholder="">
            </div>

            
            <div class="form-group">
              <label for="usuarios">Colaborador</label>

              <select class="form-control" name="usuario" id="usuario">
                    <option value="">Sin asignar</option>
                    <?php while($usuario = mysqli_fetch_assoc($usuarios)): ?>
                    <option value="<?=$usuario["usuario_id"]?>"><?=$usuario["usuario_nombre"]?></option>
                    <?php endwhile; ?>

              </select>
            
            </div>

        </div>
  
        <button type="submit" class="btn btn-primary my-3" name="crear-tarea">Crear tarea</button>
    </form>
</div>


<?php
include_once("../template/footer.php");
?>