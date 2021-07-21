<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="librerias/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  

    <div class="container">

        <div class="form-login">

            <h2 style="margin-bottom:17px">Iniciar Sesion</h2>
            <form  action="pages/usuarios.php" method="POST">
                <div class="form-group">
                    <label for="correo">Correo Electronico</label>
                    <input type="email" class="form-control" id="correo" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
                </div>

                <button type="submit" class="btn btn-success mt-3" name="iniciar-sesion" >Iniciar Sesion</button>
            </form>
        </div>
    </div>
</body>

</html>