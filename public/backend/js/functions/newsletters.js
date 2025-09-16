function deleteNewsletter(action, type, data) {
    $.ajax({
    	url: action,
    	type: type,
    	data: data,
    	dataType: 'json',
    	headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
    	beforeSend: function() {
    		$('.delete-newsletter-button').prop('disabled', true);
    		$('.delete-newsletter-button').text('Deleting...');
    	},
    	success: function(response) {
    		if (response.success) {
    			swal({
					title: 'Message',
					type: 'success',
					text: response.message
				}).then(function() {
					location.reload();
				});
    		} else {
    			swal({
					title: 'Ups...',
					type: 'warning',
					text: response.message
				});

				$('.delete-newsletter-button').prop('disabled', false);
    		    $('.delete-newsletter-button').text('Delete');
    		}
    	} 
    })
}

$(document).on('click', '.delete-newsletter-button', function() {
	var newsletterId = $(this).attr('data-newsletter-id'),
	action = url + '/delete-newsletter/' + newsletterId,
	type = 'delete',
	data = null;

	deleteNewsletter(action, type, data);
});



//export newsletters
function exportNewsletters() {
    $.ajax({
        url: url + '/export-newsletters',
        type: 'post',
        data: null,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        beforeSend: function() {
            $('.newsletters-exporting-button').prop('disabled', true);
            $('.newsletters-exporting-button').html('<i class="fa fa-download"></i> Exporting...');
        },
        success: function(response) {

            if (response.success) {
                var $a = $('<a>');
                $a.attr('href', response.file);
                $('body').append($a);
                $a.attr('download', response.filename);
                $a[0].click();
                $a.remove();
            }

            $('.newsletters-exporting-button').prop('disabled', false);
            $('.newsletters-exporting-button').html('<i class="fa fa-download"></i> Export');
        },
        error: function(xhr) {
            $.each(xhr.responseJSON.errors, function(key, value) {
                swal({
                    title: 'Error', 
                    text: value, 
                    type: 'error'
                });
            });

            $('.newsletters-exporting-button').prop('disabled', false);
            $('.newsletters-exporting-button').html('<i class="fa fa-download"></i> Export');
        }
    });
}

$(document).on('click', '.newsletters-exporting-button', function() {
    exportNewsletters();
});