<footer class="footer">
    <div class="container">
        <div class="row first-row d-flex">
            <div class="column first-column">
                <a href="{{ route('/') }}" aria-label="Twist Naples Logo">
                    <img src="{{ asset('public/frontend/images/logo.png') }}" alt="Twist Naples Logo" loading="lazy">
                </a>

                <div class="subscribe-content">
                    <h4 class="bold">Subscribe</h4>

                    <form method="post" action="{{ route('submit-newsletter-form') }}" id="newsletter-form">
                        <div class="form-group d-flex">
                            <input type="text" placeholder="Your email" name="email">
                            <button type="submit" class="btn btn-primary hover-background-secondary" id="newsletter-button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="column second-column">
                <div class="footer-links-container d-flex">
                    <div class="footer-links-content">
                        <a href="{{ route('schedule') }}" class="bold hover-color-primary">Schedule</a>
                        <a href="{{ route('general-programs') }}" class="bold hover-color-primary">Classes</a>
                        <a href="{{ route('camp-for-kids') }}" class="bold hover-color-primary">Camps</a>
                    </div>

                    <div class="footer-links-content">
                        <a href="{{ route('parties-for-kids') }}" class="bold hover-color-primary">Parties</a>
                        <a href="{{ route('parents-night-out') }}" class="bold hover-color-primary">PNO</a>
                        <a href="{{ route('pricing') }}" class="bold hover-color-primary">Pricing</a>
                    </div>

                    <div class="footer-links-content">
                        <a href="{{ route('about-us') }}" class="bold hover-color-primary">About</a>
                        <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="bold hover-color-primary">Book A Free Class</a>
                        <a href="{{ route('our-team') }}" class="bold hover-color-primary">Our team</a>
                        <a href="{{ route('contact-us') }}" class="bold hover-color-primary">Contact us</a>
                    </div>
                </div>

                <p class="copyright-text">Copyright © 2025 Twist Naples. All Rights Reserved.</p>
            </div>

            <div class="column third-column">
                <div class="column-content">
                    <p class="bold">Contact Info</p>

                    <div class="footer-address-content">
                        <a href="https://www.google.com/maps/place/2464+Vanderbilt+Beach+Rd+Ste+530,+Naples,+FL+34109,+USA/@26.2420722,-81.768292,17z/data=!3m1!4b1!4m6!3m5!1s0x88db1c30778a1c43:0x2258e9d3d555ac69!8m2!3d26.2420674!4d-81.7657171!16s%2Fg%2F11rnfb0tlm?coh=209933&entry=tts" target="_blank" class="hover-color-primary">2464 Vanderbilt Beach Rd Ste 530, Naples FL<br> 34109, United States</a>
                        <a href="tel:+12395914888" class="hover-color-primary">+1 239 591-4888</a>
                    </div>

                    <div class="social-networks-content d-flex">
                        <a href="https://www.facebook.com/twistnaples/" target="_blank" class="hover-color-primary" aria-label="Twist Facebook"><i class="fa fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/twistnaples" target="_blank" class="hover-color-primary" aria-label="Twist Instagram"><i class="fa fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row second-row">
            <p class="copyright-text">Copyright © 2025 <u>Twist Naples</u>. All Rights Reserved.</p>
        </div>
    </div>

    <div class="rednodo-copyright-block">
        <div class="container">
            <div class="row">
                <p class="text-center"><a href="https://rednodo.com" target="_blank">Web design Digital Marketing Agency Rednodo.</a></p>
            </div>
        </div>
    </div>
</footer>