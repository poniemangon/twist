@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="pricing-and-memberships-section relative">
        <img src="{{ asset('public/frontend/images/vector-11.png') }}" alt="A Miscellaneous" class="vector-11 rotation">

        <div class="container">
            <div class="row animatable fadeInUp">
                <p class="medium text-center text-uppercase">Affordable & Flexible Options for Every Family</p>
                <h1 class="extrabold text-center"><span class="inherit white-color">Pricing</span> & Memberships</h1>

                <h4 class="medium text-center">At Twist Naples, we believe in keeping things simple. No hidden fees, no long-term commitments.</h4>
            </div>
        </div>

        <img src="{{ asset('public/frontend/images/vector-12.png') }}" alt="A Miscellaneous" class="vector-12">

        <img src="{{ asset('public/frontend/images/vector-13.png') }}" alt="A Miscellaneous" class="vector-13">
    </section>


    @if (!empty($pricings) && count($pricings) > 0)
        <section class="pricing-blocks-section">
            <div class="container">
                <div class="row d-flex justify-content-center animatable fadeInUp">

                    @foreach ($pricings as $pricing)
                        <div class="column first-column" style="background: #{{ $pricing->background_colour }}">
                            <div class="internal-text">
                                <h4 class="extrabold white-color text-center">{{ $pricing->title }}</h4>

                                @if ($pricing->subtitle)
                                    <p class="white-color text-center text-uppercase">{{ $pricing->subtitle }}</p>
                                @endif
                            </div>

                            <h3 class="extrabold text-center white-color">${{ $pricing->price }}<span class="inherit">/{{ $pricing->period }}</span></h3>

                            @if (!empty($pricing->pricingBenefits) && count($pricing->pricingBenefits) > 0)
                                @if (count($pricing->pricingBenefits) == 1)
                                    <p class="text-center">{{ $pricing->pricingBenefits[0]->benefit }}</p>
                                @else
                                    <ul>
                                        @foreach ($pricing->pricingBenefits as $benefit)
                                            <li>{{ $benefit->benefit }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif

                            @if ($pricing->link)
                                <a href="{{ url($pricing->link) }}" target="_blank" class="btn btn-secondary hover-background-terciary">Pick your class</a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <h2 class="special-price-text text-center medium text-uppercase d-flex align-items-center justify-content-center animatable fadeInUp">$60 <span class="inherit">registration fee for all new families</span></h2>
            </div>
        </section>
    @endif

    @if (!empty($openGymPrices) && count($openGymPrices) > 0)
        <section class="drop-in-any-time-section">
            <div class="container">
                <div class="row first-row animatable fadeInDown">
                    <p class="text-center medium text-uppercase">Drop in anytime - pay per visit - no registration fee</p>
                    <h3 class="text-center extrabold">Open Gym Free Play</h3>
                </div>

                <div class="row second-row d-flex justify-content-center animatable fadeInUp">

                    @foreach ($openGymPrices as $pricing)
                        <div class="column first-column" style="background: #{{ $pricing->background_colour }}">
                            <h4 class="extrabold text-center white-color">{{ $pricing->title }}</h4>
                            <h3 class="extrabold text-center white-color">${{ $pricing->price }}<span class="inherit">/{{ $pricing->period }}</span></h3>

                            @if (!empty($pricing->pricingBenefits) && count($pricing->pricingBenefits) > 0)
                                @if (count($pricing->pricingBenefits) == 1)
                                    <p class="text-center">{{ $pricing->pricingBenefits[0]->benefit }}</p>
                                @else
                                    <ul>
                                        @foreach ($pricing->pricingBenefits as $benefit)
                                            <li>{{ $benefit->benefit }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif

                            @if ($pricing->link)
                                <a href="{{ url($pricing->link) }}" class="btn btn-secondary hover-background-terciary">Book here</a>
                            @endif
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