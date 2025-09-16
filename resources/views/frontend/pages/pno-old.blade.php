@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="pno-schedule-banner-section">
		<div class="row d-flex align-items-end">
			<div class="column first-column animatable fadeInUp">
				<div class="column-content">
					<h1 class="extrabold">Parent's <span class="inherit white-color">Night Out</span> Schedule</h1>
					<h4 class="medium">We're gearing up for an exciting Parent's Night Out event filled with gymnastics, games, and fun!</h4>

					<div class="schedule-content">
						<div class="date-content d-flex align-items-center">
							<img src="{{ asset('public/frontend/images/date-icon.png') }}" alt="Calendar icon">
							<h3>August 30th</h3>
						</div>
					</div>

					<a href="https://twist.gymdesk.com/book?date=2025-08-30&s=1092455&schedule=15204" target="_blank" class="btn btn-primary hover-background-secondary">Reserve your night away!</a>
				</div>
			</div>

			<div class="column second-column">
				<div class="column-content">
					<img src="{{ asset('public/frontend/images/mobile-pno-schedule-banner.png') }}" alt="Two people happy with a cup of wine in their hands">
				</div>
			</div>
		</div>
	</section>

	<section class="pno-in-naples-section">
		<div class="container">
			<div class="row d-flex align-items-center animatable fadeInUp">
				<div class="column first-column">
					<div class="column-content">
						<img src="{{ asset('public/frontend/images/pno-in-naples-image.png') }}" alt="Children playing one of the games in Twist Naples">
					</div>
				</div>

				<div class="column second-column">
					<div class="column-content">
						<p class="text-uppercase medium white-color">A Safe & Exciting Gymnastics Event for Kids</p>

						<h2 class="extrabold white-color">Fun & Active Parent's Night Out in Naples</h2>
						<h4 class="regular white-color">Enjoy a worry-free night while your child has a blast at Twist Naples with gymnastics, games, and fun in a safe, supervised setting!</h4>

						<a href="https://twist.gymdesk.com/book?date=2025-06-28&s=1019420&schedule=15204" target="_blank" class="btn btn-primary hover-background-terciary">Book Your Child's Spot!</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="high-energy-night-section">
		<div class="container">
			<div class="row first-row animatable fadeInDown">
				<div class="text-content">
					<p class="medium text-uppercase text-center">A High-Energy Night of Movement & Play</p>

    				<h3 class="extrabold text-center">Gymnastics, Games & Non-Stop Fun</h3>

    				<h4 class="regular text-center">Drop off your child for an action-packed night while you enjoy a well-deserved break! Every Parent’s Night Out at Twist Naples includes:</h4>
				</div>
			</div>

			<div class="row second-row d-flex animatable fadeInUp">
				<div class="column">
					<img src="{{ asset('public/frontend/images/high-energy-night-icon-01.png') }}" alt="Child playing with a ball icon">

					<p class="text-center regular">Gymnastics & obstacle courses to build confidence and skills</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/high-energy-night-icon-02.png') }}" alt="Icon of a soccer ball">

					<p class="text-center regular"> Interactive games, arts and crafts & fun team challenges</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/high-energy-night-icon-03.png') }}" alt="Icon of a pizza">

					<p class="text-center regular">Pizza party with friends for a fun and tasty break</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/high-energy-night-icon-04.png') }}" alt="Icon of a person singing">

					<p class="text-center regular">Music, movement & social activities in a safe space</p>
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/high-energy-night-icon-05.png') }}" alt="Icon of two boys playing">

					<p class="text-center regular">Supervised playtime with expert sports and fitness coaches</p>
				</div>
			</div>
		</div>
	</section>

	@include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')