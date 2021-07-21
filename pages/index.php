<?php 
    include_once("../template/cabecera.php");
    require_once("../config/database.php");
isUser();

    $sql = "SELECT t.*,categoria_nombre as categoria FROM tareas t inner join categorias c ON t.tarea_categoria_id=c.categoria_id WHERE tarea_estado='ACTIVO'  ORDER BY tarea_id DESC";
    $tareas = mysqli_query($conexion,$sql);
?>
        <div class="contenedor-tareas">
                <table class="table">
                    <h2>Tareas Disponibles</h2>

                    <thead>
                        <th>#REF</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>CATEGORIA</th>
                        <th>FECHA INICIO</th>
                        <th>FECHA FIN</th>
                        <th>ACCIONES</th>
                    </thead>

                    <tbody>
                        <?php while($tarea = mysqli_fetch_assoc($tareas)): ?>
                        <tr>
                            <td><?=$tarea["tarea_id"]?></td>
                            <td style="color: #593196;"><a href="tareaDescripcion.php?id=<?=$tarea['tarea_id']?>"><?=$tarea["tarea_nombre"]?></a> </td>
                            <td><?= substr($tarea["tarea_descripcion"],0,100)?><a href="tareaDescripcion.php?id=<?=$tarea['tarea_id']?>">...</a></td>
                            <td><?=$tarea["categoria"]?></td>
                            <td><?=$tarea["fecha_inicio"]?></td>
                            <td><?=$tarea["fecha_fin"]?></td>
                            <?php if($tarea["tarea_usu_id"]=="" || $tarea["tarea_usu_id"]==null): ?>
                            <td><a href="tomarTarea.php?id=<?=$tarea["tarea_id"]?>" class="btn btn-success">TOMAR TAREA</a></td>
                            <?php else:?>
                                <td><a href="#" class="btn btn-warning">ASIGNADA</a></td>
                            <?php endif;?>

                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>

            </div>
        </div>


<?php 
    include_once("../template/footer.php");
?>
