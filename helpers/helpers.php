<?php 

        
            function killSession($sesion){
                unset($_SESSION[$sesion]);
            }

            function isUser(){

                if(!isset($_SESSION["credenciales"])){
                    header("location:../index.php");
                }

            }

            function isAdmin(){
                if(!isset($_SESSION["admin"])){
                    header("location:../pages/index.php");
                }
            }










?>