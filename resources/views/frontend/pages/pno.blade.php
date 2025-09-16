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
							<h3>September 27</h3>
						</div>
					</div>

					<a href="https://twist.gymdesk.com/book?date=2025-09-27&s=1176201&schedule=15204" target="_blank" class="btn btn-primary hover-background-secondary">Reserve your night away!</a>
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

	<section class="what-is-pno-section">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="column first-column">
					<img src="{{ asset('public/frontend/images/whatparent.png') }}" alt="Kids having a blast at Parents Night Out">
				</div>
				<div class="column second-column">
					<h2>What is <span class="inherit white-color">Parents Night Out?</span></h2>
					<p>Parents Night Out is a fun, safe, and engaging event where kids enjoy an evening full of activities—while parents enjoy some well-deserved time off.</p>
					<p>At TWIST Naples, our Parents Night Out program is designed for children ages 4–12 and includes gym games, obstacle courses, arts & crafts, and even pizza night!</p>
					<a href="https://twist.gymdesk.com/book?date=2025-08-30&s=1092455&schedule=15204" class="btn btn-primary hover-background-secondary">Reserve your parents night out!</a>
				</div>
			</div>
		</div>
	</section>

	<section class="why-do-pno-section">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="column first-column">
					<h2>Why Do Parents Love Parents Night Out</h2>
					<ul>
						<li>Enjoy a stress-free evening out, whether it's date night, errands, or just downtime.</li>
						<li>Know that your kids are safe, active, and having fun with our professional instructors.</li>
						<li>No screens, just hands-on play, movement, and social interaction.</li>
						<li>A fun pizza party, no need to prep food!</li>
						<li>Flexible drop-off and pick-up times to fit your schedule.</li>
					</ul>
					<a href="{{ route('contact-us') }}" class="btn btn-primary hover-background-secondary">Contact us</a>
				</div>
				<div class="column second-column">
					<img src="{{ asset('public/frontend/images/whyparent.png') }}" alt="Kids drawing at Parents Night Out">
				</div>
			</div>
		</div>
	</section>

	<section class="pno-faq-section">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="column first-column">
					<p class="medium text-uppercase">Indoor Gymnastics Camps</p>
					<h2>Frequently <br> Asked <br> Questions</h2>
					<p>For more information or to sign up</p>
					<a href="{{ route('contact-us') }}" class="btn btn-primary hover-background-secondary">Contact us today!</a>
				</div>
				<div class="column second-column">
					<div class="faq-element">
						<div class="faq-btn">
							<div class="d-flex align-items-center title-faq">
								<i class="fa-solid fa-plus"></i>
								<h3>What age group is Parents Night Out for?</h3>
								<i class="fa-solid fa-chevron-right rotate"></i>
							</div>
						</div>
						<div class="faq-text"><p>Parents Night Out is designed for children between the ages of 4 and 12. We tailor the activities to ensure that all age groups are engaged, active, and having fun.</p></div>
					</div>
					<div class="faq-element">
						<div class="faq-btn">
							<div class="d-flex align-items-center title-faq">
								<i class="fa-solid fa-plus"></i>
								<h3>What should my child bring?</h3>
								<i class="fa-solid fa-chevron-right rotate"></i>
							</div>
						</div>
						<div class="faq-text"><p>Please send your child with a refillable water bottle and a nut-free snack if needed. We host a fun pizza party during the evening, so there's no need to pack dinner.</p></div>
					</div>
					<div class="faq-element">
						<div class="faq-btn">
							<div class="d-flex align-items-center title-faq">
								<i class="fa-solid fa-plus"></i>
								<h3>Do I need to reserve in advance?</h3>
								<i class="fa-solid fa-chevron-right rotate"></i>
							</div>
						</div>
						<div class="faq-text"><p>Yes, advance registration is required as spaces are limited and our events often sell out. Booking online guarantees your child’s spot and helps us prepare accordingly.</p></div>
					</div>
					<div class="faq-element">
						<div class="faq-btn">
							<div class="d-flex align-items-center title-faq">
								<i class="fa-solid fa-plus"></i>
								<h3>	Who supervises the Parents night out?</h3>
								<i class="fa-solid fa-chevron-right rotate"></i>
							</div>
						</div>
						<div class="faq-text"><p>All activities are led by our trained and background-checked staff, committed to creating a fun, energetic, and safe environment. We maintain an excellent staff-to-child ratio for close supervision and support.</p></div>
					</div>
					<div class="faq-element">
						<div class="faq-btn">
							<div class="d-flex align-items-center title-faq">
								<i class="fa-solid fa-plus"></i>
								<h3>How much does it cost?</h3>
								<i class="fa-solid fa-chevron-right rotate"></i>
							</div>
						</div>
						<div class="faq-text"><p>Pricing varies depending on whether or not your child is enrolled in our membership. Please check our calendar or booking page for the most up-to-date information.</p></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')