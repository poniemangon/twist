@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="class-schedule-section relative">
        <div class="container relative">
            <img src="{{ asset('public/frontend/images/vector-08.png') }}" alt="A Miscellaneous" class="vector-08 rotation">

            <img src="{{ asset('public/frontend/images/vector-07.png') }}" alt="A Miscellaneous" class="vector-07 rotation">

            <div class="row animatable fadeInUp">
                <p class="medium text-center text-uppercase">Drop In & Let Them Play</p>
                <h1 class="extrabold text-center">Open <span class="inherit white-color">Gym</span></h1>

                <h4 class="medium text-center">Explore, climb, and move freely! Open Gym is the perfect no-pressure playtime for kids of all ages.</h4>
            </div>
        </div>

        <img src="{{ asset('public/frontend/images/vector-09.png') }}" alt="A Miscellaneous" class="vector-09">

        <img src="{{ asset('public/frontend/images/vector-10.png') }}" alt="A Miscellaneous" class="vector-10">
    </section>

    <section class="iframe-schedule-section open-gym-iframe-schedule-section">
        <div class="container">
            <div class="row animatable fadeInUp">
                <iframe src="https://gymdesk.com/widgets/schedule/render/gym/A12jn?schedule=all&program=bRGmQ" frameborder="0" scrolling="yes" seamless="seamless"></iframe>
            </div>
        </div>
    </section>

	@include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')