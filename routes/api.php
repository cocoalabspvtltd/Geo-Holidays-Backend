<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**************************************** Package Data *********************************************************/

Route::get('/packagetour/{id}', [ApiController::class, 'tour_details']);
Route::get('/packagecategory', [ApiController::class, 'package_category_index']);
Route::get('/packagecategory-tour/{category_id}', [ApiController::class, 'package_category_tour']);
Route::get('/package_gallery', [ApiController::class, 'package_gallery']);


/**************************************** Offers *********************************************************/

Route::get('/offers', [ApiController::class, 'offers_index']);

/**************************************** flight and hotel *********************************************************/

Route::get('/flight_and_hotel', [ApiController::class, 'filight_and_hotel_index']);

/**************************************** Ayurvedic Packages *********************************************************/

Route::get('/ayurvedic_packages', [ApiController::class, 'ayurvedic_package_index']);

/**************************************** Services *********************************************************/

Route::get('/services', [ApiController::class, 'service_index']);

/**************************************** Geos Enquiry *********************************************************/

Route::post('/sent-enquiry', [ApiController::class, 'store_enquiry_data']);

/**************************************** Geos Booking *********************************************************/

Route::post('/booking', [ApiController::class, 'store_booking_data']);

Route::post('/paymentlink', [PaymentController::class, 'paymentlink']);

Route::post('/payment', [PaymentController::class, 'payment']);

/**************************************** Contact *********************************************************/

Route::post('/contact', [ApiController::class, 'store_contact_data']);

/**************************************** About-us *********************************************************/

Route::get('/about-us', [ApiController::class, 'about_us']);

/**************************************** Exclussive Offers *********************************************************/

Route::get('/exclusive-offers', [ApiController::class, 'exclusive_offers']);

/**************************************** Testimonials *********************************************************/

Route::get('/testimonials', [ApiController::class, 'testimonials']);

/**************************************** Home Slider *********************************************************/

Route::get('/home_slider', [ApiController::class, 'home_slider']);

/**************************************** Why Book with Us *********************************************************/

Route::get('/why-book-with-us', [ApiController::class, 'why_book_with_us']);

/**************************************** Our Commitments *********************************************************/

Route::get('/our-commitments', [ApiController::class, 'our_commitments']);

/**************************************** Blog *********************************************************/

Route::get('/blogs', [ApiController::class, 'blog']);

/**************************************** Privacy Policy *********************************************************/

Route::get('/privacy-policy', [ApiController::class, 'privacyPolicy']);


/**************************************** Contact Details *********************************************************/

Route::get('/contact-details', [ApiController::class, 'contact_details']);

/**************************************** Social Media Links *********************************************************/

Route::get('/social-media-links', [ApiController::class, 'social_media_link']);

/**************************************** Gallery *********************************************************/

Route::get('/gallery', [ApiController::class, 'gallery']);

/**************************************** Terms and Conditions *********************************************************/

Route::get('/terms-conditions', [ApiController::class, 'termsandconditions']);


/**************************************** Disclaimer *********************************************************/

Route::get('/disclaimer', [ApiController::class, 'disclaimer']);

/**************************************** Flash Message *********************************************************/

Route::get('/flash-message', [ApiController::class, 'flash_message']);




