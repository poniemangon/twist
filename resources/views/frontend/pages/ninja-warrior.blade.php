@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="ninja-warrior-classes-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/ninja-warrior-classes-image.png') }}" alt="A child dressed as a Ninja Warrior">
                </div>

                <div class="column second-column">
                    <div class="column-content">
                        <p class="medium text-uppercase">Strength, Agility & Confidence – All in One Class</p>

                        <h1 class="extrabold"><span class="inherit white-color">Ninja Warrior</span> Classes for Kids in Naples, FL</h1>

                        <h4 class="medium">Is your child ready to climb, jump, and conquer obstacles like a real ninja? Twist’s Ninja Warrior classes in Naples, FL, offer an exciting way for kids to develop strength, coordination, and confidence in a safe and engaging environment.</h4>

                        <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary">Try a Free Class Today!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ninja-warrior-program-iframe-section">
        <div class="container">
            <div class="row animatable fadeInUp">
                <h3 class="extrabold text-center">Find the Perfect Class Time</h3>

                <iframe src="https://gymdesk.com/widgets/schedule/render/gym/A12jn?schedule=all&amp;program=XWo4G" frameborder="0" scrolling="yes" seamless="seamless"></iframe>
            </div>
        </div>
    </section>

    <section class="strength-skill-confidence-await-section">
        <div class="row d-flex align-items-end">
            <div class="column first-column animatable fadeInUp">
                <div class="column-content">
                    <p class="medium text-uppercase white-color">Strength, Skill & Confidence Await</p>
                    <h2 class="extrabold white-color">The Journey to Ninja Mastery Starts Here!</h2>
                    <p class="regular white-color description-text">Every great ninja starts somewhere—why not here? At Twist, we help kids push their limits in a fun and supportive environment. No matter their age or skill level, we have a class that’s the perfect fit.<br>Are they ready to take on the challenge?</p>

                    <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary">Let’s get started!</a>
                </div>
            </div>

            <div class="column second-column">
                <img src="{{ asset('public/frontend/images/strength-skill-confidence-await-image.png') }}" alt="A Ninja warrior kid">
            </div>
        </div>
    </section>

    <section class="find-the-perfect-ninja-class-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <h3 class="extrabold text-center">Find the Perfect Ninja Class for Your Child</h3>
                <h4 class="regular text-center">Our Ninja Warrior classes run weekly, offering flexible scheduling options to fit your family’s needs. Each class is designed for different age groups and skill levels, ensuring every child is challenged and engaged.</h4>
            </div>

            <div class="row second-row d-flex justify-content-center animatable fadeInUp">
                <div class="column second-column">
                    <h4 class="extrabold text-center white-color">Ninja Warrior Jr.<br></h4>
                    <p class="regular text-center white-color">This action-packed class teaches kids perseverance through fun relays, games, and ever-changing challenges. Watch them progress from rookie to ninja pro while developing key physical and mental skills.</p>
                </div>

                <div class="column third-column">
                    <h4 class="extrabold text-center white-color">Ninja Warrior<br></h4>
                    <p class="regular text-center white-color">A thrilling class for siblings to train together! Kids develop strength, agility, and confidence through climbing, obstacle courses, and team challenges in a fun environment.</p>
                </div>

                <div class="column fourth-column">
                    <h4 class="extrabold text-center white-color">Ninja Samurai<br></h4>
                    <p class="regular text-center white-color">Designed for older ninjas, this class challenges kids with intense obstacle courses, warped walls, and dynamic strength-building activities. They’ll build stamina, confidence, and problem-solving.</p>
                </div>
            </div>

            <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary animatable fadeInUp">Sign Up Today!</a>
        </div>
    </section>

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')