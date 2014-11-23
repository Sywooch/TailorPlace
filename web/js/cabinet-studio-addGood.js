$(function(){
    // TODO посмотреть как передавать данные, если понадобится. http://getbootstrap.com/javascript/#modals-related-target
    $('.icon-circle.setting').click(function(){
        $('#photo-settings').modal();
    });

    // Добавление категории
    $('#addCategory').click(function(){
    	var baseSelect = $('#goodform-categories');
    	var options = baseSelect.childs();
    	console.log(options);
    });
});