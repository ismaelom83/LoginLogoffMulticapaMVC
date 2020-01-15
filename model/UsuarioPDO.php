<?php

class UsuarioPDO {

    public function validarUsuario($codUsuario, $password) {

        $consulta = "select * from T01_Usuarios where T01_CodUsuario=? and T01_Password=?"; //Creacion de la consulta.
        $arrayUsuarios = [];
        $resConsulta = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $password]); //Ejecutamos la consulta.
        if ($resConsulta->rowCount() == 1) { //Comprobamos si se han obtenido resultados en la consulta.
            $resFetch = $resConsulta->fetchObject();

            $arrayUsuarios['CodUsuario'] = $resFetch->T01_CodUsuario;
        $_SESSION['descUsuario'] = $arrayUsuarios['DescUsuario'] = $resFetch->T01_DescUsuario;
            $arrayUsuarios['Password'] = $resFetch->T01_Password;
            $arrayUsuarios['Perfil'] = $resFetch->T01_Perfil;
            $arrayUsuarios['ContadorAccesos'] = $resFetch->T01_NumAccesos;
            $arrayUsuarios['UltimaConexion'] = $resFetch->T01_FechaHoraUltimaConexion;
            
        }
        return $arrayUsuarios;
    }

}
?>

