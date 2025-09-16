<header class="header">
    <div class="desktop-menu" id="desktop-menu">
        <div class="desktop-menu-contact-information-content">
            <div class="container">
                <div class="row first-row d-flex align-items-center justify-content-between">
                    <div class="column first-column">
                        <div class="customized-inner-row d-flex align-items-center">
                            <a href="{{ route('/') }}">
                                <img src="{{ asset('public/frontend/images/logo.png') }}" alt="Twist Naples Logo" loading="lazy">
                            </a>

                            <p class="regular naples-premiere-text">Naples Premiere <span class="inherit bold">Gymnastics</span> and <span class="inherit bold">Ninja Academy</span></p>
                        </div>
                    </div>

                    <div class="column second-column">
                        <div class="inner-row d-flex align-items-center">
                            <div class="inner-column first-inner-column d-flex align-items-center">
                                <a href="{{ route('our-team') }}" class="bold meet-our-team-button hover-color-sixth">Our team</a>
                                <a href="tel:+12395914888" class="bold hover-color-sixth"><i class="fa fa-phone"></i> +1 239 591 4888</a>
                                <a href="https://twist.gymdesk.com/login" class="text-uppercase login-link" target="_blank">Login</a>
                            </div>

                            <div class="inner-column second-inner-column d-flex">
                                <a href="https://www.facebook.com/twistnaples/" target="_blank" class="hover-color-sixth" aria-label="Twist Facebook"><i class="fa fa-brands fa-facebook"></i></a>
                                <a href="https://www.instagram.com/twistnaples" target="_blank" class="hover-color-sixth" aria-label="Twist Instagram"><i class="fa fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-menu-contact-menu-items-content">
            <div class="container">
                <div class="row second-row d-flex align-items-center justify-content-between">
                    <div class="column first-column">
                        <ul class="d-flex">
                            <li>
                                <a href="{{ route('schedule') }}" class="bold hover-color-sixth">Schedule</a>
                            </li>
                            <li class="relative items-submenu-content">
                                <a href="{{ route('general-programs') }}" class="bold hover-color-sixth">Classes <i class="fa fa-angle-down"></i></a>

                                <ul class="items-submenu-container">
                                    <li>
                                        <a href="{{ route('kids-gymnastics-classes') }}">Gymnastics Classes (3 – 11yrs)</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ninja-classes-for-kids') }}">Ninja Warrior and More (3 – 11yrs)</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('toddler-classes') }}">Parent Child Classes (under 3 yrs)</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('camp-for-kids') }}" class="bold hover-color-sixth">Camps</a>
                            </li>
                            <li>
                                <a href="{{ route('parties-for-kids') }}" class="bold hover-color-sixth">Parties</a>
                            </li>
                            <li>
                                <a href="{{ route('parents-night-out') }}" class="bold hover-color-sixth">PNO</a>
                            </li>
                            <li>
                                <a href="{{ route('pricing') }}" class="bold hover-color-sixth">Pricing</a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}" class="bold d-flex align-items-center hover-color-sixth">About</a>
                            </li>
                        </ul>
                    </div>

                    <div class="column second-column d-flex">
                        <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="book-a-free-class-button bold hover-background-sixth">Book A Free Class</a>
                        <a href="{{ route('contact-us') }}" class="contact-us-button bold hover-background-sixth">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-header">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="column first-column">
                    <a href="{{ route('/') }}">
                        <img src="{{ asset('public/frontend/images/logo.png') }}" alt="Twist Naples Logo" loading="lazy">
                    </a>
                </div>

                <div class="column second-column">
                    <ul class="d-flex align-items-center">
                        <li>
                            <a href="{{ route('schedule') }}" class="bold hover-color-sixth">Schedule</a>
                        </li>
                        <li class="relative items-submenu-content">
                            <a href="{{ route('general-programs') }}" class="bold hover-color-sixth">Classes <i class="fa fa-angle-down"></i></a>

                            <ul class="items-submenu-container">                        
                                <li>
                                    <a href="{{ route('kids-gymnastics-classes') }}">Gymnastics Classes (3 – 11yrs)</a>
                                </li>
                                <li>
                                    <a href="{{ route('ninja-classes-for-kids') }}">Ninja Warrior and More (3 – 11yrs)</a>
                                </li>
                                <li>
                                    <a href="{{ route('toddler-classes') }}">Parent Child Classes (under 3 yrs)</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('camp-for-kids') }}" class="bold hover-color-sixth">Camps</a>
                        </li>
                        <li>
                            <a href="{{ route('parties-for-kids') }}" class="bold hover-color-sixth">Parties</a>
                        </li>
                        <li>
                            <a href="{{ route('parents-night-out') }}" class="bold hover-color-sixth">PNO</a>
                        </li>
                        <li>
                            <a href="{{ route('pricing') }}" class="bold hover-color-sixth">Pricing</a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}" class="bold d-flex align-items-center hover-color-sixth">About</a>
                        </li>
                        <li>
                            <a href="{{ route('our-team') }}" class="bold hover-color-sixth">Our team</a>
                        </li>
                        <li class="d-flex">
                            <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="book-a-free-class-button bold hover-background-sixth">Book A Free Class</a>
                            <a href="{{ route('contact-us') }}" class="contact-us-button bold hover-background-sixth">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu" id="mobile-menu">
        <div class="desktop-menu-contact-information-content">
            <div class="container">
                <div class="row first-row">
                    <div class="contact-buttons-content">
                        <a href="tel:+12395914888" class="bold"><i class="fa fa-phone"></i> +1 239 591 4888</a>
                    </div>

                    <div class="social-networks-content d-flex justify-content-center">
                        <a href="https://www.facebook.com/twistnaples/" target="_blank" aria-label="Twist Facebook"><i class="fa fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/twistnaples" target="_blank" aria-label="Twist Instagram"><i class="fa fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-menu-contact-menu-items-content">
            <div class="container relative">
                <div class="row second-row d-flex align-items-center justify-content-between">
                    <div class="column first-column">
                        <div class="customized-inner-row d-flex align-items-center">
                            <a href="{{ route('/') }}">
                                <img src="{{ asset('public/frontend/images/logo.png') }}" alt="Twist Naples Logo" loading="lazy">
                            </a>

                            <p class="regular naples-premiere-text">Naples Premiere <span class="inherit bold">Gymnastics</span> and <span class="inherit bold">Ninja Academy</span></p>
                        </div>
                    </div>

                    <div class="column second-column">
                        <div class="menu-burguer-container">
                            <span class="bar bar-01"></span>
                            <span class="bar bar-02"></span>
                            <span class="bar bar-03"></span>
                        </div>
                    </div>
                </div>

                <div class="row third-row">
                    <ul>
                        <li>
                            <a href="{{ route('schedule') }}" class="bold">Schedule</a>
                        </li>
                        <li class="relative">
                            <div class="d-flex align-items-center subitems-item">
                                <a href="{{ route('general-programs') }}" class="bold">Classes</a>
                                <i class="fa fa-angle-right"></i>
                            </div>

                            <ul class="submenu-items">
                                <li>
                                    <a href="{{ route('kids-gymnastics-classes') }}">Gymnastics Classes (3 – 11yrs)</a>
                                </li>
                                <li>
                                    <a href="{{ route('ninja-classes-for-kids') }}">Ninja Warrior and More (3 – 11yrs)</a>
                                </li>
                                <li>
                                    <a href="{{ route('toddler-classes') }}">Parent Child Classes (under 3 yrs)</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('camp-for-kids') }}" class="bold">Camps</a>
                        </li>
                        <li>
                            <a href="{{ route('parties-for-kids') }}" class="bold">Parties</a>
                        </li>
                        <li>
                            <a href="{{ route('parents-night-out') }}" class="bold">PNO</a>
                        </li>
                        <li>
                            <a href="{{ route('pricing') }}" class="bold">Pricing</a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}" class="bold">About</a>
                        </li>
                        <li>
                            <a href="{{ route('our-team') }}" class="bold">Our team</a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us') }}" class="bold">Contact us</a>
                        </li>
                        <li>
                            <a href="https://twist.gymdesk.com/login" class="bold" target="_blank">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>