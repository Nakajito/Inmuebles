<?php 

    require 'includes/funciones.php';

    
    incluirTemplate('header');
?>







    <main class="contenedor seccion">
        <h1>Contácto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
                <img src="build/img/destacada3.jpg" alt="Contacto" loading="lazy">
        </picture>
        <h2>Llene el formulario de contácto</h2>
        <form action="" method="post" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>
                
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu nombre">

                <label for="email">e-mail</label>
                <input type="email" name="email" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Tu teléfono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" placeholder="Mensaje"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Compra o Vende</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>-- Selecciona --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto">

            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Cómo desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefonoo">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono
                    ">

                    <label for="contactar-email">e-mail</label>
                    <input type="radio" name="contacto" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora para ser contactado</p>
                
                <label for="date">Fecha</label>
                <input type="date" name="
                fecha" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>






<?php 

incluirTemplate('footer');
?>