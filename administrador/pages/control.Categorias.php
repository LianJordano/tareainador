<?php 
session_start();
    require_once("../../config/database.php");
    if(isset($_POST)){
        
        if(isset($_POST["crear-cate"])){


            if($_POST["nombre"]!=""){
                $nombre = $_POST["nombre"];
            }else{
                $nombre = null;
            }

            if($_POST["descripcion"]!=""){
                $descripcion = $_POST["descripcion"];
            }else{
                $descripcion = null;
            }

           

            if($nombre!=null && $descripcion!=null ){

                $sql = "INSERT INTO categorias (categoria_nombre,categoria_descripcion) VALUES('$nombre','$descripcion') ";

                $resultado = mysqli_query($conexion,$sql);
                if($resultado){

                    header("location:categoriaConsul.php");
                }

            }

        }

    }


   if(isset($_GET) && @$_GET["a"]=="elim"){

        $id =$_GET["id"];
        $sql="DELETE FROM categorias WHERE categoria_id=$id";
        $resultado = mysqli_query($conexion,$sql);
        header("Location:categoriaConsul.php");
    }

 

    if(isset($_POST) && isset($_POST["editar-cate"])){

        $aidi=$_POST["aidi"];
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
     
        $sql = "UPDATE categorias SET  categoria_nombre='$nombre', categoria_descripcion='$descripcion' WHERE categoria_id='$aidi'";

        $resultado = mysqli_query($conexion,$sql);

        header("Location:categoriaConsul.php");

    } 



?>