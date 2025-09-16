@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="class-schedule-section relative">
        <div class="container relative">
            <img src="{{ asset('public/frontend/images/vector-08.png') }}" alt="A Miscellaneous" class="vector-08 rotation">

            <img src="{{ asset('public/frontend/images/vector-07.png') }}" alt="A Miscellaneous" class="vector-07 rotation">

            <div class="row animatable fadeInUp">
                <p class="medium text-center text-uppercase">Find the Perfect Class for Your Child</p>
                <h1 class="extrabold text-center">Class <span class="inherit white-color">Schedule</span></h1>

                <h4 class="medium text-center">At Twist Naples, we offer a variety of exciting and engaging classes for kids of all ages!</h4>
            </div>
        </div>

        <img src="{{ asset('public/frontend/images/vector-09.png') }}" alt="A Miscellaneous" class="vector-09">

        <img src="{{ asset('public/frontend/images/vector-10.png') }}" alt="A Miscellaneous" class="vector-10">
    </section>

    <section class="iframe-schedule-section">
        <div class="container">
            <div class="row animatable fadeInUp">
                <iframe src="https://gymdesk.com/widgets/schedule/render/gym/A12jn?schedule=all&amp;program=allmQ" frameborder="0" scrolling="yes" seamless="seamless"></iframe>

                <div class="tooltip">
                    <p class="white-color">Private or Semi-Private Lessons and <span class="inherit white-color">Technical Skills Clinics available</span> upon request.</p>
                </div>
            </div>
        </div>
    </section>

	@include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')