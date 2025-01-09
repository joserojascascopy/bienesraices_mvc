<main class="contenedor seccion">

    <h1>Actualizar Propiedad</h1>
    <a class="boton boton-verde" href="/admin">Volver</a>
    <!-- Mostrar mensaje de error en el DOM -->
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo "*" . $error ?>
        </div>
    <?php endforeach; ?>
    <!-- El atributo enctype="multipart/form-data" es necesario si queremos subir algun archivo al formulario, debemos habilitar cualquiera sea el lenguaje backend para poder leer los archivos  -->
    <form class="form" method="POST" enctype="multipart/form-data"> <!-- Action nos envia los datos del submit a la página (o archivo) para poder leerlas -->
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar" class="boton boton-verde">
    </form>

</main> <!-- main -->