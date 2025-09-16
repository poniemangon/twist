//fixed header
$(window).scroll(function() {
    if ($(window).scrollTop() > 0) {
        $('.desktop-menu').hide();
        $('.fixed-header').show();
    } else {
        $('.fixed-header').hide();
        $('.desktop-menu').show();
    }
});

$(document).on('click', '.header .mobile-menu .second-row .menu-burguer-container', function() {
    $('.header .mobile-menu .third-row').slideToggle();
});

$(document).on('click', '.header .mobile-menu .third-row .subitems-item i', function(e) {
    e.preventDefault();
    $('.header .mobile-menu .third-row .submenu-items').slideToggle();
});

$('.our-local-supporters-section .local-supporters-slider').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    infinite: true,
    speed: 600,
    slidesToShow: 6,
    slidesToScroll: 1,
    pauseOnHover: false,
    pauseOnFocus: false,
    responsive: [{
        breakpoint: 1280,
        settings: {
            slidesToShow: 4
        }
    },
    {
        breakpoint: 992,
        settings: {
            slidesToShow: 3
        }
    },
    {
        breakpoint: 575,
        settings: {
            slidesToShow: 1
        }
    }]
});

$(document).on('click', '.yoga-faqs-section .row .second-column .tab-content', function() {
    if ($(this).hasClass('active')) {
        $(this).find('.tab-body').slideToggle();
        $(this).toggleClass('active');
        return;
    }

    $('.yoga-faqs-section .row .second-column .tab-body').slideUp();
    $('.yoga-faqs-section .row .second-column .tab-content').removeClass('active');

    $(this).find('.tab-body').slideDown();
    $(this).addClass('active');
});

var rotacion = document.getElementsByClassName('rotation');
var rotacionReversa = document.getElementsByClassName('reversed-rotation');

window.addEventListener('scroll', function() {
    for (var i = 0 ; i < rotacion.length ; i++) {
        rotacion[i].style.transform = 'rotate('+(window.pageYOffset / 6)+'deg)';
    }

    for (var i = 0 ; i < rotacionReversa.length ; i++) {
        rotacionReversa[i].style.transform = 'rotate('+('-' + window.pageYOffset / 6)+'deg)';
    }
});



//submit contact form
function submitContactForm(action, method, data) {
    $.ajax({
        url: action,
        type: method,
        data: data,
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#contact-button').prop('disabled', true);
            $('#contact-button').text('Processing...');
        },
        success: function(response) {
            if (response.success) {
                $('#contact-form')[0].reset();

                swal({
                    title: 'Success',
                    text: response.message,
                    type: 'success'
                }).then(function() {
                    window.location.href = url;
                })
            } else {
                swal({
                    title: 'Ups...',
                    text: response.message,
                    type: 'warning'
                });
            }

            $('#contact-button').prop('disabled', false);
            $('#contact-button').text('Submit');
        },
        error: function(xhr) {
            $.each(xhr.responseJSON.errors, function(key, value) {
                swal({
                    title: 'Ups...',
                    text: value,
                    type: 'warning'
                });
            });

            $('#contact-button').prop('disabled', false);
            $('#contact-button').text('Submit');
        }
    });
}

$(document).on('submit', '#contact-form', function(event) {
    event.preventDefault();

    var action = $(this).attr('action'),
    method = $(this).attr('method'),
    data = new FormData(this);

    submitContactForm(action, method, data);
});



//submit newsletter form
function submitNewsletterForm(action, method, data) {
    $.ajax({
        url: action,
        type: method,
        data: data,
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#newsletter-button').prop('disabled', true);
            $('#newsletter-button').text('Processing...');
        },
        success: function(response) {
            if (response.success) {
                swal({
                    title: 'Success',
                    text: response.message,
                    type: 'success'
                });

                $('#newsletter-form')[0].reset();
            } else {
                swal({
                    title: 'Ups...',
                    text: response.message,
                    type: 'warning'
                });
            }

            $('#newsletter-button').prop('disabled', false);
            $('#newsletter-button').text('Subscribe');
        },
        error: function(xhr) {
            $.each(xhr.responseJSON.errors, function(key, value) {
                swal({
                    title: 'Ups...',
                    text: value,
                    type: 'warning'
                });
            });

            $('#newsletter-button').prop('disabled', false);
            $('#newsletter-button').text('Subscribe');
        }
    });
}

$(document).on('submit', '#newsletter-form', function(event) {
    event.preventDefault();

    var action = $(this).attr('action'),
    method = $(this).attr('method'),
    data = new FormData(this);

    submitNewsletterForm(action, method, data);
});

//meet our team tab content
$(document).on('click', '.our-team-section .tab-content', function() {
    $(this).closest('.column').find('.second-inner-row').slideToggle();
});

$(document).ready(function () {
    $('.faq-btn').on('click', function () {
      const $faqElement = $(this).closest('.faq-element');

      if ($faqElement.hasClass('active')) {
        // Si ya está activo, lo cierra
        $faqElement.removeClass('active');
      } else {
        // Cierra todos, luego abre el clickeado
        $('.faq-element').removeClass('active');
        $faqElement.addClass('active');
      }
    });
  });