<?php
include_once("../template/cabecera.php");
isUser();
require_once("../config/database.php");
$id = $_SESSION["credenciales"]["usuario_id"];
$sql = "SELECT * FROM tareas WHERE tarea_usu_id=$id AND tarea_estado='ACTIVO'";
$tareas = mysqli_query($conexion, $sql);
$sqlP = "SELECT * FROM tareas WHERE tarea_usu_id=$id AND tarea_estado='PENDIENTE'";
$tareasP = mysqli_query($conexion, $sqlP);

?>

<div class="container py-1" style="background-color: #fff;border-radius:20px">
    <h3 >Mis tareas</h3>
    <span style="display: block;border-bottom: 1px solid red;"></span>

    <div class="row col l12 mt-3 mb-3 ">

        <?php while ($tarea = mysqli_fetch_assoc($tareas)) : ?>
            <div class="card col-4">
                <p class="card-img-top"><?= $tarea["tarea_id"] ?> </p>
                <div class="card-body">
                    <a href="tareaDescripcion.php?id=<?=$tarea["tarea_id"]?>"><h4 class="card-title"><?= $tarea["tarea_nombre"] ?></h4></a>
                    <p class="card-text"><?= substr($tarea["tarea_descripcion"],0,100) ?></p>
                </div>
                <div class="form-group">
                  <label for=""></label>
                  <select class="form-control" onchange="liberame(<?= $tarea['tarea_id']?>,$(this).val())"  name="acciontarea" class="acciontarea">
                    <option value="" selected disabled>Finalizar tarea</option>
                    <option value="finalizar">Finalizar tarea</option>
                    <option value="liberar">Liberar tarea</option>
                  </select>
                </div>
            </div>

        <?php endwhile; ?>
    </div>

</div>
<br>
<div class="container py-1" style="background-color: #fff;border-radius:20px">
    <h3 >En Revision</h3>
    <span style="display: block;border-bottom: 1px solid green;"></span>

    <div class="row col l12 mt-3 mb-3 ">

        <?php while ($tareaP = mysqli_fetch_assoc($tareasP)) : ?>
            <div class="card col-4">
                <p class="card-img-top"><?= $tareaP["tarea_id"] ?> </p>
                <div class="card-body">
                    <a href="tareaDescripcion.php?id=<?=$tareaP["tarea_id"]?>"><h4 class="card-title"><?= $tareaP["tarea_nombre"] ?></h4></a>
                    <p class="card-text"><?= substr($tareaP["tarea_descripcion"],0,100) ?></p>
                </div>
          
            </div>

        <?php endwhile; ?>
    </div>

</div>



<?php
include_once("../template/footer.php");
?>