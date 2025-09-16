@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="kids-gymnastics-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/kids-gymnastics-image.png') }}" alt="A little girl doing some gymnastics">
                </div>

                <div class="column second-column">
                    <div class="column-content">
                        <p class="medium text-uppercase">Build Strength, Confidence & Skills</p>
                        <h1 class="extrabold">Kids <span class="inherit white-color">Gymnastics</span> Classes in Naples, FL</h1>

                        <h4 class="medium">At Twist Naples, our gymnastics program is designed to help kids develop coordination, flexibility, and confidence</h4>

                        <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary">Let's Have Fun</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gymnastics-program-for-all-levels-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <p class="medium text-center text-uppercase">Find the Perfect Class for Your Child</p>
                <h3 class="extrabold text-center">Gymnastics Programs for All Levels</h3>

                <h4 class="regular text-center">We offer classes for all ages and skill levels, from beginners to advanced gymnasts. Our structured sessions ensure progressive skill development while keeping kids engaged and motivated.</h4>
            </div>

            <div class="row second-row d-flex justify-content-center animatable fadeInUp">
                <div class="column first-column">
                    <h4 class="extrabold text-center white-color">Gymnastics Foundations<br></h4>
                    <p class="regular text-center white-color">Explore our beginner-friendly recreational gymnastics class, perfect for introducing your child to the world of gymnastics. They’ll learn essential techniques like pike, straddle, and tuck, alongside advanced skills such as rolls, handstands, and vaults. From cartwheels on soft beams to vaulting with the springboard, children will build confidence and key skills like balance and strength. Our recreational program offers fun and structured classes for all ages, fostering strength, coordination.</p>
                </div>

                <div class="column second-column">
                    <h4 class="extrabold text-center white-color">Gymnastics Skill Builders<br></h4>
                    <p class="regular text-center white-color">Another beginner friendly recreation gymnastics class. Children are a little older and better at following direction. We get to spend more time practicing our rolls, tucks, trapeze and other fun skills!</p>
                </div>

                <div class="column third-column">
                    <h4 class="extrabold text-center white-color">Next-Level Gymnastics<br></h4>
                    <p class="regular text-center white-color"> This class requires previous participation in our Gymnastics class or approval from our Gymnastics coach – we must know your abilities ahead of time. Registration will only be permitted after the coaches approval.</p>
                </div>
            </div>

            <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary animatable fadeInUp">Sign Up Now!</a>
        </div>
    </section>

    <section class="gymnastics-program-iframe-section">
        <div class="container">
            <div class="row animatable fadeInUp">
                <h3 class="extrabold text-center">Find the Perfect Class Time</h3>

                <iframe src="https://gymdesk.com/widgets/schedule/render/gym/A12jn?schedule=all&amp;program=MNKMQ" frameborder="0" scrolling="yes" seamless="seamless"></iframe>
            </div>
        </div>
    </section>

    <section class="more-than-just-a-sport-section">
        <div class="container">
            <div class="row first-row animatable fadeInDown">
                <p class="medium text-center text-uppercase">More Than Just a Sport</p>
                <h3 class="extrabold text-center">Benefits of Gymnastics for Kids</h3>

                <h4 class="regular text-center">Gymnastics isn’t just about flips and tricks—it helps kids develop essential life skills.</h4>
            </div>

            <div class="row second-row d-flex justify-content-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/more-than-just-a-sport-icon-01.png') }}" alt="Icon of a hand with two emojis">
                    <h4 class="extrabold text-center white-color">Physical</h4>
                    <p class="regular text-center white-color">Regular exercise helps kids develop strong muscles, healthy bones, and efficient cardiovascular systems. It also reduces their risk of obesity, diabetes, and other chronic diseases later in life.</p>
                </div>

                <div class="column second-column">
                    <img src="{{ asset('public/frontend/images/more-than-just-a-sport-icon-02.png') }}" alt="Icon of a person head">
                    <h4 class="extrabold text-center white-color">Cognitive</h4>
                    <p class="regular text-center white-color">Physical activity has been linked to improved cognitive function and academic performance in children. It enhances concentration, memory, and problem-solving skills, making it easier for kids to succeed in school and beyond.</p>
                </div>

                <div class="column third-column">
                    <img src="{{ asset('public/frontend/images/more-than-just-a-sport-icon-03.png') }}" alt="Icon of a brain with muscles">
                    <h4 class="extrabold text-center white-color">Mental</h4>
                    <p class="regular text-center white-color">Exercise has been shown to reduce symptoms of anxiety, depression, and stress in children and adolescents. It also improves mood, boosts self-esteem, and promotes better sleep quality.</p>
                </div>

                <div class="column fourth-column">
                    <img src="{{ asset('public/frontend/images/more-than-just-a-sport-icon-04.png') }}" alt="Icon of a group of people">
                    <h4 class="extrabold text-center white-color">Social</h4>
                    <p class="regular text-center white-color">Participating in group fitness classes provides kids with opportunities to make new friends, develop teamwork skills, and build a sense of camaraderie. It also teaches them important social skills like cooperation, communication, and leadership.</p>
                </div>
            </div>

            <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary animatable fadeInUp">Watch Them Grow</a>
        </div>
    </section>

    @include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')