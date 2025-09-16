<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//libraries
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//models
use App\Models\PricingsModel;
use App\Models\PricingBenefitsModel;
use App\Models\KidsCampsPricingsModel;
use App\Models\KidsCampsPricesModel;
use App\Models\KidsCampsPricingFeaturesModel;
use App\Models\PartyOptionsModel;
use App\Models\PartyOptionSuppliesModel;
use App\Models\PartyOptionPricesModel;
use App\Models\FaqsModel;
use App\Models\TestimonialsModel;
use App\Models\NewslettersModel;

class FrontPageController extends Controller {
    
    public function index() {

        $metaTitle = 'Twist Naples';
        $metaDescription = 'Enroll your child in fun fitness and gymnastics classes at Twist Naples activity center! Join our exciting programs today for a healthy, active lifestyle.';

        $testimonials = TestimonialsModel::orderBy('testimony_id', 'desc')->get();

        $scripts = array('instagram-feed.js');

        return view('frontend.pages.index', compact('metaTitle', 'metaDescription', 'testimonials', 'scripts'));
    }

    public function aboutUs() {

        $metaTitle = 'About Us | Twist Naples';
        $metaDescription = 'Learn about Twist Naples — where movement meets fun! Discover our mission, team, and why families love our programs, including our popular Parents Night Out.';
        
        return view('frontend.pages.about-us', compact('metaTitle', 'metaDescription'));
    }

    public function campForKids() {

        $metaTitle = 'Camp For Kids | Twist Naples';
        $metaDescription = 'Twist Naples camps keep kids active and engaged during school breaks with gymnastics, games, and creative fun all in a safe and energetic space they’ll love.';

        $kidCampsPricings = KidsCampsPricingsModel::orderBy('kid_camp_pricing_id', 'asc')->get();

        if (!empty($kidCampsPricings) && count($kidCampsPricings) > 0) {
            foreach ($kidCampsPricings as $kidCampPricing) {
                $kidCampPricing->prices = KidsCampsPricesModel::where('kid_camp_pricing_id', $kidCampPricing->kid_camp_pricing_id)->orderBy('kid_camp_price_list_id', 'asc')->get();
                $kidCampPricing->features = KidsCampsPricingFeaturesModel::where('kid_camp_pricing_id', $kidCampPricing->kid_camp_pricing_id)->orderBy('kid_camp_pricing_feature_id', 'asc')->get();
            }
        }
        
        return view('frontend.pages.camps-new', compact('metaTitle', 'metaDescription', 'kidCampsPricings'));
    }

    public function contactUs() {

        $metaTitle = 'Contact Us | Twist Naples';
        $metaDescription = "Get in touch with Twist Naples! Ask about classes, camps, or our exciting Parents Night Out. We're here to help you plan fun, active experiences for your kids.";
        
        $usesCaptcha = true;

        return view('frontend.pages.contact-us', compact('metaTitle', 'metaDescription', 'usesCaptcha'));
    }

    public function generalPrograms() {

        $metaTitle = 'General Programs | Twist Naples';
        $metaDescription = "Explore Twist Naples' general programs where kids stay active, build confidence, and have fun through movement and play-based activities.";

        $faqs = FaqsModel::where('page', 'General programs page')->orderBy('order', 'asc')->get();
        
        return view('frontend.pages.general-programs', compact('metaTitle', 'metaDescription', 'faqs'));
    }

    public function kidsGymnasticsClasses() {
        
        $metaTitle = 'Kids Gymnastics Classes | Twist Naples';
        $metaDescription = 'Discover kids gymnastics classes at Twist Naples, where fun, confidence, and skill-building come together with the support of caring, experienced coaches.';

        return view('frontend.pages.gymnastics', compact('metaTitle', 'metaDescription'));
    }

    public function ourTeam() {

        $metaTitle = 'Our Team | Twist Naples';
        $metaDescription = 'Meet the passionate instructors who make Twist Naples a fun place for kids, dedicated to creating a safe, inspiring, and high-energy space for all ages.';
        
        return view('frontend.pages.meet-our-team', compact('metaTitle', 'metaDescription'));
    }

    public function ninjaWarriorForKids() {

        $metaTitle = 'Ninja Classes For Kids | Twist Naples';
        $metaDescription = 'At Twist, we bring the ENERGY! Our ninja classes for kids offer a fun, safe space to build fitness, listening, and social skills with personalized attention.';
        
        return view('frontend.pages.ninja-warrior', compact('metaTitle', 'metaDescription'));
    }

    public function openGym() {

        $metaTitle = 'Open Gym for Kids | Twist Naples';
        $metaDescription = 'Enjoy flexible, drop-in play at Twist Naples! Open Gym lets kids of all ages explore, move, and have fun in a safe, active space.';

        return view('frontend.pages.open-gym', compact('metaTitle', 'metaDescription'));
    }

    public function partiesForKids() {

        $metaTitle = 'Parties For Kids | Twist Naples';
        $metaDescription = 'Celebrate with unforgettable parties for kids at Twist Naples. Fun, active, and stress-free events with games, gymnastics, and personalized party packages.';

        $partyOptions = PartyOptionsModel::orderBy('party_option_id', 'asc')->get();

        if (!empty($partyOptions) && count($partyOptions) > 0) {
            foreach ($partyOptions as $partyOption) {
                $partyOption->prices = PartyOptionPricesModel::where('party_option_id', $partyOption->party_option_id)->orderBy('party_option_price_id', 'asc')->get();
                $partyOption->twistSupplier = PartyOptionSuppliesModel::where([['party_option_id', $partyOption->party_option_id], ['Supplier', 'Twist']])->orderBy('party_option_supply_id', 'asc')->get();
                $partyOption->customerSupplier = PartyOptionSuppliesModel::where([['party_option_id', $partyOption->party_option_id], ['Supplier', 'Customer']])->orderBy('party_option_supply_id', 'asc')->get();
            }
        }
        
        return view('frontend.pages.parties', compact('metaTitle', 'metaDescription', 'partyOptions'));
    }

    public function pno() {

        $metaTitle = 'Parents Night Out | Twist Naples';
        $metaDescription = 'Enjoy a stress-free evening with our Parents Night Out at Twist Naples. Kids have a blast with games and activities while you take a well-deserved break!';
        
        return view('frontend.pages.pno', compact('metaTitle', 'metaDescription'));
    }

    public function pnoTest() {

        $metaTitle = 'Parents Night Out | Twist Naples';
        $metaDescription = 'Enjoy a stress-free evening with our Parents Night Out at Twist Naples. Kids have a blast with games and activities while you take a well-deserved break!';
        
        return view('frontend.pages.pno-test', compact('metaTitle', 'metaDescription'));
    }

    public function pricing() {

        $metaTitle = 'Pricing | Twist Naples';
        $metaDescription = "Explore pricing for all our programs at Twist Naples—including classes, camps, and Parents Night Out. Find the perfect fit for your family's active lifestyle.";

        //general prices
        $pricings = PricingsModel::where('is_open_gym_price', 0)->orderBy('pricing_id', 'asc')->get();

        if (!empty($pricings) && count($pricings) > 0) {
            foreach ($pricings as $pricing) {
                $pricing->pricingBenefits = PricingBenefitsModel::where('pricing_id', $pricing->pricing_id)->orderBy('pricing_benefit_id', 'asc')->get();
            }
        }


        //open gym prices
        $openGymPrices = PricingsModel::where('is_open_gym_price', 1)->orderBy('pricing_id', 'asc')->get();

        if (!empty($openGymPrices) && count($openGymPrices) > 0) {
            foreach ($openGymPrices as $openGymPrice) {
                $openGymPrice->pricingBenefits = PricingBenefitsModel::where('pricing_id', $openGymPrice->pricing_id)->orderBy('pricing_benefit_id', 'asc')->get();
            }
        }
        
        return view('frontend.pages.pricing', compact('metaTitle', 'metaDescription', 'pricings', 'openGymPrices'));
    }

    public function schedule() {

        $metaTitle = 'Schedule | Fun Place For Kids | Twist Naples';
        $metaDescription = 'Looking for a fun place for kids? Twist Naples offers exciting, family-friendly classes that keep kids active, engaged, and smiling every day!';
        
        return view('frontend.pages.schedule', compact('metaTitle', 'metaDescription'));
    }

    public function toddlerClasses() {

        $metaTitle = 'Toddler Classes | Twist Naples';
        $metaDescription = 'Join our Parent & Child classes at Twist Naples to help toddlers under 3 build motor skills, coordination, and confidence through movement, music, and play.';
        
        return view('frontend.pages.tot', compact('metaTitle', 'metaDescription'));
    }

    public function submitContactForm(Request $request) {

        $messages = [
            'name.required' => 'You must insert your name',
            'name.min' => 'The name should contain at least 3 characters',
            'name.max' => 'The name should contain less than 50 characters',
            'email.required' => 'You must insert your email',
            'email.email' => 'The inserted email is invalid',
            'email.max' => 'The inserted email must contain less than 80 characters',
            'phone.required' => 'You must insert your phone number',
            'phone.numeric' => 'The phone number must be numeric',
            'subject.required' => 'You must insert a subject',
            'subject.max' => 'The subject must contain less than 120 characters',
            'message.required' => 'You must insert your message',
            'message.max' => 'The message must contain less than 2500 characters'
        ];

        $validations = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|max:80',
            'phone' => 'required|numeric',
            'subject' => 'required|max:120',
            'message' => 'required|max:2500'
        ], $messages);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');
        $recaptcha = $request->input('g-recaptcha-response');

        if (!$recaptcha) { return response()->json(['success' => false, 'message' => 'You must complete the captcha']); }

        $secret = '6Leru4MrAAAAANFkrsAahXqxQD9PyPAx2oJSa0PB';
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha"
        );
        $responseKeys = json_decode($response, true);

        if (!$responseKeys["success"]) { return response()->json(['success' => false, 'message' => 'Invalid captcha']); }

        $mail = new PHPMailer(true);

        $mail->isSMTP();

        $mail->Host = 'c98508.sgvps.net';

        $mail->SMTPAuth = true;

        $mail->Username = 'notifications@twistnaples.com';

        $mail->Password = 'ex[@b(hi&5f]';       

        $mail->SMTPSecure = 'ssl';         

        $mail->Port = 465;

        $mail->setFrom('notifications@twistnaples.com', 'Twist Notifications');

        $mail->CharSet = 'UTF-8';

        $mail->isHTML(true);

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
       
        $mail->addAddress('coaches@twistnaples.com');

        $mail->isHTML(true);

        $mail->Subject = 'New contact lead from the website - Twist Naples';

        $content = '<!DOCTYPE html>

        <html>

            <head>

                <style>

                    @media (max-width: 575px) {

                        .title { padding-top: 25px; margin-bottom: 20px !important; }

                        .span-item { display: block; width: 100%; text-align: center; padding-left: 0 !important; }

                        .contact { margin-bottom: 7px; }

                        .bar { display: none !important; }

                        .email { margin-bottom: 7px;}

                    }

                </style>

            </head>

            <body>

                <table style="width: 100%">

                    <tbody>

                        <tr>

                            <td>

                                <h1 class="title" style="color: #F7941D; text-align: center; font-size: 24px; margin-bottom: 0; margin-top: 15px; line-height: 1.1">New contact lead from the website - Twist Naples</h1>

                            </td>

                        </tr>

                        <tr>

                            <td style="text-align: center; font-family: Arial; color: #333333; font-size: 18px; padding-top: 15px"><b>Name:</b> '.$name.'</td>

                        </tr>

                        <tr>

                            <td style="text-align: center; font-family: Arial; color: #333333; font-size: 18px; padding-top: 15px"><b>Email:</b> '.$email.'</td>

                        </tr>

                        <tr>

                            <td style="text-align: center; font-family: Arial; color: #333333; font-size: 18px; padding-top: 15px"><b>Phone:</b> '.$phone.'</td>

                        </tr>

                        <tr>

                            <td style="text-align: center; font-family: Arial; color: #333333; font-size: 18px; padding-top: 15px"><b>Subject:</b> '.$subject.'</td>

                        </tr>

                        <tr>

                            <td style="text-align: center; font-family: Arial; color: #333333; font-size: 18px; padding-top: 15px"><b>Message:</b> '.$message.'</td>

                        </tr>

                    </tbody>

                </table>

            </body>

        </html>';

        $mail->Body = $content;

        if (!$mail->send()) {
            return response()->json(['success' => false, 'message' => 'Your message could not be delivered. Please, try later']);
        } else {
            return response()->json(['success' => true, 'message' => 'Your inquiry has been sent successfully. We will respond shortly']);
        }
    }

    public function submitNewsletterForm(Request $request) {

        $messages = [
            'email.required' => 'You must insert your email',
            'email.email' => 'The inserted email is invalid',
            'email.max' => 'The inserted email must contain less than 80 characters',
            'email.unique' => 'The inserted email already exists in our database'
        ];

        $validations = $request->validate([
            'email' => 'required|email|max:80|unique:tw_newsletters'
        ], $messages);

        $email = $request->input('email');

        $newslettersModel = new NewslettersModel();
        $newslettersModel->email = $email;
        $newslettersModel->registration_date = date('Y/m/d H:i:s');
        $newslettersModel->save();

        return response()->json(['success' => true, 'message' => 'You have subscribed successfully. Thanks!']);
    }
}