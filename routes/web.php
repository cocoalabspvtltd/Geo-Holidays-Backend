<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //################################### Package-Category #############################################//

    Route::get('category', [App\Http\Controllers\PackageCategoryController::class, 'index'])->name('category.index');

    Route::get('create-category', [App\Http\Controllers\PackageCategoryController::class, 'create'])->name('category.create');

    Route::post('store-category', [App\Http\Controllers\PackageCategoryController::class, 'store'])->name('category.store');

    Route::get('/package-category/{packageCategory}/edit', [App\Http\Controllers\PackageCategoryController::class, 'edit'])->name('category.edit');

    Route::put('/package-category/{packageCategory}/update', [App\Http\Controllers\PackageCategoryController::class, 'update'])->name('category.update');

    Route::get('/package-category/{packageCategory}/delete', [App\Http\Controllers\PackageCategoryController::class, 'destroy'])->name('category.destroy');



    //################################### Package-Tour #############################################//

    Route::get('create-tours', [App\Http\Controllers\PackageTourController::class, 'create'])->name('tour.create');

    Route::post('store-tour', [App\Http\Controllers\PackageTourController::class, 'store'])->name('tour.store');

    Route::get('tours', [App\Http\Controllers\PackageTourController::class, 'index'])->name('tour.index');

    Route::get('edit-tour/{tourId}', [App\Http\Controllers\PackageTourController::class, 'show'])->name('tour.edit');

    Route::put('update-tour/{tourId}', [App\Http\Controllers\PackageTourController::class, 'update'])->name('tour.update');

    Route::get('delete-tour/{tourId}', [App\Http\Controllers\PackageTourController::class, 'destroy'])->name('tour.destroy');

     // Route to show the form for creating or editing the Testimonial Banner
     Route::get('package-gallery-banner/create', [App\Http\Controllers\PackageTourController::class, 'createBanner'])->name('package_gallery_banner.create');
     // Route to handle the form submission and save the Testimonial Banner
     Route::post('package-gallery-banner/store', [App\Http\Controllers\PackageTourController::class, 'storeBanner'])->name('package_gallery_banner.store');
     Route::get('package-gallery-banner', [App\Http\Controllers\PackageTourController::class, 'bannerIndex'])->name('package_gallery_banner.index');
     Route::get('package-gallery-banner/edit', [App\Http\Controllers\PackageTourController::class, 'editBanner'])->name('package_gallery_banner.edit');
     Route::put('package-gallery-banner/update', [App\Http\Controllers\PackageTourController::class, 'updateBanner'])->name('package_gallery_banner.update');


    //################################### Offers #############################################//

    Route::get('Add-offers', [App\Http\Controllers\OffersController::class, 'create'])->name('offers.create');

    Route::post('store-offers', [App\Http\Controllers\OffersController::class, 'store'])->name('offers.store');

    Route::get('offers', [App\Http\Controllers\OffersController::class, 'index'])->name('offers.index');

    Route::get('/offers/{offers}/edit', [App\Http\Controllers\OffersController::class, 'edit'])->name('offers.edit');

    Route::put('/offers/{offers}/update', [App\Http\Controllers\OffersController::class, 'update'])->name('offers.update');

    Route::get('/offers/{offers}/delete', [App\Http\Controllers\OffersController::class, 'destroy'])->name('offers.destroy');

    //################################### Flight and Hotel #############################################//

    Route::get('add_details', [App\Http\Controllers\FlightandHotelController::class, 'create'])->name('flight_and_hotel.create');

    Route::post('store-details', [App\Http\Controllers\FlightandHotelController::class, 'store'])->name('flight_and_hotel.store');

    Route::get('Flight-and-Hotels', [App\Http\Controllers\FlightandHotelController::class, 'index'])->name('flight_and_hotel.index');

    Route::get('/Flight-and-Hotels/{flightandHotel}/edit', [App\Http\Controllers\FlightandHotelController::class, 'edit'])->name('flight_and_hotel.edit');

    Route::put('/Flight-and-Hotels/{flightandHotel}/update', [App\Http\Controllers\FlightandHotelController::class, 'update'])->name('flight_and_hotel.update');

    Route::get('/Flight-and-Hotels/{flightandHotel}/delete', [App\Http\Controllers\FlightandHotelController::class, 'destroy'])->name('flight_and_hotel.destroy');


    //################################### Ayurvedic Packages #############################################//

    Route::get('add-ayurveda-details', [App\Http\Controllers\AyurvedicPackagesController::class, 'create'])->name('ayurvedic_packages.create');

    Route::post('store-ayurveda-details', [App\Http\Controllers\AyurvedicPackagesController::class, 'store'])->name('ayurvedic_packages.store');

    Route::get('edit-ayurveda-details/{ayurvedicPackages}/edit', [App\Http\Controllers\AyurvedicPackagesController::class, 'edit'])->name('ayurvedic_packages.edit');

    Route::put('update-ayurveda-details/{ayurvedicPackages}/update', [App\Http\Controllers\AyurvedicPackagesController::class, 'update'])->name('ayurvedic_packages.update');

    Route::get('Ayurvedic Packages', [App\Http\Controllers\AyurvedicPackagesController::class, 'index'])->name('ayurvedic_packages.index');

    Route::get('/delete-ayurveda-details/{ayurvedicPackages}/delete', [App\Http\Controllers\AyurvedicPackagesController::class, 'destroy'])->name('ayurvedic_packages.destroy');

    //############################################## Services ######################################################################//

    Route::get('add-services', [App\Http\Controllers\ServicesController::class, 'create'])->name('services.create');

    Route::post('store-service-details', [App\Http\Controllers\ServicesController::class, 'store'])->name('services.store');

    Route::get('edit-service-details/{service}/edit', [App\Http\Controllers\ServicesController::class, 'edit'])->name('services.edit');

    Route::put('update-service-details/{service}/update', [App\Http\Controllers\ServicesController::class, 'update'])->name('services.update');

    Route::get('Services', [App\Http\Controllers\ServicesController::class, 'index'])->name('services.index');

    Route::get('/delete-service-details/{service}/delete', [App\Http\Controllers\ServicesController::class, 'destroy'])->name('services.destroy');

    //######################################################## Home Slider ################################################################################//

    Route::get('home-slider', [App\Http\Controllers\HomeSliderController::class, 'index'])->name('home-slider.index');

    Route::get('create-home-slider', [App\Http\Controllers\HomeSliderController::class, 'create'])->name('home-slider.create');

    Route::post('store-home-slider', [App\Http\Controllers\HomeSliderController::class, 'store'])->name('home-slider.store');

    Route::get('/home-slider/{homeSlider}/edit', [App\Http\Controllers\HomeSliderController::class, 'edit'])->name('home-slider.edit');

    Route::put('/home-slider/{homeSlider}/update', [App\Http\Controllers\HomeSliderController::class, 'update'])->name('home-slider.update');

    Route::get('/home-slidery/{homeSlider}/delete', [App\Http\Controllers\HomeSliderController::class, 'destroy'])->name('home-slider.destroy');

    //######################################################## About Us ################################################################################//

    Route::get('about-us', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about-us.index');

    Route::get('create-about-us', [App\Http\Controllers\AboutUsController::class, 'create'])->name('about-us.create');

    Route::post('store-about-us', [App\Http\Controllers\AboutUsController::class, 'store'])->name('about-us.store');

    Route::get('/about-us/{aboutUs}/edit', [App\Http\Controllers\AboutUsController::class, 'edit'])->name('about-us.edit');

    Route::put('/about-us/{aboutUs}/update', [App\Http\Controllers\AboutUsController::class, 'update'])->name('about-us.update');

    Route::get('/about-usy/{aboutUs}/delete', [App\Http\Controllers\AboutUsController::class, 'destroy'])->name('about-us.destroy');

    //######################################################## Exclusive Offers ################################################################################//

    Route::get('exclusive-offers', [App\Http\Controllers\ExclusiveOffersController::class, 'index'])->name('exclusive-offers.index');

    Route::get('create-exclusive-offers', [App\Http\Controllers\ExclusiveOffersController::class, 'create'])->name('exclusive-offers.create');

    Route::post('store-exclusive-offers', [App\Http\Controllers\ExclusiveOffersController::class, 'store'])->name('exclusive-offers.store');

    Route::get('/exclusive-offers/{exclusiveOffers}/edit', [App\Http\Controllers\ExclusiveOffersController::class, 'edit'])->name('exclusive-offers.edit');

    Route::put('/exclusive-offers/{exclusiveOffers}/update', [App\Http\Controllers\ExclusiveOffersController::class, 'update'])->name('exclusive-offers.update');

    Route::get('/exclusive-offersy/{exclusiveOffers}/delete', [App\Http\Controllers\ExclusiveOffersController::class, 'destroy'])->name('exclusive-offers.destroy');

    //######################################################## Exclusive Offers ################################################################################//

    Route::get('testimonials', [App\Http\Controllers\TestimonialsController::class, 'index'])->name('testimonials.index');

    Route::get('create-testimonials', [App\Http\Controllers\TestimonialsController::class, 'create'])->name('testimonials.create');

    Route::post('store-testimonials', [App\Http\Controllers\TestimonialsController::class, 'store'])->name('testimonials.store');

    Route::get('/testimonials/{testimonial}/edit', [App\Http\Controllers\TestimonialsController::class, 'edit'])->name('testimonials.edit');

    Route::put('/testimonials/{testimonial}/update', [App\Http\Controllers\TestimonialsController::class, 'update'])->name('testimonials.update');

    Route::get('/testimonialsy/{testimonial}/delete', [App\Http\Controllers\TestimonialsController::class, 'destroy'])->name('testimonials.destroy');

    // Route to show the form for creating or editing the Testimonial Banner
    Route::get('testimonial-banner/create', [App\Http\Controllers\TestimonialsController::class, 'createBanner'])->name('testimonial_banner.create');
    // Route to handle the form submission and save the Testimonial Banner
    Route::post('testimonial-banner/store', [App\Http\Controllers\TestimonialsController::class, 'storeBanner'])->name('testimonial_banner.store');
    Route::get('testimonial-banner/edit', [App\Http\Controllers\TestimonialsController::class, 'editBanner'])->name('testimonial_banner.edit');
    Route::put('testimonial-banner/update', [App\Http\Controllers\TestimonialsController::class, 'updateBanner'])->name('testimonial_banner.update');


    //######################################################## Our Commitments ################################################################################//

    Route::get('our-commitments', [App\Http\Controllers\OurCommitmentsController::class, 'index'])->name('our-commitments.index');

    Route::get('create-our-commitments', [App\Http\Controllers\OurCommitmentsController::class, 'create'])->name('our-commitments.create');

    Route::post('store-our-commitments', [App\Http\Controllers\OurCommitmentsController::class, 'store'])->name('our-commitments.store');

    Route::get('/our-commitments/{ourCommitments}/edit', [App\Http\Controllers\OurCommitmentsController::class, 'edit'])->name('our-commitments.edit');

    Route::put('/our-commitments/{ourCommitments}/update', [App\Http\Controllers\OurCommitmentsController::class, 'update'])->name('our-commitments.update');

    Route::get('/our-commitments/{ourCommitments}/delete', [App\Http\Controllers\OurCommitmentsController::class, 'destroy'])->name('our-commitments.destroy');


     Route::get('our-commitment-banner/create', [App\Http\Controllers\OurCommitmentsController::class, 'createBanner'])->name('our_commitment_banner.create');
     Route::post('our-commitment-banner/store', [App\Http\Controllers\OurCommitmentsController::class, 'storeBanner'])->name('our_commitment_banner.store');
     Route::get('our-commitment-banner/edit', [App\Http\Controllers\OurCommitmentsController::class, 'editBanner'])->name('our_commitment_banner.edit');
     Route::put('our-commitment-banner/update', [App\Http\Controllers\OurCommitmentsController::class, 'updateBanner'])->name('our_commitment_banner.update');


    //######################################################## Why-book-with-us ################################################################################//

    Route::get('Why-book-with-us', [App\Http\Controllers\WhyBookWithUSController::class, 'index'])->name('Why-book-with-us.index');

    Route::get('create-Why-book-with-us', [App\Http\Controllers\WhyBookWithUSController::class, 'create'])->name('Why-book-with-us.create');

    Route::post('store-Why-book-with-us', [App\Http\Controllers\WhyBookWithUSController::class, 'store'])->name('Why-book-with-us.store');

    Route::get('/Why-book-with-us/{whyBookWithUS}/edit', [App\Http\Controllers\WhyBookWithUSController::class, 'edit'])->name('Why-book-with-us.edit');

    Route::put('/Why-book-with-us/{whyBookWithUS}/update', [App\Http\Controllers\WhyBookWithUSController::class, 'update'])->name('Why-book-with-us.update');

    Route::get('/Why-book-with-us/{whyBookWithUS}/delete', [App\Http\Controllers\WhyBookWithUSController::class, 'destroy'])->name('Why-book-with-us.destroy');

    // Route to show the form for creating or editing the Testimonial Banner
    Route::get('why-book-us-banner/create', [App\Http\Controllers\WhyBookWithUSController::class, 'createBanner'])->name('why_book_us_banner.create');
    // Route to handle the form submission and save the Testimonial Banner
    Route::post('why-book-us-banner/store', [App\Http\Controllers\WhyBookWithUSController::class, 'storeBanner'])->name('why_book_us_banner.store');
    Route::get('why-book-us-banner/edit', [App\Http\Controllers\WhyBookWithUSController::class, 'editBanner'])->name('why_book_us_banner.edit');
    Route::put('why-book-us-banner/update', [App\Http\Controllers\WhyBookWithUSController::class, 'updateBanner'])->name('why_book_us_banner.update');


     //######################################################## Blog ################################################################################//

     Route::get('blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');

     Route::get('create-blogs', [App\Http\Controllers\BlogController::class, 'create'])->name('blogs.create');

     Route::post('store-blogs', [App\Http\Controllers\BlogController::class, 'store'])->name('blogs.store');

     Route::get('/blogs/{blog}/edit', [App\Http\Controllers\BlogController::class, 'edit'])->name('blogs.edit');

     Route::put('/blogs/{blog}/update', [App\Http\Controllers\BlogController::class, 'update'])->name('blogs.update');

     Route::get('/blogs/{blog}/delete', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blogs.destroy');

      //######################################################## Privacy PolicY ################################################################################//

      Route::get('privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, 'index'])->name('privacy-policy.index');

      Route::get('create-privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, 'create'])->name('privacy-policy.create');

      Route::post('store-privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, 'store'])->name('privacy-policy.store');

      Route::get('/privacy-policy/{privacyPolicy}/edit', [App\Http\Controllers\PrivacyPolicyController::class, 'edit'])->name('privacy-policy.edit');

      Route::put('/privacy-policy/{privacyPolicy}/update', [App\Http\Controllers\PrivacyPolicyController::class, 'update'])->name('privacy-policy.update');

      Route::get('/privacy-policy/{privacyPolicy}/delete', [App\Http\Controllers\PrivacyPolicyController::class, 'destroy'])->name('privacy-policy.destroy');


       //######################################################## Contact Details ################################################################################//

       Route::get('contact-details', [App\Http\Controllers\ContactDetailsController::class, 'index'])->name('contact-details.index');

       Route::get('create-contact-details', [App\Http\Controllers\ContactDetailsController::class, 'create'])->name('contact-details.create');

       Route::post('store-contact-details', [App\Http\Controllers\ContactDetailsController::class, 'store'])->name('contact-details.store');

       Route::get('/contact-details/{contactDetails}/edit', [App\Http\Controllers\ContactDetailsController::class, 'edit'])->name('contact-details.edit');

       Route::put('/contact-details/{contactDetails}/update', [App\Http\Controllers\ContactDetailsController::class, 'update'])->name('contact-details.update');

       Route::get('/contact-details/{contactDetails}/delete', [App\Http\Controllers\ContactDetailsController::class, 'destroy'])->name('contact-details.destroy');

       //######################################################## Social Media ################################################################################//

       Route::get('social-media', [App\Http\Controllers\SocialMediaLinksController::class, 'index'])->name('social-media.index');

       Route::get('create-social-media', [App\Http\Controllers\SocialMediaLinksController::class, 'create'])->name('social-media.create');

       Route::post('store-social-media', [App\Http\Controllers\SocialMediaLinksController::class, 'store'])->name('social-media.store');

       Route::get('/social-media/{socialMediaLinks}/edit', [App\Http\Controllers\SocialMediaLinksController::class, 'edit'])->name('social-media.edit');

       Route::put('/social-media/{socialMediaLinks}/update', [App\Http\Controllers\SocialMediaLinksController::class, 'update'])->name('social-media.update');

       Route::get('/social-media/{socialMediaLinks}/delete', [App\Http\Controllers\SocialMediaLinksController::class, 'destroy'])->name('social-media.destroy');

       //######################################################## Gallery ################################################################################//

       Route::get('gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

       Route::get('create-gallery', [App\Http\Controllers\GalleryController::class, 'create'])->name('gallery.create');

       Route::post('store-gallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');

       Route::get('/gallery/{gallery}/edit', [App\Http\Controllers\GalleryController::class, 'edit'])->name('gallery.edit');

       Route::put('/gallery/{gallery}/update', [App\Http\Controllers\GalleryController::class, 'update'])->name('gallery.update');

       Route::get('/gallery/{gallery}/delete', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy');

       //######################################################## Terms and Conditions ################################################################################//

       Route::get('terms-and-conditions', [App\Http\Controllers\TermsandConditionController::class, 'index'])->name('terms-and-conditions.index');

       Route::get('create-terms-and-conditions', [App\Http\Controllers\TermsandConditionController::class, 'create'])->name('terms-and-conditions.create');

       Route::post('store-terms-and-conditions', [App\Http\Controllers\TermsandConditionController::class, 'store'])->name('terms-and-conditions.store');

       Route::get('/terms-and-conditions/{termsandCondition}/edit', [App\Http\Controllers\TermsandConditionController::class, 'edit'])->name('terms-and-conditions.edit');

       Route::put('/terms-and-conditions/{termsandCondition}/update', [App\Http\Controllers\TermsandConditionController::class, 'update'])->name('terms-and-conditions.update');

       Route::get('/terms-and-conditions/{termsandCondition}/delete', [App\Http\Controllers\TermsandConditionController::class, 'destroy'])->name('terms-and-conditions.destroy');


       //######################################################## Disclaimer ################################################################################//

       Route::get('disclaimer', [App\Http\Controllers\DisclaimerController::class, 'index'])->name('disclaimer.index');

       Route::get('create-disclaimer', [App\Http\Controllers\DisclaimerController::class, 'create'])->name('disclaimer.create');

       Route::post('store-disclaimer', [App\Http\Controllers\DisclaimerController::class, 'store'])->name('disclaimer.store');

       Route::get('/disclaimer/{disclaimer}/edit', [App\Http\Controllers\DisclaimerController::class, 'edit'])->name('disclaimer.edit');

       Route::put('/disclaimer/{disclaimer}/update', [App\Http\Controllers\DisclaimerController::class, 'update'])->name('disclaimer.update');

       Route::get('/disclaimer/{disclaimer}/delete', [App\Http\Controllers\DisclaimerController::class, 'destroy'])->name('disclaimer.destroy');


       //######################################################## Flash Message ################################################################################//

       Route::get('flash-message', [App\Http\Controllers\FlashMessageController::class, 'index'])->name('flash-message.index');

       Route::get('create-flash-message', [App\Http\Controllers\FlashMessageController::class, 'create'])->name('flash-message.create');

       Route::post('store-flash-message', [App\Http\Controllers\FlashMessageController::class, 'store'])->name('flash-message.store');

       Route::get('/flash-message/{flashMessage}/edit', [App\Http\Controllers\FlashMessageController::class, 'edit'])->name('flash-message.edit');

       Route::put('/flash-message/{flashMessage}/update', [App\Http\Controllers\FlashMessageController::class, 'update'])->name('flash-message.update');

       Route::get('/flash-message/{flashMessage}/delete', [App\Http\Controllers\FlashMessageController::class, 'destroy'])->name('flash-message.destroy');



});
