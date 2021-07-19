<!DOCTYPE html>
<html lang="en">
<?php
    $resultado = $_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    incluirTemplate( 'head' );
?>
<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if( $resultado == 1 ) : ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la Playa</td>
                    <td><img class="imagen-tabla" src="/imagenes/28899e3880e40c76f94698adb73e5257.jpg"></td>
                    <td>$12.000.000</td>
                    <td>
                        <a href="#" class="boton-amarillo-block">Eliminar</a>
                        <a href="#" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>