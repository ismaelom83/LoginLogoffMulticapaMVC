<?php


require_once '../controlador/clogin.php';

$codUsuario = $resultado['T01_CodUsuario'];
$passwor = $resultado['T01_Password'];

class UsuarioPDO  implements UsuarioDB{
  
   
    
  
    public function validarUsuario(entrada $codUsuario, entrada $passwor) {
        require_once 'DBPDO.php';
        require_once '../vista/vlogin.php';
        
        $sentencia =  new DBPDO();
        $sentencia->ejecutarConsulta();
        
        try{
          if ($oPDO->rowCount() == 1) {
            session_start();
            //almacenamos en la sesion los campos que queramos mostrar de la base de datos del usuario
            $_SESSION['usuarioDAW209AppLOginLogoffMulticapaPOO'] = $resultado['TO1_CodUsuario'];
            $_SESSION['descripcionDAW209AppLOginLogoffMulticapaPOO'] = $resultado['TO1_DescUsuario'];
            $_SESSION['perfilDAW209AppLOginLogoff'] = $resultado['TO1_Perfil'];
            $_SESSION['numeroConexiones'] = $resultado['T01_NumAccesos'] + 1;

            if ($_SESSION['numeroConexiones'] > 1) {//si el numero de conexiones es mayor de una entonces mostraremos la hora de la ultima conexion si no no podriamos al ser la primera
                $_SESSION['ultimaConexion'] = $resultado['T01_FechaHoraUltimaConexion'];
            }
            //consulta preparada para saber el numero de conexiones y lo almacenamos en la base datos.
            $sql = "UPDATE Usuario SET T01_NumAccesos=NumConexiones+1 WHERE TO1_CodUsuario=:codUsuario";
            //guardamos en una variable la sentencia sql
            $oPDO = $miBD->prepare($sql);
            $oPDO->bindParam(":codUsuario", $_SESSION['usuarioDAW209AppLOginLogoffMulticapaPOO']);
            $oPDO->execute();
            //con header nos redirreciona a programa.php        
            header('Location: vinicio.php');
        }
        //cath que se ejecuta si habido un error
    } catch (PDOException $excepcion) {
        echo "<h1>Se ha producido un error</h1>";
        //nos muestra el error que ha ocurrido.
        echo $excepcion->getMessage();
    } finally {
        unset($miBD); //cerramos la conexion a la base de datos.
    }
    }

}

?>

