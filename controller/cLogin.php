<?php

$entradaCorrecta = true; //Variable que controla el formularo
$codUsuario = null;
$password = null;
$objetoUsuario = null; //Esto es lo que crea cuando el validar usuario va bien
$tituloVentana = "Login"; //Titulo de la ventana
$aErrores = []; //Array que tendra los errores que se mostraran despues
if (isset($_POST["salir"])) {
    $_SESSION["DAW209POOusuario"] = $codUsuario;
            header("Location: ../DWES.php");
}
if (isset($_POST["enviar"])) {
    $aErrores["codUsuario"] = validacionFormularios::comprobarAlfaNumerico($_POST["usuario"], 250, 1, 1);
    $aErrores["password"] = validacionFormularios::comprobarAlfaNumerico($_POST["password"], 255, 4, 1);
    foreach ($aErrores as $key => $value) {
        if (!is_null($value)) {
            $entradaCorrecta = false;
        }
    }

    if ($entradaCorrecta) {
        $codUsuario = $_POST["usuario"];
        $password = hash("SHA256", $codUsuario . $_POST["password"]);
        $objetoUsuario = Usuario::validarUsuario($codUsuario, $password);

        if (!is_null($objetoUsuario)) {
            $_SESSION["DAW209POOusuario"] = $codUsuario;
            header("Location: index.php");
        } else {
            $vista = $vistas["login"];
            require_once $vistas["layout"];
        }
    } else {
        $vista = $vistas["login"];
        require_once $vistas["layout"];
    }
} else {
    $vista = $vistas["login"];
    require_once $vistas["layout"];
}
