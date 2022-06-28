window.onload = isAuthorLogged;

function isAuthorLogged() {
	const isLogged = document.querySelector( '.logged-in' ) ? true : false;
    const isSingle = document.querySelector( '.single' );
    const entryContent = document.querySelector( '.entry-content' );
    const content = entryContent.innerHTML;

    console.log( content );

    if ( ! isLogged && isSingle ) {
        entryContent.innerHTML = '<p>Este Contenido esta disponible solo para usuarios registrados</p>';
    }

    if ( isLogged && isSingle ) {
        entryContent.innerHTML = content;
    }
};