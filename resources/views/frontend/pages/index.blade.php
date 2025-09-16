@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="fun-gymnastics-and-fitness-classes-section">
		<div class="container">
			<div class="row d-flex align-items-center animatable fadeInUp">
				<div class="column first-column">
					<div class="column-content">
						<p class="medium text-uppercase">Naples Premiere - Gymnastics and Ninja Academy</p>
						<h1 class="extrabold">Gymnastics, Ninja, and Personalized Fitness for Kids <span class="inherit white-color">of All Levels</span></h1>

						<h4 class="medium">At Twist, we shape confident kids by building strength, fostering growth, and creating a lifelong love of fitness.</h4>

						<a href="{{ route('general-programs') }}" class="btn btn-primary hover-background-secondary">Check Out Our Programs</a>
					</div>
				</div>

				<div class="column second-column">
					<div class="column-content relative">
						<img src="{{ asset('public/frontend/images/animatable-vector-01.png') }}" class="animatable-vector-01 absolute" alt="Miscellaneous" loading="lazy">
						<img src="{{ asset('public/frontend/images/animatable-vector-02.png') }}" class="animatable-vector-02 absolute rotation" alt="Miscellaneous" loading="lazy">
						<img src="{{ asset('public/frontend/images/animatable-vector-03.png') }}" class="animatable-vector-03 absolute rotation" alt="Miscellaneous" loading="lazy">
						<img src="{{ asset('public/frontend/images/animatable-vector-04.png') }}" class="animatable-vector-04 absolute rotation" alt="Miscellaneous" loading="lazy">
						<img src="{{ asset('public/frontend/images/gymnastic-girl-image.png') }}" class="gymnastic-girl-image" alt="A woman doing some gymnastic exercise" loading="lazy" fetchpriority="high">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="our-core-programs-section">
		<div class="container">
			<div class="row first-row animatable fadeInDown">
				<p class="text-center text-uppercase medium">Active Play with Purpose</p>
				<h3 class="text-center extrabold">Our Core Programs</h3>
				<h4 class="text-center regular">Our core programs are designed to meet kids where they are — physically, emotionally, and developmentally.</h4>
			</div>

			<div class="row second-row d-flex animatable fadeInUp">
				<div class="column first-column">
					<div class="column-content">
						<h4 class="extrabold text-center white-color">Progressive<br> Gymnastics</h4>
						<p class="regular text-center white-color">Our gymnastics program helps kids build strength, flexibility, and confidence as they learn skills at their own pace in a fun, supportive environment.</p>
					</div>
				</div>

				<div class="column second-column">
					<div class="column-content">
						<h4 class="extrabold text-center white-color">Ninja Warrior</h4>
						<p class="regular text-center white-color">Ninja Warrior classes combine obstacle courses with skill-building fun. Kids boost agility, coordination, and confidence as they climb, jump, and race through challenges.</p>
					</div>
				</div>

				<div class="column third-column">
					<div class="column-content">
						<h4 class="extrabold text-center white-color">Parent-Child Classes (Under 3 Years):</h4>
						<p class="regular text-center white-color">Designed for toddlers and caregivers, this class promotes movement, social interaction, and sensory play for early development and bonding.</p>
					</div>
				</div>

				<div class="column fourth-column">
					<div class="column-content">
						<h4 class="extrabold text-center white-color">Open Gym</h4>
						<p class="regular text-center white-color">Let your child explore, play, and practice in a flexible, supervised setting. Open Gym is perfect for free movement, skill exploration, and burning off extra energy.</p>
					</div>
				</div>
			</div>

			<a href="{{ route('schedule') }}" class="btn btn-primary hover-background-secondary animatable fadeInUp">Explore Our Class Schedule</a>
		</div>
	</section>

	<section class="exciting-events-at-twist-naples-section">
		<div class="container">
			<div class="row d-flex align-items-center animatable fadeInUp">
				<div class="column first-column">
					<div class="column-content">
						<h2 class="extrabold"><span class="inherit white-color">Exciting Events</span> at Twist Naples</h2>
						<h4 class="regular">At Twist Naples, we offer fun-filled events designed to keep kids active, engaged, and entertained!</h4>
					</div>
				</div>

				<div class="column second-column">
					<div class="column-content">
						<div class="inner-row d-flex">
							<div class="inner-column first-inner-column">
								<h4 class="extrabold text-center white-color">Core Programs</h4>
								<p class="regular text-center white-color">Build strength, confidence, and skills in a fun setting.</p>

								<a href="{{ route('general-programs') }}" class="btn btn-secondary hover-background-primary">Join a Class!</a>
							</div>

							<div class="inner-column second-inner-column">
								<h4 class="extrabold text-center white-color">Seasonal Camps</h4>
								<p class="regular text-center white-color">Action-packed camps with gymnastics, games, and exciting challenges.</p>

								<a href="{{ route('camp-for-kids') }}" class="btn btn-secondary hover-background-primary">Sign Up Now!</a>
							</div>

							<div class="inner-column fourth-inner-column">
								<h4 class="extrabold text-center white-color">Birthday Parties</h4>
								<p class="regular text-center white-color">Give your child an unforgettable, action-packed gymnastics party filled.</p>

								<a href="{{ route('parties-for-kids') }}" class="btn btn-secondary hover-background-primary">Plan Their Party!</a>
							</div>

							<div class="inner-column third-inner-column">
								<h4 class="extrabold text-center white-color">Parent’s Night Out</h4>
								<p class="regular text-center white-color">A fun evening of games and activities while parents enjoy a night off.</p>

								<a href="{{ route('parents-night-out') }}" class="btn btn-secondary hover-background-primary">Book Your Spot!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="on-site-school-programs-section">
		<div class="container">
			<div class="row d-flex align-items-center animatable fadeInUp">
				<div class="column first-column">
					<img src="{{ asset('public/frontend/images/on-site-school-programs-image.png') }}" alt="Two women doing gymnastic in Twist Naples" loading="lazy">
				</div>

				<div class="column second-column">
					<div class="column-content">
						<p class="medium text-uppercase white-color">On-site School Programs</p>
						<h3 class="extrabold white-color">Fitness and Fun at Your School</h3>

						<h4 class="regular white-color">Twist partners with local schools to provide dynamic, movement-based enrichment programs right on campus. Our certified instructors lead engaging classes that promote physical fitness, social development, and confidence.</h4>

						<a href="{{ route('contact-us') }}" class="btn btn-primary hover-background-secondary">Bring Twist to Your School!</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="meet-our-team-home-block-section">
		<div class="container">
			<div class="row first-row animatable fadeInDown">
				<h4 class="text-center text-uppercase letter-spacing regular white-color">Meet our team</h4>
				<h3 class="text-center extrabold white-color">Your Friends at Twist Can’t Wait to See You!</h3>
			</div>

			<div class="row second-row d-flex justify-content-center animatable fadeInUp">
				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-amy.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-alijah.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-daniela.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-emily.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-khaya.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-mike.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-maher.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-mia.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-mike-02.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-neely.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>

				<div class="column">
					<img src="{{ asset('public/frontend/images/small-coach-savannah.png') }}" alt="Image of one of our collaborators" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	@if (!empty($testimonials) && count($testimonials) > 0)
		<section class="why-families-love-twist-naples-section">
			<div class="container">
				<div class="row first-row animatable fadeInDown">
					<h3 class="text-center extrabold">Why Families Love Twist Naples</h3>
					<h4 class="text-center regular">A Gymnastics Community That Feels Like Family</h4>
				</div>

				<div class="row second-row d-flex justify-content-center animatable fadeInUp">

					@foreach ($testimonials as $testimonial)
						<div class="column first-column" style="background: #{{ $testimonial->colour }}">
							<div class="column-content">
								<div class="inner-row d-flex">
									<div class="inner-column">
										<div class="quotes-icon">
											<img src="{{ asset('public/frontend/images/quotes-icon.svg') }}" alt="A quote icon" loading="lazy">
										</div>

										<h4 class="bold white-color">{{ $testimonial->name }}</h4>

										<div class="stars d-flex">
											@for ($i = 0 ; $i < $testimonial->punctuation ; $i++)
											    <i class="fa fa-star"></i>
											@endfor
										</div>
									</div>

									<div class="inner-column">
										<h4 class="regular white-color">{{ $testimonial->review }}</h4>
									</div>
								</div>
							</div>

							<div class="column-chevron" style="background: #{{ $testimonial->colour }}"></div>
						</div>
					@endforeach
				</div>

				<a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary animatable fadeInUp">Sign Up for a Class!</a>
			</div>
		</section>
	@endif

	@include('frontend.layouts.instagram-feed')

	@include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')