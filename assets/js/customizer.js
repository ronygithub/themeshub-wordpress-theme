(function(){
    "use strict";
    
    wp.customize( 'th_display_header', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '.themeshub__header' ).hide() : $( '.themeshub__header' ).show();
        } );
    } );

    wp.customize('th_display_sidebar', function( value){
        value.bind(function( to ){
            false === to ? $('.main__sidebar').hide() : $('.main__sidebar').show();
        });
    });

    wp.customize('th_color_scheme' , function(value){
        value.bind(function(to){
            if('inverse' === to){
                $('body').css({
                    background: '#00ffae',
                    color: '#fff'
                });
            }else{
                $('body').css({
                    background: 'green',
                    color: '#000'
                });
            }
        });
    });
})(jQuery);