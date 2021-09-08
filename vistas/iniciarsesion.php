<?php
session_start();

?>

<!DOCTYPE html> 
<html lang=es> 
    <head>
        <title>El carrusel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>   
    </head>
    <body>
        
        <form name="formUser" method="post" action="../controladores/controladorLogin.php" align="center">

            <div>
                <?php
                
                if(isset($_SESSION["mensaje"])){
                    echo '<h2>'.$_SESSION["mensaje"].'<h2/>';
                }

                ?>
            </div>

            <h3>Ingrese los datos del usuario para el login:<h3/>

            Usuario: <input type="text" name="user_name">
            <br>
            Password: <input type="password" name="password">
            <br><br>
            <input type="hidden" name="formulario" value="index">
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset">
        </form>

    </body>
</html>