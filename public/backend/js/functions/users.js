//user login
function loginUser(action, method, data){
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
		beforeSend: function(){
			$('#user-login-button').prop('disable', true);
		},
		success: function(response) {
			if (response.success) {
			 	window.location.href = url + '/pricings-list';
			} else {
			 	swal({
					title: 'Ups...',
					text: response.message,
					type: 'warning'
				});

				$('#user-login-button').prop('disable', false);
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

			$('#user-login-button').prop('disable', false);
		}
	});
}

$(document).on('submit','#user-login-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this);

	loginUser(action, method, data);
});



//user registration 
function registerUser(action, method, data, savingType) {
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
			$('.user-registration-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-user/' + response.userId;
						break;

						case '2':
                            window.location.href = url + '/users-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.user-registration-button').prop('disabled', false);
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

			$('.user-registration-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#user-registration-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.user-registration-button:focus').attr('data-saving-type');

	registerUser(action, method, data, savingType);
});



//edit User 
function editUser(action, method, data, savingType) {
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
		beforeSend: function(){
			$('.user-edition-button').prop('disabled', true);
		},
		success: function(response) {
			if (response.success){
				swal({
					title: 'Message',
					type: 'success',
					text: response.message
				}).then(function(){
					switch (savingType){
						case "1":
                            window.location.href = url + '/edit-user/' + response.userId;
						break;

						case "2":
                            window.location.href = url + '/users-list';
						break;
					}
				});
			} else {
				swal({
					title: 'Error',
					type: 'warning',
					text: response.message
				});

				$('.user-edition-button').prop('disabled', false);
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

			$('.user-edition-button').prop('disabled', false);
		}
	});

}

$(document).on('submit','#user-edition-form', function(event){
	event.preventDefault();

	var action = $(this).attr('action'),
	method = $(this).attr('method'),
	data = new FormData(this),
	savingType = $('.user-edition-button:focus').attr('data-saving-type');

	editUser(action, method, data, savingType);
});



//delete User
function deleteUser(action, method, data) {
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

$(document).on('click', '.delete-user-button', function(){
	var userId = $(this).attr('data-user-id'),
	action = url + '/delete-user/' + userId,
	method = 'delete',
	data = null;

	deleteUser(action, method, data);
});