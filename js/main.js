( function( $ ) {
    $( document ).ready(function() {
        $('.one-time').slick({
            slidesToShow:1,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
        });
    });
} )( jQuery );

