<?php
session_start(); 
require_once("../config/database.php");

if(isset($_POST)){

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $aidi = $_POST["aidi"];

    $sql = "UPDATE usuarios SET usuario_correo='$correo',usuario_password='$password' WHERE usuario_id=$aidi";
    $resultado = mysqli_query($conexion,$sql);

    $_SESSION["credenciales"]["usuario_password"]=$password;
    $_SESSION["credenciales"]["usuario_correo"]=$correo;

    header("Location:usuario.perfil.php");


}

?>