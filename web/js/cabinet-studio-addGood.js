$(function(){
    // TODO посмотреть как передавать данные, если понадобится. http://getbootstrap.com/javascript/#modals-related-target
    $('.icon-circle.setting').click(function(){
        $('#photo-settings').modal();
    });

    // Добавление категории
    $('#addCategory').click(function(){
    	var baseSelect = $('#goodform-categories');
    	// console.log(baseSelect);
    	var options = baseSelect.children().clone();
    	// console.log(options);
    	var newSelect = $('<select name="GoodForm[categories][]">');
    	newSelect.append(options);
    	// console.log(newSelect);
    	// baseSelect.parent().append(newSelect);
    	var wrapperBlock = baseSelect.parents('.multyField');
    	console.log(wrapperBlock);
    	var leftCol = $('<div class="left-col">');
		var centerCol = $('<div class="center-col">');
		centerCol.append(newSelect);
		newSelect.selectmenu();
		wrapperBlock.append(leftCol);
		wrapperBlock.append(centerCol);
    });
});