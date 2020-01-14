<?php

class DBPDO extends UsuarioPDO{
    
    private $sentenciaSQL;
    private $parametros;
    
    
    public static function ejecutarConsulta(entrada $sentenciaSQL,entrada $parametros){
        
    }
    
    function getSentenciaSQL() {
        return $this->sentenciaSQL;
    }

    function getParametros() {
        return $this->parametros;
    }

    function setSentenciaSQL($sentenciaSQL) {
        $this->sentenciaSQL = $sentenciaSQL;
    }

    function setParametros($parametros) {
        $this->parametros = $parametros;
    }


    
}

?>
