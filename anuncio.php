<!DOCTYPE html>
<html lang="en">
<?php
    require 'includes/funciones.php';
    incluirTemplate( 'head' );
?>
<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>
        <img src="/build/img/destacada.webp" alt="destacada">
        <div class="resumen-propiedad">
            <p class="precio">$ 3.000.000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="/build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img src="/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img src="/build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id neque vel mauris porttitor maximus vitae nec nulla. Pellentesque vestibulum enim a volutpat bibendum. Duis ut libero quis odio consectetur pulvinar. Nunc finibus lacinia hendrerit. Donec vitae ante aliquet urna tempor dignissim a eu nibh. In ac massa diam. Aliquam sit amet gravida orci, nec ultricies leo. Praesent iaculis est at leo pretium, non aliquet sem ornare.</p>
            <p>Duis et est erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam justo leo, elementum eu orci sit amet, maximus porta tellus. Sed sed dolor at nibh tempor blandit. Quisque accumsan ante eget mattis pulvinar. Vestibulum sagittis facilisis lobortis. Suspendisse et interdum lacus. Ut sagittis sapien eu nisi sollicitudin placerat.</p>
        </div>
    </main>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>