@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="programs-for-every-age-section">
		<div class="container">
			<div class="row first-row animatable fadeInUp">
                <div class="breadcrumb-content d-flex align-items-center justify-content-center">
                    <a href="{{ route('/') }}" class="hover-color-primary">
                        <i class="fa fa-home"></i>
                    </a>

                    <h4 class="medium text-uppercase">Programs</h4>
                </div>

				<div class="text-content">
					<p class="medium text-uppercase text-center">Fun-Filled Classes Designed to Inspire Movement & Growth</p>

    				<h2 class="extrabold text-center">Programs for Every Age!</h2>

    				<div class="special-wordings-content d-flex justify-content-center">
                        <h1 class="first-text text-uppercase white-color">Growing</h1>
                        <h1 class="second-text text-uppercase white-color">Active</h1>
                        <h1 class="third-text text-uppercase white-color">Engaged</h1>                 
                    </div>

                    <h4 class="text-center regular exciting-gymnastics-text">Twist Naples offers exciting gymnastics, Ninja Warrior, and movement-based classes for kids of all ages. Our programs help children build strength.</h4>
				</div>
			</div>

            <a href="{{ route('schedule') }}" class="btn btn-primary hover-background-secondary animatable fadeInUp">Explore Our Programs</a>
		</div>
	</section>

    <section class="inclusive-programs-for-every-child-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <p class="text-center medium text-uppercase">Inclusive Programs for Every Child</p>
                <h3 class="text-center extrabold">Discover the Perfect Program for Your Child</h3>
            </div>

            <div class="row second-row d-flex justify-content-center animatable fadeInUp">
                <div class="column first-column">
                    <h4 class="text-center extrabold white-color">Gymnastics (Ages 3-11):</h4>
                    <p class="text-center regular white-color">Our gymnastics program helps kids build foundational and intermediate gymnastics skills in a boutique, personalized environment tailored to their fitness levels and athletic ambitions.</p>

                    <a href="{{ route('kids-gymnastics-classes') }}" class="btn btn-secondary hover-background-primary">Start Today!</a>
                </div>

                <div class="column second-column">
                    <h4 class="text-center extrabold white-color">Ninja Warrior (Ages 3-11):</h4>
                    <p class="text-center regular white-color">Challenge agility, balance, and endurance with obstacle courses designed for active kids.</p>

                    <a href="{{ route('ninja-classes-for-kids') }}" class="btn btn-secondary hover-background-primary">Climb and Conquer</a>
                </div>

                <div class="column third-column">
                    <h4 class="text-center extrabold white-color">Parent-Child Classes (Under 3 Years):</h4>
                    <p class="text-center regular white-color">A playful introduction to movement, fostering early motor skills and bonding.</p>

                    <a href="{{ route('toddler-classes') }}" class="btn btn-secondary hover-background-primary">Play and Explore</a>
                </div>
            </div>
        </div>
    </section>

    <section class="your-family-routing-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <h2 class="extrabold text-center"><span class="inherit">Flexible Class Schedules to Fit</span><br>Your Family’s Routine</h2>    
            </div>

            <div class="row second-row animatable fadeInUp">
                <iframe src="https://gymdesk.com/widgets/schedule/render/gym/A12jn?schedule=all&amp;program=allmQ" frameborder="0" scrolling="yes" seamless="seamless"></iframe>
            </div>
        </div>
    </section>

    @if (!empty($faqs) && count($faqs) > 0)

        <section class="yoga-faqs-section">
            <div class="container">
                <div class="row d-flex animatable fadeInUp">
                    <div class="column first-column">
                        <p class="medium">You Need to Know!</p>

                        <h3 class="extrabold">Frequently Asked Questions</h3>
                        <h4 class="regular">For more information or to sign up</h4>

                        <a href="{{ route('contact-us') }}" class="btn btn-primary hover-background-secondary">Contact us today!</a>
                    </div>

                    <div class="column second-column">
                        <div class="tabs-container">

                            @foreach ($faqs as $faq)
                                <div class="tab-content">
                                    <div class="tab-header d-flex align-items-center justify-content-between">
                                        <div class="tab-header-title d-flex align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <h4 class="medium">{{ $faq->question }}</h4>
                                        </div>

                                        <i class="fa fa-angle-right"></i>
                                    </div>

                                    <div class="tab-body">{!! $faq->answer !!}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')