<?php

if (isset($_POST) && $_POST["type"] == "tareaEdit") {
    $id = $_POST["aidita"];
    include("../../config/database.php");
    $sql = "SELECT * FROM tareas WHERE tarea_id='$id'";
    $sqlusu = "SELECT * FROM usuarios";
    $sqlcat = "SELECT * FROM categorias";
    $tarea = mysqli_query($conexion, $sql);
    $tarea = mysqli_fetch_assoc($tarea);
    $usuarios = mysqli_query($conexion, $sqlusu);
    $categorias = mysqli_query($conexion, $sqlcat);
  

    $fechaInicio = new DateTime($tarea['fecha_inicio']);
    echo $fechaInicio->format('d-m-Y');
?>

    <div class="modal-editar cerrarModal">
    <div style="width:100%;height:50px;background-color: #fff;margin:0;padding:0;" class="mb-3">
        <h5 style="text-align: center;" >Editar Tarea</h5>
    </div>

        <form action="control.Tareas.php" method="POST" enctype="multipart/form-data"  id="form-editar-tarea" return="false">
            <div class="row">
            <input type="hidden" name="id" value="<?=$tarea["tarea_id"]?>">
            
                <div class="col l6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$tarea["tarea_nombre"]?>" >
                    </div>
                </div>
                <div class="col l6">
                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?=$tarea["tarea_descripcion"]?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="categoria" id="categoria">
                    <?php while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                            <option value="<?= $categoria["categoria_id"] ?>"  
                                <?php 
                                          if($categoria["categoria_id"]==$tarea["tarea_categoria_id"]){
                                            echo "selected";
                                        }else{
                                            echo "";
                                        }
                                ?>
                            ><?= $categoria["categoria_nombre"] ?></option>
                        <?php endwhile; ?>

                    </select>
                </div>

                <div class="form-group col l6">
                    <label for="">Fecha Inicio</label>
                    <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" readonly value="<?=$tarea["fecha_inicio"]?>" >
                </div>

                <div class="form-group col l6">
                    <label for="">Fecha fin</label>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin"  value="<?=$tarea["fecha_fin"]?>" >
                </div>


                <div class="form-group">
                    <label for="usuarios">Colaborador</label>

                    <select class="form-control" name="usuario" id="usuario">
                        <option value="null">Sin asignar</option>
                        <?php while ($usuario = mysqli_fetch_assoc($usuarios)) : ?>
                            <option value="<?= $usuario["usuario_id"] ?>"  
                                <?php 
                                          if($usuario["usuario_id"]==$tarea["tarea_usu_id"]){
                                            echo "selected";
                                        }else{
                                            echo "";
                                        }
                                ?>
                            ><?= $usuario["usuario_nombre"] ?></option>
                        <?php endwhile; ?>

                    </select>

                </div>

            </div>

            <button type="submit" class="btn btn-primary my-3" id="editar-tarea" name="editar-tarea">Editar tarea</button>
            <a  class="btn btn-dark my-3 " id="cerrarModal-edit" onclick="cerrarModalEdit()" name="">Cerrar ventana</a>
        </form>

    </div>

<?php }




?>