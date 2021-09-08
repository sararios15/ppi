<?php
    session_start();
?>

<?php
        if(isset($_SESSION["id_session"]) 
        and isset($_SESSION["nombre_usuario"])
        and isset($_SESSION["mascota"])){
            echo '<h1>Bienvenida o Bienvenido: </h1>';

            $session = $_SESSION["id_session"];
            
            $usuario = $_SESSION["nombre_usuario"];
            
            $mascota = $_SESSION["mascota"];
            
            echo 'Sesion conectada: '.$session;
            
            echo '<br/>Hola '.$usuario .', cuentame como está tu mascota '. $mascota;
            
            echo '<br/><br/>';
            echo 'Hacer clic aquí para <a href="logout.php">salir.</a>';
        } else {
            header("location:pirata.php");
        }
        ?>

<!DOCTYPE html> 
<html lang=es> 
    <head>Inicio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>   
    </head>
    <body>
    <form action="../controladores/controlador.php" method="post" align=center>

        <fieldset>
            <legend>Tamaño del vaso de jugo de fruta</legend>
            <p>Seleccione un tamaño</p>
            <p>
                <input type="radio" name="size" id="tam_1" value="pequeno" >
                <label for="tam_1"> Pequeño </label>
            </p>
            <p>
                <input type="radio" name="size" id="tam_2" value="mediano" cheked>
                <label for="tam_2"> Mediano </label>
            </p>
            <p>
                <input type="radio" name="size" id="tam_3" value="grande">
                <label for="tam_3"> Grande </label>
            </p>
            <input type="hidden" name="formulario" value="formulario1" />
            <input type="submit" value="Siguiente"/>
        </fieldset>
    </form>

    </body>
</html>