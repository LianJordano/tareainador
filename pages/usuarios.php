<?php 
session_start();
    include_once("../config/database.php");
    if(isset($_POST["iniciar-sesion"])){

        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;

        if($email==null || $password==null){
            header("Location:../index.php");
        }else{

            $sql = "SELECT * FROM usuarios WHERE usuario_correo='$email' AND usuario_password = '$password' ";
            $resultado = mysqli_query($conexion,$sql);
            $validarUsuario1 = mysqli_num_rows($resultado);

        
           if($validarUsuario1==1){
                $resultado = mysqli_fetch_assoc($resultado);
                $_SESSION["credenciales"]=$resultado;
                if($_SESSION["credenciales"]["usuario_rol"]=="admin"){
                    $_SESSION["admin"]="administrador";
                }

                if(!isset($_SESSION["admin"])){
                    header("Location:index.php");
                }else{
                    header("Location:../administrador/pages/index.php");
                }

                
            }else{
                header("Location:../index.php");
            }
            
        }

    }



?>