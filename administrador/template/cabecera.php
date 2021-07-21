<?php session_start();
require_once("../../helpers/helpers.php");
isAdmin();
require_once("../../config/database.php");

$sql = "SELECT * FROM tareas WHERE tarea_estado='PENDIENTE'";
$resultado = mysqli_query($conexion, $sql);
$conteo = mysqli_num_rows($resultado);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="../../librerias/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <script src="https://kit.fontawesome.com/36668bc8ff.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tareas-Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../../pages/index.php">Tablero
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="usuariosConsul.php">Consultar usuarios</a>
                            <a class="dropdown-item" href="usuariosCrear.php">Crear usuarios</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tareas</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="tareaCrear.php">Crear tareas</a>
                            <a class="dropdown-item" href="tareasConsul.php">Consultar tareas</a>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="categoriaConsul.php">Consultar categoria</a>
                            <a class="dropdown-item" href="categoriaCrear.php">Crear categoria</a>
                        </div>
                    </li>

                    <?php if ($conteo > 0) : ?>

                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" style="color:white" href="../pages/revisarTareas.php">Tareas por revisar
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php if (isset($_SESSION["credenciales"])) :  ?>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["credenciales"]["usuario_nombre"] . " " . $_SESSION["credenciales"]["usuario_apellidos"] ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../../pages/usuario.perfil.php">Mi perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../pages/usuarios.cerrar.php">Cerrar sesion</a>
                            </div>
                        </li>

                    <?php endif;  ?>


                </ul>

            </div>
        </div>
    </nav>

    <div class="container my-3">

        <div class="row">

            <div class="col l6">