<!DOCTYPE html>
<html lang="en">
<?php
    require '../includes/funciones.php';
    incluirTemplate( 'head' );
?>
<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    </main>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>