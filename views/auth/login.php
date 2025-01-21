<main class="contenedor-login seccion">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <p class="alerta error">*<?php echo $error; ?></p>
    <?php endforeach ?>

    <form method="POST" class="form" action="/login"> <!-- Podemos agregar el atributo novalidate para sacar la validacion predeterminada del front -->
        <fieldset>
            <legend>Email y Contraseña</legend>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tú e-mail" id="email" name="email"> <!-- Agregar el atributo required para que sea obligatorio los campos, parte de la validacion del front -->

            <label for="password">Nombre</label>
            <input type="password" placeholder="Tú contraseña" id="password" name="password">


        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-contacto">
    </form>
</main> <!-- main -->