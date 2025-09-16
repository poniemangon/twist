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
                <p class="medium text-center text-uppercase white-color mb-1">Stay Tuned For Next Season's Camp!</p>
                <h3 class="text-center extrabold white-color">Our Summer 2025 Camp Season Has Wrapped</h3>
            </div>
        </div>
    </section>
    

        <section class="kids-camps-section bg-coming-soon">
            <div class="container">
                <div class="row first-row">
                    <h3 class="text-center extrabold mb-1">Winter Break Camp 2025 Coming Soon</h3>

                    <h4 class="text-center">What a fantastic summer! We’re already planning for Winter Break Camp 2025, stay tuned for more details and get ready for another season of fun and adventure!</h4>
                </div>                
            </div>
        </section>

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')