<?php
include_once("../template/cabecera.php");
require_once("../../config/database.php");
$sql = "SELECT * FROM categorias";
$categorias = mysqli_query($conexion,$sql);
?>

    <table class="table table-light mt-5 tabla">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php while($cate = mysqli_fetch_assoc($categorias)): ?>
            <tr>
                <td><?=$cate["categoria_id"]?></td>
                <td><?=$cate["categoria_nombre"]?></td>
                <td><?=$cate["categoria_descripcion"]?></td>
                <td>
                    <a class="btn btn-warning" href="categoriaEditar.php?id=<?=$cate["categoria_id"]?>">Editar</a>
                    <a class="btn btn-danger" id="eliminar-categoria" href="control.Categorias.php?a=elim&id=<?=$cate["categoria_id"]?>">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
    
        </tbody>
</div>



<?php
include_once("../template/footer.php");
?>