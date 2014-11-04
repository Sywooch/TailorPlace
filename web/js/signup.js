$(function(){
	var opened = false;
	$('#agreement .how-be-this a').click(function(){
		if (opened === false) {
			$('#agreement-text').animate({height: 350}, 300);
            $(this).prev('span').text('↑');
            $(this).text('Свернуть');
			opened = true;
		} else {
			$('#agreement-text').animate({height: 100}, 300);
            $(this).prev('span').text('↓');
            $(this).text('Развернуть');
			opened = false;
		}
		return false;
	});
});