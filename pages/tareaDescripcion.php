<?php
include_once("../template/cabecera.php");
isUser();
require_once("../config/database.php");
?>
    

    <?php 
        $id=$_GET["id"];
        $sql = "SELECT t.*,categoria_nombre as categoria,case when tarea_usu_id is null then 'DISPONIBLE' ELSE usuario_nombre END as 'ASIGNADO A' FROM tareas t inner join categorias c ON t.tarea_categoria_id=c.categoria_id left JOIN usuarios u ON t.tarea_usu_id=u.usuario_id  WHERE tarea_id=$id ORDER BY tarea_id DESC";
        $tareas = mysqli_query($conexion, $sql);
        $tarea = mysqli_query($conexion,$sql);
        $tarea = mysqli_fetch_assoc($tarea);
    ?>

<div class="contenedor-tareas tareas-descripcion">

    <table class="table">
        <h3 style="margin-top:15px;margin-bottom:15px;border-bottom:1px solid #593196">Información de la tarea</h3>
        <tr>
            <th>#REF: </th>
            <td> <?=$tarea["tarea_id"]?></td>
        </tr>
        <tr>
            <th>Categoria: </th>
            <td> <?=$tarea["categoria"]?></td>
        </tr>
        <tr>
            <th>Tarea: </th>
            <td> <?=$tarea["tarea_nombre"]?></td>
        </tr>
        
        <tr>
            <th>Descripcion: </th>
            <td> <?=$tarea["tarea_descripcion"]?></td>
        </tr>
        <tr>
            <th>Fecha Inicio: </th>
            <td> <?=$tarea["fecha_inicio"]?></td>
        </tr>
        <tr>
            <th>Fecha Fin: </th>
            <td> <?=$tarea["fecha_fin"]?></td>
        </tr>

        <tr>
            <th>Asignado: </th>
            <td style="font-weight: bold;"> <?=$tarea["ASIGNADO A"]?></td>
        </tr>
       
    </table>
<span style="display:block; border:1px solid #593196"></span>
<a href="index.php" class="btn btn-warning mt-3 float-right">Volver</a>

</div>


    

<?php
include_once("../template/footer.php");
?>
