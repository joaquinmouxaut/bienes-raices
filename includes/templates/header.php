<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a class="logo" href="/">
                    <img src="/build/img/logo.svg" alt="logo">
                </a>

                <div class="mobil-menu">
                    <img src="/build/img/barras.svg" alt="menu responsive">
                </div>

                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <img src="/build/img/dark-mode.svg" alt="dark-mode" class="boton-dark-mode">
                </nav>
            </div>

            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '' ?>
        </div>
    </header>