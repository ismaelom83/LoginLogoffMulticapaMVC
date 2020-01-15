<?php
//requerimos la libreria de validacion.
require_once '../core/validacionFormularios.php';

//incluyo las clases del modelo
require_once 'modelo/Usuario.php';
require_once 'modelo/UsuarioPDO.php';
require_once 'modelo/DBPDO.php';

//creamos los arrays para acceder a las vistas y a los controladores

$controladores = [
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicio.php'
];

$vistas = [
    'layout' => 'view/layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicio.php'
];

?>

