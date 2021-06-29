<!DOCTYPE html>
<html lang="en">
<?php
    require 'includes/funciones.php';
    incluirTemplate( 'head' );
?>
<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <img class="foto" src="/build/img/nosotros.webp" alt="nosotros">
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id neque vel mauris porttitor maximus vitae nec nulla. Pellentesque vestibulum enim a volutpat bibendum. Duis ut libero quis odio consectetur pulvinar. Nunc finibus lacinia hendrerit. Donec vitae ante aliquet urna tempor dignissim a eu nibh. In ac massa diam. Aliquam sit amet gravida orci, nec ultricies leo. Praesent iaculis est at leo pretium, non aliquet sem ornare.</p>
                <p>Duis et est erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam justo leo, elementum eu orci sit amet, maximus porta tellus. Sed sed dolor at nibh tempor blandit. Quisque accumsan ante eget mattis pulvinar. Vestibulum sagittis facilisis lobortis. Suspendisse et interdum lacus. Ut sagittis sapien eu nisi sollicitudin placerat.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h2>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/build/img/icono1.svg" alt="icono seguridad">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum id a at officia et porro nulla itaque, soluta omnis illo sunt cupiditate dignissimos corporis natus perferendis iure debitis neque autem.</p>
            </div>

            <div class="icono">
                <img src="/build/img/icono2.svg" alt="icono precio">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum id a at officia et porro nulla itaque, soluta omnis illo sunt cupiditate dignissimos corporis natus perferendis iure debitis neque autem.</p>
            </div>

            <div class="icono">
                <img src="/build/img/icono3.svg" alt="icono tiempo">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum id a at officia et porro nulla itaque, soluta omnis illo sunt cupiditate dignissimos corporis natus perferendis iure debitis neque autem.</p>
            </div>
        </div>
    </section>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>