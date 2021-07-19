<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
    
    <header class="header <?php echo $inicio ?'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/logo.svg" alt="icono menu responsivo">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="modo oscuro" class="dark-mode-boton">

                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contácto</a>
                    </nav>
                </div>
            </div> <!--  .barra -->
        </div>
    </header>