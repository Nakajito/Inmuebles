<?php 

    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>







    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quod, saepe ducimus ea autem praesentium quisquam impedit exercitationem aliquid cupiditate doloremque ut facilis repellendus consectetur qui repellat blanditiis voluptas tempore!</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis recusandae id excepturi quos deserunt placeat ut dolores.</p>

            </div>
        </div>


    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim perferendis dicta, accusamus hic excepturi odio veniam in ipsum expedita quam aperiam provident corporis et optio amet a ea asperiores aliquam.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim perferendis dicta, accusamus hic excepturi odio veniam in ipsum expedita quam aperiam provident corporis et optio amet a ea asperiores aliquam.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim perferendis dicta, accusamus hic excepturi odio veniam in ipsum expedita quam aperiam provident corporis et optio amet a ea asperiores aliquam.</p>
            </div>
        </div>
    </section>





<?php 

incluirTemplate('footer');
?>
