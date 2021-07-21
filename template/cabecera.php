<?php
require_once("../helpers/helpers.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../librerias/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../pages/index.php">Tareas-App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../pages/index.php">Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tareas</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../pages/misTareas.php">Mis tareas</a>
                        </div>
                    </li>

                    <?php if (isset($_SESSION["credenciales"])) :  ?>

                        <li class="nav-item dropdown " >
                            <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["credenciales"]["usuario_nombre"] . " " . $_SESSION["credenciales"]["usuario_apellidos"] ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../pages/usuario.perfil.php?id=<?=$_SESSION["credenciales"]["usuario_id"]?>">Mi perfil</a>
                                <div class="dropdown-divider"></div>
                                <?php if(isset($_SESSION["admin"])): ?>
                                    <a class="dropdown-item" href="../administrador/pages/index.php">Ir a administrador</a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="../pages/usuarios.cerrar.php">Cerrar sesion</a>
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