<?php
    include '../modelo/batido.php';

    session_start();
    
    if(isset($_SESSION["id_session"]) 
    and isset($_SESSION["nombre_usuario"])
    and isset($_SESSION["mascota"])){
        
        if($_POST['formulario'] == "formulario1"){

            $batido = new Batido();

            switch($_POST["size"]){
                case 'pequeno':
                    $batido->setPrecio(10000);
                break;
                case 'mediano':
                    $batido->setPrecio(12000);
                break;
                case 'grande':
                    $batido->setPrecio(15000);
                break;
            }

            $batido->setTamano($_POST["size"]);
            array_push($_SESSION["carrito_de_compras"], $batido);

            setcookie('tamano', $_POST["size"], time() + 600, '/');

            header('location:../vistas/formulario2.php');

        }elseif($_POST['formulario'] == "formulario2"){

            $batido = end ($_SESSION["carrito_de_compras"]);
            $batido->setTipoUsuario($_POST["diabetes"]);

            setcookie('diabetes', $_POST["diabetes"], time() + 600, '/');

            if($_POST['diabetes'] == "diabetico"){
                header('location:../vistas/formulario3.php');
            }else{
                header('location:../vistas/formulario4.php');
            }

        }elseif($_POST['formulario'] == "formulario3" or 
                $_POST['formulario'] == "formulario4"){

                    $batido = end ($_SESSION["carrito_de_compras"]);
                    $batido->setBatido($_POST["batido"]);

                    setcookie('batido', $_POST["batido"], time() + 600, '/');
                    header('location:../vistas/ordenfinal.php');
        }elseif($_POST['formulario'] == "terminar"){
            header('location:../vistas/logout.php');
        }elseif($_POST['formulario'] == "otro"){
            header('location:../vistas/inicio.php');
        } elseif($_POST['formulario'] == "cuenta") {
            header('location:../vistas/cuenta.php');
        }
        else {
            header("location:../vistas/inicio.php");
        }

    }else{
        header("location:../vistas/pirata.php");
    }

?>