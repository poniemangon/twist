//extra functions
$(document).on('click', '#update-faqs-positions-button', function() {
    var action = url + '/update-faqs-positions';
    var method = 'post';
    
    var faqsPositions = new Array(),
    index = 0;

    $.each($('.faq-order-tbody tbody tr'), function() {
        faqsPositions.push({
        	'page': $(this).find('input[name="pageReference[]"]').attr('data'),
            'id': $(this).find('input[name="faqId[]"]').attr('data'),
            'position': index
        });

        index = index + 1;
    });

    faqsPositions = JSON.stringify(faqsPositions);

    var formData = new FormData();
    formData.append('faqsPositions', faqsPositions);

    updateFaqsPositions(action, method, formData);
});

function updateFaqsPositions(action, method, formData) {
    $.ajax({
        url: action,
        type: method,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        beforeSend: function() {
            $('#update-faqs-positions-button').prop('disabled', true);
            $('#update-faqs-positions-button').text('Processing...');
        },
        success: function(resp) {
            if (resp.success) {
                swal({
                    title: 'Message', 
                    text: resp.message, 
                    type: 'success'
                });
            } else {
                swal({
                    title: 'Error', 
                    text: resp.message, 
                    type: 'error'
                });
            }

            $('#update-faqs-positions-button').prop('disabled', false);
            $('#update-faqs-positions-button').text('Confirm');
        },
        error: function(xhr) {
            $.each(xhr.responseJSON.errors, function(key, value) {
                swal({
                    title: 'Error', 
                    text: value, 
                    type: 'error'
                });
            });

            $('#update-faqs-positions-button').prop('disabled', false);
            $('#update-faqs-positions-button').text('Confirm');
        }
    });
}



//faq registration 
function registerFaq(action, method, data, savingType) {
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
			$('.faq-registration-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-faq/' + response.faqId;
						break;

						case '2':
                            window.location.href = url + '/faqs-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.faq-registration-button').prop('disabled', false);
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

			$('.faq-registration-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#faq-registration-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.faq-registration-button:focus').attr('data-saving-type');

	registerFaq(action, method, data, savingType);
});



//faq edition 
function editFaq(action, method, data, savingType) {
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
			$('.faq-edition-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-faq/' + response.faqId;
						break;

						case '2':
                            window.location.href = url + '/faqs-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.faq-edition-button').prop('disabled', false);
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

			$('.faq-edition-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#faq-edition-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.faq-edition-button:focus').attr('data-saving-type');

	editFaq(action, method, data, savingType);
});



//delete faq
function deleteFaq(action, method, data) {
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

$(document).on('click', '.delete-faq-button', function(){
	var faqId = $(this).attr('data-faq-id'),
	action = url + '/delete-faq/' + faqId,
	method = 'delete',
	data = null;

	deleteFaq(action, method, data);
});