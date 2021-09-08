<?php

session_start();
$_SESSION["mensaje"] = "";

if($_POST['formulario'] == "index"){

    $user = trim($_POST['user_name']);
    $pass = trim($_POST['password']);

    if (empty($user) or empty($pass)){

        if(isset($_SESSION["mensaje"])){

            $_SESSION["mensaje"] = "debes ingresar el usuario y el password";
            header('location:../vistas/iniciarsesion.php');

        }

    }else {

        $conn = mysqli_connect("localhost", //el localhost
                                "userppi", //es el usuario de la base de datos
                                "ppi123", //el password del usuario de la base de datos
                                "ppi") or die('No es posible conectar'); //el nombre de la base de datos
        
        $resultado_sql = mysqli_query($conn, 
        "SELECT id, nombre, tipo FROM login_user WHERE user_name LIKE '".
        $_POST['user_name']."' and pass LIKE '".$_POST['password']."'");
        
        $registro = mysqli_fetch_array($resultado_sql);
        $tipousuario = $registro['tipo'];
        
        if($tipousuario == "administrador"){

            $_SESSION["id_session"] = $registro['id']."1000";
            $_SESSION["nombre_usuario"] = $registro['nombre'];
            $_SESSION["mascota"] = "el pollo pinki";
            $carrito = array();
            $_SESSION["carrito_de_compras"] = $carrito;
            header('location:../vistas/administrador.php');

        }elseif($tipousuario == "usuario"){

            $_SESSION["id_session"] = $registro['id']."1000";
            $_SESSION["nombre_usuario"] = $registro['nombre'];
            $_SESSION["mascota"] = "el pollo pinki";
            $carrito = array();
            $_SESSION["carrito_de_compras"] = $carrito;
            header('location:../vistas/usuario.php');

        } else {

            if (isset($_SESSION["mensaje"])){

                $_SESSION["mensaje"] = "corregir usuario o el password, son invalidas ";
                header ("location:../vistas/iniciarsesion.php");

            }

        }

    }
}
?>
