<?php
    //Base de Datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar para obtener los vendedores
    $consulta = 'SELECT * FROM vendedores';
    $resultado = mysqli_query( $db, $consulta );

    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $banos = '';
    $estacionamiento = '';
    $vendedorId = '';

    //Ejecutar el codigo luego que el usuario envia el formulario
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        // echo '<pre>';
        // var_dump( $_POST );
        // echo '</pre>';

        echo '<pre>';
        var_dump( $_FILES );
        echo '</pre>';

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $banos = mysqli_real_escape_string( $db, $_POST['banos'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y,m,d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if( !$titulo ) {
            $errores[] = 'Debes añadir un titulo';
        }
        if( !$precio ) {
            $errores[] = 'Debes añadir un precio';
        }
        if( strlen( $descripcion < 50 ) ) {
            $errores[] = 'Debes añadir una descripcion y debe tener al menos 50 caracteres';
        }
        if( !$habitaciones ) {
            $errores[] = 'Debes añadir las habitaciones';
        }
        if( !$banos ) {
            $errores[] = 'Debes añadir los baños';
        }
        if( !$estacionamiento ) {
            $errores[] = 'Debes añadir los estacionamientos';
        }
        if( !$vendedorId ) {
            $errores[] = 'Debes añadir un vendedor';
        }
        if( !$imagen['name'] ) {
            $errores[] = 'Debes añadir una imagen';
        }

        //Validar por tamaño
        if( $imagen['size'] > 1000000 || $imagen['error'] ) {
            $errores[] = 'La imagen es muy pesada';
        }
        
        
        //Revisar que el array de errores este vacio
        if( empty( $errores ) ) {
            /* Subida de archivos */

            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            if( !is_dir( $carpetaImagenes ) ){
                mkdir( $carpetaImagenes );
            }

            //Generar un nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg';

            //Subir la imagen
            move_uploaded_file( $imagen['tmp_name'], $carpetaImagenes . $nombreImagen );


            //Insertar en la Base de Datos
            $query = "INSERT INTO propiedades ( titulo, precio, imagen, descripcion, habitaciones, banos, estacionamientos, creado, vendedorId ) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$banos', '$estacionamiento', '$creado', '$vendedorId' )";
            $resultado = mysqli_query( $db, $query );

            if( $resultado ) {
                //Redireccionar al usuario

                header( 'Location: /admin?resultado=1' );
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    require '../../includes/funciones.php';
    incluirTemplate( 'head' );
?>

<body>
    <?php incluirTemplate( 'header' ); ?>

    <main class="contenedor seccion">
        <h1>Crear propiedad</h1>

        <a href="/admin/index.php" class="boton-verde">Volver</a>

        <?php foreach( $errores as $error ): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach ?>

        <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <input type="textarea" name="descripcion" id="descripcion" placeholder="Descripcion Propiedad" value="<?php echo $descripcion ?>">
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Cantidad de Habitaciones"
                    min="1" max="9" value="<?php echo $habitaciones ?>">

                <label for="banos">Baños:</label>
                <input type="number" name="banos" id="banos" placeholder="Cantidad de Baños" min="1" max="9" value="<?php echo $banos ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento"
                    placeholder="Cantidad de Estacionamientos" min="1" max="9" value="<?php echo $estacionamiento ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">-- Seleccione --</option>
                    <?php while( $vendedor = mysqli_fetch_assoc( $resultado ) ): ?>
                        <option  <?php echo $vendedorId == $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?></option>
                    <?php endwhile ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </form>
    </main>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>