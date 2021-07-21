<?php 
session_start();
require_once("../config/database.php");

$idtarea = $_GET["id"];
$idUsuario = $_SESSION["credenciales"]["usuario_id"];
$sql = "UPDATE tareas set tarea_usu_id=$idUsuario WHERE tarea_id=$idtarea";
$resultado = mysqli_query($conexion,$sql);
header("Location:index.php");

?>