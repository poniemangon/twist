@include('frontend.layouts.head')

@include('frontend.layouts.header')

<main class="main-content">
	<section class="parent-child-classes-section">
        <div class="container">
            <div class="row d-flex align-items-center animatable fadeInUp">
                <div class="column first-column">
                    <img src="{{ asset('public/frontend/images/parent-child-classes-image-2.png') }}" alt="An image with some miscellaneous">
                </div>

                <div class="column second-column">
                    <div class="column-content">
                        <p class="medium">Nurturing Early Development for Children Under 3</p>
                        <h1 class="extrabold"><span class="inherit white-color">Parent & Child</span> Classes for Toddlers at Twist Naples</h1>

                        <h4 class="medium">At Twist, our Parent & Child classes for toddlers under 3 offer a fun environment where your child can develop motor skills, coordination, and socialization through movement, music, and sensory play.</h4>

                        <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary">Register Now</a>
                    </div>
                </div>
            </div>
        </div>   
    </section>

    <section class="tot-program-iframe-section">
        <div class="container">
            <div class="row animatable fadeInUp">
                <h3 class="extrabold text-center">Class Schedule for Parent & Child Toddler Classes</h3>

                <iframe src="https://gymdesk.com/widgets/schedule/render/gym/A12jn?schedule=all&amp;program=VrK0Y" frameborder="0" scrolling="yes" seamless="seamless"></iframe>
            </div>
        </div>
    </section>

    <section class="classes-tailored-section">
        <div class="container">
            <div class="row first-row">
                <h3 class="text-center extrabold">Classes Tailored to Your Child’s Development Stage</h3>
                <h4 class="text-center regular">Our Parent & Child classes are divided into two groups to ensure that your child receives the most appropriate activities for their developmental stage.</h4>
            </div>

            <div class="row second-row d-flex justify-content-center">
                <div class="column first-column">
                    <h4 class="extrabold text-center white-color">Tiny Movers (8 months/3 years)</h4>
                    <p class="regular text-center white-color">This class supports ages 8 months–3 years as they progress from first steps to active running and climbing. Through music, balance work, and playful challenges, children strengthen motor skills, coordination, and confidence while enjoying time with caregivers.</p>
                </div>

                
            </div>

            <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary text-center">Join Our Parent & Child Classes Today!</a>
        </div>
    </section>

    <section class="join-us-at-twist-naples-section">
        <div class="row d-flex align-items-center">
            <div class="column first-column">
                <div class="column-content">
                    <p class="medium text-uppercase white-color">A Joyful, Safe, and Supportive Place</p>
                    <h2 class="extrabold white-color">Join Us at Twist Naples for Early Development Fun!</h2>

                    <p class="regular white-color">At Twist, we’re excited to be a part of your child’s early development journey. With a variety of fun activities and dedicated instructors, your child will enjoy every moment spent with us. Join us today and start your little one’s adventure in fitness and play!</p>

                    <a href="https://twist.gymdesk.com/signup/v/lYJpN" target="_blank" class="btn btn-primary hover-background-secondary">Don’t Wait—Sign Up Today!</a>
                </div>
            </div>

            <div class="column second-column">
                <img src="{{ asset('public/frontend/images/join-us-at-twist-naples-image.png') }}" alt="A woman playing a baby">
            </div>
        </div>
    </section>

	@include('frontend.layouts.location-map')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scripts')