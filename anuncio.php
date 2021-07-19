<?php 

    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>






    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
                <img src="build/img/destacada.jpg" alt="Imagen de la propiedad" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$ 3,000,000.00</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono casa" loading="lazy">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est molestias dolorum, quod reiciendis libero officia perspiciatis non nulla explicabo ab exercitationem laborum dolor vitae quos similique ea consectetur expedita consequuntur.
            Tempore officia voluptatum dolore aut a aperiam, quis libero quidem repellendus minus ipsum delectus incidunt hic nisi. Ullam quaerat ad corrupti beatae corporis possimus numquam! Alias consequuntur provident laborum error?
            Enim accusantium, at praesentium nihil veritatis quibusdam quia sapiente eius officia vitae doloribus aperiam dicta debitis, corrupti dolores fuga fugit quasi iure, sunt dolor! Autem harum officia commodi optio! Eligendi?
            At nihil molestias placeat laudantium soluta corporis harum dolores, pariatur cum minus quis doloremque consectetur deleniti mollitia distinctio provident, iste perspiciatis et obcaecati, saepe repudiandae. Tempore, delectus! Facilis, maxime enim.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio facilis ipsa ratione distinctio eveniet illum, est nostrum esse magnam debitis deleniti minima aperiam, qui rem nisi libero omnis. Fuga, corrupti.
            Quasi ea atque, esse fugiat consequuntur unde quam ab, optio beatae repellendus quibusdam voluptatem officiis necessitatibus nemo ipsum voluptatum excepturi ducimus quod. Nulla, eius quae doloremque deleniti ab sint soluta?
            Quisquam dolorum sunt pariatur reprehenderit, amet vitae rem, magni cumque tenetur corporis vel? Laudantium incidunt distinctio molestiae fugit, numquam iusto impedit, officiis velit, rerum adipisci suscipit! Molestiae accusamus ab at!</p>
        </div>

    </main>






<?php 

incluirTemplate('footer');
?>