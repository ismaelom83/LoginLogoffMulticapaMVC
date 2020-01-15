<?php

require_once '../vista/vlogin.php';

$resultado['T01_CodUsuario'];
$resultado['T01_Password'];


$sentenciaSQL = "SELECT * FROM Usuario WHERE CodUsuario = :user AND Password = :hash";

?>
