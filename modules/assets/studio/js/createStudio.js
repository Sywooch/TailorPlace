var successCountry = false;
var successCity = false;

function checkCities(countryId, fieldId, url)
{
	if (!countryId) {
		return 'error';
	}

    $.ajax({
    	url: url,
    	type: 'post',
    	dataType: 'json',
    	data: {id: countryId},
    	success: function(data){
    		if(data[0]) {
    			$('#studioform-cityname').removeAttr('disabled');
    		} else {
                $('#studioform-cityname').val('').attr('disabled', 'disabled');
                $('.form-group.field-studioform-cityname').removeClass('has-error').removeClass('has-success');
                $('#studioform-cityid').val('');
            }
    	}
    });
}

$(function(){
    var id = $('#studioform-countryid').val();
    if (id > 0) {
        checkCities(id, 'studioform-cityname', '/cabinet/studio/get-city-list/');
    }
});
