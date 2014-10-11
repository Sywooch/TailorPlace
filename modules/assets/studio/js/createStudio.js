function fillCities(countryId, fieldId, url)
{
	if (!countryId) {
		return 'error';
	}

    $.ajax({
    	url: url,
    	type: 'post',
    	data: {id: countryId},
    	success: function(data){
    		if(data) {
    			
    		}
    		console.log(data);
    	}
    });
}
