<?php

function conectarDB() {
    $db = mysqli_connect( 'localhost', 'root', '', 'bienes_raices' );

    if( !$db ) {
        echo 'Error de conexión';
        exit;
    }

    return $db;
}