$(function(){
	var opened = false;
	$('#agreement .how-be-this a').click(function(){
		if (opened === false) {
			$('#agreement-text').animate({height: 350}, 300);
			opened = true;
		} else {
			$('#agreement-text').animate({height: 100}, 300);
			opened = false;
		}
		return false;
	});
});