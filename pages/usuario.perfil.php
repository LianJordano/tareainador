<?php
include_once("../template/cabecera.php");
isUser();
?>
    
    <div class="contenedor-editar-perfil">
    
    
        <form action="usuario.editar.php" method="post">
            <h5>Tus datos</h5>
     
                <img src="https://w1.pngwing.com/pngs/348/1013/png-transparent-black-circle-user-symbol-login-user-profile-rim-black-and-white-line.png" alt="">

                <input type="hidden" name="aidi" value="<?=$_SESSION["credenciales"]["usuario_id"] ?>">
                
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text"
                    class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" readonly value="<?=$_SESSION["credenciales"]["usuario_nombre"] ?>" >
                </div>

                <div class="form-group">
                  <label for="">Apellidos</label>
                  <input type="text"
                    class="form-control" name="apellidos" id="" aria-describedby="helpId" placeholder="" readonly value="<?=$_SESSION["credenciales"]["usuario_apellidos"] ?>">
                </div>

                <div class="form-group">
                  <label for="">Correo</label>
                  <input type="text"
                    class="form-control" name="correo" id="" aria-describedby="helpId" placeholder="" value="<?=$_SESSION["credenciales"]["usuario_correo"] ?>">
                </div>

                <div class="form-group">
                  <label for="">Contraseña</label>
                  <input type="text"
                    class="form-control" name="password" id="" aria-describedby="helpId" placeholder="" value="<?=$_SESSION["credenciales"]["usuario_password"] ?>">
                </div>

                <button type="submit" class="btn btn-primary mt-2  b-block">Editar datos</button>
        <span></span>
        </form>
    
    
    </div>





<?php
include_once("../template/footer.php");
?>
