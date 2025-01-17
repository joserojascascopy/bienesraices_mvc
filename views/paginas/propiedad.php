<main class="contenedor-anuncio">
    <h1><?php echo $propiedad->titulo; ?></h1>
    <div class="auncio">
        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio 3">
        <div class="contenido-anuncio">
            <p class="precio">$ <?php echo number_format($propiedad->precio); ?></p>
            <ul class="iconos-anuncio">
                <li class="icono">
                    <img src="build/img/icono_wc.svg" alt="Icono WC">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li class="icono">
                    <img src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li class="icono">
                    <img src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad->descripcion; ?></p>
        </div> <!-- .contenido-anuncio -->
    </div> <!-- .anuncio -->
</main> <!-- main -->