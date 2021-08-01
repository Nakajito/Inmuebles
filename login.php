<?php 
    //base de datos
    require 'includes/config/databases.php';
    $db = conectarDB();

    //autenticar usuario
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );

        if (!$email) {
            $errores [] = "El email es obligatorio o no es válido";
        }

        if (!$password) {
            $errores [] = "El password es obligatorio";
        }

        if (empty($errores)) {
            //revisar el usuario
            $query = " SELECT * FROM usuarios WHERE email = '${email}' ";
            $resultado = mysqli_query($db, $query);
            if ($resultado->num_rows) {
                //revisar el password
                $usuario = mysqli_fetch_assoc($resultado);
                $auth = password_verify($password, $usuario['password']);
                if ($auth) {
                    //usuario autenticado
                    session_start();

                    //arreglo de sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    header('Location: /admin');
                } else {
                    $errores [] = "El password es incorrecto";
                }
            } else {
                $errores [] = "El usuario no existe";
            }
        }
    }

    //incluye header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>
                
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Tu email" required >
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Tu Contraseña" required>
                
            </fieldset>
            <input type="submit" value="Iniciar Sesión"  class="boton boton-verde">
        </form>
    </main>





<?php 

incluirTemplate('footer');
?>