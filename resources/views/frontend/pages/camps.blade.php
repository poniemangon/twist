@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="seasonal-gymnastics-banner-section">
		<div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <div class="column-content">
                        <p class="medium text-uppercase">Indoor Gymnastics Camps</p>
                        <h1 class="extrabold">Seasonal Gymnastics and Ninja <span class="inherit white-color">Camps</span></h1>
                        <h4 class="medium">Twist Naples’ seasonal camps are the perfect choice for providing your kids with a fun-filled experience with gymnastics, fitness activities, games, and more.</h4>
                    </div>
                </div>

                <div class="column second-column">
                    <div class="column-content">
                        <img src="{{ asset('public/frontend/images/seasonal-gymnastics-camps-image.png') }}" alt="Image of a camping tent">
                    </div>
                </div>
            </div>      
        </div>
	</section>

	<section class="no-school-section">
		<div class="container">
			<div class="row first-row animatable fadeInDown">
				<div class="text-content">
					<p class="medium text-uppercase text-center">No School? We've Got You Covered! </p>

    				<h3 class="extrabold text-center">Our Gymnastics Camps Keep Kids</h3>

    				<div class="special-wordings-content d-flex justify-content-center">
                        <h1 class="first-text text-uppercase white-color">Growing</h1>
                        <h1 class="second-text text-uppercase white-color">Active</h1>
                        <h1 class="third-text text-uppercase white-color">Engaged</h1>                 
                    </div>
				</div>
			</div>

			<div class="row second-row d-flex justify-content-center animatable fadeInUp">
				<div class="column">
					<img src="{{ asset('public/frontend/images/no-school-icon-02.png') }}" alt="Smiley face icon">

					<p class="text-center regular">Available for Children Aged 4-11</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/no-school-icon-03.png') }}" alt="Icon of a dollar">

					<p class="text-center regular">Aftercare Available for $12/per child</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/no-school-icon-04.png') }}" alt="Icon of a boy swimming">

					<p class="text-center regular">All Skill Levels Welcome</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/no-school-icon-05.png') }}" alt="Icon of a boy playing with a ball">

					<p class="text-center regular">Build Strength and Confidence</p>
				</div>
			</div>

            <a href="{{ route('schedule') }}" class="btn btn-primary hover-background-secondary animatable fadeInUp">View Camp Schedule</a>
		</div>
	</section>

    <section class="experience-in-every-season-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <h2 class="text-center extrabold">Experience Fun, Fitness, and Adventure Every Season!</h2>

                <h4 class="text-center regular">Camps at Twist offer a variety of exciting activities, including gymnastics, ninja warrior challenges, arts and crafts, and more!</h4>
            </div>

            <div class="row second-row d-flex animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/experience-in-every-season-icon-01.png') }}" alt="A flower icon">

                    <h4 class="text-center extrabold white-color">Spring Break Camp</h4>

                    <p class="text-center white-color regular">Gymnastics, games, and non-stop fun for spring break!</p>
                </div>

                <div class="column second-column">
                    <img src="{{ asset('public/frontend/images/experience-in-every-season-icon-02.png') }}" alt="A sun icon">

                    <h4 class="text-center extrabold white-color">Summer Camp</h4>

                    <p class="text-center white-color regular">A summer full of fitness, gymnastics, and adventure!</p>
                </div>

                <div class="column third-column">
                    <img src="{{ asset('public/frontend/images/experience-in-every-season-icon-03.png') }}" alt="A snowball icon">

                    <h4 class="text-center extrabold white-color">Winter Break Camp</h4>

                    <p class="text-center white-color regular">Keep them active and entertained during winter break!</p>
                </div>
            </div>

            <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary animatable fadeInUp">Sign Up Today!</a>
        </div>
    </section>

    <section class="seasons-camps-calendar-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <h3 class="text-center extrabold white-color">Explore This Season's Camp Calendar</h3>
            </div>

            <div class="row second-row d-flex animatable fadeInUp">
                <div class="column">
                    <img src="{{ asset('public/frontend/images/seasons-camps-icon-01.png') }}" alt="Icon of a calendar">

                    <p class="text-center regular">June 2nd - Aug 8th</p>
                </div>

                <div class="column">
                    <img src="{{ asset('public/frontend/images/seasons-camps-icon-02.png') }}" alt="Icon of a clock">

                    <p class="text-center regular">10AM – 2PM</p>
                </div>

                <div class="column">
                    <img src="{{ asset('public/frontend/images/seasons-camps-icon-03.png') }}" alt="Icon of a dollar">

                    <p class="text-center regular">Aftercare for $12 from 2:00PM - 3:45PM</p>
                </div>

                <div class="column">
                    <img src="{{ asset('public/frontend/images/seasons-camps-icon-04.png') }}" alt="Icon of a secretary">

                    <p class="text-center regular">Gymnastics: Monday, Wednesday, Friday</p>
                </div>

                <div class="column">
                    <img src="{{ asset('public/frontend/images/seasons-camps-icon-05.png') }}" alt="Icon of a boy fighting">

                    <p class="text-center regular">Ninja Warrior: Tuesday and Thursday</p>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($kidCampsPricings) && count($kidCampsPricings) > 0)
        <section class="kids-camps-section">
            <div class="container">
                <div class="row first-row">
                    <h4 class="text-center text-uppercase">Ages 4 years to 11 years</h4>
                    <h2 class="text-center extrabold">Kid's camps where fun meets fitness!</h2>

                    <h4 class="text-center">Below the calendar is a description of our upcoming Summer Camps.</h4>
                </div>

                <div class="row second-row d-flex justify-content-center">

                    @foreach ($kidCampsPricings as $kidCampsPricing)
                        <div class="column" style="background-color: #{{ $kidCampsPricing->background_colour }}">
                            <div class="internal-text">
                                <h4 class="extrabold text-center white-color">{{ $kidCampsPricing->title }}</h4>

                                @if ($kidCampsPricing->subtitle)
                                    <p class="white-color text-center text-uppercase">{{ $kidCampsPricing->subtitle }}</p>
                                @endif
                            </div>

                            @foreach ($kidCampsPricing->prices as $price)
                                <h3 class="extrabold text-center white-color">{{ $price->price }}<span class="inherit">/{{ $price->period }}</span></h3>
                            @endforeach

                            @if (!empty($kidCampsPricing->features) && count($kidCampsPricing->features) > 0)
                                <ul>
                                    @foreach ($kidCampsPricing->features as $feature)
                                        <li>{{ $feature->feature }}</li>
                                    @endforeach
                                </ul>
                            @endif
            
                            <a href="{{ url($kidCampsPricing->link) }}" target="_blank" class="btn btn-secondary hover-background-terciary">Book here</a>
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