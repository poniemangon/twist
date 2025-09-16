<?php

use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\Backend\PricingController;
use App\Http\Controllers\Backend\KidCampController;
use App\Http\Controllers\Backend\PartyOptionController;
use App\Http\Controllers\Backend\TestimonyController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\SponsorController;
use App\Http\Controllers\Backend\NewsletterController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ArticlesController;

use App\Http\Controllers\Frontend\FrontPageController;

Route::get('clear-route-cache', function () {
    Artisan::call('config:clear');
    return 'Routes cache has clear successfully !';
});

//clear config cache
Route::get('clear-config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache has clear successfully !';
});

// clear application cache
Route::get('clear-app-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache has clear successfully!';
});

// clear view cache
Route::get('clear-view-cache', function () {
    Artisan::call('view:clear');
    return 'View cache has clear successfully!';
});

//backend routes
Route::group(['prefix' => 'twist-administration'], function() {
    Route::group(['middleware' => 'preventBackHistory'], function() {
        Route::middleware(['checkAdministratorSession'])->group(function () {

            //pricing
            Route::get('pricings-list', [PricingController::class, 'list'])->name('pricings-list');

            Route::get('register-pricing', [PricingController::class, 'register'])->name('register-pricing');
            Route::post('register-pricing', [PricingController::class, 'registerPricing'])->name('register-pricing');

            Route::get('edit-pricing/{pricingId}', [PricingController::class, 'edit'])->name('edit-pricing');
            Route::post('edit-pricing/{pricingId}', [PricingController::class, 'editPricing'])->name('edit-pricing');

            Route::delete('delete-pricing/{pricingId}', [PricingController::class, 'deletePricing'])->name('delete-pricing');



            //kids camps
            Route::get('kids-camps-pricings-list', [KidCampController::class, 'list'])->name('kids-camps-pricings-list');

            Route::get('register-kid-camp-pricing', [KidCampController::class, 'register'])->name('register-kid-camp-pricing');
            Route::post('register-kid-camp-pricing', [KidCampController::class, 'registerKidCampPricing'])->name('register-kid-camp-pricing');

            Route::get('edit-kid-camp-pricing/{kidCampPricingId}', [KidCampController::class, 'edit'])->name('edit-kid-camp-pricing');
            Route::post('edit-kid-camp-pricing/{kidCampPricingId}', [KidCampController::class, 'editKidCampPricing'])->name('edit-kid-camp-pricing');

            Route::delete('delete-kid-camp-pricing/{kidCampPricingId}', [KidCampController::class, 'deleteKidCampPricing'])->name('delete-kid-camp-pricing');



            //party options
            Route::get('party-options-list', [PartyOptionController::class, 'list'])->name('party-options-list');

            Route::get('register-party-option', [PartyOptionController::class, 'register'])->name('register-party-option');
            Route::post('register-party-option', [PartyOptionController::class, 'registerPartyOption'])->name('register-party-option');

            Route::get('edit-party-option/{partyOptionId}', [PartyOptionController::class, 'edit'])->name('edit-party-option');
            Route::post('edit-party-option/{partyOptionId}', [PartyOptionController::class, 'editPartyOption'])->name('edit-party-option');

            Route::delete('delete-party-option/{partyOptionId}', [PartyOptionController::class, 'deletePartyOption'])->name('delete-party-option');

            

            //testimonials
            Route::get('testimonials-list', [TestimonyController::class, 'list'])->name('testimonials-list');

            Route::get('register-testimony', [TestimonyController::class, 'register'])->name('register-testimony');
            Route::post('register-testimony', [TestimonyController::class, 'registerTestimony'])->name('register-testimony');

            Route::get('edit-testimony/{testimonyId}', [TestimonyController::class, 'edit'])->name('edit-testimony');
            Route::post('edit-testimony/{testimonyId}', [TestimonyController::class, 'editTestimony'])->name('edit-testimony');

            Route::delete('delete-testimony/{testimonyId}', [TestimonyController::class, 'deleteTestimony'])->name('delete-testimony');



            //faqs
            Route::get('faqs-list', [FaqController::class, 'list'])->name('faqs-list');

            Route::get('register-faq', [FaqController::class, 'register'])->name('register-faq');
            Route::post('register-faq', [FaqController::class, 'registerFaq'])->name('register-faq');

            Route::get('edit-faq/{faqId}', [FaqController::class, 'edit'])->name('edit-faq');
            Route::post('edit-faq/{faqId}', [FaqController::class, 'editFaq'])->name('edit-faq');

            Route::delete('delete-faq/{faqId}', [FaqController::class, 'deleteFaq'])->name('delete-faq');

            Route::post('update-faqs-positions', [FaqController::class, 'updateFaqsPositions'])->name('update-faqs-positions');



            //sponsors
            Route::get('sponsors-list', [SponsorController::class, 'list'])->name('sponsors-list');

            Route::get('register-sponsor', [SponsorController::class, 'register'])->name('register-sponsor');
            Route::post('register-sponsor', [SponsorController::class, 'registerSponsor'])->name('register-sponsor');

            Route::get('edit-sponsor/{sponsorId}', [SponsorController::class, 'edit'])->name('edit-sponsor');
            Route::post('edit-sponsor/{sponsorId}', [SponsorController::class, 'editSponsor'])->name('edit-sponsor');

            Route::delete('delete-sponsor/{sponsorId}', [SponsorController::class, 'deleteSponsor'])->name('delete-sponsor');

            //articles
            Route::get('articles-list', [ArticlesController::class, 'list'])->name('articles-list');
            Route::get('register-article', [ArticlesController::class, 'register'])->name('register-article');
            Route::post('register-article', [ArticlesController::class, 'registerArticle'])->name('register-article');
            Route::get('edit-article/{articleId}', [ArticlesController::class, 'edit'])->name('edit-article');
            Route::post('edit-article/{articleId}', [ArticlesController::class, 'editArticle'])->name('edit-article');
            Route::delete('delete-article/{articleId}', [ArticlesController::class, 'deleteArticle'])->name('delete-article');
            Route::post('check-url-slug', [ArticlesController::class, 'checkUrlSlug'])->name('check-url-slug');


            //newsletters
            Route::get('newsletters-list', [NewsletterController::class, 'list'])->name('newsletters-list');

            Route::delete('delete-newsletter/{newsletterId}', [NewsletterController::class, 'deleteNewsletter'])->name('delete-newsletter');

            Route::post('export-newsletters', [NewsletterController::class, 'exportNewsletterList'])->name('export-newsletters');



            //users
            Route::get('users-list', [UserController::class, 'list'])->name('users-list');

            Route::get('register-user', [UserController::class, 'register'])->name('register-user');
            Route::post('register-user', [UserController::class, 'registerUser'])->name('register-user');

            Route::get('edit-user/{userId}', [UserController::class, 'edit'])->name('edit-user');
            Route::post('edit-user/{userId}', [UserController::class, 'editUser'])->name('edit-user');

            Route::delete('delete-user/{userId}', [UserController::class, 'deleteUser'])->name('delete-user');

            Route::get('profile', [UserController::class, 'profile'])->name('profile');

            Route::get('logout', [UserController::class, 'logout'])->name('logout');
        });

        Route::get('/', [UserController::class, 'login'])->name('/');
        Route::post('login-user', [UserController::class, 'loginUser'])->name('login-user');
    });
});

//frontend routes
Route::get('/', [FrontPageController::class, 'index'])->name('/');
Route::get('about-us', [FrontPageController::class, 'aboutUs'])->name('about-us');
Route::get('camp-for-kids', [FrontPageController::class, 'campForKids'])->name('camp-for-kids');
Route::get('contact-us', [FrontPageController::class, 'contactUs'])->name('contact-us');
Route::get('general-programs', [FrontPageController::class, 'generalPrograms'])->name('general-programs');
Route::get('kids-gymnastics-classes', [FrontPageController::class, 'kidsGymnasticsClasses'])->name('kids-gymnastics-classes');
Route::get('our-team', [FrontPageController::class, 'ourTeam'])->name('our-team');
Route::get('ninja-classes-for-kids', [FrontPageController::class, 'ninjaWarriorForKids'])->name('ninja-classes-for-kids');
Route::get('open-gym', [FrontPageController::class, 'openGym'])->name('open-gym');
Route::get('parties-for-kids', [FrontPageController::class, 'partiesForKids'])->name('parties-for-kids');
Route::get('parents-night-out', [FrontPageController::class, 'pno'])->name('parents-night-out');
Route::get('parents-night-out-test', [FrontPageController::class, 'pnoTest'])->name('parents-night-out-test');
Route::get('pricing', [FrontPageController::class, 'pricing'])->name('pricing');
Route::get('schedule', [FrontPageController::class, 'schedule'])->name('schedule');
Route::get('toddler-classes', [FrontPageController::class, 'toddlerClasses'])->name('toddler-classes');

Route::post('submit-contact-form', [FrontPageController::class, 'submitContactForm'])->name('submit-contact-form');
Route::post('submit-newsletter-form', [FrontPageController::class, 'submitNewsletterForm'])->name('submit-newsletter-form');