@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="about-us-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/about-us-image.png') }}" alt="Image of happy children">
                </div>

                <div class="column second-column">
                    <div class="column-content">
                        <p class="medium text-uppercase">Twist Naples</p>
                        <h1 class="extrabold">About Us</h1>

                        <h4 class="medium">At Twist, we create a space where kids build confidence, strength, and coordination while having a blast! Our programs blend structured learning with exciting movement to help children grow physically and mentally.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-story-section">
        <div class="row d-flex">
            <div class="column first-column animatable fadeInUp">
                <div class="column-content">
                    <p class="medium text-uppercase white-color">Our story</p>

                    <h2 class="extrabold white-color">How Twist Come to Life</h2>

                    <p class="regular white-color">The idea for Twist began with a simple goal: to make fitness fun, engaging, and inclusive for kids. Traditional programs often felt like a chore, leading many children to lose interest. Our founder set out to change that by creating a space where kids could explore, play, and discover their unique strengths. Twist was born to provide a safe, supportive environment where children thrive physically, mentally, and emotionally. Through innovative classes, passionate instructors, and a vibrant community, we inspire a lifelong love for movement and empower kids to stay active.</p>

                    <a href="{{ route('general-programs') }}" class="btn btn-primary hover-background-secondary">Explore Our Programs</a>
                </div>
            </div>

            <div class="column second-column">
                <div class="column-content">
                    <img src="{{ asset('public/frontend/images/our-story-banner.png') }}" alt="A hand taking some paint pencils">
                </div>
            </div>
        </div>
    </section>

    <section class="real-results-lasting-impact-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/real-results-lasting-impact-image.png') }}" alt="A girl doing gymnastic">
                </div>

                <div class="column second-column">
                    <p class="medium text-uppercase">Building Confidence, Strength, and Skills</p>

                    <h2 class="extrabold">Real Results, Lasting Impact</h2>

                    <p class="regular">At Twist, kids do more than play—they build lifelong skills! Our classes boost strength, coordination, focus, and confidence, helping them grow into active, resilient kids. Parents see the difference on the field, at home, and beyond!</p>

                    <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary">See the Difference</a>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <p class="medium text-uppercase text-center">Why choose us</p>
                <h2 class="extrabold text-center">Our Core Values</h2>

                <h4 class="regular text-center">When it comes to finding the perfect fitness program for your child, there are plenty of options out there. So why choose Twist? Here are just a few reasons why we stand out from the crowd:</h4>
            </div>

            <div class="row second-row d-flex animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/why-choose-us-icon-01.png') }}" alt="Icon of a pair of gym weights">
                    <h4 class="text-center extrabold white-color">Fun Fitness Classes</h4>

                    <p class="text-center regular white-color">Our fun and engaging classes make exercise feel like play, with activities from dance to obstacle courses.</p>
                </div>

                <div class="column second-column">
                    <img src="{{ asset('public/frontend/images/why-choose-us-icon-02.png') }}" alt="Icon of a pair of gym weights">

                    <h4 class="text-center extrabold white-color">Passionate Instructors</h4>

                    <p class="text-center regular white-color">Our trained team fosters a healthy lifestyle, guiding each child to reach their fitness goals safely.</p>
                </div>

                <div class="column third-column">
                    <img src="{{ asset('public/frontend/images/why-choose-us-icon-03.png') }}" alt="Icon of a pair of gym weights">

                    <h4 class="text-center extrabold white-color">Inclusive Programs</h4>

                    <p class="text-center regular white-color">We welcome children of all ages and abilities, creating a community where everyone can thrive.</p>
                </div>

                <div class="column fourth-column">
                    <img src="{{ asset('public/frontend/images/why-choose-us-icon-04.png') }}" alt="Icon of a pair of gym weights">

                    <h4 class="text-center extrabold white-color">Safe Environment</h4>

                    <p class="text-center regular white-color">Safety is our priority, with strict protocols, regular equipment checks, and expert supervision.</p>
                </div>
            </div>
        </div>        
    </section>

    @include('frontend.layouts.mark-calendar')

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')