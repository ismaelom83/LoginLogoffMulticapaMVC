<?php

if (isset($_REQUEST["salir"])) {
    unset($_SESSION['DAW209POOusuario']);
    header("location: index.php");
} else { 
    $vista = $vistas['inicio']; //le digo al controlador la vista de inicio
    $tituloVentana = "Inicio";
    require_once $vistas['layout']; //ESTO VA LO ULTIMO!
}
