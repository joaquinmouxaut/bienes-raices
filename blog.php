<!DOCTYPE html>
<html lang="en">
<?php
    require 'includes/funciones.php';
    incluirTemplate( 'head' );
?>
<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <img src="/build/img/blog1.webp" alt="blog1">
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/21</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <img src="/build/img/blog2.webp" alt="blog2">
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>20/10/21</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <img src="/build/img/blog3.webp" alt="blog3">
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/21</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <img src="/build/img/blog4.webp" alt="blog4">
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>20/10/21</span> por: <span>Admin</span></p>
                    <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </main>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>