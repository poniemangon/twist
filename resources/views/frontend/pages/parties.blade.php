@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="unforgettable-kids-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <div class="column-content">
                        <p class="medium text-uppercase">We Do The Work</p>
                        <h1 class="extrabold">Unforgettable Kids’ <span class="inherit white-color">Birthday Parties</span> in Naples, FL! <img src="{{ asset('public/frontend/images/party-icon.png') }}" alt="A party icon"></h1>

                        <h4 class="medium">Celebrate your child’s birthday at Twist Naples with high-energy fun!</h4>
                    </div>
                </div>

                <div class="column second-column">
                    <img src="{{ asset('public/frontend/images/unforgettable-kids-image.png') }}" alt="Image of a cake">
                </div>
            </div>
        </div>   
    </section>

    <section class="twist-parties-section">
        <div class="row d-flex align-items-end">
            <div class="column first-column">
                <img src="{{ asset('public/frontend/images/twist-parties-image.png') }}" alt="Image of a child in a party">
            </div>

            <div class="column second-column animatable fadeInUp">
                <div class="column-content">
                    <p class="medium text-uppercase white-color">Make Their Big Day a Huge Success!</p>

                    <h2 class="extrabold white-color">Why Parents Love Twist Parties</h2>
                    <h4 class="medium white-color">With all our parties you have the option to choose structured activities, free play, action packed games, music, rock wall, zip line, and much more.</h4>

                    <div class="inner-row d-flex">
                        <div class="inner-column d-flex align-items-center">
                            <img src="{{ asset('public/frontend/images/party-icon-01.svg') }}">
                            <p class="light white-color">Private, exclusive use of the gym</p>
                        </div>

                        <div class="inner-column d-flex align-items-center">
                            <img src="{{ asset('public/frontend/images/party-icon-02.svg') }}">
                            <p class="light white-color">Basic party set-up and clean-up</p>
                        </div>

                        <div class="inner-column d-flex align-items-center">
                            <img src="{{ asset('public/frontend/images/party-icon-03.svg') }}">
                            <p class="light white-color">15 guests including the birthday child</p>
                        </div>

                        <div class="inner-column d-flex align-items-center">
                            <img src="{{ asset('public/frontend/images/party-icon-04.svg') }}">
                            <p class="light white-color">1.5 hours of indoor air-conditioned fun!</p>
                        </div>

                        <div class="inner-column d-flex align-items-center">
                            <img src="{{ asset('public/frontend/images/party-icon-05.svg') }}">
                            <p class="light white-color">Trained hosts Age-appropriate fun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($partyOptions) && count($partyOptions) > 0)
        <section class="party-options-section">
            <div class="container">
                <div class="row first-row animatable fadeInDown">
                    <p class="medium text-center text-uppercase">Action-Packed birthday parties</p>
                    <h2 class="extrabold text-center">Party Options</h2>
                </div>

                <div class="row second-row d-flex justify-content-center animatable fadeInUp">
                    @foreach ($partyOptions as $partyOption)
                        <div class="column @if ((!empty($partyOption->twistSupplier) && count($partyOption->twistSupplier) > 0) && (!empty($partyOption->customerSupplier) && count($partyOption->customerSupplier) > 0)) second-column @else first-column @endif">
                            <div class="column-content">
                                <h3 class="option-block text-center white-color" style="background: #{{ $partyOption->background_colour }}">{{ $partyOption->option_type }}</h3>

                                @if ((!empty($partyOption->twistSupplier) && count($partyOption->twistSupplier) > 0) && (!empty($partyOption->customerSupplier) && count($partyOption->customerSupplier) > 0))
                                    <div class="inner-row d-flex">
                                        <div class="inner-column first-inner-column">
                                            <p class="you-supply-text medium text-uppercase">We Supply</p>

                                            <ul>
                                                @foreach ($partyOption->twistSupplier as $twistSupplier)
                                                    <li>{{ $twistSupplier->supply }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="inner-column second-inner-column">

                                            <p class="you-supply-text medium text-uppercase">You Supply</p>

                                            <ul>
                                                @foreach ($partyOption->customerSupplier as $customerSupplier)
                                                    <li>{{ $customerSupplier->supply }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @elseif (!empty($partyOption->customerSupplier) && count($partyOption->customerSupplier) > 0)

                                    <p class="you-supply-text medium text-uppercase text-center">You Supply</p>

                                    <ul>
                                        @foreach ($partyOption->customerSupplier as $customerSupplier)
                                            <li>{{ $customerSupplier->supply }}</li>
                                        @endforeach
                                    </ul>
                                @elseif (!empty($partyOption->twistSupplier) && count($partyOption->twistSupplier) > 0)

                                    <p class="you-supply-text medium text-uppercase text-center">We Supply</p>

                                    <ul>
                                        @foreach ($partyOption->twistSupplier as $twistSupplier)
                                            <li>{{ $twistSupplier->supply }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            @if (!empty($partyOption->prices) && count($partyOption->prices) > 0)
                                <div class="pricing-content">
                                    <p class="medium text-center text-uppercase">Pricing</p>

                                    @foreach ($partyOption->prices as $partyOptionPrice)
                                        <div class="price-block d-flex align-items-center">
                                            @if ($partyOptionPrice->price <= 100)
                                                <h3 class="extrabold">${{ $partyOptionPrice->price }}</h3>
                                            @else
                                                <h2 class="extrabold">${{ $partyOptionPrice->price }}</h2>
                                            @endif
                                            <p class="regular">{{ $partyOptionPrice->description }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <p class="extra-note-text text-center">**Extra guests are $12 for each child<br>**An additional 30 minutes MAY be available for $50. You must inquire in advance to ensure.<br>
                            The deposit will be subtracted from the final cost of the party. Book below or send us an email with specific questions!</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')