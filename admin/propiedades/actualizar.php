<?php
    //Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var( $id, FILTER_VALIDATE_INT );
    if( !$id ) {
        header( 'Location: /admin' );
    }

    //Base de Datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query( $db, $consulta );
    $propiedad = mysqli_fetch_assoc( $resultado );

    //Consultar para obtener los vendedores
    $consulta = 'SELECT * FROM vendedores';
    $resultado = mysqli_query( $db, $consulta );

    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $banos = $propiedad['banos'];
    $estacionamiento = $propiedad['estacionamientos'];
    $vendedorId = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el codigo luego que el usuario envia el formulario
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        
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

        //Validar por tamaño
        $medida = 1000 * 1000; //1mb maximo
        if( $imagen['size'] > $medida ) {
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

            //Eliminar imagen previa
            $nombreImagen = '';
            if($imagen['name']) {
                unlink($carpetaImagenes . $propiedad['imagen']);

                //Generar un nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg';

                //Subir la imagen
                move_uploaded_file( $imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            } else {
                $nombreImagen = $propiedad['imagen'];
            }
            
            //Insertar en la Base de Datos
            $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, banos = ${banos}, estacionamientos = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id} ";
            // echo $query;

            $resultado = mysqli_query( $db, $query );

            if( $resultado ) {
                //Redireccionar al usuario

                header( 'Location: /admin?resultado=2' );
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
        <h1>Actualizar Propiedad</h1>

        <a href="/admin/index.php" class="boton-verde">Volver</a>

        <?php foreach( $errores as $error ): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach ?>

        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img class="imagen-small" src="/imagenes/<?php echo $imagenPropiedad ?>" alt="imagen propiedad">

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

            <input type="submit" value="Actualizar Propiedad" class="boton-verde">
        </form>
    </main>

    <?php incluirTemplate( 'footer' ); ?>

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>