//extra functions
$(document).on('click', '.add-new-pricing-benefit-button', function() {

	$('.pricing-benefits-table').append(

        '<tr>'+
                                                            
            '<td>'+
                
                '<input type="text" class="form-control pricing-benefit">'+

            '</td>'+

            '<td>'+
                
                '<button type="button" class="btn btn-rounded btn-custom remove-pricing-benefit-button"><i class="fa fa-remove"></i> Delete</button>'+

            '</td>'+

        '</tr>'

	);

});

$(document).on('click', '.remove-pricing-benefit-button', function() {

    $(this).closest('tr').remove();

});



//pricing registration 
function registerPricing(action, method, data, savingType) {
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
			$('.pricing-registration-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-pricing/' + response.pricingId;
						break;

						case '2':
                            window.location.href = url + '/pricings-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.pricing-registration-button').prop('disabled', false);
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

			$('.pricing-registration-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#pricing-registration-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.pricing-registration-button:focus').attr('data-saving-type');

	var pricingBenefits = new Array();

	$.each($('.pricing-benefits-table tbody tr'), function() {
		pricingBenefits.push({
            'benefit': $(this).find('.pricing-benefit').val()
		});
	});

	data.append('pricingBenefits', JSON.stringify(pricingBenefits));

	registerPricing(action, method, data, savingType);
});



//pricing edition 
function editPricing(action, method, data, savingType) {
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
			$('.pricing-edition-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-pricing/' + response.pricingId;
						break;

						case '2':
                            window.location.href = url + '/pricings-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.pricing-edition-button').prop('disabled', false);
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

			$('.pricing-edition-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#pricing-edition-form', function(event) {
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.pricing-edition-button:focus').attr('data-saving-type');

	var pricingBenefits = new Array();

	$.each($('.pricing-benefits-table tbody tr'), function() {
		pricingBenefits.push({
            'benefit': $(this).find('.pricing-benefit').val()
		});
	});

	data.append('pricingBenefits', JSON.stringify(pricingBenefits));

	editPricing(action, method, data, savingType);
});



//delete pricing
function deletePricing(action, method, data) {
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

$(document).on('click', '.delete-pricing-button', function(){
	var pricingId = $(this).attr('data-pricing-id'),
	action = url + '/delete-pricing/' + pricingId,
	method = 'delete',
	data = null;

	deletePricing(action, method, data);
});