<?php

require_once '../config/confAplicacion.php';
require_once '../controlador/clogin.php';

$sentenciaSQL;

$resultado['T01_CodUsuario'];
$resultado['T01_Password'];

$parametros = ['T01_CodUsuario' => null,
    'T01_Password' => null];


class DBPDO {
      
    public static function ejecutarConsulta(entrada $sentenciaSQL,entrada $parametros){     
        //almacenamos en una variable (objeto PDOestatement) la consulta preparada
        $oPDO = $miBD->prepare($sentenciaSQL);
        //blindeamos los parametros
        $oPDO->bindValue(':user', $parametros['T01_CodUsuario']);
        //la contraseña es paso, pero para resumirla -> sha + contraseña=concatenacion de nombre+password
        $oPDO->bindValue(':hash', hash('sha256', $parametros['T01_CodUsuario'] . $parametros['T01_Password']));
        $oPDO->execute();
        //almacenamos todos los datos de la consulta en un array para mostar por pantalla luego los datos del registro e l asesion del usuario.   
        return  $resultado = $oPDO->fetch(PDO::FETCH_ASSOC);   
    }   
}

?>
