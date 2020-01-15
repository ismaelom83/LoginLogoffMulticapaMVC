
<?php
/**
  @author Ismael Heras Salvador
  @since 28/11/2019
 */
require '../core/validacionFormularios.php'; //importamos la libreria de validacion  
require '../config/constantes.php'; //requerimos las constantes para la conexion
define('OBLIGATORIO', 1); //constante que define que un campo es obligatorio.
define('NOOBLIGATORIO', 0); //constante que define que un campo NO es obligatorio.
//manejo de las variables del formulario
$aFormulario = ['usuario' => null,
    'password' => null];

//----------------------cookies-------------------------------------------------
//si no existe la cookie la creamos en español por defecto.
if (!isset($_COOKIE['idioma'])) {
    $idiomaCookie = "castellano";
    setcookie('idioma', $idiomaCookie, time() + 60 * 60 * 24 * 30);
    header("Location: login.php");
}
//ponemos el valor a la cookie dependiendo del idioma que hemos introducido.
if (isset($_GET["idioma"])) {
    $idiomaCookie = $_GET["idioma"];
    setcookie('idioma', $idiomaCookie, time() + 60 * 60 * 24 * 30); //creamos la cooki con una duracionde 30 dias
    header("Location: login.php"); //recargamos la pagina.
}


if (isset($_POST['salir'])) {//si pulsamos volver nos devuelve al protecto tema5
    header('Location: ../index.php');
    die();
}
//si pulsamos entrar entra en el if.
if (isset($_POST['entrar']) && $_POST['entrar'] == 'Entrar') {

    //el valor del array ahora es igual al de los campos recogidos en el formulario.
    $usuario = $aFormulario['usuario'] = $_POST['usuario'];
    $passwd = $aFormulario['password'] = $_POST['password'];

}

?>  
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../WEBBROOT/css/estilosEjer.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light load-hidden"  style="background-color: #e3f2fd;">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../../../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDWES/DWES.php">DWES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDWEC/DWEC.php">DWEC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDAW/DAW.php">DAW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDIW/DIW.php">DIW</a>
                    </li>  
                    <li class="nav-item">
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?idioma=english"><img src="../WEBBROOT/img/eng.jpg" alt="English"></a>
                        <a href="<?php echo $_SERVER['PHP_SELF'] ?>?idioma=castellano"><img src="../WEBBROOT/img/esp_1.jpg" alt="Castellano"></a>
                    </li>
                    <div>
                        <p>LoginLogoffMulticapaPOO</p>
                    </div>
                </ul >
            </div>
        </nav>            
    </header>
    <body>
        <main> 
            <?php
//estructura de control para sacar por pantalla dependiendo del idioma que allamos elegido.
            if (isset($_COOKIE['idioma']) && $_COOKIE['idioma'] == "castellano") {
                echo '<h1 class="login"><b>Inicio Sesion</b></h1>';
            }
            if (isset($_COOKIE['idioma']) && $_COOKIE['idioma'] == "english") {
                echo '<h1 class="login"><b>Log In</b></h1>';
            }

            if (isset($_POST['salir']) && $_POST['salir'] == 'Volver') {
                header('Location: ../../proyectoTema5/tema5.php');
            }
            if (isset($_POST['entrar']) && $_POST['entrar'] == 'Entrar') {
                echo '<p class="login-error">Usuario o Password Incorrectos</p><br>';
            }
            ?>
            <div class="wrap">
                <form action="" method="post">
                    <fieldset>
                        <label for="usuario">Usuario</label><br>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Introduce Usuario:" value="<?php
                        if (isset($_POST['usuario'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                            echo $_POST['usuario']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                        }
                        ?>">
                        <br>
                        <label for="password">Password</label><br>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Introduce Password:" value="<?php
                        if (isset($_POST['password'])) { //comprobamos si ha introducido algo en el campo y que el array de errores este a null
                            echo $_POST['password']; //aunque se muestre un campo mal el valor si es correcto se mantiene.
                        }
                        ?>">                       
                        <br>
                        <div class="botones2">
                            <input type="submit" name="entrar"  value="Entrar" class="form-control  btn btn-primary mb-1">
                            <br><br>
                            <input type="submit" name="salir"  value="Volver" class="form-control  btn btn-danger mb-1">
                        </div>
                    </fieldset>
                </form>
            </div>                       
            <br/>
            <br/>         
        </main>
        <?php
        //requerimos el footer al layout
        require_once 'Layout.php';
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
