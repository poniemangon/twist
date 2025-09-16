//extra functions
$(document).on('click', '.add-new-price-button', function() {

	$('.prices-table').append(

        '<tr>'+
                                                            
            '<td>'+
                
                '<input type="text" class="form-control price">'+

            '</td>'+

            '<td>'+
                
                '<input type="text" class="form-control period">'+

            '</td>'+

            '<td>'+
                
                '<button type="button" class="btn btn-rounded btn-custom remove-price-button"><i class="fa fa-remove"></i> Delete</button>'+

            '</td>'+

        '</tr>'

	);

});

$(document).on('click', '.remove-price-button', function() {

    $(this).closest('tr').remove();

});



$(document).on('click', '.add-new-pricing-feature-button', function() {

	$('.pricing-features-table').append(

        '<tr>'+
                                                            
            '<td>'+
                
                '<input type="text" class="form-control pricing-feature">'+

            '</td>'+

            '<td>'+
                
                '<button type="button" class="btn btn-rounded btn-custom remove-pricing-feature-button"><i class="fa fa-remove"></i> Delete</button>'+

            '</td>'+

        '</tr>'

	);

});

$(document).on('click', '.remove-pricing-feature-button', function() {

    $(this).closest('tr').remove();

});



//kid camp pricing registration 
function registerKidCampPricing(action, method, data, savingType) {
	$.ajax({
		url: action,
		type: method,
		data: data,
		dataType: 'json',
		contentType: false,
		cache: false,
		processData: false,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		beforeSend: function() {
			$('.kid-camp-pricing-registration-button').prop('disabled', true);
		},
		success: function(response) {
			if (response.success) {
				swal({
					title: 'Message',
					type: 'success',
					text: response.message
				}).then(function() {
					switch (savingType) {
						case '1':
                            window.location.href = url + '/edit-kid-camp-pricing/' + response.kidCampPricingId;
						break;

						case '2':
                            window.location.href = url + '/kids-camps-pricings-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.kid-camp-pricing-registration-button').prop('disabled', false);
			}
		},

		error: function(xhr) {
			$.each(xhr.responseJSON.errors, function(key, value) {
				swal({
					title: 'Ups...',
					text: value,
					type: 'warning'
				});
			});

			$('.kid-camp-pricing-registration-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#kid-camp-pricing-registration-form', function(event) {
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.kid-camp-pricing-registration-button:focus').attr('data-saving-type');

	var prices = new Array();

	$.each($('.prices-table tbody tr'), function() {
		prices.push({
            'price': $(this).find('.price').val(),
            'period': $(this).find('.period').val(),
		});
	});

	data.append('prices', JSON.stringify(prices));


	var pricingFeatures = new Array();

	$.each($('.pricing-features-table tbody tr'), function() {
		pricingFeatures.push({
            'feature': $(this).find('.pricing-feature').val()
		});
	});

	data.append('pricingFeatures', JSON.stringify(pricingFeatures));

	registerKidCampPricing(action, method, data, savingType);
});



//kid camp pricing edition 
function editKidCampPricing(action, method, data, savingType) {
	$.ajax({
		url: action,
		type: method,
		data: data,
		dataType: 'json',
		contentType: false,
		cache: false,
		processData: false,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		beforeSend: function() {
			$('.kid-camp-pricing-edition-button').prop('disabled', true);
		},
		success: function(response) {
			if (response.success) {
				swal({
					title: 'Message',
					type: 'success',
					text: response.message
				}).then(function() {
					switch (savingType) {
						case '1':
                            window.location.href = url + '/edit-kid-camp-pricing/' + response.kidCampPricingId;
						break;

						case '2':
                            window.location.href = url + '/kids-camps-pricings-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.kid-camp-pricing-edition-button').prop('disabled', false);
			}
		},

		error: function(xhr) {
			$.each(xhr.responseJSON.errors, function(key, value) {
				swal({
					title: 'Ups...',
					text: value,
					type: 'warning'
				});
			});

			$('.kid-camp-pricing-edition-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#kid-camp-pricing-edition-form', function(event) {
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.kid-camp-pricing-edition-button:focus').attr('data-saving-type');

	var prices = new Array();

	$.each($('.prices-table tbody tr'), function() {
		prices.push({
            'price': $(this).find('.price').val(),
            'period': $(this).find('.period').val(),
		});
	});

	data.append('prices', JSON.stringify(prices));


	var pricingFeatures = new Array();

	$.each($('.pricing-features-table tbody tr'), function() {
		pricingFeatures.push({
            'feature': $(this).find('.pricing-feature').val()
		});
	});

	data.append('pricingFeatures', JSON.stringify(pricingFeatures));

	editKidCampPricing(action, method, data, savingType);
});



//delete kid camp pricing
function deleteKidCampPricing(action, method, data) {
	$.ajax({
		url: action, 
		type: method,
		data: data,
		dataType: 'json',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function(response){
			if (response.success){
				swal({
					title: 'Message',
					type: 'success',
					text: response.message
				}).then(function(){
					location.reload();
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});
			}
		}
	});
}

$(document).on('click', '.delete-kid-camp-pricing-button', function(){
	var kidCampPricingId = $(this).attr('data-kid-camp-pricing-id'),
	action = url + '/delete-kid-camp-pricing/' + kidCampPricingId,
	method = 'delete',
	data = null;

	deleteKidCampPricing(action, method, data);
});