<?php 

    //importar la conexion

    require '../includes/config/databases.php';
    $db = conectarDB();

    //escribir el query
    $query = "SELECT * FROM propiedades";

    //consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);



    $resultado = $_GET['resultado'] ?? null;

    require '../includes/funciones.php';
    incluirTemplate('header');
?>



    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <!-- muestra mensaje por medio de la url y get -->
        <?php if (intval($resultado)===1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>
        

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>


        <!-- tabla de datos -->
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-- mostrar resultados de la BD -->

            <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta) ) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?> </td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagene de la propiedad" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <a href="" class="boton-rojo-block">Eliminar</a>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>

                <?php endwhile;  ?>
            </tbody>
        </table>


    </main>



    
    
    
<?php 

    // cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer');
?>