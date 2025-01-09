<main class="contenedor seccion">

    <h1>Registrar Vendedor/a</h1>
    <a class="boton boton-verde" href="/admin">Volver</a>
    <!-- Mostrar mensaje de error en el DOM -->
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo "*" . $error ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/vendedores/crear">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Registrar Vendedor/a" class="boton boton-verde">
    </form>

</main> <!-- main -->
