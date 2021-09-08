<?php
    session_start();
?>

<!DOCTYPE html> 
<html lang=es> 
    <head>Inicio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>   
    </head>
    <body>

        <?php

        unset($_SESSION["id_session"]);
        unset($_SESSION["nombre_usuario"]);

        $_SESSION = array();
        session_destroy();

        setcookie('tamano', '', time() - 3600, '/');
        setcookie('batido', '', time() - 3600, '/');
        setcookie('diabetes', '', time() - 3600, '/');

        header("location:../index.php");

        ?>


    </body>
</html>