<?php 
session_start();
    require_once("../../config/database.php");
    if(isset($_POST)){
        
        if(isset($_POST["crear-tarea"])){
          
            $nombre=$_POST["nombre"];
            $descripcion=$_POST["descripcion"];
            $categoria=$_POST["categoria"];
            $fecha_ini=$_POST["fecha_ini"];
            $fecha_fin=$_POST["fecha_fin"];
            if($_POST["usuario"]==""){
                $sql = "INSERT INTO tareas (tarea_nombre,tarea_descripcion,tarea_categoria_id,fecha_inicio,fecha_fin,tarea_usu_id,tarea_estado) VALUES('$nombre','$descripcion','$categoria','$fecha_ini','$fecha_fin',NULL,'ACTIVO') ";
            }else{
              $usuario=$_POST["usuario"];
            $sql = "INSERT INTO tareas (tarea_nombre,tarea_descripcion,tarea_categoria_id,fecha_inicio,fecha_fin,tarea_usu_id,tarea_estado) VALUES('$nombre','$descripcion','$categoria','$fecha_ini','$fecha_fin','$usuario','ACTIVO') ";
            }
            
            $resultado = mysqli_query($conexion,$sql);
            if($resultado){

                header("location:tareasConsul.php");
            }
            
        }

    }


   if(isset($_GET) && @$_GET["a"]=="elim"){

        $id =$_GET["id"];
        $sql="DELETE FROM tareas WHERE tarea_id=$id";
        $resultado = mysqli_query($conexion,$sql);
        header("Location:tareasConsul.php");
    }

 

 
    if(isset($_POST) && isset($_POST["editar-tarea"])){

         $id=$_POST["id"];
         $nombre=$_POST["nombre"];
         $descripcion=$_POST["descripcion"];
         $categoria=$_POST["categoria"];
         $fecha_ini=$_POST["fecha_ini"];
         $fecha_fin=$_POST["fecha_fin"];
         $usuario=$_POST["usuario"];
         $usuarioReal = $_POST["usuario"]=="null" ? NULL : $_POST["usuario"];
         
     
        $sql = "UPDATE tareas SET  tarea_nombre='$nombre', tarea_descripcion='$descripcion',tarea_categoria_id='$categoria',fecha_inicio='$fecha_ini',fecha_fin='$fecha_fin',tarea_usu_id='$usuarioReal' WHERE tarea_id='$id'";

        $resultado = mysqli_query($conexion,$sql);

       header("Location:tareasConsul.php"); 

    }


    if(isset($_GET) && $_GET["accion"]=="aceptar"){

        $idTarea = $_GET["idTarea"];
        $sql = "UPDATE tareas SET tarea_estado='FINALIZADO' WHERE tarea_id=$idTarea";
        $resultado = mysqli_query($conexion,$sql);
        header("Location:revisarTareas.php");
        die();
    }

    
    if(isset($_GET) && $_GET["accion"]=="revocar"){

        $idTarea = $_GET["idTarea"];
        $sql = "UPDATE tareas SET tarea_estado='ACTIVO' WHERE tarea_id=$idTarea";
        $resultado = mysqli_query($conexion,$sql);
        header("Location:revisarTareas.php");
        die();
    }