<?php
include_once("../template/cabecera.php");
require_once("../../config/database.php");
$sql = "SELECT * FROM usuarios";
$usuarios = mysqli_query($conexion,$sql);
?>

    <table class="table table-light mt-5 tabla">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>CORREO</th>
                <th>CONTRASEÑA</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php while($usu = mysqli_fetch_assoc($usuarios)): ?>
            <tr>
                <td><?=$usu["usuario_id"]?></td>
                <td><?=$usu["usuario_nombre"]?></td>
                <td><?=$usu["usuario_apellidos"]?></td>
                <td><?=$usu["usuario_correo"]?></td>
                <td><?=$usu["usuario_password"]?></td>
                <td>
                    <a class="btn btn-warning" href="usuariosEditar.php?id=<?=$usu["usuario_id"]?>">Editar</a>
                    <a class="btn btn-danger" id="eliminar-usuario" href="control.Usuarios.php?a=elim&id=<?=$usu["usuario_id"]?>">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
    
        </tbody>
</div>



<?php
include_once("../template/footer.php");
?>