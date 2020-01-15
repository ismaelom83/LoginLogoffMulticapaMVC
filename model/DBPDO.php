<?php


class DBPDO {
      
    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        require_once 'config/confDB.php';
        try {
            $miDB = new PDO(MAQUINA, USUARIO, PASSWD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($sentenciaSQL); //Preparamos la consulta.
            $consulta->execute($parametros); //Ejecutamos la consulta.
        } catch (PDOException $exception) {
            $consulta = null; //Destruimos la consulta.
            echo $exception->getMessage();
            unset($miDB);
        }
        return $consulta;
    }  
}

?>
