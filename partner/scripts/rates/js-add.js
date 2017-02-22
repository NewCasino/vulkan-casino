$(document).ready(function(){
    
    //Выравнивание по высоте колонок в тарифах
    $(function() {
        columnConform('.column-conform');
    });
    $(window).resize(function() {
        columnConform('.column-conform');
    });
    
    $(function() {
        columnConform('.column-conform1');
    });
    $(window).resize(function() {
        columnConform('.column-conform1');
    });
    
});