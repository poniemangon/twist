//table (twist supplier)
$(document).on('click', '.add-new-party-option-supply-button-01', function() {

	$('.party-option-supplies-table-01').append(

        '<tr>'+
                                                            
            '<td>'+
                
                '<input type="text" class="form-control party-option-supply-01">'+

            '</td>'+

            '<td>'+
                
                '<button type="button" class="btn btn-rounded btn-custom remove-party-option-supply-button-01"><i class="fa fa-remove"></i> Delete</button>'+

            '</td>'+

        '</tr>'

	);

});

$(document).on('click', '.remove-party-option-supply-button-01', function() {

    $(this).closest('tr').remove();

});



//table (customer supplier)
$(document).on('click', '.add-new-party-option-supply-button-02', function() {

    $('.party-option-supplies-table-02').append(

        '<tr>'+
                                                            
            '<td>'+
                
                '<input type="text" class="form-control party-option-supply-02">'+

            '</td>'+

            '<td>'+
                
                '<button type="button" class="btn btn-rounded btn-custom remove-party-option-supply-button-02"><i class="fa fa-remove"></i> Delete</button>'+

            '</td>'+

        '</tr>'

    );

});

$(document).on('click', '.remove-party-option-supply-button-02', function() {

    $(this).closest('tr').remove();

});



//table (prices)
$(document).on('click', '.add-new-party-option-price-button', function() {

    $('.party-option-prices-table').append(

        '<tr>'+
                                                            
            '<td>'+
                                                                
                '<input type="number" min="0" step="0.01" class="form-control party-option-price">'+

            '</td>'+
            
            '<td>'+
                
                '<input type="text" class="form-control party-option-description">'+

            '</td>'+

            '<td>'+
                
                '<button type="button" class="btn btn-rounded btn-custom remove-party-option-price-button"><i class="fa fa-remove"></i> Delete</button>'+

            '</td>'+

        '</tr>'

    );

});

$(document).on('click', '.remove-party-option-price-button', function() {

    $(this).closest('tr').remove();

});



//party option registration 
function registerPartyOption(action, method, data, savingType) {
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
            $('.party-option-registration-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-party-option/' + response.partyOptionId;
                        break;

                        case '2':
                            window.location.href = url + '/party-options-list';
                        break;
                    }
                });
            } else {
                swal({
                    title: 'Error',
                    type: 'warning',
                    text: response.message
                });

                $('.party-option-registration-button').prop('disabled', false);
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

            $('.party-option-registration-button').prop('disabled', false);
        }
    });

}

$(document).on('submit','#party-option-registration-form', function(event){
    event.preventDefault();

    var action = $(this).attr('action'),
    method = $(this).attr('method'),
    data = new FormData(this),
    savingType = $('.party-option-registration-button:focus').attr('data-saving-type');

    var partyOptionTwistSupplier = new Array();

    $.each($('.party-option-supplies-table-01 tbody tr'), function() {
        partyOptionTwistSupplier.push({
            'supply': $(this).find('.party-option-supply-01').val()
        });
    });

    data.append('partyOptionTwistSupplier', JSON.stringify(partyOptionTwistSupplier));



    var partyOptionCustomerSupplier = new Array();

    $.each($('.party-option-supplies-table-02 tbody tr'), function() {
        partyOptionCustomerSupplier.push({
            'supply': $(this).find('.party-option-supply-02').val()
        });
    });

    data.append('partyOptionCustomerSupplier', JSON.stringify(partyOptionCustomerSupplier));



    var partyOptionPrices = new Array();

    $.each($('.party-option-prices-table tbody tr'), function() {
        partyOptionPrices.push({
            'price': $(this).find('.party-option-price').val(),
            'description': $(this).find('.party-option-description').val()
        });
    });

    data.append('partyOptionPrices', JSON.stringify(partyOptionPrices));

    registerPartyOption(action, method, data, savingType);
});



//party option edition 
function editPartyOption(action, method, data, savingType) {
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
            $('.party-option-edition-button').prop('disabled', true);
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
                            window.location.href = url + '/edit-party-option/' + response.partyOptionId;
                        break;

                        case '2':
                            window.location.href = url + '/party-options-list';
                        break;
                    }
                });
            } else {
                swal({
                    title: 'Error',
                    type: 'warning',
                    text: response.message
                });

                $('.party-option-edition-button').prop('disabled', false);
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

            $('.party-option-edition-button').prop('disabled', false);
        }
    });

}

$(document).on('submit','#party-option-edition-form', function(event){
    event.preventDefault();

    var action = $(this).attr('action'),
    method = $(this).attr('method'),
    data = new FormData(this),
    savingType = $('.party-option-edition-button:focus').attr('data-saving-type');

    var partyOptionTwistSupplier = new Array();

    $.each($('.party-option-supplies-table-01 tbody tr'), function() {
        partyOptionTwistSupplier.push({
            'supply': $(this).find('.party-option-supply-01').val()
        });
    });

    data.append('partyOptionTwistSupplier', JSON.stringify(partyOptionTwistSupplier));



    var partyOptionCustomerSupplier = new Array();

    $.each($('.party-option-supplies-table-02 tbody tr'), function() {
        partyOptionCustomerSupplier.push({
            'supply': $(this).find('.party-option-supply-02').val()
        });
    });

    data.append('partyOptionCustomerSupplier', JSON.stringify(partyOptionCustomerSupplier));



    var partyOptionPrices = new Array();

    $.each($('.party-option-prices-table tbody tr'), function() {
        partyOptionPrices.push({
            'price': $(this).find('.party-option-price').val(),
            'description': $(this).find('.party-option-description').val()
        });
    });

    data.append('partyOptionPrices', JSON.stringify(partyOptionPrices));

    editPartyOption(action, method, data, savingType);
});



//delete party option
function deletePartyOption(action, method, data) {
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

$(document).on('click', '.delete-party-option-button', function(){
    var partyOptionId = $(this).attr('data-party-option-id'),
    action = url + '/delete-party-option/' + partyOptionId,
    method = 'delete',
    data = null;

    deletePartyOption(action, method, data);
});