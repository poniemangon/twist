// Initialize Dropzone for single image upload
Dropzone.autoDiscover = false;

var imageDropzone = new Dropzone("#image-dropzone", {
    url: '#', // Disable automatic upload
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    acceptedFiles: 'image/jpeg,image/png,image/webp',
    maxFiles: 1,
    maxFilesize: 5, // 5MB
    addRemoveLinks: true,
    autoProcessQueue: false, // Disable automatic processing
    dictDefaultMessage: 'Drop image here or click to upload',
    dictRemoveFile: 'Remove',
    dictCancelUpload: 'Cancel',
    dictUploadCanceled: 'Upload canceled',
    dictInvalidFileType: 'Invalid file type. Only JPG, PNG, and WebP are allowed.',
    dictFileTooBig: 'File is too big ({{filesize}}MB). Max filesize: {{maxFilesize}}MB.',
    dictMaxFilesExceeded: 'Only one image is allowed.',
        init: function() {
        var myDropzone = this;

        // Handle form submission
        $(document).on('click', '.article-registration-button', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('.article-registration-button').prop('disabled', true);
            var savingType = $(this).attr('data-saving-type');

            var formData = new FormData();
            formData.append('title', $('#article-title').val());
            formData.append('excerpt', $('#excerpt').val());
            formData.append('body', CKEDITOR.instances['body'].getData());
            formData.append('meta_title', $('#meta-title').val());
            formData.append('meta_description', $('#meta-description').val());
            formData.append('url_slug', $('#url-slug').val());
            
            // Handle publish date - just append the input value
            var publishDateValue = $('#publish_date').val();
            formData.append('publish_date', publishDateValue || '');

            // Add image file if uploaded
            if (myDropzone.files.length > 0) {
                formData.append('image', myDropzone.files[0]);
            }

            // Collect FAQ data
            var faqs = [];
            $('#faqs-tbody tr').each(function(index) {
                var title = $(this).find('input[name*="[title]"]').val();
                var description = $(this).find('textarea[name*="[description]"]').val();
                
                if (title.trim() !== '' || description.trim() !== '') {
                    faqs.push({
                        title: title,
                        description: description,
                        position: index
                    });
                }
            });
            
            formData.append('faqs', JSON.stringify(faqs));

            $.ajax({
                url: url + '/register-article',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (!response.success) {
                        swal({
                          title: 'Ups...', 
                          text: response.message, 
                          type: 'warning'
                        });
                        $('.article-registration-button').prop('disabled', false);
                    } else {
                        swal({
                            title: 'Mensaje', 
                            text: response.message, 
                            type: 'success'
                        }).then(function() {
                            if (savingType == 1) {
                                window.location.href = url + '/edit-article/' + response.article_id;
                            }
                            else {
                                window.location.href = url + '/articles-list';
                            }
                        });
                    }
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(key, value) {
                        swal({
                            title: 'Ups...', 
                            text: value, 
                            type: 'warning'
                        });
                    });
                    $('.article-registration-button').prop('disabled', false);
                }
            });
        });
    },
    success: function(file, response) {
        // File uploaded successfully
        console.log('File uploaded successfully');
    },
    error: function(file, response) {
        // Handle upload error
        console.log('Upload error:', response);
        this.removeFile(file);
    }
});

$(document).ready(function() {
    // Initialize CKEditor 4 for body textarea
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('body', {
            toolbar: [
                { name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt'] },
                '/',
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'] },
                { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                { name: 'insert', items: ['Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'] },
                '/',
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] },
                { name: 'tools', items: ['Maximize', 'ShowBlocks'] }
            ],
            height: 300,
            removeButtons: 'Image,Flash,Iframe',
            removePlugins: 'image,iframe'
        });
        console.log('CKEditor initialized for body');
    } else {
        console.log('CKEditor not available');
    }

    // Auto-generate meta fields from article title
    $('#article-title').on('input', function() {
        var articleTitle = $(this).val();
        
        if (articleTitle.trim() !== '') {
            // Generate Meta Title
            var metaTitle = articleTitle + ' | Article | Smooth Sailing Yachts';
            $('#meta-title').val(metaTitle);
            
            // Generate URL Slug (replace spaces with hyphens and convert to lowercase)
            var urlSlug = articleTitle.toLowerCase().replace(/\s+/g, '-');
            
            // Check if slug exists and modify if needed
            checkAndModifySlug(urlSlug);
            
            // Generate Meta Description
            var metaDescription = articleTitle + ' article of Smooth Sailing Yachts';
            $('#meta-description').val(metaDescription);
        } else {
            // Clear fields if article title is empty
            $('#meta-title').val('');
            $('#url-slug').val('');
            $('#meta-description').val('');
        }
    });

    function checkAndModifySlug(baseSlug) {
        var counter = 0;
        var currentSlug = baseSlug;
        
        function checkSlug() {
            $.ajax({
                url: url + '/check-url-slug',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    url_slug: currentSlug
                },
                success: function(response) {
                    if (response.exists) {
                        counter++;
                        currentSlug = baseSlug + '-' + counter;
                        checkSlug();
                    } else {
                        $('#url-slug').val('/' + currentSlug);
                    }
                }
            });
        }
        
        checkSlug();
    }

    // Handle publish date checkbox
    $('#publish-checkbox').on('change', function() {
        var publishDate = $('#publish-date');
        
        if (this.checked) {
            // Enable date input when checkbox is checked
            publishDate.prop('disabled', false);
            // Set today's date as default if no date is set
            if (!publishDate.val()) {
                var today = new Date();
                var yyyy = today.getFullYear();
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var dd = String(today.getDate()).padStart(2, '0');
                var todayString = yyyy + '-' + mm + '-' + dd;
                publishDate.val(todayString);
            }
        } else {
            // Disable and clear date input when checkbox is unchecked
            publishDate.prop('disabled', true);
            publishDate.val('');
        }
    });



    // FAQ Management
    $('#add-faq-btn').on('click', function() {
        addFaqRow();
    });

    // Handle delete FAQ button clicks
    $(document).on('click', '.delete-faq-btn', function() {
        $(this).closest('tr').remove();
    });
});

// Function to add a new FAQ row
function addFaqRow() {
    var faqIndex = $('#faqs-tbody tr').length;
    
    var faqRow = `
        <tr>
            <td>
                <input type="text" name="faqs[${faqIndex}][title]" class="form-control" placeholder="Enter FAQ title">
            </td>
            <td>
                <textarea name="faqs[${faqIndex}][description]" class="form-control" rows="3" placeholder="Enter FAQ description"></textarea>
            </td>
            <td class="text-center">
                <button type="button" class="btn  btn-sm delete-faq-btn">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    `;
    
    $('#faqs-tbody').append(faqRow);
}
