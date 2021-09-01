<!DOCTYPE html>
<html lang="en">
<?php

    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();

    //Escribir el query
    $query = 'SELECT * FROM propiedades';

    //Consultar la BD
    $resultadoConsulta = mysqli_query( $db, $query );

    //Mostrar mensaje condicional 
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if($id) {
            //Eliminar archivo 
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/' . $propiedad['imagen']);

            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: /admin?resultado=3');
            }
        }

    }

    //Incluir template
    require '../includes/funciones.php';
    incluirTemplate( 'head' );
?>
<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if( $resultado == 1 ) : ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif( $resultado == 2 ) : ?>
            <p class="alerta exito">Anuncio actualizado correctamente</p>
        <?php elseif( $resultado == 3 ) : ?>
        <p class="alerta exito">Anuncio eliminado correctamente</p>
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

            <tbody><!-- Mostrar los resultados -->
                <?php while( $propiedad = mysqli_fetch_assoc( $resultadoConsulta ) ) : ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen']; ?>"></td>
                    <td>$<?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?> ">
                            <input type="submit" class="boton-amarillo-block" value="Eliminar" class="w-100">
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <?php
        //Cerrar la conexión
        mysqli_close( $db );

        incluirTemplate( 'footer' ); 
    ?>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>