<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php
    if ($resultado) {
        $mensaje = mostrarMensaje($resultado);

        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php }
    } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el formulario de contacto:</h2>

    <form class="form" action="/contacto" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="nombre">Nombre y Apellido</label>
            <input type="text" placeholder="Tú nombre y apellido" id="nombre" name="contacto[nombre]">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]"></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o compra:</label>
            <select id="opciones" name="contacto[opciones]">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" id="presupuesto" name="contacto[presupuesto]" placeholder="Tu precio o Presupuesto">

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado:</p>

            <div class="forma-contacto">

                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono">

                <label for="contactar-email">Email</label>
                <input name="contacto[contacto]" type="radio" value="email" id="contactar-email">

            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-contacto">

    </form>

</main> <!-- main -->

<!-- Validación lado servidor y cliente. "required" -->