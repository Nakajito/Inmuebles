<?php 

    // obtener el id de la propiedad a modificar
    $id = $_GET['id'];
    // validar que el id sea numerico
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header('Location: /admin');
    }




// Base de datos
require '../../includes/config/databases.php';
    $db = conectarDB();

    //consulta datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);
    

    //consultar vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //mensajes de error
    $errores = [];
    
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorid'];
    $imagenPropiedad = $propiedad['imagen'];

    //despues de enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";


        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //asignar files hacia una variable
        $imagen = $_FILES['imagen'];


        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if (!$precio) {
            $errores[] = "Precio Obligatorio";
        }

        if (strlen( $descripcion ) < 50 ) {
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if (!$habitaciones) {
            $errores[] = "El número de habitaciones es obligatorio";
        }

        if (!$wc) {
            $errores[] = "El número de baños es obligatorio";
        }

        if (!$estacionamiento) {
            $errores[] = "El número de estacionamientos es obligatorio";
        }

        if (!$vendedorId) {
            $errores[] = "El nombre del vendedor es obligatorio";
        }


        //validar tamaño
        $medida = 1000 * 1000;

        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }


        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";


        //revisar errores vacio
        if (empty($errores)) {
            
            // Subida de archivos

            // //crear carpeta
            // $carpetaImagenes = '../../imagenes/';
            // if (!is_dir($carpetaImagenes)) {
            //     mkdir($carpetaImagenes);
            // }

            // //generar nombre unico
            // $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


            // //subir imagen
            // move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );


            //insertar en la base de datos
            $query = " UPDATE propiedades SET titulo = '${titulo}',precio = ${precio},descripcion = '${descripcion}',habitaciones = ${habitaciones},estacionamiento = ${estacionamiento},vendedorId = ${vendedorId} WHERE id = ${id} ";

            // echo "$query";

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                // echo "Insertado correctamente";
                header('Location:/admin?resultado=2');
            }
        }


    }
    


    require '../../includes/funciones.php';
    incluirTemplate('header');
?>







    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        
        <?php endforeach; ?>

        <form class="formulario" method="post" enctype="multipart/form-data">
        
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo de propiedad" value="<?php echo $titulo ?>">

                <label for="precio">Precio:</label>
                <input type="number" min="0" name="precio" id="precio" value="<?php echo $precio ?>">

                <label for="imagen">Imagen</label>
                <input type="file"  id="imagen" accept="image/jpeg, image/png" name="imagen">
                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="" class="imagen-small">

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" ><?php echo $descripcion ?></textarea>

            </fieldset>

            <fieldset>

                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" name="habitaciones" id="habitaciones" min="1" max="9" value="<?php echo $habitaciones ?>">
                
                <label for="wc">Baños</label>
                <input type="number" name="wc" id="wc" min="1" max="9" value="<?php echo $wc ?>">
                
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" name="estacionamiento" id="estacionamiento" min="1" max="9" value="<?php echo $estacionamiento ?>">

            </fieldset>

            <fieldset>
            
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option value="" >--Selecciona un vendedor--</option>

                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?> 
                    
                    <option <?php $vendedorId === $row ? 'selected' : ''; ?> value=" <?php echo $row['id']; ?> "> <?php echo $row['nombre'] . " " . $row['apellido']; ?> </option>

                <?php endwhile; ?>
            </select>
            
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>
    </main>







<?php 
incluirTemplate('footer');
?>