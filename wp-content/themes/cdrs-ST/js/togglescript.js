jQuery( document ) . ready( function( $ ) {
	$('.togglehide').hide();
    $( '.toggleshow' ) . click( function() {
        $( this ) . next( '.togglehide' ) . slideToggle( 'fast' );
    } );
} );