$(function(){
    // Включение тултипов
    $('*[data-toggle="tooltip"]').tooltip();

    $('select').selectmenu();

    // Активация кнопки для селекторов
    $('.select-button').click(function(){
        var parent = $(this).parent();
        $('select', parent).selectmenu( "open" );
    });
});