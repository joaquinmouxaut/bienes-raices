document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    darkmode();
} )

function eventListeners() {
    const mobileMenu = document.querySelector( '.mobil-menu' );
    mobileMenu.addEventListener( 'click', navegacionResponsive );
}

function navegacionResponsive() {
    const navegacion = document.querySelector( '.navegacion' );
    navegacion.classList.toggle( 'mostrar' );
}

function darkmode() {
    const prefiereDarkMode = window.matchMedia( '(prefers-color-scheme: dark)' );

    if( prefiereDarkMode.matches ) {
        document.body.classList.add( 'dark-mode' );
    } else {
        document.body.classList.remove( 'dark-mode' );
    }

    prefiereDarkMode.addEventListener( 'change', function() {
        if( prefiereDarkMode.matches ) {
            document.body.classList.add( 'dark-mode' );
        } else {
            document.body.classList.remove( 'dark-mode' );
        }
    } );

    const botonDarkMode = document.querySelector( '.boton-dark-mode' )
    botonDarkMode.addEventListener( 'click', function() {
        document.body.classList.toggle( 'dark-mode' )
    } )
}