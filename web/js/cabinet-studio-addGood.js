$(function(){
    // TODO посмотреть как передавать данные, если понадобится. http://getbootstrap.com/javascript/#modals-related-target
    $('.icon-circle.setting').click(function(){
        $('#photo-settings').modal();
    });

    // Добавление/удаление категории
    var categoryCount = 1;
    $('#addCategory').click(function(){
    	categoryCount++;
    	var baseSelect = $('#goodform-categories');
    	var options = baseSelect.children().clone();
    	var newSelect = $('<select name="GoodForm[categories][]">');
    	newSelect.append(options);

    	var li = $('<li class="multyField">');
    	var leftCol = $('<div class="left-col">');
		var centerCol = $('<div class="center-col">');
		var selectWrapper = $('<div class="select category">');
		li.append(leftCol).append(centerCol);
		centerCol.append(selectWrapper);
		var selectButton = $('<div class="select-button"><span class="caret"></span></div>');
		selectWrapper.append(newSelect).append(selectButton);

		li.css('display', 'none');
		$(this).parents('#add-button-line').before(li);
		li.fadeIn('slow');

		newSelect.selectmenu();
		selectButton.click(function(){
			var parent = $(this).parent();
			$('select', parent).selectmenu( "open" );
		});

		var delButton = $('<button type="button" class="deleteButton" id="deleteCategory" data-toggle="tooltip" data-placement="right" title="Убрать категорию">')
		li.append(delButton);

		var addButton = $(this);
		delButton.click(function(){
			li.fadeOut('slow', function(){
				categoryCount--;
				$(this).remove();
				addButtonState(addButton, categoryCount);
			});
		});
		addButtonState(addButton, categoryCount);
    });

	function addButtonState(addButton, count)
	{
		console.log(count);
		if (count >= 4) {
			addButton.attr('disabled', 'disabled');
			addButton.css('background', '#EAEAEA');
		} else {
			addButton.removeAttr('disabled');
			addButton.css('background', '#FFFFFF');
		}
	}

	// Выбор фотографий
	var dropBox = $('#dropbox');
	dropBox.click(function(){
		$('#photo-input').trigger('click');
	});

	dropBox.on('dragenter', function (e)
	{
		e.stopPropagation();
		e.preventDefault();
		$(this).addClass('ondrag');
	});
	dropBox.on('dragover', function (e)
	{
		$(this).removeClass('ondrag');
		e.stopPropagation();
		e.preventDefault();
	});
	dropBox.on('drop', function (e)
	{
		$(this).removeClass('ondrag');
		e.preventDefault();
		var files = e.originalEvent.dataTransfer.files;
		processFiles(files);
	});

	$('#photo-input').click(function(){
		processFiles(this.files)
	});

	function processFiles(files) {
    	var file = files[0];
    	console.log(files);
	}
});