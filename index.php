<?php

//requerimos los ficheros de configuracion
require_once './config/confAplicacion.php';
require_once './config/confDB.php';

//iniciamos sesion o la continuamos
session_start();

if(isset($_SESSION['DAW209POOusuario'])){//si has iniciado sesion entra en el index
    if(isset($_GET['pagina'])){//si hay una pagina carga esa pagina con include
        include_once $controladores[$_GET['pagina']];  
    } else {
        include_once $controladores["inicio"]; //si no vas al inicio
    }  
}else {
    include_once $controladores["login"];//en caso contrario de que no hayas iniciado sesion vuelves al login 
}
?>