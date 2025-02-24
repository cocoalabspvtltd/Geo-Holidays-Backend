<?php

namespace App\Interfaces;

interface ApiRepositoryInterface
{
    public function ayurvedicPackageIndex();

    public function storeBookingData(array $data);

    public function storeContactData(array $data);

    public function storeEnquiryData(array $data);

    public function filight_and_hotelIndex();

    public function offersIndex();

    public function package_categoryIndex();

    public function serviceIndex();

    public function tour_details($id);

    public function getByCategory($category_id);

    public function packageGallery();

    public function aboutUs();

    public function exclusiveOffers();

    public function blog();

    public function testimonials();

    public function homeSlider();

    public function why_book_with_us();

    public function ourCommitments();

    public function privacyPolicy();

    public function contactDetails();

    public function socialMediaLinks();

    public function gallery();

    public function terms_and_conditions();

    public function disclaimer();

    public function flahMessage();

}
