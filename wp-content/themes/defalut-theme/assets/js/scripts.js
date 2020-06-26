 jQuery(document).ready(function($){

$('#mais_produtos').click(function(e){ 
    $(this).html('carregando');
    e.preventDefault(); 
    var offset = 12;//$('.col-md-offset-1 col-md-10').length; //o ideal é dar uma id para essa div
    $.post(
        WPaAjax.ajaxurl,
        {
            action : 'mais_produtos',
            offset : offset
        },
        function( response ) {
            alert(response);
            $('.row-load-more').append( response );
        }
    );
    $(this).html('mais');
});

});