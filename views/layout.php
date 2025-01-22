<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img class="logo-header" src="/build/img/logo.svg" alt="Logo">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Menu de Hamburguesa">
                </div>
                <div class="nav-right">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login">Sign in</a>
                        <?php else : ?>
                            <a href="/logout">Cerrar sesión</a>
                        <?php endif; ?>
                    </nav> <!-- .navegacion -->
                    <div class="dark-mode">
                        <img src="/build/img/dark-mode.svg" alt="Boton Dark Mode">
                    </div> <!-- .dark-mode -->
                </div>
            </div> <!-- .barra -->

            <?php if (isset($inicio)) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>

        </div> <!-- .header -->
    </header>

    <body>
        <?php echo $contenido; ?>
    </body>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav> <!-- .navegacion -->
        </div> <!-- .contenedor-footer -->

        <?php
        $año = date('Y');
        ?>

        <p class="copyright">Todos los derechos reservados <?php echo $año ?> &copy;</p>
    </footer> <!-- footer -->

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>