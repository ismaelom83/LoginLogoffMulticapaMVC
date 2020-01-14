<?php

class Usuario{
    
    private $codUsuario;
    private $descUsuario;
    private $password;
    private $perfil;
    private $ultimaConexion;
    private $contadorAccesos;
    
    function __construct($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos) {
        $this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->ultimaConexion = $ultimaConexion;
        $this->contadorAccesos = $contadorAccesos;
    }
    
    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getUltimaConexion() {
        return $this->ultimaConexion;
    }

    function getContadorAccesos() {
        return $this->contadorAccesos;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setUltimaConexion($ultimaConexion) {
        $this->ultimaConexion = $ultimaConexion;
    }

    function setContadorAccesos($contadorAccesos) {
        $this->contadorAccesos = $contadorAccesos;
    }



}



?>