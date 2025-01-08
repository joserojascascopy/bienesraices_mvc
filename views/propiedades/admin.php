<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php
        if($resultado) {
            $mensaje = mostrarMensaje($resultado);

            if ($mensaje) { ?> 
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php } 
        } ?>

    <h2>Propiedades</h2>
    <a class="boton boton-verde" href="propiedades/crear">Nueva Propiedad</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo ?> </td>
                    <td> <?php echo "$ " . $propiedad->precio; ?> </td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="./propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>