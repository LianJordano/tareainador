<?php
include_once("../template/cabecera.php");
require_once("../../config/database.php");
$sql = "SELECT t.*,categoria_nombre as categoria,case when tarea_usu_id is null then 'DISPONIBLE' ELSE usuario_nombre END as 'ASIGNADO A' FROM tareas t inner join categorias c ON t.tarea_categoria_id=c.categoria_id left JOIN usuarios u ON t.tarea_usu_id=u.usuario_id ORDER BY tarea_id DESC";
$tareas = mysqli_query($conexion, $sql);
?>

<div class="lista-tarea-admin">
    <table>
    
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>CATEGORIA</th>
            <th>INICIO</th>
            <th>FIN</th>
            <th>COLABORADOR</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
    
        </tr>
        <?php while ($tarea = mysqli_fetch_assoc($tareas)) : ?>
            <tr>
                <td><?= $tarea["tarea_id"]; ?></td>
                <td><?= $tarea["tarea_nombre"]; ?></td>
                <td><?= $tarea["tarea_descripcion"]; ?></td>
                <td><?= $tarea["categoria"]; ?></td>
                <td><?= $tarea["fecha_inicio"]; ?></td>
                <td><?= $tarea["fecha_fin"]; ?></td>
                <td><?= $tarea["ASIGNADO A"]; ?></td>
                <td><?= $tarea["tarea_estado"]; ?></td>
                <td>
                    <a class="" style="margin-right:15px;color:orange" onclick='editaTarea("<?=$tarea["tarea_id"]?>")' id="editar-tarea" href="#"><i class="fas fa-pencil-alt"></i></a>
                    
                    <a class="" style="color:red" id="eliminar-usuario"href="control.Tareas.php?id=<?=$tarea["tarea_id"]?>&a=elim"><i class="far fa-trash-alt"></i></a>
                </td>
    
            </tr>
        <?php endwhile; ?>
    
    </table>
</div>

<div id="divModalEditar">

</div>




<?php
include_once("../template/footer.php");
?>