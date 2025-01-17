<main class="contenedor seccion">
    <?php include 'iconos.php'; ?>
</main> <!-- main -->

<section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>

    <?php
    include 'cards.php';
    ?>

    <div class="boton-anuncios">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo en la brevedad</p>
    <a href="/contacto" class="boton-amarillo">Contactános</a>
</section> <!-- .imagen-contacto -->

<section class="contenedor seccion seccion-blog">
    <div class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen-blog">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="Imagen Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>25/09/2024</span> por: <span>Admin</span></p>
                    <p>
                        Consejos para contruir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero
                    </p>
                </a>
            </div>
        </article> <!-- .entrada-blog -->
        <article class="entrada-blog">
            <div class="imagen-blog">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="Imagen Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>25/09/2024</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                        darle vida a tu espacio</p>
                </a>
            </div>
        </article> <!-- .entrada-blog -->
    </div> <!-- .blog -->
    <div class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonio">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron
                cumple con todas mis expectativas.
            </blockquote>
            <p>- José Arturo Rojas Casco</p>
        </div>
    </div> <!-- .testimoniales -->
</section> <!-- .seccion-blog -->