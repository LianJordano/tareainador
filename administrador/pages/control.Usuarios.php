<?php 
session_start();
    require_once("../../config/database.php");
    if(isset($_POST)){
        
        $errores = [];
        if(isset($_POST["crear-usu"])){


            if($_POST["nombre"]!=""){
                $nombre = $_POST["nombre"];
            }else{
                $nombre = null;
                $errores["error-nombre"]="Campo nombre vacio";
            }

            if($_POST["apellidos"]!=""){
                $apellidos = $_POST["apellidos"];
            }else{
                $apellidos = null;
                $errores["error-apellidos"]="Campo apellidos vacio";
            }

            if($_POST["correo"]!=""){
                $correo = $_POST["correo"];
            }else{
                $correo = null;
                $errores["error-correo"]="Campo correo vacio";
            }


            if($_POST["password"]!=""){
                $password = $_POST["password"];
            }else{
                $password = null;
                $errores["error-password"]="Campo password vacio";
            }


            if($nombre!=null && $apellidos!=null && $correo!=null && $password!=null){

                $sql = "INSERT INTO usuarios (usuario_nombre,usuario_apellidos,usuario_correo,usuario_password) VALUES('$nombre','$apellidos','$correo','$password') ";


                $resultado = mysqli_query($conexion,$sql);

                if($resultado){
                    $_SESSION["registro"]["exito"]="El usuario ha sido creado exitosamente";

                    header("location:usuariosCrear.php");

                }else{  

                    $_SESSION["registro"]["exito"]="Hubo un fallo al crear el usuario";
                    header("location:usuariosCrear.php");

                }

            }else{

                header("location:usuariosCrear.php");

                $_SESSION["errores"]=$errores;
            }

        }

    }


    if(isset($_GET) && @$_GET["a"]=="elim"){

        $id =$_GET["id"];
        $sql="DELETE FROM usuarios WHERE usuario_id=$id";
        $resultado = mysqli_query($conexion,$sql);
        header("Location:usuariosConsul.php");
    }


    if(isset($_POST) && isset($_POST["editar-usu"])){

        $aidi=$_POST["aidi"];
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $correo=$_POST["correo"];
        $password=$_POST["password"];

        $sql = "UPDATE usuarios SET  usuario_nombre='$nombre', usuario_apellidos='$apellidos', usuario_correo='$correo', usuario_password='$password' WHERE usuario_id='$aidi'";

        $resultado = mysqli_query($conexion,$sql);

        header("Location:usuariosConsul.php");

    }



?>