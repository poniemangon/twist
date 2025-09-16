<div class="side-nav">

    <div class="side-nav-inner">

        <div class="side-nav-logo">

            <div class="mobile-toggle side-nav-toggle">

                <a href="">

                    <i class="fa fa-close"></i>

                </a>

            </div>

        </div>

        <ul class="side-nav-menu scrollable">

        <li class="nav-item active dropdown">

            <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                <span class="icon-holder">

                    <i class="fa fa-newspaper-o"></i>

                </span>

                <span class="title align-middle">Articles</span>

                <span class="arrow margin-top-2-px">

                    <i class="ti-angle-right"></i>

                </span>

            </a>

            <ul class="dropdown-menu">

                <li>

                    <a href="{{ route('articles-list') }}">All articles</a>

                </li>


                <li>

                    <a href="{{ route('register-article') }}">New article</a>

                </li>

            </ul>

            </li>

            <li class="nav-item dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-dollar"></i>

                    </span>

                    <span class="title align-middle">Pricings</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('pricings-list') }}">All pricings</a>

                    </li>


                    <li>

                        <a href="{{ route('register-pricing') }}">New pricing</a>

                    </li>

                </ul>

            </li>

            <li class="nav-item active dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-circle"></i>

                    </span>

                    <span class="title align-middle">Kids Camps</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('kids-camps-pricings-list') }}">All pricings</a>

                    </li>


                    <li>

                        <a href="{{ route('register-kid-camp-pricing') }}">New pricing</a>

                    </li>

                </ul>

            </li>

            <li class="nav-item active dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-star"></i>

                    </span>

                    <span class="title align-middle">Party</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('party-options-list') }}">All options</a>

                    </li>


                    <li>

                        <a href="{{ route('register-party-option') }}">New option</a>

                    </li>

                </ul>

            </li>

            <li class="nav-item active dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-square"></i>

                    </span>

                    <span class="title align-middle">Testimonials</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('testimonials-list') }}">All testimonials</a>

                    </li>


                    <li>

                        <a href="{{ route('register-testimony') }}">New testimony</a>

                    </li>

                </ul>

            </li>

            <li class="nav-item active dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-question-circle" aria-hidden="true"></i>

                    </span>

                    <span class="title align-middle">Faqs</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('faqs-list') }}">All faqs</a>

                    </li>

                    <li>

                        <a href="{{ route('register-faq') }}">New faq</a>

                    </li>

                </ul>

            </li>

            <li class="nav-item active dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-user-o" aria-hidden="true"></i>

                    </span>

                    <span class="title align-middle">Sponsors</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('sponsors-list') }}">All sponsors</a>

                    </li>

                    <li>

                        <a href="{{ route('register-sponsor') }}">New sponsor</a>

                    </li>

                </ul>

            </li>

            <li class="nav-item">

                <a class="mrg-top-30" href="{{ route('newsletters-list') }}">

                    <span class="icon-holder">

                        <i class="fa fa-envelope"></i>

                    </span>

                    <span class="title">Newsletters</span>

                </a>

            </li>

            <li class="nav-item active dropdown">

                <a class="mrg-top-30 dropdown-toggle" href="javascript:void(0);">

                    <span class="icon-holder">

                        <i class="fa fa-users"></i>

                    </span>

                    <span class="title align-middle">Users</span>

                    <span class="arrow margin-top-2-px">

                        <i class="ti-angle-right"></i>

                    </span>

                </a>

                <ul class="dropdown-menu">

                    <li>

                        <a href="{{ route('users-list') }}">All users</a>

                    </li>


                    <li>

                        <a href="{{ route('register-user') }}">New user</a>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</div>

<!-- Side Nav END -->

<!-- Page Container START -->

<div class="page-container">

<!-- Header START -->

<div class="header navbar">

    <div class="header-container">

        <ul class="nav-left">

            <li>

                <a class="side-nav-toggle" href="javascript:void(0);">

                    <i class="ti-view-grid"></i>

                </a>

            </li>

        </ul>

        <ul class="nav-right">

            <li class="user-profile dropdown">

                <a href="{{ route('pricings-list') }}" class="dropdown-toggle" data-toggle="dropdown">

                    <div class="user-info">

                        <span class="name pdd-right-5">{{ Session('administrator')['name'] }} {{ Session('administrator')['surname'] }}</span>

                        <i class="ti-angle-down font-size-10"></i>

                    </div>

                </a>

                <ul class="dropdown-menu">

                    <li role="separator" class="divider"></li>

                    <li>

                        <a href="{{ route('profile') }}">

                            <i class="ti-key pdd-right-10"></i>

                            <span>Profile</span>

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('logout') }}">

                            <i class="ti-power-off pdd-right-10"></i>

                            <span>Logout</span>

                        </a>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</div>