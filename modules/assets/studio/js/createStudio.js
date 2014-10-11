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
    			$('#studiocreateform-cityname').removeAttr('disabled');
    		} else {
                $('#studiocreateform-cityname').val('').attr('disabled', 'disabled');
                $('.form-group.field-studiocreateform-cityname').removeClass('has-error').removeClass('has-success');
                $('#studiocreateform-cityid').val('');
            }
    	}
    });
}
