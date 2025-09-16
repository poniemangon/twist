@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="contact-twist-naples-section">
        
        <img src="{{ asset('public/frontend/images/vector-02.png') }}" alt="A Miscellaneous" class="vector-02">
        <img src="{{ asset('public/frontend/images/vector-06.png') }}" alt="A Miscellaneous" class="vector-06">

        <div class="row animatable fadeInUp">
            <div class="container">
                <img src="{{ asset('public/frontend/images/vector-01.png') }}" alt="A Miscellaneous" class="vector-01 rotation">
                <img src="{{ asset('public/frontend/images/vector-05.png') }}" alt="A Miscellaneous" class="vector-05">

                <div class="text-content">
                    <p class="text-center medium text-uppercase">Contact Twist Naples</p>

                    <h1 class="text-center extrabold">We’d <span class="inherit">Love</span> to Hear From You!</h1>

                    <h4 class="text-center medium">At Twist Naples, we're always here to help! Whether you have questions about our gymnastics programs, upcoming events, or anything else, we're ready to assist you. Feel free to reach out to us using the contact form below or contact us directly via phone or email.</h4>
                </div>

                <img src="{{ asset('public/frontend/images/vector-03.png') }}" alt="A Miscellaneous" class="vector-03 rotation">
                <img src="{{ asset('public/frontend/images/vector-04.png') }}" alt="A Miscellaneous" class="vector-04">
            </div>
        </div>   
    </section>

    <section class="join-twist-insiders-club-section">
        <div class="row d-flex align-items-center">
            <div class="column first-column">
                <div class="column-content">
                    <h4 class="text-uppercase white-color">Join Twist Insider's Club</h4>
                    <h3 class="extrabold white-color">Receive exclusive invites to our<br> Specialized Classes, Showcases<br> and Events</h3>
                    <div class="btn-container d-flex" style="column-gap:10px">
                    <a href="https://www.instagram.com/twistnaples" target="_blank" class="btn btn-primary hover-background-secondary">Follow Along</a>
                    <a href="https://magic.beehiiv.com/v1/af559971-2875-4f02-89ee-09e09cb82c5e" target="_blank" target="_blank" class="btn btn-primary hover-background-secondary">Get Updates</a>
                    </div>
                </div>
            </div>

            <div class="column second-column">
                <div class="column-content">
                    <img src="{{ asset('public/frontend/images/twist-insiders-club-image.png') }}" alt="Image of the Twist Insider's Club">
                </div>
            </div>
        </div>
    </section>

    <section class="how-can-we-help-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/how-can-we-help-banner.png') }}" alt="Image of children playing in the Twist Naples games">
                </div>

                <div class="column second-column">
                    <h3 class="extrabold white-color">How Can We Help?</h3>
                    <h4 class="medium white-color">Got a question that’s not in our FAQs? Fill out the form below, and we’ll connect you with the right team member soon.</h4>

                    <form method="post" action="{{ route('submit-contact-form') }}" id="contact-form">
                        <div class="form-group d-flex">
                            <input type="text" placeholder="Full Name *" name="name">
                            <input type="text" placeholder="Email *" name="email">
                        </div>

                        <div class="form-group d-flex">
                            <input type="text" placeholder="Phone *" name="phone">
                            <input type="text" placeholder="Please Contact Me About *" name="subject">
                        </div>

                        <div class="form-group">
                            <textarea placeholder="Leave Us a Message (2500 character limit) *" name="message"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6Leru4MrAAAAAIJkVvRvxnkcEnolxkHWLjjfd0-b"></div>
                        </div>

                        <button type="submit" class="btn btn-primary hover-background-secondary" id="contact-button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')