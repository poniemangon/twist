//sponsor registration 
function registerSponsor(action, method, data, savingType) {
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
			$('.sponsor-registration-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-sponsor/' + response.sponsorId;
						break;

						case '2':
                            window.location.href = url + '/sponsors-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.sponsor-registration-button').prop('disabled', false);
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

			$('.sponsor-registration-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#sponsor-registration-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.sponsor-registration-button:focus').attr('data-saving-type');

	registerSponsor(action, method, data, savingType);
});



//sponsor edition 
function editSponsor(action, method, data, savingType) {
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
			$('.sponsor-edition-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-sponsor/' + response.sponsorId;
						break;

						case '2':
                            window.location.href = url + '/sponsors-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.sponsor-edition-button').prop('disabled', false);
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

			$('.sponsor-edition-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#sponsor-edition-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.sponsor-edition-button:focus').attr('data-saving-type');

	editSponsor(action, method, data, savingType);
});



//delete sponsor
function deleteSponsor(action, method, data) {
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

$(document).on('click', '.delete-sponsor-button', function(){
	var sponsorId = $(this).attr('data-sponsor-id'),
	action = url + '/delete-sponsor/' + sponsorId,
	method = 'delete',
	data = null;

	deleteSponsor(action, method, data);
});