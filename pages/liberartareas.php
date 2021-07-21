<?php 
require_once("../config/database.php");

    if(isset($_POST) && $_POST["type"]=="liberar"){
        $id = $_POST["idtarea"];
        $sql = "UPDATE tareas SET tarea_usu_id=null WHERE tarea_id=$id";
        $resultado = mysqli_query($conexion,$sql);
    }

    if(isset($_POST) && $_POST["type"]=="finalizar"){
        $id = $_POST["idtarea"];
        $sql = "UPDATE tareas SET tarea_estado='PENDIENTE' WHERE tarea_id=$id";
        $resultado = mysqli_query($conexion,$sql);
    }




?>