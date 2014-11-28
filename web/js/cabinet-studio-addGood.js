$(function(){
    // TODO посмотреть как передавать данные, если понадобится. http://getbootstrap.com/javascript/#modals-related-target
    $('.icon-circle.setting').click(function(){
        $('#photo-settings').modal();
    });

    // Добавление категории
    $('#addCategory').click(function(){
    	var baseSelect = $('#goodform-categories');
    	// 
    	// 
    	var options = baseSelect.children().clone();
    	// console.log(options);
    	var newSelect = $('<select name="GoodForm[categories][]">');
    	newSelect.append(options);
    	// console.log(newSelect);
    	// baseSelect.parent().append(newSelect);
    	var li = $('<li>');
    	var leftCol = $('<div class="left-col">');
		var centerCol = $('<div class="center-col">');
		var selectWrapper = $('<div class="select category">');
		li.append(leftCol).append(centerCol);
		centerCol.append(selectWrapper);
		var selectButton = $('<div class="select-button"><span class="caret"></span></div>');
		selectWrapper.append(newSelect).append(selectButton);
		$(this).parents('#add-button-line').before(li);
		newSelect.selectmenu();
		selectButton.click(function(){
			var parent = $(this).parent();
			$('select', parent).selectmenu( "open" );
		});
    });
});