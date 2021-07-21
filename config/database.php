<?php 

    define("HOST","localhost");
    define("USER","root");
    define("PASSWORD","");
    define("DBNAME","tareainador");

    try {
        $conexion = mysqli_connect(HOST,USER,PASSWORD,DBNAME);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


?>