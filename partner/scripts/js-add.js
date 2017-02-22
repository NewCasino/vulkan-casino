$(document).ready(function(){
    
    //Карусель на главной
    $('#main-carousel .inner').carouFredSel({
        items: 1,
        scroll: 1,
        auto: false,
        pagination: '#main-carousel .pages'
    });
    
    //Выравнивание по высоте новостей и партнеров на главной
    /*$(function() {
        columnConform('.column-conform');
    });
    $(window).resize(function() {
        columnConform('.column-conform');
    });


    $('.field_with_error').hover(
       function(){ $(this).removeClass('field_with_error') }
    )*/

    
});

$(window).load(function(){

    $('.project-container').each( function() {
        $('.project-carousel', $(this)).carouFredSel({
            prev: $('.prev', $(this) ),
            next: $('.next', $(this) ),
            auto: {
                play: false
            },
            scroll : { fx : "crossfade" }
        });
    });
});