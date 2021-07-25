<?php 

    //importar la conexion

    require '../includes/config/databases.php';
    $db = conectarDB();

    //escribir el query
    $query = "SELECT * FROM propiedades";

    //consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);



    $resultado = $_GET['resultado'] ?? null;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            //elimina archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);
            
            //elimina propiedad
            $query = " DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('location: /admin?resultado=3');
            }
        }
    }

    require '../includes/funciones.php';
    incluirTemplate('header');
?>



    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <!-- muestra mensaje por medio de la url y get -->
        <?php if (intval($resultado)===1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif (intval($resultado)===2): ?>
                <p class="alerta exito">Anuncio actualizado correctamente</p>
        <?php elseif (intval($resultado)===3): ?>
                <p class="alerta error">Anuncio eliminado correctamente</p>
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
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" value="Eliminar" class=" boton-rojo-block">
                        </form>
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