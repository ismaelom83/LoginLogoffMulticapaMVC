<?php

//requerimos la configuracion de la base de datos
require_once 'confDB.php';

//nos conectamos  ala base de datos
  try {
        //conexion a la base de datos.
        $miBD = new PDO(MAQUINA, USUARIO, PASSWD);
        $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //try cacth por si falla la conexion.
    } catch (PDOException $excepcionPDO) {
        die("Error al conectarse a la base de datos");
    }


?>

